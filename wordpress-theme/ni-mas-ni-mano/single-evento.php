<?php
/**
 * Vista individual de un Evento
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

while ( have_posts() ) : the_post();
	$fecha       = get_post_meta( get_the_ID(), 'evento_fecha', true );
	$boton_texto = get_post_meta( get_the_ID(), 'evento_boton_texto', true );
	$boton_url   = get_post_meta( get_the_ID(), 'evento_boton_url', true );
	if ( '' === $boton_texto ) $boton_texto = 'Apúntate';
	if ( '' === $boton_url )   $boton_url   = home_url( '/#unete' );
	?>
	<section class="quienes" id="main-content" data-reveal>
	  <div class="wrap entry-content">
	    <?php if ( $fecha ) : ?>
	      <div class="event-card-date"><?php echo nimasnimano_calendar_icon(); ?> <?php echo esc_html( $fecha ); ?></div>
	    <?php endif; ?>
	    <h1 style="color:var(--color-rosa-dark); font-size:clamp(28px,4vw,var(--size-3xl)); margin:var(--sp-3) 0 var(--sp-6);"><?php the_title(); ?></h1>
	    <?php if ( has_post_thumbnail() ) : ?>
	      <div style="border-radius:var(--r-lg); overflow:hidden; margin-bottom:var(--sp-6);"><?php the_post_thumbnail( 'large' ); ?></div>
	    <?php endif; ?>
	    <?php the_content(); ?>
	    <p style="margin-top:var(--sp-8);">
	      <a href="<?php echo esc_url( $boton_url ); ?>" class="btn btn-rosa btn-md"><?php echo esc_html( $boton_texto ); ?></a>
	      <a href="<?php echo esc_url( home_url( '/eventos/' ) ); ?>" class="btn btn-outline btn-md">← Ver todos los eventos</a>
	    </p>
	  </div>
	</section>
	<?php
endwhile;

get_footer();
