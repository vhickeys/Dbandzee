<?php
    $title = 'Service Details';
    include_once 'components/head.php';
    include_once 'components/header.php';

    if (empty($_GET['slug'])) {
    header("Location: services.php");
    exit();
    }

    $slug = $_GET['slug'];
    $singleService  = $service->getServiceBySlug($slug);

    if (!$singleService ) {
    header("Location: services.php");
    exit();
    }
?>

<!-- HERO BANNER -->
<section id="service-hero" class="position-relative page-header about-header parallax section-nav-smooth"
    style="background-image: url('assets/images/services/<?php echo $singleService ['image'] ?? 'placeholder.png' ?>'); background-size: cover; background-position: center;">
    <div class="overlay overlay-dark opacity-6"></div>
    <div class="container">
        <div class="row" style="padding-top: 7rem !important;">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h1 class="font-bold"><?php echo $singleService ['service_name'] ?? 'Service' ?></h1>
                    <h4 class="font-light pt-2"><?php echo substr($singleService ['caption'], 0, 150) ?? '' ?></h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICE DETAILS -->
<section id="service-details" class="padding bglight">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <h2 class="darkcolor bottom30"><?php echo $singleService ['service_name'] ?? 'Service' ?></h2>
                <p class="bottom35"><?php echo $singleService ['description'] ?? 'No description available.' ?></p>
            </div>
        </div>
        <!-- Optional: Related services or CTA -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="contact.php" class="button btnsecondary gradient-btn">Contact Us for This Service</a>
            </div>
        </div>
    </div>
</section>

<?php
    include_once 'components/footer.php';
    include_once 'components/scripts.php';
?>