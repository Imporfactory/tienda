<?php
session_start();

// Inicializa cURL
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

// Define las constantes
define('NOMBRE_TIENDA', $data[0]['nombre_tienda']);
define('FAVICON', $data[0]['favicon']);
define('LOGO_TIENDA', $data[0]['logo_url']);
define('COLOR_BACKGROUND', $data[0]['color']);
define('COLOR_BOTONES', $data[0]['color_botones']);
define('COLOR_TEXTO_BOTON', $data[0]['texto_boton']);
define('TEXTO_BTN_SLIEDER', $data[0]['texto_btn_slider']);
define('COLOR_TEXTO_CABECERA', $data[0]['texto_cabecera']);
define('COLOR_TEXTO_PRECIO', $data[0]['texto_precio']);
define('FACEBOOK', $data[0]['facebook']);
define('INSTRAGRAM', $data[0]['instagram']);
define('TIKTOK', $data[0]['tiktok']);
define('TELEFONO', $data[0]['whatsapp']);
?>

<?php include 'Views/templates/css/header_style.php'; ?>
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
    <title><?php echo NOMBRE_TIENDA;?></title>
    <link rel="icon" href="<?php echo SERVERURL . FAVICON; ?>" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="/Views/templates/css/header_style.php"> -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let formData_pixel = new FormData();
            formData_pixel.append("id_plataforma", ID_PLATAFORMA); // Añadir el ID de la plataforma al FormData

            $.ajax({
                url: SERVERURL + "tienda/obtenerPixeles",
                type: "POST", // Cambiar a POST para enviar FormData
                data: formData_pixel,
                processData: false, // No procesar los datos
                contentType: false, // No establecer ningún tipo de contenido
                dataType: "json",
                success: function(response) {
                    console.log("respuesta: ", response);
                    // Supongamos que la respuesta es un array de objetos
                    if (response && Array.isArray(response)) {
                        response.forEach(function(pixelData) {
                            if (pixelData.pixel) {
                                // Crear un div temporal para insertar el contenido del script
                                var tempDiv = document.createElement("div");
                                tempDiv.innerHTML = pixelData.pixel;

                                // Insertar todos los elementos <script> del div temporal al <head>
                                var scripts = tempDiv.getElementsByTagName("script");
                                for (var i = 0; i < scripts.length; i++) {
                                    var script = document.createElement("script");
                                    script.type = "text/javascript";
                                    if (scripts[i].src) {
                                        script.src = scripts[i].src;
                                    } else {
                                        script.innerHTML = scripts[i].innerHTML;
                                    }
                                    document.head.appendChild(script);
                                }

                                // Insertar todos los elementos <noscript> del div temporal al <body>
                                var noscripts = tempDiv.getElementsByTagName("noscript");
                                for (var j = 0; j < noscripts.length; j++) {
                                    var noscript = document.createElement("noscript");
                                    noscript.innerHTML = noscripts[j].innerHTML;
                                    document.body.appendChild(noscript);
                                }
                            } else {
                                console.error("El objeto no contiene el campo 'pixel'.", pixelData);
                            }
                        });
                    } else {
                        console.error("La respuesta no es el array esperado.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener los píxeles:", error);
                }
            });
        });
    </script>

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

    .bi-list{
        text-shadow: 
      0.5px 0.5px 2px rgba(255, 255, 255, 1);
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
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-1 py-md-3">
        <div class="container">
            <a class="navbar-brand d-lg-none" href="<?php echo $primera_seccion; ?>">
                <img class="rounded-3" src="<?php echo SERVERURL . LOGO_TIENDA; ?>" alt="IMPORT SHOP">
            </a>
            <button class="navbar-toggler border border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $primera_seccion; ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categoria">Catálogo</a>
                    </li>
                </ul>
                <a class="navbar-brand d-none d-lg-block mx-auto" href="<?php echo $primera_seccion; ?>">
                    <img src="<?php echo SERVERURL . LOGO_TIENDA; ?>" id="imagen_logo" alt="IMPORT SHOP">
                </a>
                <form class="d-flex my-auto">
                    <input class="form-control search-box" type="search" placeholder="Buscar" aria-label="Buscar">
                </form>
            </div>
        </div>
    </nav>