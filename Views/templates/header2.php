<?php
session_start();

// Oculta los errores en producción
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // Cambiar a 0 para desactivar la visualización de errores por completo
// Fin Oculta los errores en producción

// Inicializa cURL para la primera API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SERVERURL . 'Tienda/obtener_informacion_tienda');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['id_plataforma' => ID_PLATAFORMA]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecuta la solicitud y obtiene la respuesta
$response = curl_exec($ch);
curl_close($ch);

// Verifica si se obtuvo una respuesta
if ($response === false) {
    die('Error al obtener la información de la tienda.');
}

// Decodifica la respuesta JSON
$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error al decodificar la respuesta JSON: ' . json_last_error_msg());
}

// Define las constantes basadas en la respuesta de la primera API
define('NOMBRE_TIENDA', $data[0]['nombre_tienda']);
define('FAVICON', $data[0]['favicon']);
define('LOGO_TIENDA', $data[0]['logo_url']);
define('FACEBOOK', $data[0]['facebook']);
define('INSTRAGRAM', $data[0]['instagram']);
define('TIKTOK', $data[0]['tiktok']);
define('TELEFONO', $data[0]['whatsapp']);

// Inicializa cURL consulta de api plantilla2
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SERVERURL . 'Tienda/obtener_ofertas_plantilla2'); // Cambia esta URL según la API que necesites
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['id_plataforma' => ID_PLATAFORMA])); // Cambia los parámetros según lo necesario
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecuta la solicitud y obtiene la respuesta
$response2 = curl_exec($ch);
curl_close($ch);

// Verifica si se obtuvo una respuesta
if ($response2 === false) {
    die('Error al obtener la información adicional.');
}

// Decodifica la respuesta JSON
$data2 = json_decode($response2, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error al decodificar la respuesta JSON: ' . json_last_error_msg());
}

// Define la constante adicional basada en la respuesta de la segunda API
define('COLOR_CABECERA', $data2[0]['color_cabecera']);
define('COLOR_TEXTO_CABECERA', $data2[0]['color_texto_cabecera']);
define('COLOR_HOVER_CABECERA', $data2[0]['color_hover_cabecera']);
define('COLOR_TEXTO_PRECIO', $data2[0]['color_texto_precio']);


/* constantes seccion ofertas */
define('TITULO_OFERTA1', $data2[0]['titulo_oferta1']);
define('OFERTA1', $data2[0]['oferta1']);
define('DESCRIPCION_OFERTA1', $data2[0]['descripcion_oferta1']);
define('TEXTO_BTN_OFERTA1', $data2[0]['texto_btn_oferta1']);
define('ENLACE_OFERTA1', $data2[0]['enlace_oferta1']);
define('COLOR_BTN_OFERTA1', $data2[0]['color_btn_oferta1']);
define('COLOR_TEXTO_OFERTA1', $data2[0]['color_texto_oferta1']);
define('COLOR_TEXTOBTN_OFERTA1', $data2[0]['color_textoBtn_oferta1']);
define('IMAGEN_OFERTA1', $data2[0]['imagen_oferta1']);
define('TITULO_OFERTA2', $data2[0]['titulo_oferta2']);
define('OFERTA2', $data2[0]['oferta2']);
define('DESCRIPCION_OFERTA2', $data2[0]['descripcion_oferta2']);
define('TEXTO_BTN_OFERTA2', $data2[0]['texto_btn_oferta2']);
define('ENLACE_OFERTA2', $data2[0]['enlace_oferta2']);
define('COLOR_BTN_OFERTA2', $data2[0]['color_btn_oferta2']);
define('COLOR_TEXTO_OFERTA2', $data2[0]['color_texto_oferta2']);
define('COLOR_TEXTOBTN_OFERTA2', $data2[0]['color_textoBtn_oferta2']);
define('IMAGEN_OFERTA2', $data2[0]['imagen_oferta2']);
/* fin contrantes seccion ofertas */

/* promocion */
define('TITULO_PROMOCION', $data2[0]['titulo_promocion']);
define('PRECIO_PROMOCION', $data2[0]['precio_promocion']);
define('DESCRIPCION_PROMOCION', $data2[0]['descripcion_promocion']);
define('TEXTO_BTN_PROMOCION', $data2[0]['texto_btn_promocion']);
define('ENLACE_BTN_PROMOCION', $data2[0]['enlace_btn_promocion']);
define('COLOR_BTN_PROMOCION', $data2[0]['color_btn_promocion']);
define('COLOR_FONDO_PROMOCION', $data2[0]['color_fondo_promocion']);
define('COLOR_LETRA_PROMOCION', $data2[0]['color_letra_promocion']);
define('COLOR_LETRABTN_PROMOCION', $data2[0]['color_letraBtn_promocion']);
define('IMAGEN_PROMOCION', $data2[0]['imagen_promocion']);
/* fin promocion */

?>

<?php include 'Views/templates/css/header2_style.php'; ?>
<script>
    const SERVERURL = "<?php echo SERVERURL ?>";
    const MARCA = "<?php echo MARCA ?>";
    const ID_PLATAFORMA = "<?php echo ID_PLATAFORMA ?>";
</script>

<?php
function obtenerPrimeraSeccion()
{
    // Obtener el esquema (http o https)
    $esquema = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';

    // Obtener el host (dominio)
    $host = $_SERVER['HTTP_HOST'];

    // Construir la primera sección de la URL
    $primera_seccion = $esquema . '://' . $host;

    return $primera_seccion;
}

function formatPhoneNumber($number)
{
    // Eliminar caracteres no numéricos excepto el signo +
    $number = preg_replace('/[^\d+]/', '', $number);

    // Verificar si el número ya tiene el código de país +593
    if (!preg_match('/^\+593/', $number)) {
        // Si el número comienza con 0, quitarlo
        if (strpos($number, '0') === 0) {
            $number = substr($number, 1);
        }
        // Agregar el código de país +593 al inicio del número
        $number = '+593' . $number;
    }

    return $number;
}

// Obtener la primera sección de la URL
$primera_seccion = obtenerPrimeraSeccion();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOMBRE_TIENDA; ?></title>
    <link rel="icon" href="<?php echo SERVERURL . FAVICON; ?>" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Cargar jQuery antes que cualquier script que lo necesite -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Enlazar CSS de Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Enlazar JS de Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
    setTimeout(() => {
      const overlay = document.getElementById('loadingOverlay');
      overlay.style.display = 'none';
    }, 2500); 
  </script>



<style>
    /* Estilos del overlay */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.95); /* Fondo blanco con transparencia */
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 10000; /* Mantiene el overlay por encima de otros elementos */
    }

    
  </style>
</head>

<?php require_once './Views/Producto/Modales/checkout_carrito.php'; ?>

<body>
<div id="loadingOverlay" class="overlay">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-custom">
            <div class="container">
                <a class="navbar-brand" href="<?php echo $primera_seccion; ?>" style="color:<?php echo COLOR_TEXTO_CABECERA; ?>;"><?php echo NOMBRE_TIENDA; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <form class="d-flex me-auto mb-0">
                        <input class="form-control me-2" id="buscar_input" type="search" placeholder="Buscar..." aria-label="Search">
                        <button class="btn buscar" type="submit">Buscar</button>
                    </form>
                    <!-- Icono del carrito en el header -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link d-flex" href="#" id="cartDropdown" role="button">
                                <i class='bx bx-cart-download menu-icon' style="color:<?php echo COLOR_TEXTO_CABECERA; ?> !important;"></i>
                                <span class="badge bg-primary" style="background-color: <?php echo COLOR_HOVER_CABECERA; ?> !important; color:<?php echo COLOR_TEXTO_CABECERA; ?> !important;" id="cantidad_carrito">0</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Panel deslizante para mostrar el carrito -->
                    <div id="cartSidebar" class="cart-sidebar">
                        <div class="cart-sidebar-header">
                            <h3>Tu Carrito</h3>
                            <button id="closeCart" class="close-btn">&times;</button>
                        </div>
                        <div id="cartContent" class="cart-sidebar-content">
                            <p>No hay productos en el carrito.</p>
                        </div>

                    </div>

                    <!-- Fondo oscuro cuando el panel está abierto -->
                    <div id="cartOverlay" class="cart-overlay"></div>

                </div>
            </div>
        </nav>
        <!-- Sub-Nav -->
        <div class="navbar navbar-expand-lg sub-nav bg-custom">
            <div class="container">
                <div class="collapse navbar-collapse" id="subNavbar">
                    <ul class="navbar-nav justify-content-center flex-lg-row flex-column w-100" id="categories-menu">
                        <!-- Categorías dinámicas se cargarán aquí -->
                    </ul>
                </div>
            </div>
        </div>
    </header>