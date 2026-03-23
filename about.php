<?php
    $title = 'About';
    include_once 'components/head.php';
?>

<?php include_once 'components/header.php'; ?>

<!-- PAGE HEADER -->
<section id="main-banner-page" class="position-relative page-header about-header parallax section-nav-smooth"
    style="background-image: url('assets/images/about/about.jpg'); background-size: cover; background-position: center;">
    <div class="overlay overlay-dark opacity-7"></div>
    <div class="container">
        <div class="row" style="padding-top: 7rem !important;">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-bold">Driven by Excellence Across Industries</h2>
                    <h4 class="font-light pt-2">
                        Delivering reliable engineering, infrastructure, and industrial services across Nigeria
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE HEADER ENDS -->


<!-- ABOUT SECTION -->
<section id="aboutus" class="padding_top padding_bottom">
    <div class="container aboutus">

        <!-- ROW 1 -->
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 padding_bottom_half">
                <div class="image">
                    <img alt="D'bandzee Ltd" src="assets/images/about/dbandzee.jpg">
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1 col-md-6 padding_bottom_half">
                <h2 class="darkcolor font-normal bottom30">
                    Who We Are
                </h2>

                <p class="bottom35" style="text-align: justify !important;">
                    D'bandzee Ltd is a multidisciplinary service and contracting company delivering
                    professional solutions across engineering, dredging, mining, security services,
                    consultancy, and procurement.
                </p>

                <p class="bottom35" style="text-align: justify !important;">
                    We support infrastructure development, industrial operations, and resource
                    management through efficient project execution, technical expertise, and
                    reliable service delivery tailored to both government and private sector clients.
                </p>

                <a href="contact.php" class="button btnsecondary gradient-btn">
                    Work With Us
                </a>
            </div>
        </div>


        <!-- ROW 2 -->
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 padding_top_half">
                <h2 class="darkcolor font-normal bottom30">
                    Our Strength & Capabilities
                </h2>

                <p class="bottom35" style="text-align: justify !important;">
                    With expertise across multiple industries, D'bandzee Ltd combines technical
                    knowledge, operational efficiency, and strategic execution to deliver high-quality results.
                </p>

                <p class="bottom35" style="text-align: justify !important;">
                    From large-scale infrastructure projects to resource extraction and industrial
                    support services, we are committed to delivering value, safety, and long-term impact.
                </p>
            </div>

            <div class="col-lg-6 offset-lg-1 col-md-6 padding_top_half">

                <!-- REPLACED PROGRESS BARS WITH COMPANY STRENGTHS -->
                <div class="row text-center">

                    <div class="col-6 mb-4">
                        <h3 class="defaultcolor">✔</h3>
                        <p>Engineering & Infrastructure</p>
                    </div>

                    <div class="col-6 mb-4">
                        <h3 class="defaultcolor">✔</h3>
                        <p>Dredging & Marine Operations</p>
                    </div>

                    <div class="col-6 mb-4">
                        <h3 class="defaultcolor">✔</h3>
                        <p>Mining & Resource Extraction</p>
                    </div>

                    <div class="col-6 mb-4">
                        <h3 class="defaultcolor">✔</h3>
                        <p>Security & Industrial Protection</p>
                    </div>

                    <div class="col-6 mb-4">
                        <h3 class="defaultcolor">✔</h3>
                        <p>Consultancy & Project Management</p>
                    </div>

                    <div class="col-6 mb-4">
                        <h3 class="defaultcolor">✔</h3>
                        <p>Procurement & Supply Chain</p>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
<!-- ABOUT SECTION ENDS -->

<?php
    include_once 'components/footer.php';
include_once 'components/scripts.php';
?>