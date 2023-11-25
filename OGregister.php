<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('assets/codeSnippets/header.php'); ?>
    <title>Register</title>

</head>

<body>
    <div class="container" style="position:absolute; left:0; right:0; top: 50%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%);">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
                    <div class="text-center">
                        <h4 class="text-dark mb-4">Create an Account!</h4>
                    </div>
                    <form class="user">
                        <div class="mb-3"><input class="form-control form-control-user" type="text" placeholder="Username" required=""></div>
                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="email" placeholder="Email Address" required=""></div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" required=""></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="verifyPassword" placeholder="Repeat Password" required=""></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="First Name" required=""></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" placeholder="Last Name" required=""></div>
                        </div>
                        <div class="row mb-3">
                            <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Register Account</button>
                        <hr>
                    </form>
                    <div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a></div>
                    <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                </div>
            </div>
        </div>
		



    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/emailValidation.js"></script>

</body>

</html>