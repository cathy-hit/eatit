<?php
/**
 * The last posts sidebar displayed before footer
 * 
 * @package startheme
 */

$exclude = is_front_page() ? get_option( 'sticky_posts' ) : [get_the_ID()];

$lastnews = get_posts( array(
  'numberposts' => 5,
  'avis' => 8,
  'exclude' => $exclude
));

?>


<section class="sidebar-lastavis bg-light py-5">

  <div class="container">

    <header class="sidebar-header d-flex flex-wrap justify-content-between align-items-start">
      <h2 class="sidebar-title"><?php _e('Derniers avis client', 'startheme'); ?></h2>
      <a href="<?= esc_url( get_category_link( 8 ) ); ?>" class="btn btn-outline-primary"><?php _e('Tous les avis clients', 'startheme'); ?></a>
    </header>

    <?php if($lastavis) : ?>

      <div class="carousel-avis owl-carousel px-sm-4 mt-5 mt-sm-4">

        <?php foreach( $lastavis as $post ) : 
          setup_postdata( $post ); ?>

          <article <?php post_class('card border-0'); ?>>

            <figure class="card-figure mb-0">
              <a class="link-image" href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_post_thumbnail('thumb-medium', array('class'=>'img-fluid')); ?></a>
            </figure>

            <div class="card-body">

              <h3 class="card-title h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

              <?php the_excerpt(); ?>

            </div>

          </article>

        <?php endforeach; 
          wp_reset_postdata(); ?>

      </div><!-- .carousel-aviss -->

    <?php endif; ?>

  </div><!-- .container -->

</section><!-- .sidebar-lastrestaurants -->