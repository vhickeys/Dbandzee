<?php
require 'classes/functions.php';
adminAuth(); // Ensure only authenticated admins access

$title = "Dashboard";
include_once 'components/head.php';
include_once 'components/nav-header.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

$total_contacts = countTable('contacts');
$total_services = countTable('services');
$users_count    = countTable('users');
$visitors_count = countTable('visitors');
?>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Dashboard</h5>
            </li>
        </ol>
    </div>

    <div class="container-fluid">

        <!-- SESSION FLASH MESSAGES -->
        <?php if (! empty($_SESSION['message'])): ?>
            <div class="alert alert-danger solid alert-dismissible fade show">
                <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <?php if (! empty($_SESSION['user_data']['interaction'])): ?>
            <div class="alert alert-success solid alert-dismissible fade show">
                <strong>Welcome!</strong> <?php echo $_SESSION['user_data']['fullName']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['user_data']['interaction']); ?>
        <?php endif; ?>

        <div class="row">

            <!-- ACCOUNT ROLE CARD -->
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between p-4">
                        <div>
                            <h6 class="text-muted mb-1">Your Account Role</h6>
                            <h3 class="fw-bold text-dark mb-0">Admin</h3>
                            <p class="small text-muted mb-0">This determines what actions you can perform on Dbandzee Web.</p>
                        </div>
                        <div class="icon-box <?php echo $roleColor ?? 'bg-primary'; ?> rounded-circle d-flex align-items-center justify-content-center" style="width:70px; height:70px;">
                            <i class="fa-solid <?php echo $roleIcon ?? 'fa-user-shield'; ?> fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DASHBOARD METRICS CARDS -->
            <?php if ((int) $_SESSION['user_data']['role'] === ROLE_ADMIN): ?>

                <div class="row">

                    <!-- TOTAL CONTACTS -->
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Contacts</h6>
                                    <h3><?php echo $total_contacts ?></h3>
                                </div>
                                <div class="icon-box bg-primary-light rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL SERVICES -->
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Services</h6>
                                    <h3><?php echo $total_services ?></h3>
                                </div>
                                <div class="icon-box bg-success-light rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL USERS -->
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Users</h6>
                                    <h3><?php echo $users_count ?></h3>
                                </div>
                                <div class="icon-box bg-warning-light rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL VISITORS -->
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Visitors</h6>
                                    <h3><?php echo $visitors_count ?></h3>
                                </div>
                                <div class="icon-box bg-info-light rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                                    <i class="fa-solid fa-chart-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            <?php endif; ?>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->

<?php
include_once 'components/footer.php';
include_once 'components/scripts.php';
?>