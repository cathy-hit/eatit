<?php

/**
 * Template part for displaying spot content in single spots
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

/* variabe pour appel plats/menus */
$plats = get_posts(array(
  'post_type' => 'plat',
  'posts_per_page' => -1,
  'meta_query'  => array(
    array(
     'key'    => 'restaurant',
     'value'    => get_the_ID(),
     'compare'  => 'LIKE'
    ),
 ),
));

$note = get_field_object('note');
$adress = get_field_object('adress');
$horaire = get_field('horaire');
$carte = get_field('carte');
$adresse_url = get_field('adresse_url');
$prix = get_field_object('prix');

?>


<!-- <pre>
  <?php //var_dump($niveau); ?>
</pre> -->


<article <?php post_class(); ?>>

  <header class="entry-header main-header py-5" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

    <div class="container">
      
      <h1 class="page-title entry-title"><?php the_title(); ?></h1>

    </div>

  </header>


  <div class="restaurant-content bg-light py-5">

    <div class=" restaurant-acf container">

      <div class="row">

        <!-- fat apparaître l'entête de la page resto -->

        <div class="entry-content col-md-8 col-lg-10">
          <?php the_content(); ?>
        </div>
           
       <!-- fait apparaître la partie menus qui correspond au CPT UI plat créé -->

         <div class="container d-flex justify-content-center my-5">
              <?php if( $plats ): ?>
                <ul class="d-flex flex-row-reverse">
                <?php foreach( $plats as $plat ): 
                ;?>
                    <li> 
                       <h2 class="text-center mb-5 pl-5"> <?php echo get_the_title( $plat->ID ); ?></h2>
                         <!-- faire apparaître l'image du plat -->
                      <div class="m-5">
                      <?php echo get_the_post_thumbnail($plat); ?>
                      </div>
                         <!-- faire apparaître le contenu du menu -->
                      <div class="text-dark text-center">
                        <?php echo get_the_content( null,false,$plat->ID ); ?>
                      </div>
                         <!-- faire appaître le bouton "commander" -->
                      <div class="d-flex justify-content-center">
                        <a href="#?>" class="bg-primary rounded text-white p-2 mb-3"><?php _e('commander', 'startheme'); ?></a>
                     </div>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>

      </div><!-- .row -->

    </div><!-- .container -->

  </div><!-- .restaurant-content -->


 <div class="restaurant-acf container bg-white p-4 text-center">

   <!-- faire apparaître champ prix : label + value -->
    <div class="restaurant-prix my-5">
           <h2><?= $prix['label']; ?></h2>
      <p>Tous les menus proposés sur cette page sont au tarif de <?= $prix['value']; ?>€</p>
    </div>
     
    <!-- faire apparaître la notation client "globale" : label + remplissage pouce en fonction de value-->
    <!-- note sur 5 levels en tout donc il va voir quel est le level indiqué dans la page resto puis complète en  -->
    <h2><?= $note['label'] ?></h2>

    <?php foreach( $note['choices'] as $key => $choice ) : ?>
    <?php 
    if($key <= $note['value']) $img_class = 'level'; 
     else $img_class = 'over-level'; 
    ?>
    <img src="<?= get_template_directory_uri(); ?>/dist/images/pouce-leve_design2.png" alt="<?= $choice ?>" title="<?= $choice ?>" class="pouce <?= $img_class ?>">

    <?php endforeach; ?>


    <!-- faire apparaître l'adresse : label + value-->
    <div class="adress">
       <h2><?= $adress['label'] ?></h2>
        <p><?= $adress['value']; ?> </p>
    </div>

    <!-- faire apparaître la carte-->
    <div class="row no-gutters">
        <div class="col-lg-6">
          <?php if( $carte ) : ?>
            <img src="<?php echo esc_url($carte['sizes']['thumb-medium']); ?>" alt="<?php echo esc_attr($carte['alt']); ?>" class="img-fluid" />
          <?php endif; ?>
    </div>

    <!-- faire apparaître les hotaires d'ouverture + l'adresse url du site partenaire : label + value-->
        <div class="col-lg-6 bg-light p-4">
          <!-- horaires -->
            <h3>Horaires d'ouverture</h3>
          <p><?= $horaire ?></p>
          <!-- adresse url-->
          <h3>Adresse du site partenaire</h3>
          <p> <?= $adresse_url ?></p>
        </div>

      </div>

    </div>

  </div><!-- .restaurant-acf -->

</article>