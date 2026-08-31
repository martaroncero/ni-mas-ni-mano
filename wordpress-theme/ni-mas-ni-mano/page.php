<?php
/**
 * Plantilla genérica para cualquier Página que no use una plantilla específica
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<section class="quienes" id="main-content" data-reveal>
  <div class="wrap entry-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <h1 style="color:var(--color-rosa-dark); font-size:clamp(28px,4vw,var(--size-3xl)); margin-bottom:var(--sp-6);"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
