<?php
$title = 'Services';
include_once 'components/head.php';
include_once 'components/header.php';

$servicesList = $service->getServices('active');
?>

<!-- PAGE HEADER -->
<section id="main-banner-page" class="position-relative page-header about-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-7"></div>
    <div class="container">
        <div class="row" style="padding-top: 7rem !important;">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Driven by Excellence Across Industries</h2>
                    <h4 class="font-light pt-2">
                        Delivering reliable engineering, infrastructure, and industrial services across Nigeria
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE HEADER ENDS -->


<!-- SERVICES SECTION -->
<section id="our-services" class="padding bglight">
    <div class="container">

        <!-- HEADING -->
        <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
            <h2 class="heading bottom30 darkcolor font-light2">
                <span class="font-weight-light">Our</span> Services
                <span class="divider-center"></span>
            </h2>
            <div class="col-md-8 offset-md-2">
                <p class="mb-n3">
                    Explore our wide range of professional services designed to support infrastructure, industrial operations, and resource development.
                </p>
            </div>
        </div>

        <!-- SERVICES GRID -->
        <div class="row">

            <?php
            if (!empty($servicesList)) {

                foreach ($servicesList as $srv) {

                    if ($srv['status'] == 'active') {
            ?>

                        <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="300ms">
                            <div class="services-main">

                                <!-- IMAGE -->
                                <div class="image bottom10">
                                    <img src="assets/images/services/<?= $srv['image'] ?? 'placeholder.png' ?>"
                                        alt="<?= $srv['service_name'] ?>">

                                    <div class="overlay">
                                        <a href="service-details.php?slug=<?= $srv['slug'] ?>"
                                            class="overlay_center border_radius">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- CONTENT -->
                                <div class="services-content text-center text-md-start">

                                    <h3 class="bottom10 darkcolor">
                                        <a href="service-details.php?slug=<?= $srv['slug'] ?>">
                                            <?= $srv['service_name'] ?>
                                        </a>
                                    </h3>

                                    <p class="bottom15">
                                        <?= substr($srv['caption'], 0, 120) ?>...
                                    </p>

                                    <a href="service-details.php?slug=<?= $srv['slug'] ?>" class="button-readmore">
                                        Learn More
                                    </a>

                                </div>
                            </div>
                        </div>

            <?php
                    }
                }

            } else {
            ?>

                <!-- NO SERVICES -->
                <div class="col-12 text-center">
                    <h4 class="text-muted">No services available at the moment.</h4>
                </div>

            <?php } ?>

        </div>

    </div>
</section>
<!-- SERVICES SECTION ENDS -->


<?php
include_once 'components/footer.php';
include_once 'components/scripts.php';
?>