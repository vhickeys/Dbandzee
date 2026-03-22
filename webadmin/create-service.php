<?php

require('classes/functions.php');

adminAuth(); // you can later rename this to adminAuth()

$title = "Create Service";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

?>

<div class="content-body">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Create Service</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        </ol>
        <a class="text-primary fs-13" href="view-services.php">View Services</a>
    </div>

    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Service</h4>
                    </div>

                    <div class="card-body">
                        <div class="basic-form">

                            <form action="classes/process.php?action=create-service" method="POST" enctype="multipart/form-data">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Service Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="service_name" class="form-control" placeholder="e.g. Dredging Services" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="caption" class="form-control" placeholder="Short one-line description" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" rows="5" placeholder="Detailed explanation of the service" required></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Service Image:</label>
                                    <div class="col-sm-9">
                                        <p class="text-danger"><small>Max size: 500KB</small></p>
                                        <input class="form-control" name="image" type="file" accept=".jpg, .jpeg, .png, .webp" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Status:</label>
                                    <div class="col-sm-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="active" checked>
                                            <label class="form-check-label">Active</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="inactive">
                                            <label class="form-check-label">Inactive</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-3 row">
                                    <div class="col-sm-12 text-end">
                                        <button type="submit" name="submit-service" class="btn btn-primary">
                                            Create Service
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include_once('components/footer.php');
include_once('components/scripts.php');
?>