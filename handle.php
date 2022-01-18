<?php

if (empty($_POST)) {
    header("Location: index.php");
}

function InputFilter($data) {
    return htmlspecialchars(stripslashes($data));
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
    $NameReg = preg_match('/^[A-Za-z ]+$/', $name);
    if ($NameReg !== true) {
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
    $MessageReg = preg_match('/^[A-Za-z ]+$/', $message);
    if ($MessageReg !== true) {
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
}

if (!isset($file)) {
    $errors['file'] = 'Supporting attachment is required!';
} else {
    $filepath = $_FILES['myFile']['tmp_name'];
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);
    $allowedTypes = ['image/png' => 'png', 'image/jpeg' => 'jpg', 'image/jpg' => 'jpg', 'image/gif' => 'gif', 'applications/pdf' => 'pdf'];
    if(!in_array($filetype, array_keys($allowedTypes))) {
        $errors['file'] = 'Only Images or Pdf are allowed!';
    } else {
        $filename = basename($filepath);
        $extension = $allowedTypes[$filetype];
        $targetDirectory = __DIR__ . "/uploads";
        $newFilepath = $targetDirectory . "/" . $filename . "." . $extension;
    }
}