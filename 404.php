<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * ...
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

get_header();
?>

<main>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>
<a href=""> <img src="<?= get_template_directory_uri() . './src/images/crevaison-404.png' ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
</main>

<?php get_footer() ?>