<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">

    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/js/tinymce/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'autolink lists link image',
            toolbar: 'undo redo | styleselect | bold italic underline',
            menubar: false
        });
    </script>

    <script>
        $(document).ready(function() {
            // Sembunyikan alert validasi kosong
            $("#kosong").hide();
        });
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin-home.php">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img src="../assets/img/iconNoterd.png" width="50" height="50" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Noterd</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item <?= ($page == 'dashboard') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item <?= ($page == 'users_data') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/users_data">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users Data</span>
                </a>
            </li>

            <li class="nav-item <?= ($page == 'notes_data') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/notes_data">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Notes Data</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, <?= session()->get('username') ?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- BODY -->
                <?= $this->renderSection('bodycontent') ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a target="_blank" href="https://github.com/royhanmh">@royhanmh</a> <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Modal List -->

    <!-- Add Modal -->

    <div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/insert_user">
                        <div class="form-group">
                            <label>Username</label>
                            <br>
                            <input class="form-control form-control-user" type="text" name="username" required>

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <br>
                            <input class="form-control form-control-user" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <br>
                            <div class="input-group">
                                <input class="form-control form-control-user" type="password" name="password" id="password" required>
                                <div class="input-group-append">
                                    <a type="button" id="togglePassword" class="btn btn-success">
                                        <i class="fas fa-eye-slash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="passwordAlert" class="alert alert-danger" style="display: none;"></div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <br>
                            <div class="input-group">
                                <input class="form-control form-control-user" type="password" name="conf_password" id="conf_password" required>
                                <div class="input-group-append">
                                    <a type="button" id="toggleConfPassword" class="btn btn-success">
                                        <i class="fas fa-eye-slash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <br>
                            <select class="form-control" name="role" required>
                                <option value="0">Administrator</option>
                                <option value="1">User</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a class="form-control btn btn-danger" href="/admin/dashboard"> Batal </a>
                            </div>
                            <div class="col">
                                <button class="form-control btn btn-success" type="submit" id="addButton">Add user</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal-->
    <div class="modal fade" id="editusermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/update_user">
                        <div class="form-group">
                            <label>Username</label>
                            <br>
                            <input class="form-control form-control-user" type="text" name="user_username" id="edit_username">

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <br>
                            <input class="form-control form-control-user" type="email" name="user_email" id="edit_email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <br>
                            <div class="input-group">
                                <input class="form-control form-control-user" type="password" name="edit_password" id="edit_password">
                                <div class="input-group-append">
                                    <a type="button" id="editTogglePassword" class="btn btn-success">
                                        <i class="fas fa-eye-slash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="editPasswordAlert" class="alert alert-danger" style="display: none;"></div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <br>
                            <div class="input-group">
                                <input class="form-control form-control-user" type="password" name="edit_conf_password" id="edit_conf_password">
                                <div class="input-group-append">
                                    <a type="button" id="editToggleConfPassword" class="btn btn-success">
                                        <i class="fas fa-eye-slash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <br>
                            <select class="form-control" name="user_role" id="edit_role">
                                <option value="0">Administrator</option>
                                <option value="1">User</option>
                            </select>
                        </div>

                        <input class="form-control form-control-user" type="number" name="user_id" id="edit_user_id" hidden>

                        <div class="row">
                            <div class="col">
                                <a class="form-control btn btn-danger" href="/admin/dashboard"> Batal </a>
                            </div>
                            <div class="col">
                                <button class="form-control btn btn-success" type="submit" id="editButton">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletion Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="text-danger">Do you want to delete this data ?</i>

                    <form class="form" role="form" action="admin/delete_user">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger btn-ok">Delete</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Logout" To end This Session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="../auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>





    <!-- Notes Modal -->

    <!-- Add Notes Modal -->
    <div class="modal fade" id="addnotemodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Note</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/insert_note">
                        <div class="form-group">
                            <label>Title</label>
                            <br>
                            <input class="form-control form-control-user" type="text" name="title" required>

                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <br>
                            <textarea class="form-control form-control-user" name="content"></textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <a class="form-control btn btn-danger" href="/admin/dashboard"> Batal </a>
                            </div>
                            <div class="col">
                                <button class="form-control btn btn-success" type="submit" id="addNoteButton">Add Note</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Notes Modal -->
    <div class="modal fade" id="editnotemodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Note</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/update_note">
                        <div class="form-group">
                            <label>Title</label>
                            <br>
                            <input class="form-control form-control-user" type="text" name="edit_title" id="edit_title" required>

                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <br>
                            <textarea class="form-control form-control-user" name="edit_content" id="edit_content"></textarea>
                        </div>

                        <input class="form-control form-control-user" type="text" name="edit_note_id" id="edit_note_id" hidden>

                        <div class="row">
                            <div class="col">
                                <a class="form-control btn btn-danger" href="/admin/dashboard"> Batal </a>
                            </div>
                            <div class="col">
                                <button class="form-control btn btn-success" type="submit" id="editNoteButton">Add Note</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script> -->
    <!-- <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/demo/datatables-demo.js"></script> -->

    <!-- Add the following CSS files -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.4/css/select.bootstrap4.min.css" rel="stylesheet">

    <!-- Add the following JavaScript files -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>




    <script type="text/javascript">
        //pass id through modal button
        $('#deletemodal').on('shown.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>


    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable({
                responsive: true, // Enable responsive feature
            });


            // Select the password, confirm password inputs, and the alert div
            var passwordInput = $("#password");
            var confPasswordInput = $("#conf_password");
            var togglePasswordButton = $("#togglePassword");
            var toggleConfPasswordButton = $("#toggleConfPassword");
            var passwordAlert = $("#passwordAlert");

            // Select the Update button
            var addButton = $("#addButton");

            // Function to check if passwords match and enable/disable the button
            function checkPasswords() {
                var password = passwordInput.val();
                var confirmPassword = confPasswordInput.val();

                if (password === confirmPassword && confirmPassword !== "") {
                    // Passwords match, enable the button
                    addButton.prop("disabled", false);
                    passwordAlert.hide(); // Hide the alert
                } else {
                    // Passwords don't match or confirm password is empty, disable the button and show the alert
                    addButton.prop("disabled", true);
                    if (confirmPassword !== "") {
                        // Show the alert only if the confirm password is not empty
                        passwordAlert.show().text("Passwords do not match.");
                    } else {
                        passwordAlert.hide(); // Hide the alert if confirm password is empty
                    }
                }
            }
            // Function to toggle password visibility
            function togglePasswordVisibility(inputField, toggleButton) {
                var inputType = inputField.attr("type");
                if (inputType === "password") {
                    inputField.attr("type", "text");
                    toggleButton.html('<i class="fas fa-eye"></i>');
                } else {
                    inputField.attr("type", "password");
                    toggleButton.html('<i class="fas fa-eye-slash"></i>');
                }
            }


            // Call the checkPasswords function when either password field changes
            passwordInput.on("input", checkPasswords);
            confPasswordInput.on("input", checkPasswords);
            // Toggle password visibility when the password button is clicked
            togglePasswordButton.click(function() {
                togglePasswordVisibility(passwordInput, togglePasswordButton);
            });

            // Toggle password visibility when the confirm password button is clicked
            toggleConfPasswordButton.click(function() {
                togglePasswordVisibility(confPasswordInput, toggleConfPasswordButton);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Select the password, confirm password inputs, and the alert div
            var editPasswordInput = $("#edit_password");
            var editConfPasswordInput = $("#edit_conf_password");
            var editTogglePasswordButton = $("#editTogglePassword");
            var editToggleConfPasswordButton = $("#editToggleConfPassword");
            var editPasswordAlert = $("#editPasswordAlert");

            // Select the Update button
            var editButton = $("#editButton");

            // Function to check if passwords match and enable/disable the button
            function checkPasswords() {
                var password = editPasswordInput.val();
                var confirmPassword = editConfPasswordInput.val();

                if (password === confirmPassword && confirmPassword !== "") {
                    // Passwords match, enable the button
                    editButton.prop("disabled", false);
                    editPasswordAlert.hide(); // Hide the alert
                } else {
                    // Passwords don't match or confirm password is empty, disable the button and show the alert
                    //editButton.prop("disabled", true);
                    if (confirmPassword !== "") {
                        // Show the alert only if the confirm password is not empty
                        editPasswordAlert.show().text("Passwords do not match.");
                    } else {
                        editPasswordAlert.hide(); // Hide the alert if confirm password is empty
                    }
                }
            }
            // Function to toggle password visibility
            function editTogglePasswordVisibility(inputField, toggleButton) {
                var inputType = inputField.attr("type");
                if (inputType === "password") {
                    inputField.attr("type", "text");
                    toggleButton.html('<i class="fas fa-eye"></i>');
                } else {
                    inputField.attr("type", "password");
                    toggleButton.html('<i class="fas fa-eye-slash"></i>');
                }
            }


            // Call the checkPasswords function when either password field changes
            editPasswordInput.on("input", checkPasswords);
            editConfPasswordInput.on("input", checkPasswords);
            // Toggle password visibility when the password button is clicked
            editTogglePasswordButton.click(function() {
                editTogglePasswordVisibility(editPasswordInput, editTogglePasswordButton);
            });

            // Toggle password visibility when the confirm password button is clicked
            editToggleConfPasswordButton.click(function() {
                editTogglePasswordVisibility(editConfPasswordInput, editToggleConfPasswordButton);
            });
        });
    </script>



    <script type="text/javascript">
        $(".editUser").click(function() {
            var edit_user_id = $(this).data('edit_user_id');
            $("#edit_user_id").val(edit_user_id);

            var edit_username = $(this).data('edit_username');
            $("#edit_username").val(edit_username);

            var edit_email = $(this).data('edit_email');
            $("#edit_email").val(edit_email);

            var edit_role = $(this).data('edit_role');
            $("#edit_role").val(edit_role);


            $('#editusermodal').modal('show');
        });
    </script>


    <script type="text/javascript">
        $(".editNote").click(function() {
            var edit_note_id = $(this).data('edit_note_id');
            $("#edit_note_id").val(edit_note_id);

            var edit_title = $(this).data('edit_title');
            $("#edit_title").val(edit_title);

            var edit_content = $(this).data('edit_content');

            // Use TinyMCE API to set the content
            tinymce.get('edit_content').setContent(edit_content);


            $('#editnotemodal').modal('show');
        });
    </script>




    <!-- Alert auto close -->
    <script>
        window.setTimeout(function() {
            $(".alertnotif").fadeTo(300, 0).slideUp(300, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

</body>

</html>