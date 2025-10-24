<!DOCTYPE html> 
<html lang="es"> 

<head>
  <meta charset="UTF-8"> 
  <title>Rutas y Horarios</title>
   <!-- Enlace a archivos /CSS -->
<?php include 'funciones.php'; 
          cargar_links();
    ?>
</head>

<body>
    <?php cargar_navegador(); ?>

    <div class="contenido_dos">
        <p>En esta sección, podrás encontrar información detallada sobre las rutas y horarios de nuestros servicios de transporte.</p>
        <p>Te invitamos a explorar y descubrir la mejor manera de viajar con nosotros.</p>
    </div>

    <section class="contenedor">
        <div class="imagen_text">
            <img src="Img/Ilustracion3.jpg">
            <div class="Texto">Rutas y horarios de transporte Cootrans La Vega!</div>
        </div>
        <div class="imagen-simple">
            <img src="Img/Ilustracion4.jpg">
        </div>
    </section>

    <div class="contenido_uno"> 
      <h2>Horarios de atención al publico:</h2>
      <table>
        <thead>
          <tr>
            <th>AREA ADMINISTRATIVA</th>
            <th>AREA OPERATIVA</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th>Lunes a Viernes:</th>
                <th>Lunes a Domingo:</th>
            </tr>
            <tr>
                <td>7:00AM - 5:30PM</td>
                <td>6:30AM - 9:00PM</td>
            </tr>
            <tr>
                <th>Sábados y Festivos:</th>
                <th>Atencion por personal de turno:</th>
            </tr>
            <tr>
                <td>7:30AM - 12:00PM</td>
                <td>Tel: 123-456-7890</td>
            </tr>
            <tr>
                <td>Tel: 612-355-6889</td>
                <td>Tel: 302-456-4567</td>
            </tr>            
      </table>
    </div>
  
    <div class="contenido_dos">
        <p>RUTAS DISPONIBLES A LA FECHA</p>
    </div>

    <div class="ruta">
        <table>
            <thead>
                <tr>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Vehiculo</th>
                    <th>Paradas</th>
                    <th>Hora salida</th>
                    <th>Tiempo Estimado</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
              <?php mostrar_rutas(); ?>
            </tbody>
        </table>
    </div>

    
    <?php cargar_footer(); ?>
</body>
</html>