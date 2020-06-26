<?php
/**
 * The template file for displaying single posts and pages
 *
 * ...
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */


 /* PAGE D'ACCUEIL */
 /* copine : archive  */

$frontrestaurants = get_posts( array(
  'numberposts' => 2,
  'post_type' => 'restaurant',
  'orderby' => 'rand',
));


get_header();
?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
 
    <?php endwhile; 
        endif; ?>



</main>

<section class="front-restaurants container">

  <div class="front-restaurants_grid">

    <?php 
    if ( $frontrestaurants ) : 
      foreach ( $frontrestaurants as $post ) :
        setup_postdata( $post ); ?>	

        <?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>

        <?php
        endforeach; 
        wp_reset_postdata();
    endif;
    ?>

  </div><!-- .front-restaurants_grid -->

  <div class="text-center my-5">
    <a href="<?= get_post_type_archive_link('restaurant'); ?>" class="btn btn-outline-primary"><?php _e('Tous les restaurants', 'startheme'); ?></a>
  </div>

</section><!-- .front-restaurants -->

<section class="sticky-post container my-5 py-5">

  <?php 
  if ( $frontfocus ) : 
    foreach ( $frontfocus as $post ) :
      setup_postdata( $post ); ?>	

      <?php get_template_part( 'template-parts/content-focus' ); ?>

      <?php
      endforeach; 
      wp_reset_postdata();
  endif;
  ?>

</section><!-- .sticky-post -->



<?php get_footer() ?>