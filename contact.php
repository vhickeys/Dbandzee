<?php
    $title = 'Contact';
    include_once 'components/head.php';
    include_once 'components/header.php';
?>

<!-- PAGE HEADER -->
<section id="main-banner-page" class="position-relative page-header about-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-7"></div>
    <div class="container">
        <div class="row" style="padding-top: 7rem !important;">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">
                        <?php echo $display_settings['contact_banner_title'] ?? 'Get in Touch With Us'; ?>
                    </h2>
                    <h4 class="font-light pt-2">
                        <?php echo $display_settings['contact_banner_subtitle'] ?? 'We deliver reliable engineering, infrastructure, and industrial services across Nigeria'; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE HEADER ENDS -->

<!-- CONTACT SECTION -->
<section id="contact-us" class="bglight position-relative padding">
    <div class="container whitebox py-5">
        <div class="row">

            <!-- PAGE INTRO -->
            <div class="col-md-12 text-center mb-5">
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-normal">Contact</span> Us
                    <span class="divider-center"></span>
                </h2>
                <div class="col-md-8 offset-md-2">
                    <p><?php echo $display_settings['contact_intro'] ?? 'Reach out to us for inquiries, quotes, or collaborations. We are ready to assist you.'; ?></p>
                </div>
            </div>

            <!-- CONTACT INFO -->
            <div class="col-md-6 order-md-2 mb-4">
                <div class="contact-meta px-2 text-center text-md-start">
                    <h3 class="darkcolor mb-4"><?php echo $display_settings['company_name'] ?? 'D\'bandzee Ltd'; ?> Office</h3>

                    <p class="bottom10">
                        <i class="fas fa-map-marker-alt"></i>
                        <?php echo $display_settings['office_address'] ?? 'Office address not available'; ?>
                    </p>

                    <p class="bottom10">
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?php echo $display_settings['phone'] ?? '+234XXXXXXXXXX'; ?>">
                            <?php echo $display_settings['phone'] ?? '+234XXXXXXXXXX'; ?>
                        </a>
                    </p>

                    <p class="bottom10">
                        <i class="far fa-envelope"></i>
                        <a href="mailto:<?php echo $display_settings['email'] ?? 'info@dbandzee.com'; ?>">
                            <?php echo $display_settings['email'] ?? 'info@dbandzee.com'; ?>
                        </a>
                    </p>

                    <p class="bottom10">
                        <i class="far fa-clock"></i>
                        <?php echo $display_settings['office_hours'] ?? 'Mon-Fri: 9am - 5pm'; ?>
                    </p>

                    <!-- SOCIAL LINKS -->
                    <ul class="social-icons mt-4 mb-0">
                        <?php if (! empty($display_settings['facebook'])): ?>
                            <li><a href="<?php echo $display_settings['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        <?php if (! empty($display_settings['twitter'])): ?>
                            <li><a href="<?php echo $display_settings['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if (! empty($display_settings['instagram'])): ?>
                            <li><a href="<?php echo $display_settings['instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if (! empty($display_settings['linkedIn'])): ?>
                            <li><a href="<?php echo $display_settings['linkedIn']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <?php endif; ?>
                        <?php if (! empty($display_settings['youtube'])): ?>
                            <li><a href="<?php echo $display_settings['youtube']; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="col-md-6 mb-4">
                <?php
                    if (! empty($_SESSION['successMessage'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['successMessage'] . '</div>';
                        unset($_SESSION['successMessage']);
                    }
                    if (! empty($_SESSION['errorMessage'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['errorMessage'] . '</div>';
                        unset($_SESSION['errorMessage']);
                    }
                ?>

                <form action="webadmin/classes/process.php?action=contactSubmit" method="POST" class="getin_form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" name="message" placeholder="Message" rows="5" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="button gradient-btn w-100">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- CONTACT SECTION ENDS -->

<?php
    include_once 'components/footer.php';
include_once 'components/scripts.php';
?>