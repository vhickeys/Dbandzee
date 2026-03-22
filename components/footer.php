<footer id="site-footer" class="bgdark padding_top">
  <div class="container">
    <div class="row">

      <!-- COMPANY INFO -->
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="footer_panel padding_bottom_half bottom20">

          <a href="index.php" class="footer_logo bottom25">
            <img src="assets/images/settings/<?php echo $display_settings['logo'] ?? 'logo.png' ?>" alt="D'bandzee Ltd">
          </a>

          <p class="whitecolor bottom25">
            <?php echo substr($display_settings['about'] ?? "D'bandzee Ltd delivers reliable solutions across engineering, dredging, mining, security, consultancy, and procurement.", 0, 150) ?>...
          </p>

          <div class="d-table w-100 address-item whitecolor bottom25">
            <span class="d-table-cell align-middle">
              <i class="fas fa-mobile-alt"></i>
            </span>
            <p class="d-table-cell align-middle bottom0">
              <?php echo $display_settings['phone'] ?? '+234XXXXXXXXXX' ?>
              <a class="d-block" href="mailto:<?php echo $display_settings['email'] ?? 'info@dbandzee.com' ?>">
                <?php echo $display_settings['email'] ?? 'info@dbandzee.com' ?>
              </a>
            </p>
          </div>

          <!-- SOCIAL LINKS -->
          <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms">

            <?php if (! empty($display_settings['facebook'])) {?>
              <li><a href="<?php echo $display_settings['facebook'] ?>" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
            <?php }?>

            <?php if (! empty($display_settings['twitter'])) {?>
              <li><a href="<?php echo $display_settings['twitter'] ?>" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a></li>
            <?php }?>

            <?php if (! empty($display_settings['linkedIn'])) {?>
              <li><a href="<?php echo $display_settings['linkedIn'] ?>" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
            <?php }?>

            <?php if (! empty($display_settings['instagram'])) {?>
              <li><a href="<?php echo $display_settings['instagram'] ?>" target="_blank" class="insta"><i class="fab fa-instagram"></i></a></li>
            <?php }?>

            <?php if (! empty($display_settings['youtube'])) {?>
              <li><a href="<?php echo $display_settings['youtube'] ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <?php }?>

          </ul>

        </div>
      </div>

      <!-- QUICK LINKS -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="footer_panel padding_bottom_half bottom20">
          <h3 class="whitecolor bottom25">Quick Links</h3>
          <ul class="links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="services.php">Our Services</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      </div>

      <!-- SERVICES (DYNAMIC) -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="footer_panel padding_bottom_half bottom20">
          <h3 class="whitecolor bottom25">Our Services</h3>
          <ul class="links">

            <?php
                $footerServices = $service->getServices();
                if (! empty($footerServices)) {
                    foreach (array_slice($footerServices, 0, 5) as $srv) {
                    ?>
                <li>
                  <a href="service-details.php?slug=<?php echo $srv['slug'] ?>">
                    <?php echo $srv['service_name'] ?>
                  </a>
                </li>
            <?php
                }
                } else {
                    echo '<li><a href="#">No services available</a></li>';
                }
            ?>

          </ul>
        </div>
      </div>

      <!-- CONTACT / OFFICE -->
      <div class="col-lg-2 col-md-6 col-sm-6">
        <div class="footer_panel padding_bottom_half bottom20">
          <h3 class="whitecolor bottom25">Office</h3>

          <p class="whitecolor bottom15">
            <?php echo $display_settings['office_address'] ?? 'Office address not available' ?>
          </p>

          <p class="whitecolor bottom15">
            Open: Mon - Fri
          </p>

          <?php if (! empty($display_settings['whatsapp'])) {?>
            <a href="https://wa.me/<?php echo $display_settings['whatsapp'] ?>" target="_blank" class="button btnprimary btn-sm">
              WhatsApp Us
            </a>
          <?php }?>

        </div>
      </div>

    </div>
  </div>
</footer>
