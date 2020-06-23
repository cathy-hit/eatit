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


            <!-- SECTION DVAN -->

            <div class="section-dvan">
                <h1>DE VOUS A NOUS</h1>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pour recevoir la Newsletter</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre E-mail">
                    </div>

                    <button type="submit" class="btn btn-primary">VALIDATION</button>

                    <p>Pour recevoir les offres et bénéficiez des bons plans d'EAT IT</p>
                    <a href="#" class="more">Je crée mon compte</a>
                </form>
            </div>

            <!--  SECTION COMMANDE -->
            <div class="section-commande">
                <h1>Commandez en 5 étapes ...</h1>
                <div class="commande-etapes">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/commande-5etapes.png" alt="<?= $choice ?>
                                             
                </div>


            </div>
        </div>
        <!--    SECTION VALEURS -->
        <div class="section-valeurs">
            <h1>nos valeurs</h1>

            <section class="services container">

                <div class="services-inner">

                    <div class="services-col">
                        <article class="services-article">
                            <img src="./images/resp-EATIT.png" alt="responsables EATIT">
                            <h5>ECOLOGIQUE ET RAPIDE</h5>
                            <p>Nos livraisons se font exclusivement à vélos ou en triporteurs. Mieux que le timbre vert, le coursier à vélo. Début mars 2018, trois jeunes rennais : Guillaume, Axel et Simon, amis depuis le bac à sable, décident de se mettre
                                à leur compte. L’idée première est de créer une société de livraison classique de repas avec scooter. Mais c’est bien connu, quand c’est classique, c’est chiant ! Et puis, ils adorent le sport ; alors, pourquoi ne pas lier
                                l’utile à l’agréable ?</p>
                        </article>
                    </div>

                    <div class="services-col">
                        <article class="services-article">
                            <img src="./images/partenaires locaux.png" alt="carte loclisant les partenaires locaux">
                            <h5>NOS PARTENAIRES</h5>
                            <p>Des restaurants locaux livrés en 30 à 45 minutes après votre commande</p>

                        </article>
                    </div>

                    <div class="services-col">
                        <article class="services-article">
                            <img src="./images/porteur1_EATIT.png" alt="livreur EATIT en course">
                            <h5>NOS BIKERS</h5>
                            <p>Vous souhaitez continuer de découvrir votre ville, tout en pratiquant du sport et en choisissant vos horaires : rejoignez-nous</p>

                        </article>
                    </div>
                    <a href="#" class="more">En savoir plus</a>
                </div>

        </div>
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
    <a href="<?= get_post_type_archive_link('spot'); ?>" class="btn btn-outline-primary"><?php _e('Tous les restaurants', 'startheme'); ?></a>
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