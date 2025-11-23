 <!DOCTYPE html> 
<html lang="es"> 

<head>
  <meta charset="UTF-8">
  <meta name="descripcion" content="Pagina inicial de bienvenida de la web con resumen de informativo."> 
  <title>Terminal de Transporte</title>
   <!-- Enlace a archivos /CSS -->
    <?php include 'funciones.php'; 
          cargar_links();
    ?>
</head>
<!-- Cuerpo de la pagina, aqui de estructura todo -->
<body>
    <!-- menu de navegacion, al principio de la pagina -->
    <div id="Nav"><?php cargar_navegador(); ?></div>

    <!-- Titulo H1 contexto principal de la pagina -->
    <div style="text-align: center;"><h1>Cootrans La Vega – Transporte seguro en Caldas con rutas y horarios actualizados</h1> </div>


  <!-- Seccion inicial donde se presentan imagenes -->  
  <section class="contenedor">

    <!-- imagenen de carretera de supia con nombre de la empresa -->
    <div class="imagen_text">
      <img src="Img/Ilustracion5.jpg" alt="carretera de entrada al municipio de supia">
      <div class="Texto">Cootrans La Vega</div>

    <!-- imagen carretera de supia con mensaje llamativo -->
    </div>
    <div class="imagen-simple">
      <img src="Img/Ilustracion6.jpg" alt="carretera de salida del municipio de supia">
    <div class="Texto">Transporte seguro en Caldas</div> 
    </div>
  </section>

<!-- Seccion de tarjetas con informacion basica -->
<section class="contenido_uno">
  <h1>Servicios de transporte en Caldas: compra de tiquetes, rutas nacionales y horarios confiables</h1>
  <div class="contenedor-tarjetas">
    <div class="tarjeta">Rutas de buses en Caldas y destinos nacionales: transporte Supía – Manizales, Supía – Medellín, y más.</div>
    <div class="tarjeta">Horarios de buses en tiempo real: consulta itinerarios actualizados para tus viajes en Caldas.</div>
    <div class="tarjeta">Contacto Cootrans La Vega: atención al cliente de transporte en Caldas y rutas nacionales.</div>
    <div class="tarjeta">Contenido adicional que enriquece y mejora tu experiencia.</div>
    <div class="tarjeta">Soporte de atención al cliente para resolver tus dudas.</div>
    <div class="tarjeta">Noticias de transporte en Colombia: estado de las vías y actualizaciones de rutas en Caldas.</div>
  </div>

<!-- Parrafo final con texto en diferente contenedor -->
  <div class="parrafos-finales">
    <p>Cootrans La Vega: experiencia en transporte de pasajeros en Caldas y rutas nacionales seguras.</p> 
    <p>Explora Cootrans La Vega: compra tus tiquetes en línea y consulta rutas y horarios de transporte en Caldas</p>
  </div>
</section>

    <!-- Pie de pagina -->
    <?php cargar_footer(); ?>
</body>
</html>