<?php
include_once 'funciones.php';
$rutas = obtener_rutas_array();

// --- Configuración de la base de datos (ajusta valores) ---
$dbHost = 'localhost';
$dbName = 'registro_web';
$dbUser = 'root';
$dbPass = '12345678';
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Error conexión BD: " . htmlspecialchars($e->getMessage()));
}

// --- Procesamiento del formulario ---
$mensajes = [];
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura y saneamiento básico
    $nombre   = trim($_POST['nombre'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $ruta_id  = intval($_POST['ruta_id'] ?? 0);

    // Validaciones simples
    if ($nombre === '') $errores[] = 'El nombre es obligatorio.';
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = 'Correo inválido.';
    if ($telefono === '') $errores[] = 'El teléfono es obligatorio.';
    if ($ruta_id <= 0) $errores[] = 'Debe seleccionar una ruta válida.';

    if (count($errores) === 0) {
        try {
            // Obtener la ruta seleccionada de la tabla rutas (precio y existencia)
            $stmt = $pdo->prepare("SELECT id, precio FROM rutas WHERE id = :id LIMIT 1");
            $stmt->execute([':id' => $ruta_id]);
            $ruta = $stmt->fetch();

            if (!$ruta) {
                $errores[] = 'Ruta no encontrada.';
            } else {
                $precio = (float)$ruta['precio'];

                // Insertar la reserva (se guarda ruta_id como referencia)
                $insert = $pdo->prepare("
                    INSERT INTO reservas (nombre, email, telefono, ruta_id, precio)
                    VALUES (:nombre, :email, :telefono, :ruta_id, :precio)
                ");

                $insert->execute([
                    ':nombre'   => $nombre,
                    ':email'    => $email,
                    ':telefono' => $telefono,
                    ':ruta_id'  => $ruta_id,
                    ':precio'   => $precio,
                ]);

                $idReserva = $pdo->lastInsertId();
                $mensajes[] = "Reserva registrada correctamente. ID: " . $idReserva . ".";
                // Opcional: limpiar campos o redirigir a página de confirmación
            }
        } catch (Exception $e) {
            $errores[] = 'Error al guardar la reserva: ' . $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="descripcion" content="Pagina de compra y reservas diseñadas para extraer y almacenar informacion en la base de datos.">
  <title>Reserva de pasaje</title>
  <!-- Enlace a archivos /CSS -->
  <?php cargar_links(); ?>
</head>
<body>
  <div id="Nav"><?php cargar_navegador(); ?></div>

  <div style="text-align: center;"><h1>Compra de tiquetes en línea para rutas de transporte en Caldas y destinos nacionales</h1> </div>

  <section class="form">
    <h2 class="titulo">Formulario de reserva!</h2>

    <?php if (!empty($mensajes)): ?>
      <?php foreach ($mensajes as $m): ?>
        <div ><?php echo htmlspecialchars($m); ?></div>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($errores)): ?>
      <?php foreach ($errores as $err): ?>
        <div><?php echo htmlspecialchars($err); ?></div>
      <?php endforeach; ?>
    <?php endif; ?>

    <form class="formulario" id="reservaForm" method="post" novalidate>
      
      <input type="text" class="grupo" id="nombre" name="nombre" placeholder="Nombre Completo" required
             value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>"/>

      <input type="email" class="grupo" id="email" name="email" placeholder="Correo Electrónico"
             value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" />

      <input type="tel" class="grupo" id="telefono" name="telefono" placeholder="Número Telefónico" required
             value="<?php echo isset($telefono) ? htmlspecialchars($telefono) : ''; ?>" />

      <div class="grupo">
        <label for="rutaSelect"><strong>Selecciona la ruta</strong></label>
        <select id="rutaSelect" name="ruta_id" required>
          <option value="">-- Elija una ruta --</option>
          <?php foreach ($rutas as $fila): 
              $id = htmlspecialchars($fila['id'], ENT_QUOTES, 'UTF-8');
              $origen = htmlspecialchars($fila['origen'], ENT_QUOTES, 'UTF-8');
              $destino = htmlspecialchars($fila['destino'], ENT_QUOTES, 'UTF-8');
              $hora = htmlspecialchars($fila['hora'], ENT_QUOTES, 'UTF-8');
              $precio = htmlspecialchars($fila['precio'], ENT_QUOTES, 'UTF-8');
              $selected = (isset($ruta_id) && $ruta_id == $fila['id']) ? 'selected' : '';
          ?>
            <option value="<?php echo $id; ?>"
                    data-precio="<?php echo $precio; ?>" <?php echo $selected; ?>>
              <?php echo $origen . " → " . $destino . " — " . $hora; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div id="detalleRuta" class="tarjeta" aria-live="polite">
        <?php
          if (!empty($ruta_id) && isset($precio)) {
              echo "Precio: $" . number_format((float)$precio, 2);
          } else {
              echo "Seleccione una ruta para ver el precio";
          }
        ?>
      </div>

      <br>
      <input type="submit" class="boton" value="Enviar reserva" />
    </form>
  </section>

  <script defer src="js/recuadro.js"></script>

  <?php cargar_footer(); ?>
</body>
</html>
