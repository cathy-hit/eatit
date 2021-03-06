<?php
/**
 * The Footer for our theme.
 *
 * ...
 *
 * @package startheme
 *
 */
?>

<footer class="page-footer bg-dark-green text-white pt-5 pb-3">

  <div class="container">

    <div class="row">

      <div class="footer-col col-sm-12 col-lg-4 pb-3 pb-lg-0">
        
        <div class="navbar-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?= esc_attr__('Back to home page', 'startheme') ?>" class="logo-link"><img src="<?= get_template_directory_uri() . '/logo-EATIT-footer.svg' ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo">
      </a>
      </div><!-- .navbar-brand -->
      <?php dynamic_sidebar('footer-sidebar-1') ?>
      </div>

      <div class="footer-col col-sm-6 col-lg-4 pb-3 pb-lg-0">
        <?php dynamic_sidebar('footer-sidebar-2') ?>
      </div>

      <div class="footer-col col-sm-6 col-lg-4 pb-3 pb-lg-0">
        <?php dynamic_sidebar('footer-sidebar-3') ?>
      </div>

    </div><!-- .row -->

    <nav class="nav-footer d-flex flex-wrap mt-3">
      <p class="copyright mr-3">&copy; <a href="<?= home_url('/') ?>"><?php bloginfo('name') ?> <?= date('Y') ?></a></p>
      <?php if (has_nav_menu('footer_navigation')) ?>
       
     
    </nav>

  </div><!-- .container-fluid -->

</footer><!-- .page-footer -->

<?php wp_footer(); ?>


</html>