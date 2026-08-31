<?php
/**
 * Custom Post Types: Eventos, Referentes, Prensa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function nimasnimano_register_cpts() {

	// ---------- Eventos ----------
	register_post_type( 'evento', array(
		'labels' => array(
			'name'               => 'Eventos',
			'singular_name'      => 'Evento',
			'add_new_item'       => 'Añadir nuevo evento',
			'edit_item'          => 'Editar evento',
			'new_item'           => 'Nuevo evento',
			'all_items'          => 'Todos los eventos',
			'view_item'          => 'Ver evento',
			'search_items'       => 'Buscar eventos',
			'not_found'          => 'No se han encontrado eventos',
		),
		'public'       => true,
		'has_archive'  => 'eventos',
		'rewrite'      => array( 'slug' => 'eventos' ),
		'menu_icon'    => 'dashicons-calendar-alt',
		'menu_position' => 20,
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest' => true,
	) );

	// ---------- Referentes (testimonios) ----------
	register_post_type( 'referente', array(
		'labels' => array(
			'name'               => 'Referentes',
			'singular_name'      => 'Referente',
			'add_new_item'       => 'Añadir nuevo referente',
			'edit_item'          => 'Editar referente',
			'new_item'           => 'Nuevo referente',
			'all_items'          => 'Todos los referentes',
			'view_item'          => 'Ver referente',
			'search_items'       => 'Buscar referentes',
			'not_found'          => 'No se han encontrado referentes',
		),
		'public'              => false,
		'show_ui'             => true,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'menu_icon'           => 'dashicons-groups',
		'menu_position'       => 21,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'        => true,
	) );

	// ---------- Prensa e impacto ----------
	register_post_type( 'prensa', array(
		'labels' => array(
			'name'               => 'Prensa',
			'singular_name'      => 'Prensa',
			'add_new_item'       => 'Añadir nuevo reconocimiento',
			'edit_item'          => 'Editar reconocimiento',
			'new_item'           => 'Nuevo reconocimiento',
			'all_items'          => 'Prensa e impacto',
			'view_item'          => 'Ver reconocimiento',
			'search_items'       => 'Buscar reconocimientos',
			'not_found'          => 'No se han encontrado reconocimientos',
		),
		'public'              => false,
		'show_ui'             => true,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'menu_icon'           => 'dashicons-megaphone',
		'menu_position'       => 22,
		'supports'            => array( 'title' ),
		'show_in_rest'        => true,
	) );
}
add_action( 'init', 'nimasnimano_register_cpts' );
