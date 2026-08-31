<?php
/**
 * Template Name: Sobre la organización
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<!-- ================= HERO SOBRE LA ORGANIZACIÓN ================= -->
<section class="hero-dark" id="main-content" style="padding-top:var(--sp-20); padding-bottom:var(--sp-16);">
  <div class="hero-graphic">
    <svg viewBox="0 0 260 400" width="260" height="100%" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
      <path d="M190 15 C230 55 250 130 225 215 C200 300 120 350 110 385 L100 410 M100 410 C100 410 90 380 75 345 C55 280 5 240 5 155 C5 70 100 15 190 15" stroke="#D5DE7E" stroke-width="12" stroke-linecap="round" fill="none" opacity="0.55"/>
      <circle cx="170" cy="250" r="88" stroke="#D5DE7E" stroke-width="12" fill="none" opacity="0.35"/>
    </svg>
  </div>
  <div class="wrap">
    <div class="hero-inner">
      <span class="eyebrow eyebrow-light">Sobre la organización</span>
      <h1 class="hero-heading" style="font-size:clamp(30px,4.5vw,var(--size-4xl));">Sobre NI MÁS NI MANO</h1>
    </div>
  </div>
</section>

<!-- ================= HISTORIA COMPLETA ================= -->
<?php while ( have_posts() ) : the_post(); ?>
<section class="quienes" data-reveal>
  <div class="wrap">
    <div class="story">
      <div class="story-portrait">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'large', array( 'alt' => esc_attr( get_the_title() . ', fundadora de NI MÁS NI MANO' ) ) ); ?>
        <?php endif; ?>
      </div>
      <div>
        <span class="badge badge-rosa" style="margin-bottom:var(--sp-4);">Fundadora</span>
        <h2><?php the_title(); ?></h2>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
