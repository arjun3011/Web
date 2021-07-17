<footer class="site-footer">
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <div class="site-footer__inner container container--narrow">

      <div class="group">

        <div class="site-footer__col-one">
          <h1 class="school-logo-text school-logo-text--alt-color"><a href="<?php echo site_url() ?>"><strong>First</strong>Website</a></h1>
          <p><a class="site-footer__link" href="#">555.555.5555</a></p>
        </div>

        <div class="site-footer__col-two-three-group">
          <div class="site-footer__col-two">
            <h3 class="headline headline--small">Explore</h3>
            <nav class="nav-list min-list">
            <?php 
            wp_nav_menu(array(
              'theme_location' => 'Menu_Footer'
            ));
          ?>
              <!--ul class="nav-list min-list">
                <li><a href="<?php echo site_url('/page_1') ?>">Page 1</a></li>
                <li><a href="#">Programs</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Campuses</a></li>
              </ul>
-->
            </nav>
          </div>

          <div class="site-footer__col-three">
            <h3 class="headline headline--small">Learn</h3>
            <nav>
              <ul class="nav-list min-list">
                <li><a href="#">Legal</a></li>
                <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy</a></li>
                <li><a href="#">Careers</a></li>
              </ul>
            </nav>
          </div>
        </div>

        <!--div class="site-footer__col-four">
          <h3 class="headline headline--small">Connect With Us</h3>
          <nav>
            <ul class="min-list social-icons-list group">
              <li><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </nav>
        </!--div-->
        <div class="site-footer__col-four">
        <h3 class="headline headline--small">Connect With Us</h3>
        <nav>
        <link rel="styleshett" type ="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <section class ="socialMedial">
          
          <ul class="sci">
            <li data-text="Facebook">
              <a href="#" class="facebook">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
            </li>
            <li data-text="Youtube">
              <a href="#" class="youtube">
              <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </li>
            <li data-text="Instagram">
              <a href="#"class="instagram">
                <i class="fa fa-instagram" aria-hidden="true">              </i>
             </a>
            </li>
            <li data-text="Twitter">
              <a href="#" class="twitter">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
            </li>
            <li data-text="Gmail" >
              <a href="#" class="gmail">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </section>
          <script src="vanilla-tilt.min"></script>
            <script>
              VanillaTilt.init(document.querySelector(".sci li a"), {
                max: 25,
                speed: 400
              });
            </script>
        </nav>
          </div>
      </div>

    </div>
    
  </footer>

<?php wp_footer(); ?>
</body>
</html>