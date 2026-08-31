<?php
/**
 * Archivo del CPT "evento" — listado completo de Eventos (URL /eventos/)
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<!-- ================= HERO EVENTOS ================= -->
<section class="hero-dark" id="main-content" style="padding-top:var(--sp-20); padding-bottom:var(--sp-16);">
  <div class="hero-graphic">
    <svg viewBox="0 0 260 400" width="260" height="100%" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
      <path d="M190 15 C230 55 250 130 225 215 C200 300 120 350 110 385 L100 410 M100 410 C100 410 90 380 75 345 C55 280 5 240 5 155 C5 70 100 15 190 15" stroke="#D5DE7E" stroke-width="12" stroke-linecap="round" fill="none" opacity="0.55"/>
      <circle cx="170" cy="250" r="88" stroke="#D5DE7E" stroke-width="12" fill="none" opacity="0.35"/>
    </svg>
  </div>
  <div class="wrap">
    <div class="hero-inner">
      <span class="eyebrow eyebrow-light">Agenda</span>
      <h1 class="hero-heading" style="font-size:clamp(30px,4.5vw,var(--size-4xl));">Encuentros y <span class="pink">actividades</span></h1>
      <p class="hero-body">Nos vemos en persona en distintas ciudades: para hablar, para acompañarnos, para simplemente estar. Aquí están todos nuestros próximos encuentros.</p>
    </div>
  </div>
</section>

<!-- ================= LISTADO EVENTOS ================= -->
<section class="eventos" data-reveal>
  <div class="wrap">
    <?php if ( have_posts() ) : ?>
      <div class="grid g3">
        <?php $i = 0; while ( have_posts() ) : the_post();
          $fecha       = get_post_meta( get_the_ID(), 'evento_fecha', true );
          $boton_texto = get_post_meta( get_the_ID(), 'evento_boton_texto', true );
          $boton_url   = get_post_meta( get_the_ID(), 'evento_boton_url', true );
          if ( '' === $boton_texto ) $boton_texto = 'Apúntate';
          if ( '' === $boton_url )   $boton_url   = home_url( '/#unete' );
          ?>
          <div class="event-card">
            <?php nimasnimano_event_card_image( get_the_ID(), $i ); ?>
            <div class="event-card-body">
              <?php if ( $fecha ) : ?>
                <div class="event-card-date"><?php echo nimasnimano_calendar_icon(); ?> <?php echo esc_html( $fecha ); ?></div>
              <?php endif; ?>
              <div class="event-card-title"><?php the_title(); ?></div>
              <p class="event-card-desc"><?php echo esc_html( has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 24 ) ); ?></p>
              <a href="<?php echo esc_url( $boton_url ); ?>" class="btn btn-rosa btn-sm"><?php echo esc_html( $boton_texto ); ?></a>
            </div>
          </div>
        <?php $i++; endwhile; ?>
      </div>
    <?php else : ?>
      <p style="text-align:center; opacity:.7;">Todavía no hay eventos publicados. ¡Vuelve pronto!</p>
    <?php endif; ?>
  </div>
</section>

<!-- ================= COMO SON LOS ENCUENTROS ================= -->
<section class="referentes" data-reveal>
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Cómo son</span>
      <h2 style="font-size:clamp(26px,4vw,var(--size-3xl));">Qué te vas a encontrar.</h2>
    </div>
    <div class="grid g2">
      <div class="card">
        <span class="badge badge-rosa">Formato</span>
        <h3 style="font-size:var(--size-xl); margin-top:var(--sp-4);">Encuentros mano a mano</h3>
        <p style="opacity:.75; font-size:var(--size-sm); margin-top:var(--sp-3);">Sin protocolo ni discursos: quedamos para hablar, tomar algo y compartir experiencias en un espacio seguro.</p>
      </div>
      <div class="card">
        <span class="badge badge-verde">Quién viene</span>
        <h3 style="font-size:var(--size-xl); margin-top:var(--sp-4);">Todo tipo de personas</h3>
        <p style="opacity:.75; font-size:var(--size-sm); margin-top:var(--sp-3);">Personas con extremidades diferentes, familias, amistades y cualquiera que quiera sumarse a apoyar.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= AVISO NUEVOS EVENTOS ================= -->
<section class="unete-wrap" data-reveal>
  <div class="wrap">
    <div class="unete-shell" style="text-align:center;">
      <span class="eyebrow eyebrow-light">No te pierdas nada</span>
      <h2 style="color:#fff; font-size:clamp(24px,3.6vw,var(--size-2xl)); max-width:520px; margin:0 auto var(--sp-6);">Avísame en cuanto se anuncie un nuevo encuentro</h2>
      <form style="display:flex; gap:var(--sp-3); justify-content:center; flex-wrap:wrap; max-width:480px; margin:0 auto;"
            onsubmit="event.preventDefault(); this.querySelector('button').textContent='¡Listo! Te avisaremos ✓'; this.querySelector('button').disabled=true;">
        <input class="form-input" type="email" placeholder="tu@email.com" required style="max-width:280px;">
        <button type="submit" class="btn btn-rosa btn-md">Avísame</button>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>
