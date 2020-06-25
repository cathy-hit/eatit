<?php
/**
 * Template part for displaying post content in posts archive
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

?>

<article <?php post_class('sticky-post_article row'); ?>>

  <?php if(has_post_thumbnail()) : ?>
    <figure class="card-figure mb-0 col-sm-10 col-md-6 offset-sm-1">
      <a class="link-image" href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_post_thumbnail('thumb-medium', array('class'=>'img-fluid')); ?></a>
    </figure>
  <?php endif; ?>

  

</article>