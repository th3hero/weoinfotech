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
                        <input type="text" class="form-control" id="UserName" placeholder="i.e - Alok Kumar" name="name" autofocus>
                        <span class="text-sm text-danger" id="NameError"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="UserEmail" class="form-label">Enter your Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="UserEmail" placeholder="something@website.com" name="email">
                        <span class="text-sm text-danger" id="EmailError"></span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="MessageInput" class="form-label">Enter Your Issue <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="MessageInput" rows="3" name="message" placeholder="Enter the issue you are facing"></textarea>
                        <span class="text-sm text-danger" id="MessageError"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="BranchSelect" class="form-label">Select Your Branch <span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Select Your Branch" id="BranchSelect" name="branch">
                            <option value="" selected>Select Your Branch</option>
                            <option value="delhi">Delhi</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="bangalore">Banglore</option>
                        </select>
                        <span class="text-sm text-danger" id="BranchError"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="InputFile" class="form-label">Kindly Share Screenshot or Supporting Image <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="InputFile" name="file" accept="image/jpeg, image/jpg, image/gif, image/png, application/pdf">
                        <span class="text-sm text-danger" id="FileError"></span>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <label for="InputFile" class="form-label">Query Priority to resolution. <span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="RadioID1" value="low" checked>
                            <label class="form-check-label" for="RadioID1">Low</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="RadioID2" value="medium">
                            <label class="form-check-label" for="RadioID2">Medium</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="RadioID3" value="high">
                            <label class="form-check-label" for="RadioID3">High</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="TermsCheck" name="terms">
                        <label class="form-check-label" for="TermsCheck">I agree for all the terms and conditions &amp; accepts all the privacy policy! <span class="text-danger">*</span></label><br>
                        <span class="text-sm text-danger" id="TermError"></span>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 text-center">
                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-primary" id="RegisterBTN">Register Query</button>
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
