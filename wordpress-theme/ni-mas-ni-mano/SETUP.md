# Puesta en marcha del tema NI MÁS NI MANO

## 1. Instalar un WordPress local para probar

No hace falta hosting todavía. La forma más sencilla en Windows:

1. Descarga e instala **Local** desde https://localwp.com (gratis).
2. Abre Local → "Create a new site" → ponle un nombre, por ejemplo `nimasnimano`.
3. Elige el entorno recomendado (PHP/MySQL por defecto) y crea un usuario admin de WordPress.
4. Cuando el sitio arranque, pulsa "Admin" para entrar al wp-admin.

## 2. Instalar el tema

1. En el explorador de archivos, ve a la carpeta del sitio en Local, normalmente:
   `Documentos\Local Sites\nimasnimano\app\public\wp-content\themes\`
2. Copia dentro la carpeta `wordpress-theme/ni-mas-ni-mano` de este repo (la carpeta entera, con `style.css`, `functions.php`, etc. dentro).
3. En wp-admin → **Apariencia → Temas**, activa "NI MÁS NI MANO".

## 3. Crear las páginas fijas

En **Páginas → Añadir nueva**, crea estas dos páginas (el slug/URL debe quedar exactamente así — WordPress lo genera solo a partir del título si no lo tocas):

### Página "Sobre la organización" (slug: `sobre-la-organizacion`)
- **Plantilla** (panel derecho → Atributos de página): "Sobre la organización".
- **Imagen destacada**: la foto de Regina.
- **Extracto** (actívalo si no lo ves: menú "⋮" arriba a la derecha del editor → Preferencias → Panel → activa "Extracto"): pega este texto corto, es el que se ve en la portada:
  > Nací con agenesia, una malformación congénita en mi mano derecha — pero lo que se define como ausencia, para mí solo es una diferencia. En lugar de ver que me falta una mano, siempre he visto que tenía una mano más pequeña. Esa actitud define cómo me tomo la discapacidad, y la vida. Pero el mundo todavía no está preparado.
- **Contenido** (el cuerpo de la página, con bloques de párrafo normales): pega estos párrafos, uno por bloque:
  1. (el mismo párrafo del extracto de arriba)
  2. Por eso en 2021 creo NI MÁS NI MANO, un proyecto que nació de la necesidad de contarle al mundo que las personas con discapacidad no somos ni más ni menos que nadie. A través de las redes sociales, y fuera de ellas, muestro una realidad que no se suele ver y que existe, comparto mi experiencia como mujer con una extremidad diferente para visibilizar la discapacidad desde la naturalidad, con un poco de humor, y con mucha verdad, reivindicando el derecho a mostrarnos tal y como somos y a seguir ocupando espacios que también nos pertenecen.
  3. Lo que empezó siendo solo un proyecto, ha pasado a ser una realidad. Como activista, divulgadora y Terapeuta Ocupacional he llevado todo esto a la acción trabajando día a día en crear impacto, y lo hago acercándome a las aulas, a las pantallas, a las pasarelas, a las calles, a diferentes espacios en todos los ámbitos; a través de proyectos, entidades, marcas o iniciativas que también ponen la mirada en la diversidad, y logrando que se unan quienes antes no lo hacían. Rompiendo barreras, cambiando miradas, ocupando espacios. Porque no somos ni más, ni menos.
  4. NI MÁS NI MANO tiene como objetivo ser. Somos muchas las personas que crecimos sin referentes, sin tener a nadie en quien mirarnos, y me propuse cambiar esto. Esta comunidad comenzó a formarse en Valencia, encontrándonos y reuniéndonos personas de todas las edades, familias y amistades. Ahora pretende extenderse, crear una red de personas en muchas partes y compartir mucho tiempo, experiencias y vida.
  5. Ahora ya no faltan referentes porque somos mucha gente, y necesitamos seguir siendo, seguir construyendo una comunidad cada vez más fuerte. No se trata solo de estar conectados, es también darnos la mano.
  6. Esto es solo una parte. Cada paso cuenta. Queda mucho todavía por hacer, y yo no pienso parar.
  7. ¡Seguimos nadando!
  8. Añade un bloque de "Encabezado" (H2) con el texto "Misión y visión", y debajo dos párrafos:
     - Misión: Construir una comunidad sólida y unida para personas con extremidades diferentes y sus familias, proporcionando una red de apoyo que transforme la soledad en pertenencia. Visibilizamos esta realidad, ocupamos espacios públicos y defendemos los derechos del colectivo bajo una mirada anticapacitista y de respeto.
     - Visión: Ser el referente nacional indiscutible sobre extremidades diferentes en España: un agente clave que impulsa un cambio social real, elimina miedos y prejuicios, y garantiza que ninguna persona con esta condición crezca sin los referentes que necesita para caminar con seguridad.

### Página "Extremidades diferentes" (slug: `extremidades-diferentes`)
- **Plantilla**: "Extremidades diferentes".
- **Contenido**:
  1. "Extremidades diferentes" es el término que se utiliza para dar nombre a las diferentes condiciones que, como personas con discapacidad, tenemos en relación a nuestras extremidades. Cuando hablamos de extremidades diferentes no diferenciamos un diagnóstico, sino que reunimos ante esta terminología las muchas formas de extremidades que se dan, de muchas maneras, y que se acogen ante esta palabra con el propósito de aportar unión y comunidad.
  2. Podemos hablar de personas amputadas o con malformaciones congénitas, en las extremidades superiores o en las inferiores, con prótesis o sin ellas, y aunque no haya dos realidades iguales todas van unidas por algo que nadie más comparte, y el término "extremidades diferentes" recoge todas las vivencias para dar sentido y pertenencia, colectivizando a una gran comunidad de personas dentro de la discapacidad.
  3. Encabezado H2: "¿Qué es la agenesia?"
  4. La agenesia es conocida como la "ausencia" de un órgano o parte de él, una malformación de origen congénito. También se define como "desarrollo defectuoso". Hablando de extremidades diferentes, la agenesia se presenta cuando no se ha terminado de formar una extremidad o parte de ella, por ejemplo: la mano. Este es el caso más común.
  5. Definir como ausente algo que solo es diferente no es real. Hay muchas manos muy distintas, de muchas formas, de diferentes maneras. Dentro de las extremidades diferentes no solo está la agenesia — sindactilia, braquidactilia… — hay muchas condiciones, todas igual de válidas.

## 4. Configurar "Ajustes → Lectura"

No hace falta tocar nada: `front-page.php` se usa automáticamente como portada.

## 5. Crear el contenido de los 3 tipos de contenido nuevos

En el menú lateral de wp-admin verás **Eventos**, **Referentes** y **Prensa**.

### Referentes → Añadir nuevo (crea estos 2)
1. Título: `Nidia` — Imagen destacada: `nidia.jpeg` — Contenido: `"¿Porqué no tienes mano? Ella siempre dice levantando el muñón 'sí que tengo, está aquí, ¿o no la ves? Es pequeñita pero se ve.'"` — Campo "Firma / atribución": `— Nidia, madre de Keyra`
2. Título: `Mauro` — Imagen destacada: `mauro.jpeg` — Contenido: `"Cuando era más pequeño pensaba que algún día mi mano crecería. Creía que solo tardaba un poco más que la otra. Pero cuando conocí y vi a otros niños como yo, entendí que mi mano era diferente, y que eso estaba bien. Dejé de sentirme raro y descubrí que no estaba solo. También aprendí que hay muchas maneras de hacer las cosas con una mano, y que todas son igual de válidas. Mi mano no me impide jugar, aprender, divertirme ni soñar en grande."` — Campo "Firma / atribución": `— Mauro, 9 años`

(`nidia.jpeg` y `mauro.jpeg` están en la raíz de este repo, en `C:\webs\ni-mas-ni-mano\`.)

### Prensa → Añadir nuevo (crea estos 2)
1. Título: `Premio Nacional de Juventud 2024` — Campo "Estado": `Próximamente`
2. Título: `080 Barcelona Fashion Week` — Campo "Estado": `Próximamente`

### Eventos → Añadir nuevo (crea estos 3)
1. Título: `Valencia` — Contenido/extracto: `NI MÁS NI MANO es una comunidad de personas, un espacio de encuentro, un lugar en el que ser.` — Campo "Fecha (texto)": `Junio/julio 2026`
2. Título: `Nueva ciudad` — Contenido/extracto: `Estamos preparando el próximo encuentro. Muy pronto anunciaremos dónde y cuándo.` — Campo "Fecha (texto)": `2026`
3. Título: `Tu ciudad` — Contenido/extracto: `¿Quieres traer un encuentro de NI MÁS NI MANO a tu ciudad? Escríbenos y lo hacemos posible juntas.` — Campo "Fecha (texto)": `Próximamente`

Los tres se pueden dejar sin imagen destacada: el tema pone automáticamente una ilustración de color de fondo.

## 6. El formulario "Únete"

Sigue usando Formspree, igual que en el sitio estático. En `front-page.php`, busca la línea:
```
<form id="joinForm" action="https://formspree.io/f/TU_FORM_ID" method="POST">
```
y cambia `TU_FORM_ID` por tu ID real de Formspree (o pide que te lo actualice quien te ayudó con el sitio estático — es el mismo formulario).

## Listo

Con esto la portada, "Sobre la organización", "Extremidades diferentes" y "Eventos" deberían verse igual que el sitio estático actual, pero editables desde el panel de WordPress.
