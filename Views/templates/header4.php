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

<?php include 'Views/templates/css/header4_style.php'; ?>
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
    <title><?php echo NOMBRE_TIENDA; ?></title>
    <link rel="icon" href="<?php echo SERVERURL . FAVICON; ?>" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Cargar jQuery antes que cualquier script que lo necesite -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">

    <script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.min.js"></script>
    

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

</head>

<body class="">
    <div id="chatOverlay"></div>

    <button onclick="openChat()"
        class="border-0 shadow d-none d-md-flex wppFixed justify-content-center align-items-center p-3 position-fixed z-1 rounded-circle"
        style="bottom: 20px; right: 20px; background-color: #5dc355; height: 50px; width: 50px;">
        <i class="bi bi-whatsapp text-white"></i>
    </button>

    <div id="chatWindow" class="chat-window position-fixed rounded-3 p-0 shadow-lg"
        style="display: none; bottom: 80px; right: 20px; background-color: white; width: 300px;">
        <div class="chat-header text-white p-2 rounded-top px-4" style="background-color: #5dc355;">
            <strong>Tu empresa</strong>
            <span class="close-chat float-right cursor-pointer" onclick="closeChat()">
                <i class="bi bi-x-lg text-white"></i>
            </span>
        </div>
        <div class="chat-body p-3" style="height: 200px; overflow-y: auto;">
            <p class="bg-body-secondary p-3 rounded-2">Hola, somos "Tu empresa".<br>¿En qué podemos ayudarte? 👋</p>
        </div>
        <div class="chat-footer d-flex align-items-center gap-2 p-2">
            <input style="font-family: 'Roboto Mono', monospace; font-size: 14px;" type="text" id="customerMessage"
                class="form-control w-100" placeholder="Escribe tu mensaje...">
            <button onclick="sendMessage()" class="btn text-white" style="background-color: #5dc355;">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </div>

    <nav class="navbar navbar1 py-0">
        <div class="container d-flex justify-content-between align-content-center">
            <a class="logo navbar-brand" href="/"><img class="rounded-circle" src="logo.png" width="50px"
                    alt="logo"></a>

            <div class="contNav d-flex justify-content-center align-content-center gap-2 gap-md-4">
                <div class="dropdown d-flex">
                    <button class="nav-link dropdown-toggle fs-6" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tiendas
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="tienda.html">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown d-flex">
                    <button class="nav-link dropdown-toggle fs-6" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Productos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

                <button class="navbar-toggler nav-link fs-6 d-flex flex-nowrap align-items-center" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                    aria-label="Toggle right navigation">
                    <i class="bi bi-person-fill fs-5 texto-primary me-2"></i>
                    <p class="mb-0">Mi cuenta</p>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="Toggle right navigation">
                    <i class="bi bi-heart-fill texto-primary"></i>
                </button>
                <button type="button" class="btn btn-primary rounded-circle" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bi bi-search"></i>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft"
                    aria-controls="offcanvasLeft" aria-label="Toggle left navigation">
                    <i class="bi bi-list fs-2 texto-primary"></i>
                </button>

            </div>

            <div class="offcanvas offcanvasIzquierdo offcanvas-start rounded-end-5 overflow-hidden" tabindex="-1"
                id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
                <div class="offcanvas-header p-0">
                    <img class="w-100" src="http://multi-catalogo.encatalogo.com/imagenes_banners/1.png" alt="">
                    <!-- <button style="background: rgba(255, 255, 255, 0.8);" type="button"
                        class="btn position-absolute top-0 end-0 mt-4 me-4" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                        <i class="bi bi-arrow-right"></i>
                    </button> -->
                </div>
                <div class="offcanvas-body p-4 pt-0">
                    <img width="75" height="75" class="rounded-circle z-3 position-absolute" style="margin-top: -50px;"
                        src="https://multi-catalogo.encatalogo.com/static/media/logo.f09ef3c6cf9fdd7660e0.png" alt="">
                    <div class="d-flex justify-content-between align-items-end">
                        <h3 class="mt-5">
                            Multi catalogo.
                        </h3>
                        <button style="background: rgba(255, 255, 255, 0.8);" type="button" class="btn"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="bi bi-x-lg fs-4"></i>
                        </button>
                    </div>

                    <div class="redesOff d-flex gap-4">
                        <a href="#"><i class="bi bi-instagram text-body fs-6"></i></a>
                        <a href="#"><i class="bi bi-facebook text-body fs-6"></i></a>
                        <a href="#"> <i class="bi bi-whatsapp text-body fs-6"></i></a>
                    </div>
                    <ul class="navbar-nav list-group list-group-flush mt-4">
                        <li class="list-group-item">
                            <a class="nav-link p-0" href="#">Indumentaria@gmail.com</a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link p-0" href="#">SALTA CAPITAL</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header d-flex justify-content-between">
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close"><i
                            class="bi bi-arrow-left"></i></button>
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Favoritos</h5>
                </div>
                <div class="offcanvas-body">
                    Aqui los favoritos
                </div>
            </div>


            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header d-flex justify-content-between pb-0">
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Mi cuenta</h5>
                </div>
                <div class="offcanvas-body d-flex flex-column pt-0">

                    <i class="bi bi-person-circle mx-auto mb-3" style="font-size: 60px; color: #17537D;"></i>

                    <div class="d-flex justify-content-center mb-4">
                        <button id="loginBtn" class="btn btn-primary me-2">Ingresar</button>
                        <button id="registerBtn" class="btn btn-secondary">Registrarse</button>
                    </div>


                    <div id="loginForm">
                        <h5>Iniciar Sesión</h5>
                        <form>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="loginEmail"
                                    placeholder="nombre@ejemplo.com">
                                <label for="loginEmail">Correo electrónico</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="loginPassword" placeholder="Contraseña">
                                <label for="loginPassword">Contraseña</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                        </form>
                    </div>


                    <div id="registerForm" style="display: none;">
                        <h5>Registrarse</h5>
                        <form>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="registerName" placeholder="Nombre completo">
                                <label for="registerName">Nombre completo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="registerEmail"
                                    placeholder="nombre@ejemplo.com">
                                <label for="registerEmail">Correo electrónico</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="registerPassword"
                                    placeholder="Contraseña">
                                <label for="registerPassword">Contraseña</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </nav>