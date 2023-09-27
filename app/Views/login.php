<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Noterd | Auth</title>

    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">


</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center my-4"><img src="../assets/img/loginBanner.png" alt="Login Banner"></div>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="container-fluid">
                                <div class="row" style="display: flex; justify-content: flex-end">
                                    <div class="col-lg-12">
                                        <div class="alert alert-success alert-dismissible fade show alertnotif" role="alert">
                                            <strong> <?= session()->getFlashdata('success'); ?> </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('failed')) : ?>
                            <div class="container-fluid">
                                <div class="row" style="display: flex; justify-content: flex-end">
                                    <div class="col-lg-12">
                                        <div class="alert alert-danger alert-dismissible fade show alertnotif" role="alert">
                                            <strong> <?= session()->getFlashdata('failed'); ?> </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="alert alert-danger text-center" id="passwordMismatchAlert" style="display: none;">
                            Password and Confirm Password do not match.
                        </div>

                        <form class="user" method="POST" action="/auth/login" id="login-form">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Login Form</h1>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" required="true" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" required="true" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            <hr>
                            <p class="text-center">Create an Account? <a href="#" class="toggle-form" data-form="register">Register</a></p>
                        </form>
                        <form class="user" method="POST" action="/auth/register" id="register-form" style="display: none;">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Register Form</h1>
                            </div>
                            <?php $formData = session()->getFlashdata('formData'); ?>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" required="true" placeholder="Username" value="<?= !empty($formData) ? $formData['username'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" required="true" placeholder="Email" value="<?= !empty($formData) ? $formData['email'] : ''; ?>">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control form-control-user" required="true" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="password" name="conf_password" id="conf_password" class="form-control form-control-user" required="true" placeholder="Confirm Password">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block" id="registerBtn" disabled>Register</button>

                            <hr>
                            <p class="text-center">Already have an account? <a href="#" class="toggle-form" data-form="login">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Toggle between login and register forms
            $('.toggle-form').click(function() {
                var form = $(this).data('form');
                $('.toggle-form').removeClass('active');
                $(this).addClass('active');
                if (form === 'login') {
                    $('#login-form').show();
                    $('#register-form').hide();
                } else if (form === 'register') {
                    $('#login-form').hide();
                    $('#register-form').show();
                }
            });
        });
        // Select the necessary input elements
        var newPasswordInput = $('#password');
        var confirmNewPasswordInput = $('#conf_password');
        var editButton = $('#registerBtn');
        var passwordMismatchAlert = $('#passwordMismatchAlert');

        // Function to check if the passwords match
        function checkPasswordMatch() {
            var newPassword = newPasswordInput.val();
            var confirmNewPassword = confirmNewPasswordInput.val();

            if (newPassword !== confirmNewPassword && confirmNewPassword !== "") {
                passwordMismatchAlert.show();
                editButton.prop('disabled', true); // Disable the "Update" button
            } else {
                passwordMismatchAlert.hide();
                editButton.prop('disabled', false); // Enable the "Update" button
            }
        }

        // Check passwords on input change
        newPasswordInput.on('input', checkPasswordMatch);
        confirmNewPasswordInput.on('input', checkPasswordMatch);
    </script>
    <script>
        window.setTimeout(function() {
            $(".alertnotif").fadeTo(300, 0).slideUp(300, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
</body>

</html>