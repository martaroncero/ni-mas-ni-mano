<?php
/**
 * Template Name: Extremidades diferentes
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<!-- ================= HERO EXTREMIDADES ================= -->
<section class="hero-dark" id="main-content" style="padding-top:var(--sp-20); padding-bottom:var(--sp-16);">
  <div class="hero-graphic">
    <svg viewBox="0 0 260 400" width="260" height="100%" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
      <path d="M190 15 C230 55 250 130 225 215 C200 300 120 350 110 385 L100 410 M100 410 C100 410 90 380 75 345 C55 280 5 240 5 155 C5 70 100 15 190 15" stroke="#D5DE7E" stroke-width="12" stroke-linecap="round" fill="none" opacity="0.55"/>
      <circle cx="170" cy="250" r="88" stroke="#D5DE7E" stroke-width="12" fill="none" opacity="0.35"/>
    </svg>
  </div>
  <div class="wrap">
    <div class="hero-inner">
      <span class="eyebrow eyebrow-light">Blog · Divulgación</span>
      <h1 class="hero-heading" style="font-size:clamp(30px,4.5vw,var(--size-4xl));">Qué son las <span class="pink">extremidades diferentes</span></h1>
      <p class="hero-body">Una pequeña guía para entender, con naturalidad y sin tecnicismos innecesarios, algunos de los términos que forman parte de nuestra realidad.</p>
    </div>
  </div>
</section>

<!-- ================= CONTENIDO (editable desde wp-admin) ================= -->
<?php while ( have_posts() ) : the_post(); ?>
<section class="quienes" data-reveal>
  <div class="wrap entry-content">
    <?php the_content(); ?>
  </div>
</section>
<?php endwhile; ?>

<!-- ================= CTA COMUNIDAD ================= -->
<section class="unete-wrap" data-reveal>
  <div class="wrap">
    <div class="unete-shell" style="text-align:center;">
      <span class="eyebrow eyebrow-light">Sigue aprendiendo con nosotras</span>
      <h2 style="color:#fff; font-size:clamp(24px,3.6vw,var(--size-2xl)); max-width:520px; margin:0 auto var(--sp-6);">Si esto te resuena, este es tu sitio.</h2>
      <a href="<?php echo esc_url( home_url( '/#unete' ) ); ?>" class="btn btn-rosa btn-md">Únete a la comunidad</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
