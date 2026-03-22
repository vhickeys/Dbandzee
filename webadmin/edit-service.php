<?php

    require 'classes/functions.php';

    $service_id = $_GET["id"] ?? null;

    adminCheckById($service_id, "view-services");

    $title = "Edit Service";
    include_once 'components/head.php';
    include_once 'components/nav-header.php';
    include_once 'components/header.php';
    include_once 'components/sidebar.php';

    $serviceData = $service->getServiceById($service_id);

?>

<div class="content-body">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Edit Service</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        </ol>
        <a class="text-primary fs-13" href="view-services.php">View Services</a>
    </div>

    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php'?>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit This Service</h4>
                    </div>

                    <div class="card-body">
                        <div class="basic-form">

                            <form action="classes/process.php?action=update-service" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="service_id" value="<?php echo $service_id ?>">
                                <input type="hidden" name="old_image" value="<?php echo $serviceData['image'] ?>">

                                <!-- SERVICE NAME -->
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Service Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="service_name" class="form-control"
                                            value="<?php echo $serviceData['service_name'] ?>" required>
                                    </div>
                                </div>

                                <!-- CAPTION -->
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="caption" class="form-control"
                                            value="<?php echo $serviceData['caption'] ?>" required>
                                    </div>
                                </div>

                                <!-- DESCRIPTION -->
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" rows="6" required><?php echo $serviceData['description'] ?></textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Other Settings</h4>
                    </div>

                    <div class="card-body">

                        <!-- IMAGE -->
                        <div class="mb-3">
                            <label class="form-label">Service Image</label>
                            <p class="text-danger"><small>Max size: 500KB</small></p>

                            <input class="form-control" name="image" type="file">

                            <div class="mt-3">
                                <img
                                    src="../assets/images/services/<?php echo ! empty($serviceData['image']) ? $serviceData['image'] : 'placeholder.png' ?>"
                                    alt="<?php echo $serviceData['service_name'] ?>"
                                    class="img-fluid rounded"
                                    style="max-height:150px;">
                            </div>
                        </div>

                        <!-- STATUS -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="active"
                                    <?php echo $serviceData['status'] == 'active' ? 'checked' : '' ?>>
                                <label class="form-check-label">Active</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="inactive"
                                    <?php echo $serviceData['status'] == 'inactive' ? 'checked' : '' ?>>
                                <label class="form-check-label">Inactive</label>
                            </div>
                        </div>

                        <!-- SUBMIT -->
                        <div class="mt-4 text-end">
                            <button type="submit" name="edit-service" class="btn btn-primary">
                                Update Service
                            </button>
                        </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
    include_once 'components/footer.php';
include_once 'components/scripts.php';
?>