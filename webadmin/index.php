<?php

require('classes/functions.php');

adminAuth();

$title = "Dashboard";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Dashboard</h5>
            </li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <div class="alert alert-danger solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            <?php
                unset($_SESSION['message']);
            }
            ?>
            <?php
            if (isset($_SESSION['user_data']['interaction'])) {
            ?>
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Welcome!</strong> <?php echo $_SESSION['user_data']['fullName']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            <?php
                unset($_SESSION['user_data']['interaction']);
            }
            ?>
            <div class="col-xl-12 wid-100">
                <div class="row">

                    <div class="col-12">
                        <div class="card shadow-sm border-0 rounded-4 mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between p-4">
                                <div>
                                    <h6 class="text-muted mb-1">Your Account Role</h6>
                                    <h3 class="fw-bold text-dark mb-0">Admin</h3>
                                    <p class="small text-muted mb-0">This determines what actions you can perform on Dbandzee Web.</p>
                                </div>
                                <div class="icon-box <?= $roleColor; ?> rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:70px; height:70px;">
                                    <i class="fa-solid <?= $roleIcon; ?> fa-2x text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ((int)$_SESSION['user_data']['role'] === ROLE_ADMIN): ?>

                        <div class=" col-sm-6 same-card">
                            <div class="card">
                                <div class="card-body depostit-card">
                                    <div class="depostit-card-media d-flex justify-content-between style-1">
                                        <div>
                                            <h6>Total Donations</h6>
                                            <h3><?php echo $total_donations ?? "No Data" ?></h3>
                                        </div>
                                        <div class="icon-box bg-primary-light">
                                            <i class="fa-solid fa-hand-holding-heart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" col-sm-6 same-card">
                            <div class="card">
                                <div class="card-body depostit-card">
                                    <div class="depostit-card-media d-flex justify-content-between style-1">
                                        <div>
                                            <h6>Total Requests</h6>
                                            <h3><?php echo $total_requests ?? "No Data" ?></h3>
                                        </div>
                                        <div class="icon-box bg-primary-light">
                                            <i class="fa-solid fa-people-group"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card chart-grd same-card">
                                <div class="card-body depostit-card p-0">
                                    <div class="depostit-card-media d-flex justify-content-between pb-0">
                                        <div>
                                            <h6>Total Users</h6>
                                            <h3><?php echo $users_count ?? "No Data" ?></h3>
                                        </div>
                                        <div class="icon-box bg-primary-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                <path
                                                    d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="NewCustomers"></div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6">
                            <div class="card chart-grd same-card">
                                <div class="card-body depostit-card p-0">
                                    <div class="depostit-card-media d-flex justify-content-between pb-0">
                                        <div>
                                            <h6>Total Visitors</h6>
                                            <h3><?php echo $visitors_count ?? "No Data" ?></h3>
                                        </div>
                                        <div class="icon-box bg-primary-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                <path
                                                    d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="NewCustomers"></div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<!--**********************************
            Content body end
***********************************-->

<?php
include_once('components/footer.php');
include_once('components/scripts.php');
?>