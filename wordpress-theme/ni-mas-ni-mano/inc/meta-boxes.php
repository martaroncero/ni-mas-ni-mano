<?php
/**
 * Meta boxes para Eventos, Referentes y Prensa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function nimasnimano_add_meta_boxes() {
	add_meta_box(
		'nimasnimano_evento_detalles',
		'Detalles del evento',
		'nimasnimano_render_evento_metabox',
		'evento',
		'side',
		'default'
	);
	add_meta_box(
		'nimasnimano_referente_detalles',
		'Autoría del testimonio',
		'nimasnimano_render_referente_metabox',
		'referente',
		'side',
		'default'
	);
	add_meta_box(
		'nimasnimano_prensa_detalles',
		'Detalles del reconocimiento',
		'nimasnimano_render_prensa_metabox',
		'prensa',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'nimasnimano_add_meta_boxes' );

/* ---------------------- Evento ---------------------- */

function nimasnimano_render_evento_metabox( $post ) {
	wp_nonce_field( 'nimasnimano_save_evento', 'nimasnimano_evento_nonce' );
	$fecha       = get_post_meta( $post->ID, 'evento_fecha', true );
	$boton_texto = get_post_meta( $post->ID, 'evento_boton_texto', true );
	$boton_url   = get_post_meta( $post->ID, 'evento_boton_url', true );
	if ( '' === $boton_texto ) $boton_texto = 'Apúntate';
	if ( '' === $boton_url )   $boton_url   = '#unete';
	?>
	<p>
		<label for="evento_fecha"><strong>Fecha (texto)</strong></label><br>
		<input type="text" id="evento_fecha" name="evento_fecha" value="<?php echo esc_attr( $fecha ); ?>" placeholder="Ej: Junio/julio 2026" style="width:100%;">
	</p>
	<p>
		<label for="evento_boton_texto"><strong>Texto del botón</strong></label><br>
		<input type="text" id="evento_boton_texto" name="evento_boton_texto" value="<?php echo esc_attr( $boton_texto ); ?>" style="width:100%;">
	</p>
	<p>
		<label for="evento_boton_url"><strong>Enlace del botón</strong></label><br>
		<input type="text" id="evento_boton_url" name="evento_boton_url" value="<?php echo esc_attr( $boton_url ); ?>" style="width:100%;">
	</p>
	<p class="description">La descripción corta que aparece en la tarjeta se toma del extracto (o del contenido) del evento. La imagen destacada es opcional: si no se pone ninguna, se usa una ilustración decorativa automática.</p>
	<?php
}

function nimasnimano_save_evento_meta( $post_id ) {
	if ( ! isset( $_POST['nimasnimano_evento_nonce'] ) || ! wp_verify_nonce( $_POST['nimasnimano_evento_nonce'], 'nimasnimano_save_evento' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['evento_fecha'] ) ) {
		update_post_meta( $post_id, 'evento_fecha', sanitize_text_field( $_POST['evento_fecha'] ) );
	}
	if ( isset( $_POST['evento_boton_texto'] ) ) {
		update_post_meta( $post_id, 'evento_boton_texto', sanitize_text_field( $_POST['evento_boton_texto'] ) );
	}
	if ( isset( $_POST['evento_boton_url'] ) ) {
		update_post_meta( $post_id, 'evento_boton_url', sanitize_text_field( $_POST['evento_boton_url'] ) );
	}
}
add_action( 'save_post_evento', 'nimasnimano_save_evento_meta' );

/* ---------------------- Referente ---------------------- */

function nimasnimano_render_referente_metabox( $post ) {
	wp_nonce_field( 'nimasnimano_save_referente', 'nimasnimano_referente_nonce' );
	$autor = get_post_meta( $post->ID, 'referente_autor', true );
	?>
	<p>
		<label for="referente_autor"><strong>Firma / atribución</strong></label><br>
		<input type="text" id="referente_autor" name="referente_autor" value="<?php echo esc_attr( $autor ); ?>" placeholder="Ej: — Nidia, madre de Keyra" style="width:100%;">
	</p>
	<p class="description">El título de la entrada es solo para identificarla en el panel. La cita se escribe en el contenido, y la foto es la imagen destacada.</p>
	<?php
}

function nimasnimano_save_referente_meta( $post_id ) {
	if ( ! isset( $_POST['nimasnimano_referente_nonce'] ) || ! wp_verify_nonce( $_POST['nimasnimano_referente_nonce'], 'nimasnimano_save_referente' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['referente_autor'] ) ) {
		update_post_meta( $post_id, 'referente_autor', sanitize_text_field( $_POST['referente_autor'] ) );
	}
}
add_action( 'save_post_referente', 'nimasnimano_save_referente_meta' );

/* ---------------------- Prensa ---------------------- */

function nimasnimano_render_prensa_metabox( $post ) {
	wp_nonce_field( 'nimasnimano_save_prensa', 'nimasnimano_prensa_nonce' );
	$estado = get_post_meta( $post->ID, 'prensa_estado', true );
	$url    = get_post_meta( $post->ID, 'prensa_url', true );
	?>
	<p>
		<label for="prensa_estado"><strong>Estado</strong></label><br>
		<input type="text" id="prensa_estado" name="prensa_estado" value="<?php echo esc_attr( $estado ); ?>" placeholder="Ej: Próximamente / Ganado 2024" style="width:100%;">
	</p>
	<p>
		<label for="prensa_url"><strong>Enlace (opcional)</strong></label><br>
		<input type="url" id="prensa_url" name="prensa_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://..." style="width:100%;">
	</p>
	<?php
}

function nimasnimano_save_prensa_meta( $post_id ) {
	if ( ! isset( $_POST['nimasnimano_prensa_nonce'] ) || ! wp_verify_nonce( $_POST['nimasnimano_prensa_nonce'], 'nimasnimano_save_prensa' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['prensa_estado'] ) ) {
		update_post_meta( $post_id, 'prensa_estado', sanitize_text_field( $_POST['prensa_estado'] ) );
	}
	if ( isset( $_POST['prensa_url'] ) ) {
		update_post_meta( $post_id, 'prensa_url', esc_url_raw( $_POST['prensa_url'] ) );
	}
}
add_action( 'save_post_prensa', 'nimasnimano_save_prensa_meta' );
