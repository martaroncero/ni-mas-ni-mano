<?php
/**
 * Plantilla de portada
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

// Página "Sobre la organización": fuente de la historia de la fundadora.
$fundadora_page = get_page_by_path( 'sobre-la-organizacion' );
?>

<!-- ================= HERO ================= -->
<section class="hero-dark" id="main-content" style="padding-top:var(--sp-24); padding-bottom:var(--sp-24);">
  <div class="hero-graphic" id="heroParallax">
    <svg viewBox="0 0 417 707" width="260" height="100%" fill="none" preserveAspectRatio="xMidYMid meet" aria-hidden="true">
      <path d="M21.5549 700.473C59.6315 573.281 161.197 296.457 318.025 375.876C466.52 451.075 375.138 609.089 234.259 582.436C133.592 563.391 -29.4835 270.289 201.406 15.0956" stroke="#D5DE7E" stroke-width="45"/>
    </svg>
  </div>
  <div class="wrap">
    <div class="hero-inner">
      <h1 class="hero-heading">Si hay algo que nos hace <span class="verde">iguales</span> es que somos<br><span class="pink">diferentes</span></h1>
      <p class="hero-body" style="color:#fff; opacity:1;">Comunidad de personas con extremidades diferentes. NI MÁS NI MANO es una comunidad de personas, un espacio de encuentro, un lugar en el que ser.</p>
      <div class="hero-actions">
        <a href="#unete" class="btn btn-rosa btn-lg">Únete</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= BANNER VERDE ================= -->
<section class="banner-verde" style="padding-top:var(--sp-12); padding-bottom:var(--sp-12);">
  <div class="wrap">
    <p>No somos menos. No somos más. Somos.</p>
  </div>
</section>

<!-- ================= QUIENES SOMOS (dinámico: página "Sobre la organización") ================= -->
<?php if ( $fundadora_page ) :
	$teaser = has_excerpt( $fundadora_page->ID ) ? get_the_excerpt( $fundadora_page ) : wp_trim_words( $fundadora_page->post_content, 40 );
	?>
<section class="quienes" id="quienes-somos" data-reveal>
  <div class="wrap">
    <div class="story">
      <div class="story-portrait">
        <?php if ( has_post_thumbnail( $fundadora_page->ID ) ) : ?>
          <?php echo get_the_post_thumbnail( $fundadora_page->ID, 'large', array( 'alt' => esc_attr( get_the_title( $fundadora_page ) . ', fundadora de NI MÁS NI MANO' ) ) ); ?>
        <?php endif; ?>
      </div>
      <div>
        <span class="badge badge-rosa" style="margin-bottom:var(--sp-4);">Fundadora</span>
        <h2><?php echo esc_html( get_the_title( $fundadora_page ) ); ?></h2>
        <p><?php echo esc_html( $teaser ); ?></p>
        <a href="<?php echo esc_url( get_permalink( $fundadora_page ) ); ?>" class="btn btn-outline-rosa btn-md">Conoce toda la historia →</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================= QUE HACEMOS ================= -->
<section id="que-hacemos" data-reveal>
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">NUESTROS VALORES</span>
      <h2>¿Qué hacemos?</h2>
    </div>
    <div class="grid g3">
      <div class="card pillar-card">
        <span class="badge badge-rosa">01</span>
        <h3>Comunidad</h3>
        <ul>
          <li>Red de apoyo diaria a través de grupos</li>
          <li>Encuentros en diferentes ciudades</li>
          <li>Acompañamiento y asesoramiento</li>
        </ul>
      </div>
      <div class="card pillar-card">
        <span class="badge badge-verde">02</span>
        <h3>Activismo</h3>
        <ul>
          <li>Divulgación</li>
          <li>Impacto social</li>
          <li>Derechos de las personas con discapacidad</li>
          <li>Acción contra el bullying y la violencia</li>
          <li>Defensa de las niñas y mujeres con discapacidad</li>
        </ul>
      </div>
      <div class="card pillar-card">
        <span class="badge badge-rosa">03</span>
        <h3>Apoyo</h3>
        <ul>
          <li>Acompañamiento a familias en el momento del diagnóstico</li>
          <li>Orientación sobre recursos y derechos</li>
          <li>Conexión con otras familias en tu misma situación</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= REFERENTES (dinámico: CPT referente) ================= -->
<?php
$referentes = new WP_Query( array(
	'post_type'      => 'referente',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
) );
if ( $referentes->have_posts() ) :
	?>
<section class="referentes" id="referentes" data-reveal>
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Referentes</span>
      <h2 style="font-size:clamp(26px,4vw,var(--size-3xl));">Las historias que a Regina, de niña, le habrían cambiado la vida.</h2>
      <p>Personas de nuestra comunidad, en primera persona. Esta sección se irá llenando de rostros, nombres y palabras propias.</p>
    </div>
    <div class="grid g2">
      <?php while ( $referentes->have_posts() ) : $referentes->the_post(); ?>
        <div class="ref-card">
          <div class="ref-avatar">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
            <?php endif; ?>
          </div>
          <div class="ref-quote"><?php the_content(); ?></div>
          <h4 style="margin-top:var(--sp-4);"><?php echo esc_html( get_post_meta( get_the_ID(), 'referente_autor', true ) ); ?></h4>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <p class="ref-note">¿Quieres compartir la tuya? <a href="#unete">Escríbenos por aquí →</a> — esta sección va a seguir creciendo con más testimonios.</p>
  </div>
</section>
<?php endif; ?>

<!-- ================= PRENSA (dinámico: CPT prensa) ================= -->
<?php
$prensa = new WP_Query( array(
	'post_type'      => 'prensa',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
) );
if ( $prensa->have_posts() ) :
	?>
<section id="prensa" data-reveal>
  <div class="wrap">
    <div class="section-head" style="text-align:center; margin-left:auto; margin-right:auto;">
      <span class="eyebrow">Prensa e impacto</span>
      <h2>Reconocimientos</h2>
    </div>
    <div class="grid g2" style="max-width:760px; margin:0 auto;">
      <?php while ( $prensa->have_posts() ) : $prensa->the_post();
      	$url = get_post_meta( get_the_ID(), 'prensa_url', true );
      	$estado = get_post_meta( get_the_ID(), 'prensa_estado', true );
      	?>
        <div class="card press-card">
          <div class="press-icon">🏆</div>
          <h3><?php the_title(); ?></h3>
          <?php if ( $estado ) : ?>
            <span class="badge badge-verde"><?php echo esc_html( $estado ); ?></span>
          <?php endif; ?>
          <?php if ( $url ) : ?>
            <p style="margin-top:var(--sp-3);"><a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" style="color:var(--color-rosa-dark); font-weight:600; font-size:var(--size-sm);">Ver más →</a></p>
          <?php endif; ?>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================= EVENTOS (dinámico: 3 últimos del CPT evento) ================= -->
<?php
$eventos = new WP_Query( array(
	'post_type'      => 'evento',
	'posts_per_page' => 3,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
) );
if ( $eventos->have_posts() ) :
	?>
<section class="eventos" id="eventos" data-reveal>
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Agenda</span>
      <h2>Eventos</h2>
    </div>
    <div class="grid g3">
      <?php $i = 0; while ( $eventos->have_posts() ) : $eventos->the_post();
      	$fecha       = get_post_meta( get_the_ID(), 'evento_fecha', true );
      	$boton_texto = get_post_meta( get_the_ID(), 'evento_boton_texto', true );
      	$boton_url   = get_post_meta( get_the_ID(), 'evento_boton_url', true );
      	if ( '' === $boton_texto ) $boton_texto = 'Apúntate';
      	if ( '' === $boton_url )   $boton_url   = '#unete';
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
      <?php $i++; endwhile; wp_reset_postdata(); ?>
    </div>
    <div style="text-align:center; margin-top:var(--sp-10);">
      <a href="<?php echo esc_url( home_url( '/eventos/' ) ); ?>" class="btn btn-outline btn-md">Ver todos los eventos →</a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================= UNETE ================= -->
<section class="unete-wrap" id="unete" data-reveal>
  <div class="wrap">
    <div class="unete-shell">
      <div class="unete-grid">
        <div class="unete-copy">
          <span class="eyebrow eyebrow-light">Únete a la comunidad</span>
          <h2 style="color:#fff; font-size:clamp(26px,4vw,var(--size-3xl));">El corazón de NI MÁS NI MANO.</h2>
          <p>Si quieres formar parte de NI MÁS NI MANO, solo tienes que rellenar este formulario.</p>
          <p style="margin-top:var(--sp-6); font-size:12.5px; opacity:.6;">Somos una asociación sin ánimo de lucro. Rellenar este formulario no implica ningún compromiso económico.</p>
        </div>

        <div class="form-card">
          <div class="progress-track"><div class="progress-fill" id="progressFill"></div></div>
          <p class="step-label" id="stepLabel">Paso 1 de 2 · Tus datos</p>

          <!-- Reemplazá esta URL por tu endpoint real de Formspree (https://formspree.io/f/TU_FORM_ID) -->
          <form id="joinForm" action="https://formspree.io/f/TU_FORM_ID" method="POST">
            <input type="text" name="_gotcha" style="display:none" tabindex="-1" autocomplete="off">
            <input type="hidden" name="_subject" value="Nueva solicitud de alta — NI MÁS NI MANO">

            <div class="form-step active" id="step1">
              <div class="field-row">
                <div class="form-group" style="margin-bottom:0;"><label class="form-label" for="nombre">Nombre</label><input class="form-input" type="text" id="nombre" name="nombre" required></div>
                <div class="form-group" style="margin-bottom:0;"><label class="form-label" for="apellidos">Apellidos</label><input class="form-input" type="text" id="apellidos" name="apellidos" required></div>
              </div>
              <div class="field-row">
                <div class="form-group" style="margin-bottom:0;"><label class="form-label" for="email">Email</label><input class="form-input" type="email" id="email" name="email" required></div>
                <div class="form-group" style="margin-bottom:0;"><label class="form-label" for="telefono">Teléfono</label><input class="form-input" type="tel" id="telefono" name="telefono"></div>
              </div>
              <div class="form-group"><label class="form-label" for="ciudad">Ciudad</label><input class="form-input" type="text" id="ciudad" name="ciudad" required></div>
              <div class="form-actions" style="justify-content:flex-end;">
                <button type="button" class="btn btn-rosa btn-md" id="toStep2">Siguiente →</button>
              </div>
            </div>

            <div class="form-step" id="step2">
              <div class="form-group">
                <label class="form-label">¿Cuál es tu relación con la asociación?</label>
                <div class="option-list">
                  <label class="option"><input type="radio" name="relacion" value="Tengo una extremidad diferente" required> Tengo una extremidad diferente</label>
                  <label class="option"><input type="radio" name="relacion" value="Soy familiar de alguien con una extremidad diferente"> Soy familiar de alguien con una extremidad diferente</label>
                  <label class="option"><input type="radio" name="relacion" value="Tengo otra condición de discapacidad"> Tengo otra condición de discapacidad</label>
                  <label class="option"><input type="radio" name="relacion" value="Quiero sumarme para apoyar (sin relación directa)"> Quiero sumarme para apoyar (sin relación directa)</label>
                </div>
              </div>

              <label class="option" style="margin-bottom:var(--sp-4);">
                <input type="checkbox" id="joinConsent" name="consentimiento" required>
                Acepto que mis datos se usen para gestionar mi contacto con la asociación.
              </label>

              <div class="form-actions">
                <button type="button" class="btn btn-outline btn-md" id="toStep1">← Atrás</button>
                <button type="submit" class="btn btn-rosa btn-md">Unirme a la comunidad</button>
              </div>
            </div>
          </form>

          <div class="thankyou" id="thankyou">
            <div class="check">💗</div>
            <h3 style="font-size:var(--size-xl); margin:var(--sp-2) 0; color:var(--color-granate);">¡Bienvenida/o!</h3>
            <p id="thankyouText" style="font-size:var(--size-sm); opacity:.7; margin:0;"></p>
          </div>
        </div>
      </div>

      <!-- <div class="donate-strip">
        <p><b style="display:block; font-family:var(--font-display); font-size:var(--size-md); color:#fff; margin-bottom:var(--sp-1);">¿Quieres ayudarnos a seguir creciendo?</b>NI MÁS NI MANO es una asociación sin ánimo de lucro. Tu aporte económico nos ayuda a organizar encuentros y sostener nuestros proyectos.</p>
        <a href="#donar" class="btn btn-outline-light btn-sm">Colaborar</a>
      </div> -->
    </div>
  </div>
</section>

<?php get_footer(); ?>
