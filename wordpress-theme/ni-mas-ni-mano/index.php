<?php
/**
 * Plantilla de último recurso (requerida por WordPress para que el tema sea válido)
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<section class="quienes" id="main-content" data-reveal>
  <div class="wrap entry-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1 style="color:var(--color-rosa-dark); font-size:clamp(28px,4vw,var(--size-3xl)); margin-bottom:var(--sp-6);"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    <?php endwhile; else : ?>
      <p>No se ha encontrado contenido.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
