<?php
    $servicesList = $service->getServices();
?>

<!-- header -->
<header class="site-header header-with-topbar" id="header">
    <nav class="navbar navbar-expand-lg transparent-bg static-nav darkcolor">
        <div class="container bg-white position-relative">

            <!-- LOGO -->
            <a class="navbar-brand ps-2" href="index.php">
                <img src="assets/images/settings/<?php echo $display_settings['logo'] ?? 'logo.png' ?>"
                    alt="D'bandzee Ltd" class="logo-default" />
                <img src="assets/images/settings/<?php echo $display_settings['logo'] ?? 'logo.png' ?>"
                    alt="D'bandzee Ltd" class="logo-scrolled" />
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">

                    <!-- HOME -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo setActivePage(['index.php']) ?>" href="index.php">Home</a>
                    </li>

                    <!-- ABOUT -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo setActivePage(['about.php']) ?>" href="about.php">About</a>
                    </li>

                    <!-- SERVICES -->
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle <?php echo setActivePage(['services.php', 'service-details.php']) ?>"
                           href="services.php" data-bs-toggle="dropdown">
                            Services
                        </a>

                        <div class="dropdown-menu">
                            <?php
                                if (! empty($servicesList)) {
                                    foreach ($servicesList as $srv) {
                                        if ($srv['status'] == 'active') {
                                        ?>
                                        <a class="dropdown-item"
                                           href="service-details.php?slug=<?php echo $srv['slug'] ?>">
                                            <?php echo $srv['service_name'] ?>
                                        </a>
                            <?php
                                }
                                    }
                                } else {
                                    echo '<a class="dropdown-item" href="#">No services available</a>';
                                }
                            ?>
                        </div>
                    </li>

                    <!-- CONTACT -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo setActivePage(['contact.php']) ?>" href="contact.php">Contact</a>
                    </li>

                </ul>
            </div>

            <!-- SIDE MENU BUTTON -->
            <a href="javascript:void(0)" class="d-inline-block sidemenu_btn mr-0" id="sidemenu_toggle">
                <span class="bg-dark"></span>
                <span class="bg-dark"></span>
                <span class="bg-dark"></span>
            </a>

        </div>
    </nav>

    <!-- SIDE MENU -->
    <div class="side-menu opacity-0 gradient-bg">
        <div class="overlay"></div>

        <div class="inner-wrapper">
            <span class="btn-close btn-close-no-padding" id="btn_sideNavClose">
                <i></i><i></i>
            </span>

            <nav class="side-nav w-100">
                <ul class="navbar-nav">

                    <!-- HOME -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo setActivePage(['index.php']) ?>" href="index.php">Home</a>
                    </li>

                    <!-- ABOUT -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo setActivePage(['about.php']) ?>" href="about.php">About</a>
                    </li>

                    <!-- SERVICES -->
                    <li class="nav-item">
                        <a class="nav-link collapsePagesSideMenu <?php echo setActivePage(['services.php', 'service-details.php']) ?>"
                           data-bs-toggle="collapse" href="#sideServices">
                            Services <i class="fas fa-chevron-down"></i>
                        </a>

                        <div id="sideServices" class="collapse sideNavPages">
                            <ul class="navbar-nav mt-2">

                                <?php
                                    if (! empty($servicesList)) {
                                        foreach ($servicesList as $srv) {
                                            if ($srv['status'] == 'active') {
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                   href="service-details.php?slug=<?php echo $srv['slug'] ?>">
                                                    <?php echo $srv['service_name'] ?>
                                                </a>
                                            </li>
                                <?php
                                    }
                                        }
                                    }
                                ?>

                            </ul>
                        </div>
                    </li>

                    <!-- CONTACT -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo setActivePage(['contact.php']) ?>" href="contact.php">Contact</a>
                    </li>

                </ul>
            </nav>

            <!-- SIDE FOOTER -->
            <div class="side-footer w-100">

                <ul class="social-icons-simple white top40">

                    <?php if (! empty($display_settings['facebook'])) {?>
                        <li><a href="<?php echo $display_settings['facebook'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                    <?php }?>

                    <?php if (! empty($display_settings['twitter'])) {?>
                        <li><a href="<?php echo $display_settings['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
                    <?php }?>

                    <?php if (! empty($display_settings['instagram'])) {?>
                        <li><a href="<?php echo $display_settings['instagram'] ?>"><i class="fab fa-instagram"></i></a></li>
                    <?php }?>

                    <?php if (! empty($display_settings['linkedIn'])) {?>
                        <li><a href="<?php echo $display_settings['linkedIn'] ?>"><i class="fab fa-linkedin-in"></i></a></li>
                    <?php }?>

                </ul>

                <p class="whitecolor">
                    &copy; <span id="year"></span> D'bandzee Ltd. All Rights Reserved.
                </p>

            </div>

        </div>
    </div>

    <div id="close_side_menu" class="tooltip"></div>
</header>
<!-- header -->