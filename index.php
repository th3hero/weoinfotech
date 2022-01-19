<?php
session_start();
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}

if (isset($_SESSION['old'])) {
    $old = $_SESSION['old'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tasl work of weoinfotech!</title>
</head>

<body>
    <h1 class="text-center">Task work of WeoInfotech!</h1>
    <div class="container mt-5">
        <form action="handler.php" method="post" id="QueryForm" enctype="multipart/form-data">
            <div class="row mt-auto">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="UserName" class="form-label">Enter your Name! <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="UserName" value="<?php if (isset($old['name'])) { echo $old['name']; } ?>" placeholder="i.e - Alok Kumar" name="name" autofocus>
                        <span class="text-sm text-danger" id="NameError"><?php if (isset($errors['name'])) { echo $errors['name']; } ?></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="UserEmail" class="form-label">Enter your Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="UserEmail" placeholder="something@website.com" value="<?php if (isset($old['email'])) { echo $old['email']; } ?>" name="email">
                        <span class="text-sm text-danger" id="EmailError"><?php if (isset($errors['email'])) { echo $errors['email']; } ?></span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="MessageInput" class="form-label">Enter Your Issue <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="MessageInput" rows="3" name="message" placeholder="Enter the issue you are facing"><?php if (isset($old['message'])) { echo $old['message']; } ?></textarea>
                        <span class="text-sm text-danger" id="MessageError"><?php if (isset($errors['message'])) { echo $errors['message']; } ?></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="BranchSelect" class="form-label">Select Your Branch <span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Select Your Branch" id="BranchSelect" name="branch">
                            <option value="" <?php if (isset($old['branch']) == '') { echo 'selected'; } if (!isset($old['branch'])) { echo 'selected'; } ?>>Select Your Branch</option>
                            <option value="delhi" <?php if (isset($old['branch']) == 'delhi') { echo 'selected'; } ?>>Delhi</option>
                            <option value="mumbai" <?php if (isset($old['branch']) == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                            <option value="bangalore" <?php if (isset($old['branch']) == 'bangalore') { echo 'selected'; } ?>>Banglore</option>
                        </select>
                        <span class="text-sm text-danger" id="BranchError"><?php if (isset($errors['branch'])) { echo $errors['branch']; } ?></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="InputFile" class="form-label">Kindly Share Screenshot or Supporting Image <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="InputFile" name="file" accept="image/jpeg, image/jpg, image/gif, image/png, application/pdf">
                        <span class="text-sm text-danger" id="FileError"><?php if (isset($errors['file'])) { echo $errors['file']; } ?></span>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <label for="InputFile" class="form-label">Query Priority to resolution. <span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="RadioID1" value="low" <?php if (isset($old['priority']) == 'low') { echo 'checked'; } if (!isset($old['priority'])) { echo 'checked'; } ?>>
                            <label class="form-check-label" for="RadioID1">Low</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="RadioID2" value="medium" <?php if (isset($old['priority']) == 'medium') { echo 'checked'; } ?>>
                            <label class="form-check-label" for="RadioID2">Medium</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="RadioID3" value="high" <?php if (isset($old['priority']) == 'high') { echo 'checked'; } ?>>
                            <label class="form-check-label" for="RadioID3">High</label>
                        </div>
                    </div>
                    <span class="text-sm text-danger"></span>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="TermsCheck" name="terms" <?php if (isset($old['terms']) == '1') { echo 'checked'; } ?>>
                        <label class="form-check-label" for="TermsCheck">I agree for all the terms and conditions &amp; accepts all the privacy policy! <span class="text-danger">*</span></label><br>
                        <span class="text-sm text-danger" id="TermError"><?php if (isset($errors['terms'])) { echo $errors['terms']; } ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 text-center">
                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-primary" id="RegisterBTN">Register Query</button><br>
                    <br><span class="text-sm <?php if (isset($status['status']) == 'true') { echo 'text-success'; } else { echo 'text-danger'; } ?>"><?php if (isset($status['status'])) { echo $status['message']; } ?></span>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript" src="validations.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body></html>
<?php
session_unset();
session_destroy();
?>
