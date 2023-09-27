<?= $this->extend('admin/template'); ?>
<?= $this->section('bodycontent'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="container-fluid">
        <div class="row" style="display: flex; justify-content: flex-end">
            <div class="col-lg-4">
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
            <div class="col-lg-4">
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
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User <i class="fa fa-angle-right"></i> <strong>Data</strong></h1>
    </div>

    <div class="d-sm-flex align-items-center mb-4">
        <a href="#" data-toggle="modal" data-target="#addusermodal" class="d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
            <i class="fas fa-plus fa-sm"></i> New User
        </a>

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Users Data</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($datas as $row) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->username ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->role === "0" ? 'Admin' : 'User'; ?></td>
                                <td><?= $row->created_at ?></td>

                                <td class="options">
                                    <a href="#" data-toggle="modal" data-target="#editmodal" data-edit_user_id="<?= $row->user_id; ?>" data-edit_username="<?= $row->username; ?>" data-edit_email="<?= $row->email; ?>" data-edit_role="<?= $row->role; ?>" class="editUser">
                                        <button type="button" class="btn btn-circle btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></button>
                                    </a>

                                    <a href="#" data-toggle="modal" data-target="#deletemodal" data-href="/admin/delete_user/<?= $row->user_id ?>">
                                        <button type="button" class="btn btn-circle btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>