document.addEventListener('DOMContentLoaded', function () {
  // ---------- menú burger ----------
  var burger = document.getElementById('burgerBtn');
  var navLinks = document.getElementById('navLinks');
  if (burger && navLinks) {
    burger.addEventListener('click', function () {
      var isOpen = navLinks.classList.toggle('open');
      burger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      burger.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
    });
    navLinks.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        navLinks.classList.remove('open');
        burger.setAttribute('aria-expanded', 'false');
        burger.setAttribute('aria-label', 'Abrir menú');
      });
    });
  }

  // ---------- reveal al hacer scroll ----------
  var revealEls = document.querySelectorAll('[data-reveal]');
  if (revealEls.length && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: .12 });
    revealEls.forEach(function (el) { io.observe(el); });
  }

  // ---------- parallax del hero (solo portada) ----------
  var heroParallax = document.getElementById('heroParallax');
  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (heroParallax && !prefersReducedMotion) {
    var ticking = false;
    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(function () {
          heroParallax.style.transform = 'translateY(' + (window.scrollY * 0.25) + 'px)';
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });
  }

  // ---------- acordeón (extremidades diferentes, si se usa) ----------
  document.querySelectorAll('.acc-head').forEach(function (head) {
    head.addEventListener('click', function () {
      var item = head.parentElement;
      var wasOpen = item.classList.contains('open');
      document.querySelectorAll('.acc-item').forEach(function (i) {
        i.classList.remove('open');
        i.querySelector('.acc-head').setAttribute('aria-expanded', 'false');
      });
      if (!wasOpen) {
        item.classList.add('open');
        head.setAttribute('aria-expanded', 'true');
      }
    });
  });

  // ---------- formulario "Únete" (solo portada) ----------
  var step1 = document.getElementById('step1');
  var step2 = document.getElementById('step2');
  var progressFill = document.getElementById('progressFill');
  var stepLabel = document.getElementById('stepLabel');
  var joinForm = document.getElementById('joinForm');
  var thankyou = document.getElementById('thankyou');
  var toStep2 = document.getElementById('toStep2');
  var toStep1 = document.getElementById('toStep1');

  if (toStep2 && step1 && step2) {
    toStep2.addEventListener('click', function () {
      var nombre = document.getElementById('nombre');
      var email = document.getElementById('email');
      var ciudad = document.getElementById('ciudad');
      if (!nombre.value || !email.value || !ciudad.value) {
        step1.querySelectorAll('input[required]').forEach(function (i) {
          if (!i.value) i.style.borderColor = '#FF8AE5';
        });
        return;
      }
      step1.classList.remove('active');
      step2.classList.add('active');
      progressFill.style.width = '100%';
      stepLabel.textContent = 'Paso 2 de 2 · Cuéntanos más';
    });
  }

  if (toStep1 && step1 && step2) {
    toStep1.addEventListener('click', function () {
      step2.classList.remove('active');
      step1.classList.add('active');
      progressFill.style.width = '50%';
      stepLabel.textContent = 'Paso 1 de 2 · Tus datos';
    });
  }

  if (joinForm) {
    // Reemplazá este link por el de tu formulario de Google real
    var GOOGLE_FORM_LINK = 'PEGAR_AQUI_EL_LINK_DEL_GOOGLE_FORM';
    var thankyouText = document.getElementById('thankyouText');

    joinForm.addEventListener('submit', async function (e) {
      e.preventDefault();
      var submitBtn = joinForm.querySelector('button[type="submit"]');
      submitBtn.disabled = true;
      submitBtn.textContent = 'Enviando...';

      var formData = new FormData(joinForm);
      var relacion = formData.get('relacion');

      try {
        var response = await fetch(joinForm.action, {
          method: 'POST',
          body: formData,
          headers: { 'Accept': 'application/json' }
        });
        if (!response.ok) throw new Error('Formspree respondió con un error');

        var quiereFormularioDetallado = relacion === 'Tengo una extremidad diferente' || relacion === 'Soy familiar de alguien con una extremidad diferente';
        thankyouText.innerHTML = quiereFormularioDetallado
          ? 'Ya formas parte de NI MÁS NI MANO. Si querés contarnos un poco más sobre tu situación, completá también <a href="' + GOOGLE_FORM_LINK + '" target="_blank" rel="noopener" style="color:var(--color-rosa-dark); font-weight:600;">este formulario</a>.'
          : 'Ya formas parte de NI MÁS NI MANO. Te escribiremos muy pronto.';

        joinForm.style.display = 'none';
        var progressTrack = document.querySelector('.progress-track');
        if (progressTrack) progressTrack.style.display = 'none';
        if (stepLabel) stepLabel.style.display = 'none';
        thankyou.classList.add('active');
      } catch (err) {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Unirme a la comunidad';
        alert('Hubo un problema al enviar el formulario. Probá de nuevo o escribinos directamente a nimasnimano@gmail.com.');
      }
    });
  }
});
