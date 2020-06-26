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

<main class="erreur404" >

<div class="container text-center py-5">
 
<a href=""> <img src="<?= get_template_directory_uri() . './src/images/crevaison-404.png' ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
<br>
<br>
<p>Pas de chance !</p>
<br>
 <p> Cette page du site est momentanément indisponible</p>
<p>Nous faisons de notre mieux pour résoudre le problème dans les plus brefs délais</p>
</div><!-- .container -->

</main>


<?php get_footer() ?>