<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

get_header();
?>

<main>

  <?php if (have_posts()) : ?>

    <section class="archive-section">

      <header class="entry-header main-header py-5">

        <div class="container">

          <h1 class="page-title"><?php the_archive_title(); ?></h1>

        </div>

      </header>

      <div class="container py-5">

        <div class="row flex-md-row-reverse">

          <div class="col-md-8 col-lg-9">

            <?php while (have_posts()) : the_post(); ?>

              <?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>

            <?php endwhile; ?>

          </div>

        </div><!-- .row -->

        <?php the_posts_pagination(); ?>

      </div><!-- .container -->
    
    </section>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>
    
  <?php endif; ?>

</main>

<?php get_footer() ?>