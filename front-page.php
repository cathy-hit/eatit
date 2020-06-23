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

$frontrestaurants = get_posts( array(
  'numberposts' => 5,
  'post_type' => 'restaurant',
  'orderby' => 'rand',
));

$frontfocus = get_posts( array(
  'posts_per_page' => 1,
  'post__in' => get_option( 'sticky_posts' ),
  'ignore_sticky_posts' => 1
));

get_header();
?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
 
    <?php endwhile; 
        endif; ?>


        <!-- SECTION BLOG -->
        <div class="section-blog">
            <h1>du côté du blog</h1>

            <section class="blog container">

                <div class="blog-inner">

                    <div class="blog-col">
                        <article class="blog-article">
                            <img src="./images/agathe280x280.png" alt="jeune femme prénommée Agathe">
                            <p>C'est pratique et plus rapide qu'un coursier en scooter ! En plus, je me dis que c'est ma petite contribution pour sauver la planète, mon côté écolo dans l'âme. Vive le vélo, vive EAT IT !!</p>
                            <a href="#" class="more">En savoir plus</a>
                        </article>
                    </div>

                    <div class="blog-col">
                        <article class="blog-article">
                            <img src="./images/gaspard-400x400.png" alt="jeune homme en costume">
                            <p>Célibataire et très actif, je n'ai pas le courages de me préparer à manger le soir donc je commande régulièrement. Avec EAT IT, je suis toujours livré dans la tranche horaire que je demande et je me régale sans même bouger
                                de mon canapé : c'est cool !!</p>
                            <a href="#" class="more">En savoir plus</a>
                        </article>
                    </div>

                    <div class="blog-col">
                        <article class="blog-article">
                            <img src="./images/martine-925x615.png" alt="jeune femme assise sur un banc">
                            <h5>NOS BIKERS</h5>
                            <p>On me sollicite régulièrement pour faire livrer des repas pour les réunions des commerciaux. Avant je prenais un seul traiteur. Maintenant avec le compte société EAT IT, chaque convive choisi son repas : tout le monde est ravi
                                !
                            </p>
                            <a href="#" class="more">En savoir plus</a>
                        </article>
                    </div>

                </div>



        </div>

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

</section><!-- .front-resturants -->

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

<?php get_sidebar('avis'); ?>

<?php get_footer() ?>