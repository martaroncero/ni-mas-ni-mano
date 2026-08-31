<?php
/**
 * Footer del tema
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<footer>
  <div class="wrap">
    <div class="footer-top">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-logo" style="color:#fff;">NI MÁS NI MANO</a>
      <ul class="footer-links">
        <li><a href="<?php echo esc_url( home_url( '/sobre-la-organizacion/' ) ); ?>">Sobre la organización</a></li>
        <li><a href="<?php echo esc_url( home_url( '/eventos/' ) ); ?>">Eventos</a></li>
        <li><a href="<?php echo esc_url( home_url( '/extremidades-diferentes/' ) ); ?>">Extremidades diferentes</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#unete' ) ); ?>">Únete</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#unete' ) ); ?>">Contacto</a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <span>© <?php echo esc_html( date( 'Y' ) ); ?> NI MÁS NI MANO. Ni más. Ni menos. Somos.</span>
      <span>Valencia, España</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
