<?php
// Detectamos el nombre del archivo actual
$paginaActual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortalU - Sistema de Aspirantes</title>
    
    <!-- Google Fonts: Tipografía Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Estilos Personalizados: Colores y Tipografía -->
    <style>
        :root {
            /* 🎨 Cambia los colores a tu gusto aquí */
            --color-principal: #4f46e5;       /* Azul índigo / Morado moderno */
            --color-principal-hover: #4338ca; /* Estado hover del botón */
            --color-exito: #059669;           /* Verde esmeralda para el banner de éxito */
            --color-fondo: #f8fafc;           /* Fondo gris/azul muy suave */
            --color-texto: #0f172a;           /* Texto oscuro de alto contraste */
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: var(--color-fondo) !important;
            color: var(--color-texto);
        }

        /* Personalización de la barra superior */
        .navbar-custom {
            background-color: var(--color-principal) !important;
        }

        /* Personalización de botones principales */
        .btn-primary {
            background-color: var(--color-principal) !important;
            border-color: var(--color-principal) !important;
            border-radius: 8px;
            padding: 10px 20px;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: var(--color-principal-hover) !important;
            border-color: var(--color-principal-hover) !important;
            transform: translateY(-1px);
        }

        /* Personalización del banner de éxito en procesar.php */
        .bg-success-custom {
            background-color: var(--color-exito) !important;
        }

        /* Bordes suavemente redondeados en tarjetas e insumos */
        .card, .form-control, .form-select {
            border-radius: 12px !important;
        }

        .form-control:focus {
            border-color: var(--color-principal);
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="index.php">
                    <i class="bi bi-mortarboard-fill me-2"></i>PortalU
                </a>
            </div>
        </nav>

        <!-- Breadcrumb Dinámico -->
        <div class="bg-white border-bottom py-2">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 small">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none" style="color: var(--color-principal);">Inicio</a></li>
                        
                        <?php if ($paginaActual == 'procesar.php'): ?>
                            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none" style="color: var(--color-principal);">Registro</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Procesando Datos</li>
                        <?php else: ?>
                            <li class="breadcrumb-item active" aria-current="page">Registro de Aspirante</li>
                        <?php endif; ?>
                    </ol>
                </nav>
            </div>
        </div>
    </header>