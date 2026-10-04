<?php
include 'includes/header.php';

$errores = [];
$datosProcesados = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Recepción y Saneamiento
    $nombreBruto = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidoBruto = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $identificacionBruto = isset($_POST['identificacion']) ? $_POST['identificacion'] : '';
    $fechaNacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';

    // Saneamiento inicial
    $nombreSanitizado = htmlspecialchars(strip_tags(trim($nombreBruto)));
    $apellidoSanitizado = htmlspecialchars(strip_tags(trim($apellidoBruto)));
    $identificacionSanitizada = htmlspecialchars(strip_tags(trim($identificacionBruto)));

    // 2. Normalización
    $nombre = ucwords(strtolower($nombreSanitizado));
    $apellido = ucwords(strtolower($apellidoSanitizado));
    $identificacion = strtoupper($identificacionSanitizada);

    // Validar campos requeridos
    if (empty($nombre) || empty($apellido) || empty($identificacion) || empty($fechaNacimiento) || empty($sexo)) {
        $errores[] = "Todos los campos del formulario son obligatorios.";
    }

    // 3. Validación y Cálculo de Edad (18 - 70 años)
    if (!empty($fechaNacimiento)) {
        $fechaNac = new DateTime($fechaNacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($fechaNac)->y;

        if ($edad < 18 || $edad > 70) {
            $errores[] = "La edad del aspirante debe estar entre 18 y 70 años. Edad calculada: <strong>{$edad} años</strong>.";
        }
    }

    // 4. Subida Segura de Imagen
    $destPath = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileExtension, $allowedExtensions)) {
            // 🔧 CORRECCIÓN 1: Se quitó el "./" inicial para asegurar una ruta web limpia
            $directorioDestino = 'uploaded_files/';

            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0755, true);
            }

            $nombreLimpioArchivo = preg_replace("/[^a-zA-Z0-9.-]/", "_", pathinfo($fileName, PATHINFO_FILENAME));
            $nombreFotoGuardada = time() . '_' . $nombreLimpioArchivo . '.' . $fileExtension;
            $destPath = $directorioDestino . $nombreFotoGuardada;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // 🔧 CORRECCIÓN 2: Asignar permisos 0644 para garantizar que el servidor pueda mostrar la imagen en la web
                chmod($destPath, 0644);
            } else {
                $errores[] = "Ocurrió un error al mover la foto a la carpeta de destino.";
            }
        } else {
            $errores[] = "Formato de imagen no permitido. Solo se aceptan: png, jpg, jpeg, gif, webp.";
        }
    } else {
        $errores[] = "Es obligatorio adjuntar una fotografía del aspirante.";
    }

    // Consolidar datos si no existen errores
    if (empty($errores)) {
        $datosProcesados = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'identificacion' => $identificacion,
            'fecha_nacimiento' => $fechaNacimiento,
            'edad' => $edad,
            'sexo' => htmlspecialchars($sexo),
            // 🔧 CORRECCIÓN 3: Usar directamente la variable $destPath
            'foto' => $destPath
        ];
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<main class="flex-grow-1 py-5">
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                
                <?php if (!empty($errores)): ?>
                    <!-- Pantalla de Error -->
                    <div class="alert alert-danger shadow-sm border-0 rounded-3 p-4 mb-4">
                        <h4 class="alert-heading fw-bold mb-3">No se pudo procesar el registro</h4>
                        <ul class="mb-3">
                            <?php foreach ($errores as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <hr>
                        <a href="javascript:history.back()" class="btn btn-outline-danger btn-sm fw-semibold">
                            Volver al formulario
                        </a>
                    </div>

                <?php elseif ($datosProcesados): ?>
                    <!-- Ficha del Aspirante Registrado -->
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-success text-white py-3">
                            <h4 class="card-title mb-0 fw-bold text-center">¡Aspirante Registrado Con Éxito!</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                
                                <div class="col-md-5 text-center mb-3 mb-md-0">
                                    <img src="<?php echo $datosProcesados['foto']; ?>" 
                                         alt="Fotografía de <?php echo $datosProcesados['nombre']; ?>" 
                                         class="img-fluid rounded-3 shadow border" 
                                         style="max-height: 250px; object-fit: cover;">
                                </div>

                                <div class="col-md-7">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            <span class="text-muted small d-block">Nombre Completo:</span>
                                            <strong class="fs-5"><?php echo $datosProcesados['nombre'] . ' ' . $datosProcesados['apellido']; ?></strong>
                                        </li>
                                        <li class="list-group-item px-0">
                                            <span class="text-muted small d-block">Identificación / Cédula:</span>
                                            <strong><?php echo $datosProcesados['identificacion']; ?></strong>
                                        </li>
                                        <li class="list-group-item px-0">
                                            <span class="text-muted small d-block">Edad Calculada:</span>
                                            <strong><?php echo $datosProcesados['edad']; ?> años</strong>
                                        </li>
                                        <li class="list-group-item px-0">
                                            <span class="text-muted small d-block">Sexo:</span>
                                            <strong><?php echo $datosProcesados['sexo']; ?></strong>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer bg-light text-center py-3">
                            <a href="index.php" class="btn btn-primary fw-semibold">Registrar Nuevo Aspirante</a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>