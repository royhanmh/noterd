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
    <link href="../assets/css/main.css" rel="stylesheet">

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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <a class="navbar-brand" href="/">
                        <img src="../assets/img/navbarBanner.png" width="100" height="30" class="d-inline-block align-top" alt="">
                    </a>

                    <form class="d-none d-sm-inline-block form-inline ml-auto my-2 w-50 navbar-search">
                        <div class="input-group">
                            <input id="searchInput" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Search -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input id="searchInput2" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                                <a class="dropdown-item viewProfile" href="#" data-toggle="modal" data-target="#viewprofilemodal" data-view_profile_id="<?= session()->get('user_id') ?>" data-view_username="<?= session()->get('username'); ?>" data-view_email="<?= session()->get('email') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
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

    <!-- Notes Modal -->

    <!-- View Notes Modal -->
    <div class="modal fade" id="viewnotemodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Note</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="m-0 font-weight-bold text-uppercase text-primary" id="view_title"></h6>
                    <div class="card-body card-content-hover" id="view_content"></div>
                </div>
            </div>
        </div>
    </div>


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
                    <form method="post" enctype="multipart/form-data" action="/user/insert_note">
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
                                <a class="form-control btn btn-danger" href="/user"> Batal </a>
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
                    <form method="post" enctype="multipart/form-data" action="/user/update_note">
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
                                <a class="form-control btn btn-danger" href="/user"> Batal </a>
                            </div>
                            <div class="col">
                                <button class="form-control btn btn-primary" type="submit" id="editNoteButton">Edit Note</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>


    <!-- Profile Modal -->
    <!-- View Profile Modal -->
    <div class="modal fade" id="viewprofilemodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Profile</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center profile-card">
                        <!-- Profile Picture -->
                        <img src="../assets/img/undraw_profile.svg" class="img-fluid rounded-circle" alt="Profile Picture" style="max-width: 80px; max-height: 80px;">

                        <a class="editProfile" href="#" data-toggle="modal" data-target="#editprofilemodal" data-edit_profile_id="<?= session()->get('user_id') ?>" data-edit_username="<?= session()->get('username'); ?>" data-edit_email="<?= session()->get('email') ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <h6 class="m-0 font-weight-bold text-uppercase text-primary mt-2 text-center" id="view_username">Username</h6>
                    <h6 class="m-0 font-weight-bold text-uppercase text-black text-center" id="view_email">Email</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editprofilemodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pofile</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form method="post" enctype="multipart/form-data" action="/user/edit_profile">
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
                            <label>Current Password</label>
                            <br>
                            <div class="input-group">
                                <input class="form-control form-control-user" type="password" name="current_password" id="current_password">
                                <div class="input-group-append">
                                    <button type="button" id="toggleCurrentPassword" class="btn btn-primary">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <br>
                            <div class="input-group">
                                <input class="form-control form-control-user" type="password" name="new_password" id="new_password" disabled>
                                <div class="input-group-append">
                                    <button type="button" id="toggleNewPassword" class="btn btn-primary">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <br>
                            <div class="input-group">
                                <input class="form-control form-control-user" type="password" name="confirm_new_password" id="confirm_new_password" disabled>
                                <div class="input-group-append">
                                    <button type="button" id="toggleConfirmPassword" class="btn btn-primary">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <p id="passwordMismatchAlert" class="text-l text-danger" style="display: none;">
                            Password Does Not Match
                        </p>

                        <input class="form-control form-control-user" type="number" name="user_id" id="edit_profile_id" hidden>

                        <div class="row">
                            <div class="col">
                                <a class="form-control btn btn-danger" href="/user"> Batal </a>
                            </div>
                            <div class="col">
                                <button class="form-control btn btn-primary" type="submit" id="editButton">Update</button>
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
                    <i class="text-danger">Do you want to delete this note ?</i>

                    <form class="form" role="form" action="user/delete_note">
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
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
        $(".viewNote").click(function() {
            var view_note_id = $(this).data('view_note_id');
            $("#view_note_id").val(view_note_id);

            var view_title = $(this).data('view_title');
            $("#view_title").text(view_title);

            var view_content = $(this).data('view_content');
            $("#view_content").html(view_content);

            $('#viewnotemodal').modal('show');
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

    <script type="text/javascript">
        //pass id through modal button
        $('#deletemodal').on('shown.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>

    <!-- JS for Profile Modal -->

    <script type="text/javascript">
        $(".viewProfile").click(function() {
            var view_profile_id = $(this).data('view_profile_id');
            $("#view_profile_id").text(view_profile_id);

            var view_username = $(this).data('view_username');
            $("#view_username").text(view_username);

            var view_email = $(this).data('view_email');
            $("#view_email").text(view_email);

            $('#viewprofilemodal').modal('show');
        });
    </script>

    <script type="text/javascript">
        $(".editProfile").click(function() {
            var edit_profile_id = $(this).data('edit_profile_id');
            $("#edit_profile_id").val(edit_profile_id);

            var edit_username = $(this).data('edit_username');
            $("#edit_username").val(edit_username);

            var edit_email = $(this).data('edit_email');
            $("#edit_email").val(edit_email);

            var edit_role = $(this).data('edit_role');
            $("#edit_role").val(edit_role);


            $('#editprofilemodal').modal('show');
        });
    </script>

    <script>
        $(document).ready(function() {
            // Toggle visibility of current password
            // Toggle visibility of password fields and change icons
            $('#toggleCurrentPassword').click(function() {
                var input = $('#current_password');
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
                var icon = $(this).find('i');
                icon.toggleClass('fa-eye fa-eye-slash');
            });

            $('#toggleNewPassword').click(function() {
                var input = $('#new_password');
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
                var icon = $(this).find('i');
                icon.toggleClass('fa-eye fa-eye-slash');
            });

            $('#toggleConfirmPassword').click(function() {
                var input = $('#confirm_new_password');
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
                var icon = $(this).find('i');
                icon.toggleClass('fa-eye fa-eye-slash');
            });


            // Disable/enable new password fields based on current password
            $('#current_password').on('input', function() {
                var currentPassword = $(this).val();
                var newPasswordField = $('#new_password');
                var confirmNewPasswordField = $('#confirm_new_password');

                if (currentPassword.length > 0) {
                    newPasswordField.removeAttr('disabled');
                    confirmNewPasswordField.removeAttr('disabled');
                } else {
                    newPasswordField.attr('disabled', 'disabled').val('');
                    confirmNewPasswordField.attr('disabled', 'disabled').val('');
                }
            });


            function checkPasswordMatch() {
                var newPassword = $('#new_password').val();
                var confirmNewPassword = $('#confirm_new_password').val();

                if (newPassword !== confirmNewPassword && newPassword !== "" && confirmNewPassword !== "") {
                    $('#passwordMismatchAlert').show();
                    $('#editButton').attr('disabled', 'disabled'); // Disable the "Update" button
                } else {
                    $('#passwordMismatchAlert').hide();
                    $('#editButton').removeAttr('disabled'); // Enable the "Update" button
                }
            }

            $('#new_password, #confirm_new_password').on('input', function() {
                checkPasswordMatch();
            });
        });
    </script>

    <!-- AJAX for Search Bar -->
    <script>
        $(document).ready(function() {
            // Your existing code...

            // Function to filter notes based on search input
            function filterNotes(searchText, inputElement) {
                $('.note-card').each(function() {
                    var cardTitle = $(this).find('.card-header h6').text().toLowerCase();
                    var cardContent = $(this).find('.card-body').text().toLowerCase();

                    if (searchText === '' || cardTitle.includes(searchText) || cardContent.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Trigger filtering on input change for the first search input
            $('#searchInput').on('input', function() {
                var searchText = $(this).val().toLowerCase();
                filterNotes(searchText, this);
            });

            // Trigger filtering on input change for the second search input
            $('#searchInput2').on('input', function() {
                var searchText = $(this).val().toLowerCase();
                filterNotes(searchText, this);
            });

            // Initially show all notes on page load
            filterNotes('', null);

            // ... The rest of your code ...
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