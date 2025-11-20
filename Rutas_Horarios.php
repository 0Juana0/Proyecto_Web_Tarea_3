<!DOCTYPE html> 
<html lang="es"> 

<head>
  <meta charset="UTF-8">
  <meta name="descripcion" content="Pagina con las rutas y horarios, accede a la base de datos para visualizar rutas."> 
  <title>Rutas y Horarios</title>
   <!-- Enlace a archivos /CSS -->
<?php include 'funciones.php'; 
          cargar_links();
    ?>
</head>

<body>
    <div id="Nav"><?php cargar_navegador(); ?></div>

    <div style="text-align: center;"><h1>Rutas y horarios de buses en Caldas – Supía, Manizales, Medellín y más destinos</h1> </div>

    <section class="contenedor">
        <div class="imagen_text">
            <img src="Img/Ilustracion3.jpg" alt="Iglesia del parque principal de supia caldas">
            <div class="Texto">Rutas y horarios de transporte en Caldas</div>
        </div>
        <div class="imagen-simple">
            <img src="Img/Ilustracion4.jpg" alt="vista aerea del municipio de supia caldas">
            <div class="Texto">Cootrans La Vega</div>            
        </div>
    </section>

    <div class="contenido_dos">
        <p>Consulta horarios de buses y rutas de transporte en Caldas con Cootrans La Vega.</p>
        <p>Compra tiquetes en línea y viaja seguro.</p>
    </div>

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
        <h2>Rutas disponibles a la fecha</h2>
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
        <div class="contenido_dos"><a href="reservas.php"> <h3>💳Ir a compra</h3></a></div>
    </div>
    

    
    <?php cargar_footer(); ?>
</body>
</html>