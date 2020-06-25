<?php

/**
 * Template part for displaying spot content in single spots
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */


$plat = get_field_object('plat');
$menu1 = get_field_object('menu1');
$menu2 = get_field_object('menu2');
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

    <div class="container">

      <div class="row">

        <div class="entry-content col-md-8 col-lg-10">
          <?php the_content(); ?>
        </div>

        <div class="restaurant-note col">

         

        </div>

      </div><!-- .row -->

    </div><!-- .container -->

  </div><!-- .restaurant-content -->

  
  <div class="restaurant-prix my-5">
     
     <h2><?= $prix['label']; ?></h2>
     <?= $prix['value']; ?>
</div>
    

     <div class="bg-white p-4 text-center"> <!-- .notation -->

<h3><?= $note['label'] ?></h3>

<?php foreach( $note['choices'] as $key => $choice ) : ?>

 <?php 
 if($key <= $note['value']) $img_class = 'level'; 
 else $img_class = 'over-level'; 
 ?>

 <img src="<?= get_template_directory_uri(); ?>/dist/images/pouce-leve_design2.png" alt="<?= $choice ?>" title="<?= $choice ?>" class="pouce <?= $img_class ?>">

<?php endforeach; ?>

</div> <!--.notation -->
 

</article>