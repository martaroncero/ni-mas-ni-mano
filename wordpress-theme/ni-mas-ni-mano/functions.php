<?php
/**
 * Funciones del tema NI MÁS NI MANO
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'NIMASNIMANO_VERSION', '1.0.0' );

/**
 * Setup del tema
 */
function nimasnimano_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Permite escribir un extracto corto en las Páginas (se usa como teaser en portada).
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'nimasnimano_setup' );

/**
 * Estilos y scripts
 */
function nimasnimano_assets() {
	wp_enqueue_style(
		'nimasnimano-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Syne:wght@400;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'nimasnimano-style', get_stylesheet_uri(), array(), NIMASNIMANO_VERSION );
	wp_enqueue_script( 'nimasnimano-main', get_template_directory_uri() . '/assets/js/main.js', array(), NIMASNIMANO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'nimasnimano_assets' );

/**
 * Custom Post Types y meta boxes
 */
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Helper: icono/fondo decorativo rotativo para tarjetas de evento sin imagen destacada.
 * Devuelve un array [background, svg] igual al usado en el sitio original.
 */
function nimasnimano_event_placeholder( $index ) {
	$variants = array(
		array(
			'bg'  => 'var(--color-granate)',
			'svg' => '<svg viewBox="0 0 240 150" width="240" height="150" fill="none" aria-hidden="true"><rect width="240" height="150" fill="#390E0E"/><path d="M40 100 Q60 40 90 100 Z" fill="#5C1A1A"/><path d="M110 100 Q130 55 150 100 Z" fill="#6b2323"/><path d="M170 100 Q190 45 220 100 Z" fill="#5C1A1A"/><circle cx="200" cy="35" r="14" fill="#D5DE7E" opacity=".7"/></svg>',
		),
		array(
			'bg'  => 'var(--color-verde-light)',
			'svg' => '<svg viewBox="0 0 240 150" width="240" height="150" fill="none" aria-hidden="true"><rect width="240" height="150" fill="#EBF0B2"/><circle cx="120" cy="65" r="35" stroke="#390E0E" stroke-width="7" fill="none"/><path d="M75 130 Q120 100 165 130" stroke="#390E0E" stroke-width="7" stroke-linecap="round" fill="none"/></svg>',
		),
		array(
			'bg'  => 'var(--color-negro)',
			'svg' => '<svg viewBox="0 0 240 150" width="240" height="150" fill="none" aria-hidden="true"><rect width="240" height="150" fill="#1a1a1a"/><rect x="75" y="35" width="90" height="80" rx="10" stroke="#FF8AE5" stroke-width="7" fill="none"/><line x1="95" y1="75" x2="145" y2="75" stroke="#FF8AE5" stroke-width="5" stroke-linecap="round"/><line x1="120" y1="50" x2="120" y2="100" stroke="#FF8AE5" stroke-width="5" stroke-linecap="round"/></svg>',
		),
	);
	return $variants[ $index % count( $variants ) ];
}

/**
 * Pinta la imagen (o el placeholder decorativo) de una tarjeta de evento.
 */
function nimasnimano_event_card_image( $post_id, $index ) {
	if ( has_post_thumbnail( $post_id ) ) {
		echo '<div class="event-card-img">';
		echo get_the_post_thumbnail( $post_id, 'medium', array( 'loading' => 'lazy' ) );
		echo '</div>';
		return;
	}
	$placeholder = nimasnimano_event_placeholder( $index );
	echo '<div class="event-card-img" style="background:' . esc_attr( $placeholder['bg'] ) . ';">' . $placeholder['svg'] . '</div>';
}

/**
 * Icono de calendario usado en la fecha de cada tarjeta de evento.
 */
function nimasnimano_calendar_icon() {
	return '<svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><rect x="1.5" y="2.5" width="13" height="12" rx="2" stroke="currentColor" stroke-width="1.4"/><line x1="1.5" y1="6" x2="14.5" y2="6" stroke="currentColor" stroke-width="1.4"/><line x1="4.5" y1="1" x2="4.5" y2="3.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><line x1="11.5" y1="1" x2="11.5" y2="3.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>';
}
