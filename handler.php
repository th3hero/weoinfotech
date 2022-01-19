<?php
session_start();
if (empty($_POST)) {
    header("Location: index.php");
}

function InputFilter($data) {
    return htmlspecialchars(stripslashes($data));
}

//Database configuration information.
$dbinfo = [
    'host' => 'localhost',  //Change with your host address or keep it localhost if hosted on same server.
    'user' => 'root',   //Change with the username.
    'password' => '',   //Change with the password of user.
    'database' => 'weoinfotech' //Name of your database.
];

$status = [
    'status' => true,
    'message' => 'Registered Successfully'
];
$target_file = null;

function ConnectToDB($info) {
    $connect = new mysqli($info['host'], $info['user'], $info['password'], $info['database']);
    if ($connect->connect_errno) {
        echo $connect->connect_errno;
        die();
    }
    return $connect;
}

$name = InputFilter($_POST['name']);
$email = InputFilter($_POST['email']);
$message = InputFilter($_POST['message']);
$branch = InputFilter($_POST['branch']);
$file = $_FILES['file'];
$priority = InputFilter($_POST['priority']);
$terms = InputFilter($_POST['terms']);

$errors = [];
$old = [
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'branch' => $branch,
    'priority' => $priority,
    'terms' => $terms
];

if ($name == "") {
    $errors['name'] = 'Name is required field!';
} else {
    if (!preg_match("/^([a-zA-Z' ]+)$/", $name)) {
        $errors['name'] = 'Name should contain Letters & Space only!';
    }
}

if ($email == "") {
    $errors['email'] = 'Email is required field!';
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is Invalid!';
    }
}

if ($message == "") {
    $errors['message'] = 'Message is required field!';
} else {
    if (!preg_match("/^[ A-Za-z0-9_@.-]*$/", $message)) {
        $errors['message'] = 'Message should contain Letters & Space only!';
    }
}

if ($branch == "") {
    $errors['branch'] = 'Branch is required field!';
}

if ($priority == "") {
    $errors['priority'] = 'Priority is required field!';
}

if ($terms == "") {
    $errors['terms'] = 'Terms & Conditions should be checked!';
} else {
    if ($terms != true) {
        $errors['terms'] = 'Terms & Conditions should be checked!';
    }
}

if (!isset($file)) {
    $errors['file'] = 'Supporting attachment is required!';
} else {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType !== "pdf") {
        $errors['file'] = 'Only Images or Pdf are allowed!';
    }
}

if (count($errors)>0) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header("Location: index.php");
    die();
} else {
    $connect = ConnectToDB($dbinfo);
    $query = "INSERT INTO `content` (`id`, `name`, `email`, `message`, `branch`, `file`, `priority`, `terms`, `updated_at`, `created_at`) VALUES (NULL, '".$name."', '".$email."', '".$message."', '".$branch."', '".$target_file."', '".$priority."', '".$terms."', current_timestamp(), current_timestamp())";
    $insert = $connect->query($query);
    if ($insert !== true) {
        $status = [
            'status' => false,
            'message' => 'Database error contact support!'
        ];
    }
}
if ($status['status'] == true) {
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $_SESSION['status'] = $status;
    header("Location: index.php");
}
