<!DOCTYPE html> 
<html lang="es"> 

<head>
    <meta charset="UTF-8"> 
    <title>Sobre nosotros</title>
   <!-- Enlace a archivos /CSS -->
    <?php include 'funciones.php'; 
          cargar_links();
    ?>
</head>

<body>
    <?php cargar_navegador(); ?>

    <div class="contenido_dos">
        <p>CONOCE UN POCO SOBRE NOSOTROS</p>
    </div>

    <div class="caja1">
        <div class="mensaje1">
            <h2>Misión</h2>
            <p>Ofrecer un servicio de transporte público de alta calidad e incluyente, salvaguardando la integridad de cada uno de los pasajeros con un servicio eficiente, soportado por un equipo humano competente y comprometido, con el objetivo de generar beneficios a nuestros usuarios, colaboradores y asociados de la Cooperativa.</p>
        </div>
            <div class="imagen_D">
            <img src="Img/Ilustracion1.jpg" alt="Imagen representativa">
        </div>
    </div>
<br>
    <div class="caja1">
        <div class="mensaje1">
            <h2>Visión</h2>
            <p>Para 2028, la Cooperativa Multiactiva de Transportadores La Vega Ltda. será reconocida como un referente en la alta calidad en la prestación del servicio de transporte público, aportando al mejoramiento de la calidad de vida de nuestros usuarios y colaboradores, así como en la movilidad del municipio de Supía y sus alrededores, con una eficiencia operacional sostenible y responsable.</p>
        </div>
            <div class="imagen_D">
            <img src="Img/Ilustracion2.jpg" alt="Imagen representativa">
        </div>
    </div>

    <div class="contenido_dos">
        <p>UBICANOS PARA OBTENER INFORMACIÓN MÁS EXACTA</p>
    </div>

    <div class="contenido_uno">
        <div>
            <h2>Dirección:</h2>
            <p>Calle 123 #45-67, Supía, Caldas</p>
            <p>En frente de la panadería "El Buen Pan"</p>
        </div>

        <div>
            <h2>Socios Empresariales:</h2>
            <p>Agroindustria de caldas:</p>
            <p>Por compras mayores a $100.000 recibes un descuento del 10% en cualquier viaje.</p>
            <p>Motobombas del Supia:</p>
            <p>Por compras mayores a $150.000 recibes un descuento del 15% en cualquier viaje.</p>
            <p>Finca el gran mirador:</p>
            <p>Por cada viaje realizado, se acumula un punto. Al alcanzar 10 puntos, recibes un hospedaje gratis.</p>
        </div>
    </div>

    <section class="form">
    <h2 class="titulo">¡CONTÁCTANOS!</h2>
    <form class="formulario" method="POST" >
      <div class="grupo">
        <input type="text" id="name" name="name" placeholder="Nombre Completo">
       </div>
      <div class="grupo">        
        <input type="email" id="email" name="email" placeholder="correo Electronico">
      </div>
      <div class="grupo">        
        <input type="tel" id="phone" name="phone" placeholder="Numero Telefonico o celular">
      </div>
      <div class="grupo">
        <textarea id="message" name="message" placeholder="Dejanos tus inquietudes o comentarios aquí"></textarea>
      </div>
      <input type="submit" name="Enviar" class="boton" value="Enviar">
    </form>
    <?php guardar_comentario() ?>
  </section>

    <?php cargar_footer(); ?>
</body>
</html>