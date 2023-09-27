<?= $this->extend('user/template'); ?>
<?= $this->section('bodycontent'); ?>

<?php
function truncateText($text, $length)
{
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length) . '...'; // Add ellipsis for truncated text
    }
    return $text;
}
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
    </div>

    <!-- Add Notes Icon Button -->
    <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addnotemodal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add Notes</span>
    </button>
    <!-- Content Row -->
    <div class="row mt-4">
        <!-- Notes Card -->
        <?php
        foreach ($datas as $row) :
        ?>
            <div class="col-lg-4 col-md-12 mb-4 note-card" style="display: none;">

                <div class="card shadow mb-4 h-100 card-with-hover">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?= truncateText($row['title'], 250) ?></h6>

                        <!-- Edit Button -->
                        <a href="#" class="mr-4 editNote" data-toggle="modal" data-target="#editnotemodal" data-edit_note_id="<?= $row['note_id']; ?>" data-edit_title="<?= $row['title']; ?>" data-edit_content="<?= $row['content']; ?>"><i class="fas fa-edit fa-sm fa-fw text-primary"></i></a>

                        <!-- Delete Button -->
                        <a href="#" class="deleteNote" data-toggle="modal" data-target="#deletemodal" data-href="/user/delete_note/<?= $row['note_id'] ?>"><i class="fas fa-trash fa-sm fa-fw text-danger"></i></a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body card-content-hover position-relative">
                        <?= truncateText($row['content'], 250) ?>
                        <!-- Date (Formatted) -->
                        <?php
                        // Format the date as dd/mm/yy
                        $formattedDate = date('d/m/y H:i', strtotime($row['created_at']));
                        ?>
                        <span class="small text-muted" style="position: absolute; bottom: 5px; right: 10px;"><?= $formattedDate ?></span>
                        <!-- View Note Button (Initially Hidden) -->
                        <a href="#" class="btn btn-primary btn-icon-split position-absolute viewNote" data-toggle="modal" data-target="#viewnotemodal" data-view_note_id="<?= $row['note_id']; ?>" data-view_title="<?= $row['title']; ?>" data-view_content="<?= $row['content']; ?>">
                            <span class="icon text-white-50">
                                <i class="fas fa-eye"></i>
                            </span>
                            <span class="text">View Note</span>

                        </a>
                    </div>

                </div>
            </div>



        <?php

        endforeach;
        ?>

        <!-- Repeat the card structure for additional cards -->
    </div>

</div>
<!-- Container Fluid -->
<?= $this->endSection(); ?>