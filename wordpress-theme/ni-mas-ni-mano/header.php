<?php
/**
 * Cabecera del tema: doctype, head y navegación
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#main-content" class="skip-link">Saltar al contenido</a>

<!-- ================= NAV ================= -->
<header>
  <div class="navbar">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-logo">
      NI MÁS NI MANO
    </a>
    <ul class="navbar-links" id="navLinks">
      <li><a href="<?php echo esc_url( home_url( '/sobre-la-organizacion/' ) ); ?>"<?php echo is_page( 'sobre-la-organizacion' ) ? ' aria-current="page"' : ''; ?>>Sobre la organización</a></li>
      <li><a href="<?php echo esc_url( home_url( '/eventos/' ) ); ?>"<?php echo is_post_type_archive( 'evento' ) ? ' aria-current="page"' : ''; ?>>Eventos</a></li>
      <li><a href="<?php echo esc_url( home_url( '/extremidades-diferentes/' ) ); ?>"<?php echo is_page( 'extremidades-diferentes' ) ? ' aria-current="page"' : ''; ?>>Extremidades diferentes</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#unete' ) ); ?>">Contacto</a></li>
    </ul>
    <a href="<?php echo esc_url( home_url( '/#unete' ) ); ?>" class="btn btn-rosa btn-sm">Únete</a>
    <button class="burger" id="burgerBtn" aria-label="Abrir menú" aria-expanded="false"><span></span><span></span><span></span></button>
  </div>
</header>
