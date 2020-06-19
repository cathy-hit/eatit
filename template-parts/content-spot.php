<?php

/**
 * Template part for displaying spot content in single spots
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

$niveau = get_field_object('Niveau');
$infos = get_field_object('informations');
$acces = get_field_object('Accès');
$latitude = get_field('Latitude');
$longitude = get_field('Longitude');
$carte = get_field('Carte');

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

  <div class="spot-content bg-light py-5">

    <div class="container">

      <div class="row">

        <div class="entry-content col-md-8 col-lg-10">
          <?php the_content(); ?>
        </div>

        <div class="spot-niveau col">

          <div class="bg-white p-4 text-center">

            <h3><?= $niveau['label'] ?></h3>

            <?php foreach( $niveau['choices'] as $key => $choice ) : ?>

              <?php 
              if($key <= $niveau['value']) $img_class = 'level'; 
              else $img_class = 'over-level'; 
              ?>

              <img src="<?= get_template_directory_uri(); ?>/dist/images/planche-1.svg" alt="<?= $choice ?>" title="<?= $choice ?>" class="planche <?= $img_class ?>">

            <?php endforeach; ?>

          </div>

        </div>

      </div><!-- .row -->

    </div><!-- .container -->

  </div><!-- .spot-content -->

  <div class="spot-acf container">

    <div class="spot-infos my-5">
      <h2><?= $infos['label']; ?></h2>
      <?= $infos['value']; ?>
    </div>

    <div class="spot-acces my-5">

      <h2><?= $acces['label'] ?></h2>

      <div class="row no-gutters">

        <div class="col-lg-6">
          <?php if( $carte ) : ?>
            <img src="<?php echo esc_url($carte['sizes']['thumb-medium']); ?>" alt="<?php echo esc_attr($carte['alt']); ?>" class="img-fluid" />
          <?php endif; ?>
        </div>

        <div class="col-lg-6 bg-light p-4">

          <?= $acces['value'] ?>

          <h3>GPS</h3>
          <p><?= $latitude ?>, <?= $longitude ?></p>

        </div>

      </div>

    </div>

  </div><!-- .spot-acf -->

</article>