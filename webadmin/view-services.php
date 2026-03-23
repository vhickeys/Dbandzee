<?php

require 'classes/functions.php';

adminAuth();

$title = "View Services";
include_once 'components/head.php';
include_once 'components/nav-header.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

$allServices = $service->getAdminServices();
?>

<div class="content-body">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View Services</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        </ol>
        <a class="text-primary fs-13" href="create-service.php">+ Add Service</a>
    </div>

    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Services</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Caption</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $id = 1;

                                    if (! empty($allServices)) {
                                        foreach ($allServices as $srv) {
                                    ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $srv['service_name'] ?? '' ?></td>
                                                <td><?php echo $srv['caption'] ?? '' ?></td>
                                                <td>
                                                    <img
                                                        src="../assets/images/services/<?php echo $srv['image'] ?? 'placeholder.png' ?>"
                                                        class="avatar avatar-md"
                                                        alt="<?php echo $srv['service_name'] ?>">
                                                </td>
                                                <td>
                                                    <?php if ($srv['status'] == 'active') { ?>
                                                        <span class="badge bg-success">Active</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-secondary">Inactive</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo date("d-M-Y", strtotime($srv['created_at'])) ?></td>
                                                <td>
                                                    <a href="edit-service.php?id=<?php echo $srv['id'] ?>"
                                                        class="btn btn-primary shadow btn-xs sharp"
                                                        title="Edit Service">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                            $id++;
                                        }
                                    } else {
                                        // Display message when no services exist
                                        echo '<tr>
            <td colspan="7" class="text-center text-muted">No services found.</td>
          </tr>';
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
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