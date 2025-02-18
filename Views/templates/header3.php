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
define('TITLE_PAGE', $data[0]['title_page']);

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

<?php include 'Views/templates/css/header3_style.php'; ?>
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


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_PAGE; ?></title>
    <link rel="icon" href="<?php echo SERVERURL . FAVICON; ?>" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Cargar jQuery antes que cualquier script que lo necesite -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

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
    <div id="chatOverlay"></div>


    <!-- <button onclick="openChat()"
        class="border-0 shadow d-flex wppFixed justify-content-center align-items-center p-3 position-fixed z-3 rounded-circle"
        style="bottom: 20px; right: 20px; background-color: #5dc355; height: 50px; width: 50px;">
        <i class="bi bi-whatsapp text-white"></i>
    </button> -->
    <a href="https://wa.me/<?php echo formatPhoneNumber(TELEFONO); ?>" target="_blank"
        class="border-0 shadow d-flex wppFixed justify-content-center align-items-center p-3 position-fixed z-3 rounded-circle"
        style="bottom: 20px; right: 20px; background-color: #5dc355; height: 50px; width: 50px;">
        <i class="bi bi-whatsapp text-white"></i>
    </a>

    <div id="chatWindow" class="chat-window position-fixed rounded-3 p-0 shadow-lg"
        style="display: none; bottom: 80px; right: 20px; background-color: white; width: 300px;">
        <div class="chat-header text-white p-2 rounded-top px-4">
            <strong>Tu empresa</strong>
            <span class="close-chat float-right cursor-pointer" onclick="closeChat()">
                <i class="bi bi-x-lg text-white"></i>
            </span>
        </div>
        <div class="chat-body p-3" style="height: 200px; overflow-y: auto;">
            <p class="bg-white p-3 rounded-3">Hola, somos "Tu empresa".<br>¿En qué podemos ayudarte? 👋</p>
        </div>
        <div class="chat-footer d-flex align-items-center gap-2 p-2">
            <input style="font-family: 'Roboto Mono', monospace; font-size: 14px;" type="text" id="customerMessage"
                class="form-control w-100" placeholder="Escribe tu mensaje...">
            <button onclick="sendMessage()" class="btn text-white" style="background-color: #4BA783;">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </div>

    <nav class="navbar bg-white sticky-top shadow-sm py-1">
        <div class="container px-4 d-flex">

            <a class="navbar-brand" href="<?php echo $primera_seccion; ?>">
                <img style="width: 55px;" class="border rounded" src="<?php echo SERVERURL . LOGO_TIENDA; ?>"
                    alt="IMPORT SHOP">
            </a>

            <ul id="listaNav1" class="navbar-nav d-md-flex d-none  flex-row gap-4 ">
                <li class="nav-item">
                    <a class="nav-link texto-secondary" aria-current="page"
                        href="<?php echo $primera_seccion; ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="<?php echo $primera_seccion; ?>">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="<?php echo $primera_seccion; ?>">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="Categoria3">Productos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="Agendar_cita_p3">Agendar Cita</a>
                </li>

            </ul>
            <div>
                <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>

        

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div id="listaNav2" class="offcanvas-body p-4 d-flex flex-column">
                    <ul class="navbar-nav flex-row gap-4 d-flex flex-column mb-4">
                        <li class="nav-item">
                            <a class="nav-link texto-secondary active" aria-current="page"
                                href="<?php echo $primera_seccion; ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="<?php echo $primera_seccion; ?>">Quienes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="<?php echo $primera_seccion; ?>">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="<?php echo $primera_seccion; ?>">Testimonios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="Categoria3">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="Agendar_cita_p3">Agendar Cita</a>
                        </li>

                    </ul>

                    <!-- Botón para abrir otro modal -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbarForm" aria-controls="offcanvasNavbarForm">
                        Envianos tu consulta
                    </button>

                    <p class="text-center text-body-secondary mt-auto">&copy; <?php echo date('Y'); ?>
                        <?php echo NOMBRE_TIENDA; ?>
                    </p>
                </div>
            </div>


            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarForm"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Envianos tu consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-4 d-flex flex-column">
                    <button class="btn" style="width:fit-content;" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <i class="bi bi-arrow-left fs-3"></i>
                    </button>
                    <form id="consultaForm">
                        <div class="d-flex gap-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingName" placeholder="Nombre">
                                <label for="floatingName">Nombre <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingSurname" placeholder="Apellido">
                                <label for="floatingSurname">Apellido <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingPhone" placeholder="Teléfono">
                            <label for="floatingPhone">Teléfono <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail"
                                placeholder="Correo electrónico">
                            <label for="floatingEmail">Correo electrónico <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Deja tu comentario aquí" id="floatingTextarea"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea">Comentario (opcional)</label>
                        </div>
                        <div id="alertContainer"></div> <!-- Contenedor para alertas -->
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                    <p class="text-center text-body-secondary mt-auto">&copy; 2024 Company, Inc</p>

                </div>
            </div>

        </div>
    </nav>