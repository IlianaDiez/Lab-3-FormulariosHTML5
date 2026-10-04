# Laboratorio #3 Include - Formularios HTML5

**Instructor:** Irina Fong  
**Grupo:** 1S3122  

---

## 🛠️ Tecnología Utilizada
* **PHP 8.x:** Utilizado para la lógica del lado del servidor, recepción, saneamiento, normalización de datos y subida segura de archivos.
* **HTML5 & Bootstrap 5.3:** Utilizados para la maquetación semántica, diseño responsivo e interfaz de usuario moderna.
* **CSS3 & Google Fonts:** Incorporación de la tipografía *Plus Jakarta Sans* y variables CSS personalizadas (`--color-principal`, `--color-fondo`) para estilos modernos.
* **Apache / WampServer:** Servidor web local encargado del procesamiento de scripts PHP y la gestión de permisos del directorio.
* **Git & GitHub:** Control de versiones del proyecto e integración del repositorio.

---

## 📋 Información relevante del laboratorio
Durante el **Laboratorio #3 Include - Formularios HTML5** se desarrolló un **Sistema Modular de Registro de Aspirantes** sin hacer uso de bases de datos[cite: 8]. El proyecto demuestra el manejo seguro de formularios, subida y validación de archivos multimedia, normalización de cadenas, cálculo de fechas y segregación modular de vistas.

### 1. Arquitectura Modular e Inclusión de Archivos (`includes/header.php` y `includes/footer.php`)
- Se separaron el encabezado HTML, la navegación, las declaraciones CSS/Google Fonts y el pie de página en componentes modulares reutilizables mediante sentencias `include`.
- Se implementó un menú con **Breadcrumbs dinámicos** que detecta la página actual (`basename($_SERVER['PHP_SELF'])`) para guiar la navegación del usuario.
- El pie de página incluye la generación dinámica del año en curso con PHP (`date('Y')`).

### 2. Formulario de Registro de Aspirantes (`index.php`)
- Se construyó un formulario estructurado con tarjetas responsivas de Bootstrap 5.3.
- Se configuró el atributo `enctype="multipart/form-data"` para habilitar el envío seguro de archivos binarios al servidor.
- Incluye controles accesibles para selección de fecha, botones tipo *Radio* estilizados para la variable sexo y restricción de extensiones en el *input file*.

### 3. Procesamiento, Saneamiento y Validación Backend (`procesar.php`)
- **Saneamiento de Datos:** Uso de `strip_tags()`, `trim()` y `htmlspecialchars()` para prevenir inyecciones HTML y vulnerabilidades XSS.
- **Normalización de Cadenas:** Uso de `ucwords(strtolower())` para aplicar formato Tipo Título al nombre/apellido (ej. "milagro diez" ➔ "Milagro Diez") y `strtoupper()` para la cédula o identificación.
- **Cálculo de Edad Dinámico:** Evaluación de la fecha de nacimiento mediante la clase `DateTime` y la función `diff()`, asegurando que la edad calculada esté estrictamente en el rango de **18 a 70 años**.
- **Gestión Manejo de Errores:** En caso de inconsistencias, se muestra una pantalla de alerta enumerando todos los errores cometidos y un botón de retorno.

### 4. Almacenamiento Seguro de Fotografías (`uploaded_files/`)
- Se implementó la subida de imágenes permitiendo únicamente formatos seguros (`.jpg`, `.jpeg`, `.png`, `.gif`, `.webp`).
- Se sanitiza el nombre original del archivo asignándole un prefijo con marca de tiempo única (`time()`) para evitar colisiones o sobrescritura de archivos.
- Se asignan permisos explícitos de lectura pública (`chmod(0644)`) tras mover el archivo subido mediante `move_uploaded_file()`.

### 5. Protección con Servidor Web (`uploaded_files/.htaccess`)
- Se creó una directiva de seguridad en Apache 2.4 para prohibir la ejecución de archivos o scripts PHP potencialmente dañinos dentro del directorio de cargas mediante `<FilesMatch "\.(php|php5|phtml|php7)$"> Require all denied </FilesMatch>`.
- Se desactivó la navegación o listado abierto de directorios mediante `Options -Indexes`.

---

## ✅ Cumplimiento de lo solicitado
- Se realizó la inclusión modular mediante componentes reutilizables (`header.php` y `footer.php`).
- Se implementó la arquitectura completa sin uso de bases de datos persistentes.
- Se resolvieron y ajustaron los errores de ruta de servidor, bloqueos de permisos de imágenes y directivas desactualizadas de Apache (`Order allow,deny` actualizadas a `Require all denied`).
- La interfaz fue refinada con la paleta de colores personalizada Índigo/Morado (`#4f46e5`) e integración de Google Fonts.
- Se validaron todos los escenarios de bordes: mayores/menores de edad, fotos corruptas o no permitidas y campos obligatorios omitidos.

---

## 🎯 Conclusión
El laboratorio permitió reforzar los conocimientos de PHP y HTML5 mediante la creación de un sistema modular seguro. Se aplicaron buenas prácticas en la sanitización de entradas, inclusión modular de plantillas, cálculo de diferencias de fechas y la configuración de seguridad del servidor a través de `.htaccess` para proteger el sistema contra ataques de ejecución remota de código.

---

## 📁 Estructura del repositorio
Lab3-Include/
└── TallerAspirantes/
    ├── includes/
    │   ├── header.php
    │   └── footer.php
    ├── uploaded_files/
    │   └── .htaccess
    ├── index.php
    ├── procesar.php
    └── README.md
