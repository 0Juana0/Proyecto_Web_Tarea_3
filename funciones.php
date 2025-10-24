<?php

    function cargar_links() {
        echo '
        <link rel="stylesheet" href="css/Global.css">
        <link rel="stylesheet" href="css/Header.css">
        <link rel="stylesheet" href="css/Ilustraciones.css">
        <link rel="stylesheet" href="css/Footer.css">
        <link rel="stylesheet" href="css/Parrafos.css">
        <link rel="stylesheet" href="css/Formulario.css">
        <link rel="stylesheet" href="css/Mision_Vision.css">
        <link rel="stylesheet" href="css/Rutas.css">
        <link rel="icon" href="img/Logo_CootransLaVega.png">
        ';
    }

    function cargar_navegador() {

        echo '
        <header>  
            <nav>
            <ul id="menu_nav">
                <li><img id="logo" src="img/Logo_CootransLaVega.png" alt="Logo Cootrans La Vega"></li>
                <li><a href="Index.php">Inicio</a></li>
                <li><a href="Rutas_Horarios.php">Rutas y horarios</a></li>
                <li><a href="Contacto.php">Sobre nosotros</a></li>
                <li><a href="reservas.php">Compras</a></li>
            </ul>
            </nav>
        </header>
        ';
    }

    function cargar_footer() {
        echo '
        <footer>
            <p>© 2025 Cootrans La Vega. Todos los derechos reservados.</p>
            <p>Dirección: Calle 123 #45-67, Supía, Caldas</p>
            <p>Para más información, contáctanos a través de nuestro formulario.</p>
            <a href="https://cootranslavega.com/">Visítanos</a>
        </footer>
        ';
    }

    function guardar_comentario(){
        $conexion = mysqli_connect("localhost","root","12345678","registro_web");

        if(isset($_POST['Enviar'])){

                if(strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['phone']) >= 1 && strlen($_POST['message']) >= 1){
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $phone = trim($_POST['phone']);
                $message = trim($_POST['message']);
                $fecha = date('Y-m-d');

                $query = "INSERT INTO comentarios (nombre, correo, telefono, comentario, fecha) VALUES ('$name', '$email', '$phone', '$message', '$fecha')";
                $result = mysqli_query($conexion, $query);
                if($result){
                    echo "<p>Comentario guardado exitosamente.</p>";
                } else {
                    echo "<p>Error al guardar el comentario.</p>";
                }
            }else{
                echo "<p>Por favor complete todos los campos.</p>";
            }
        }
        mysqli_close($conexion);
    }

    function mostrar_rutas(){
        $conexion = mysqli_connect("localhost","root","12345678","registro_web");
        $query = "SELECT * FROM rutas";
        $result = mysqli_query($conexion, $query);
        if($result){
            while($row = $result->fetch_array()){
                $origen = $row['origen'];
                $destino = $row['destino'];
                $vehiculo = $row['vehiculo'];
                $paradas = $row['paradas'];
                $hora = $row['hora'];
                $tiempo = $row['tiempo'];
                $precio = $row['precio'];
                echo " <tr>
                        <td>$origen</td>
                        <td>$destino</td>
                        <td>$vehiculo</td>
                        <td>$paradas</td>
                        <td>$hora</td>
                        <td>$tiempo</td>
                        <td>$precio$</td>
                    </tr>";
            }
        }
    }

    function obtener_rutas_array() {
        $conexion = mysqli_connect("localhost","root","12345678","registro_web");
        if (!$conexion) {
            return [];
        }
        $query = "SELECT * FROM rutas";
        $result = mysqli_query($conexion, $query);
        $rutas = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rutas[] = $row;
            }
            mysqli_free_result($result);
        }
        mysqli_close($conexion);
        return $rutas;
    }
?>