<?php include 'Views/templates/header3.php'; ?>

<header id="inicio" class="d-flex align-items-center">
    <div class="container px-4 containerHeader d-flex align-items-md-end align-items-center flex-column flex-md-row">
        <div
            class="d-flex w-100 flex-column pb-md-2 pb-5 text-start textosHeader align-items-center align-items-md-start">
            <a class="d-flex logoHeaderLink" href="/">
                <h3 id="banner-title" class="texto-primary display-6 fw-bold d-flex"></h3>
            </a>
            <!-- <span class="texto-primary" id="element"></span> -->

            <p id="banner-text" class="mb-0 texto-secondary fw-bold display-4 text-center text-md-start">
            </p>
            <div class="d-flex gap-2 mt-4">
                <a target="_blank" href="#" id="banner-button" class="btn"></a>
                <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbarForm" aria-controls="offcanvasNavbarForm">Consulta</button>
            </div>
        </div>
        <div class="d-flex w-100">
            <img id="imagen-banner" src="" class="w-100 h-auto overflow-hidden rounded-3" alt="">
        </div>
    </div>

</header>

<!-- Seccion iconos -->
<section class="seccion1">
    <div class="container px-4 containerSeccion1 d-flex flex-column flex-sm-row gap-3" id="tarjetas-container">
        <!-- Las tarjetas se cargarán dinámicamente aquí -->
    </div>
</section>
<!-- Fin seccion iconos -->

<section id="quienes" class="seccion2 mb-0 position-relative">
    <div id="parallax-overlay" class="overlay"></div> <!-- Nuevo div para la opacidad -->
    <div class="container px-4 d-flex flex-column text-white py-5 text-center position-relative">
        <h3 id="parallax-title" class="display-2 fw-bold"></h3>
        <h5 id="parallax-subtitle" class="display-4 fw-bold"></h5>
        <p id="parallax-text" class="fs-4"></p>
        <hr>
        <div class="btnsQuienes d-flex gap-3 w-100 justify-content-center">
            <a id="parallax-button" href="#" class="btn"></a>
            <button type="button" class="btn btn-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarForm"
                aria-controls="offcanvasNavbarForm">Consulta</button>
        </div>
    </div>
</section>




<section id="servicios" class="seccion3 padding">
    <div class="container px-4 d-flex flex-column">
        <h3 class="display-5 fw-bold texto-secondary mb-4">Nuestros productos destacados </h3>
        <div class="row"></div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-6" id="exampleModalLabel">Modal título</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img style="height: 200px; object-fit: contain;" src="" class="card-img-top my-4 rounded-3"
                            alt="">
                        <p class="descripcionModal"></p>
                        <p class="fw-bold">Precio $ <span class="PrecioModal"></span></p>

                        <!-- Formulario de solicitud -->
                        <form>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingName" placeholder="Nombre completo">
                                <label for="floatingName">Nombre completo <span class="text-danger"> *</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingPhone" placeholder="Teléfono">
                                <label for="floatingPhone">Teléfono <span class="text-danger"> *</span></label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="https://wa.me/<?php echo formatPhoneNumber(TELEFONO); ?>"
                            style="background-color: #5dc355 !important; color: white !important;"
                            class="btn btn-primary border-0"> <i class="bi bi-whatsapp text-white me-2"></i>
                            Solicitar</a>
                    </div>
                </div>
            </div>
        </div>



    </div>

</section>

<section id="urgencias" class="seccion4">
    <div class="container px-4 d-flex flex-column flex-md-row">
        <div class="w-100 d-flex mb-4 mb-md-0">
            <img id="imgParallax2" class="mx-auto" style="width: 100%; max-width: 400px;" src="" alt="">
        </div>
        <div id="contenedor_parallax2" class="contenedor_parallax2 w-100 d-flex p-5 flex-column rounded-3 shadow">
            <h5 id="titulo_parallax2" class="display-6">Urgencias</h5>
            <h3 id="subtitulo_parallax2" class="display-1 fw-bold">24 horas </h3>
            <p id="texto_parallax2" class="fs-5">Proporcionamos servicio de atención de urgencias durante todo el día en
                nuestro consultorio
                dental.
            </p>
        </div>
    </div>
</section>


<section id="doctores" class="seccion6 mb-0 padding">
    <div class="container px-4 d-flex flex-column">
        <h4 id="titulo_profesionales" class="display-4 text-center fw-bold texto-secondary">Profesionales de calidad
        </h4>
        <p id="subtitulo_profesionales" class="mb-5 fs-4 text-center fw-bold texto-secondary mx-auto"
            style="max-width: 700px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium consequuntur
            quas sunt libero vero! Nemo sit sapiente voluptatem quisquam ea.</p>
        <div class="d-flex gap-3 flex-column flex-md-row" id="testimoniosContainer"></div>

        <!-- Modal -->
        <div class="modal fade" id="modalDortores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal profesionales</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img style="height: 200px; object-fit: cover;" src="" class="card-img-top rounded-3 border my-4"
                            alt="...">
                        <h5 class="tituloModalProfesional"></h5>
                        <p class="descripcionModal"></p>
                    </div>
                    <div class="modal-footer modal-footer-profesionales">
                        <div class="redesSociales"></div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<script src="Views/templates/js/main_header3.js"></script>
<script src="Views/templates/js/index_header3.js"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

<script>
    /* Sección iconos */
    let formDataIconos = new FormData();
    formDataIconos.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/iconostienda', // URL de la API de iconos
        method: 'POST',
        data: formDataIconos,
        contentType: false,
        processData: false,
        success: function (response) {

            try {
                var iconos = JSON.parse(response); // Parsear la respuesta de la API
            } catch (e) {
                console.error('Error al parsear la respuesta:', e);
                return;
            }

            if (iconos && Array.isArray(iconos)) {
                var $tarjetasContainer = $("#tarjetas-container");

                // Limpiamos el contenedor de tarjetas por si acaso
                $tarjetasContainer.empty();

                // Iteramos sobre los iconos obtenidos de la API
                iconos.forEach(function (icono) {
                    var texto = icono.texto || 'Texto predeterminado'; // Texto de la tarjeta
                    var icon_text = icono.icon_text || 'fa-question-circle'; // Clase de Font Awesome, usa "fa" o "fas"
                    var color_icono = icono.color_icono || '#000000'; // Color del ícono

                    // Generar el HTML de la tarjeta con el diseño proporcionado, usando Font Awesome
                    var tarjetaItem = `
                    <div class="card w-100 shadow border">
                        <div class="card-body text-center d-flex flex-column gap-3 p-4">
                            <i class="fas ${icon_text} display-5" style="color: ${color_icono};"></i>
                            <p class="texto-secondary fw-bold mb-0 fs-5">${texto}</p>
                        </div>
                    </div>
                `;

                    // Agregar la tarjeta al contenedor
                    $tarjetasContainer.append(tarjetaItem);
                });
            } else {
                console.error('La respuesta no contiene iconos válidos.');
            }
        },
        error: function (error) {
            console.log('Error al cargar los iconos:', error);
        }
    });
    /* Fin Sección iconos */

    /* Sección banner */
    let formDataSlider = new FormData();
    formDataSlider.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/bannertienda', // URL de la API para el banner
        method: 'POST',
        data: formDataSlider,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {

            if (data && data.length > 0) {
                let banner = data[0]; // Obtenemos el primer banner
                let image_path = SERVERURL + banner.fondo_banner; // Concatenamos la ruta del servidor con la ruta del banner


                // Mostrar el título y texto del banner
                $('#banner-title').text(banner.titulo);
                $('#banner-text').text(banner.texto_banner);
                $('#banner-text').css('color', banner.color_texto_banner); // Centrar la imagen
                $('#imagen-banner').attr('src', image_path || '#');


                // Modificar el botón existente
                let button = $('#banner-button');

                // Asegurarse de que el enlace tenga el protocolo adecuado
                let enlace = banner.enlace_boton;
                if (!/^https?:\/\//i.test(enlace)) {
                    enlace = 'http://' + enlace; // Agrega http:// si no está presente
                }

                button.attr('href', enlace); // Cambiar el enlace del botón
                button.css({
                    'background-color': banner.color_btn_banner,
                    'color': banner.color_textoBtn_banner
                }).text(banner.texto_boton); // Cambiar el texto del botón


            } else {
                console.error('No se encontraron banners.');
            }
        },
        error: function (error) {
            console.error('Error fetching banner data', error);
        }
    });
    /* Fin Sección Banner */

    /* Seccion paralax 1 y 2 */
    let formDataPlantilla = new FormData();
    formDataPlantilla.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/obtener_informacion_plantilla3', // URL del servicio
        method: 'POST',
        data: formDataPlantilla,
        contentType: false,
        processData: false,
        success: function (response) {

            try {
                var data = JSON.parse(response); // Parsear la respuesta de la API
            } catch (e) {
                console.error('Error al parsear la respuesta:', e);
                return;
            }

            // Verificar si la respuesta contiene los datos esperados
            if (data && Array.isArray(data) && data.length > 0) {
                var plantilla = data[0]; // Obtener el primer objeto de la respuesta

                var enlace = plantilla.boton_parallax_texto
                // renderizar paralax 1
                $('#parallax-title').text(plantilla.parallax_titulo);
                $('#parallax-subtitle').text(plantilla.parallax_sub);
                $('#parallax-text').text(plantilla.parallax_texto);

                let enlaceParallax2 = plantilla.boton_parallax_enlace;
                if (!/^https?:\/\//i.test(enlaceParallax2)) {
                    enlaceParallax2 = 'http://' + enlaceParallax2; // Agrega http:// si no está presente
                }

                $('#parallax-button').attr('href', enlaceParallax2 || '#');
                $('#parallax-button').css('background-color', plantilla.color_boton);
                $('#parallax-button').text(plantilla.boton_parallax_texto || 'Botón');

                if (plantilla.fondo_pagina) {
                    $('#inicio').css('background-image', `url(${SERVERURL + plantilla.fondo_pagina})`);
                    $('#inicio').css('background-size', 'cover');
                    $('#inicio').css('background-position', 'center');
                }

                if (plantilla.color_texto) {
                    $('#parallax-title').css('color', plantilla.color_texto);
                    $('#parallax-subtitle').css('color', plantilla.color_texto);
                    $('#parallax-text').css('color', plantilla.color_texto);
                }
                if (plantilla.parallax_opacidad) {
                    $('#parallax-overlay').css('opacity', plantilla.parallax_opacidad);
                }

                if (plantilla.parallax_fondo) {
                    $('#quienes').css('background-image', `url(${SERVERURL + plantilla.parallax_fondo})`);
                }

                if (plantilla.color_filtro) {
                    $('#parallax-overlay').css('background-color', plantilla.color_filtro);
                }

                // renderizar paralax 2

                if (plantilla.titulo_parallax2) {

                    $('#titulo_parallax2').text(plantilla.titulo_parallax2);
                }
                if (plantilla.subtitulo_parallax2) {

                    $('#subtitulo_parallax2').text(plantilla.subtitulo_parallax2);
                }
                if (plantilla.texto_parallax2) {

                    $('#texto_parallax2').text(plantilla.texto_parallax2);
                }

                if (plantilla.color_texto_parallax2) {

                    $('#titulo_parallax2').css('color', plantilla.color_texto_parallax2);
                    $('#subtitulo_parallax2').css('color', plantilla.color_texto_parallax2);
                    $('#texto_parallax2').css('color', plantilla.color_texto_parallax2);
                }
                if (plantilla.color_fondo_parallax2) {

                    $('#contenedor_parallax2').css('background-color', plantilla.color_fondo_parallax2);
                }
                if (plantilla.imagen_parallax2) {
                    $('#imgParallax2').attr('src', SERVERURL + plantilla.imagen_parallax2 || 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg');
                }


                // renderizar seccion profesionales/testimonios

                if (plantilla.titulo_profesionales) {

                    $('#titulo_profesionales').text(plantilla.titulo_profesionales);
                }
                if (plantilla.subtitulo_profesionales) {

                    $('#subtitulo_profesionales').text(plantilla.subtitulo_profesionales);
                }



            } else {
                console.error('La respuesta no contiene datos válidos.');
            }
        },
        error: function (error) {
            console.log('Error al cargar la información de la plantilla:', error);
        }
    });
    /* Fin Sección paralax */
    /* Sección productos destacados */
    let formDataProductos = new FormData();
    formDataProductos.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
    url: SERVERURL + 'Tienda/destacadostienda',
    type: 'POST',
    data: formDataProductos,
    contentType: false,
    processData: false,
    success: function (response) {
        let productos = JSON.parse(response);
        let productosHTML = '';

        // Limitar a 8 productos
        productos = productos.slice(0, 8);

        productos.forEach((producto, index) => {
            // Cada 4 productos, se añade un nuevo .row
            if (index % 4 === 0) {
                if (index > 0) {
                    productosHTML += `</div>`;
                }
                productosHTML += `<div class="row">`;
            }

            // Determinar el enlace de los detalles (funnelish o modal)
            const enlaceDetalles = producto.funnelish === '1' && producto.funnelish_url 
                ? ensureProtocol(producto.funnelish_url) 
                : '#exampleModal';
            const atributoEnlace = producto.funnelish === '1' ? '' : 'data-bs-toggle="modal"';

            productosHTML += `
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="card overflow-hidden rounded-3">
                        <img style="height: 200px; object-fit: contain;" 
                            src="${SERVERURL + producto.imagen_principal_tienda}" 
                            class="card-img-top p-3" 
                            alt="${producto.nombre_producto_tienda}"
                            onerror="this.src='https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';"
                        >
                        <div class="card-body card_body_productos_destacados">
                            <h5 class="card-title fs-6 my-3">${producto.nombre_producto_tienda}</h5>
                            <hr class="my-2">
                            <p class="card-text mb-2">${producto.descripcion_tienda ? producto.descripcion_tienda : 'Sin descripción disponible'}</p>
                            <p class="card-text mb-2"><strong>Precio: $ ${producto.pvp_tienda}</strong></p>
                            <a href="${enlaceDetalles}" ${atributoEnlace} class="btn btn-primary w-100" data-id="${producto.id_producto_tienda}">Detalles</a>
                        </div>
                    </div>
                </div>
            `;
        });

        // Cerrar la última fila después de agregar todos los productos
        productosHTML += `</div>`; // Cerrar la última fila

        $('#servicios .row').html(productosHTML);

        // Configuración del evento de clic para abrir el modal (solo si no es funnelish)
        $('#servicios .row').on('click', 'a[data-bs-toggle="modal"]', function () {
            let idProducto = $(this).data('id');
            let productoSeleccionado = productos.find(producto => producto.id_producto_tienda == idProducto);

            $('#exampleModalLabel').text(productoSeleccionado.nombre_producto_tienda);
            $('.modal-body img').attr('src', SERVERURL + productoSeleccionado.imagen_principal_tienda);
            $('.modal-body img').attr('alt', productoSeleccionado.nombre_producto_tienda);
            $('.PrecioModal').text(productoSeleccionado.pvp_tienda ? productoSeleccionado.pvp_tienda : 'Sin precio disponible');
            $('.descripcionModal').text(productoSeleccionado.descripcion_tienda ? productoSeleccionado.descripcion_tienda : 'Sin descripción disponible');
        });
    },
    error: function (error) {
        console.log("Error al obtener productos: ", error);
    }
});

// Función para asegurar que la URL tenga el protocolo
function ensureProtocol(url) {
    if (url && !/^https?:\/\//i.test(url)) {
        return `https://${url}`;
    }
    return url;
}

    /* Fin productos destacados */

    /* Sección profesionales */
    // Función para verificar o construir la URL completa de una imagen
    function obtenerURLImagen(imagePath, serverURL) {
        if (imagePath) {
            if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
                return imagePath;
            } else {
                return `${serverURL}${imagePath}`;
            }
        } else {
            console.error("imagePath es null o undefined");
            return null;
        }
    }

    let formDataProfesionales = new FormData();
    formDataProfesionales.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/profesionales',
        type: 'POST',
        data: formDataProfesionales,
        contentType: false,
        processData: false,
        success: function (response) {
            let profesionales = JSON.parse(response);
            let profesionalesHTML = '';

            // Limitar a un máximo de 8 profesionales
            profesionales = profesionales.slice(0, 8);

            profesionales.forEach((profesional) => {
                const imagenUrl = obtenerURLImagen(profesional.imagen, SERVERURL) || 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';

                profesionalesHTML += `
                <div class="mx-auto card border shadow mb-3" style="width: 18rem;">
                    <img style="height: 200px; object-fit: cover;" 
                        src="${imagenUrl}" 
                        class="card-img-top" 
                        alt="${profesional.nombre}"
                        onerror="this.src='https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';"
                    >
                    <div class="card-body">
                        <h5 class="card-title">${profesional.titulo} ${profesional.nombre}</h5>
                        <hr>
                        <p class="card-text descripcionCardProfesional">${profesional.descripcion || 'Sin descripción disponible'}</p>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalDortores" data-id="${profesional.id_profesional}">Más sobre el profesional</button>
                    </div>
                </div>
            `;
            });

            $('#testimoniosContainer').html(profesionalesHTML);

            // Configuración del modal para mostrar detalles de un profesional
            $('#testimoniosContainer').on('click', 'button[data-bs-toggle="modal"]', function () {
                let idProfesional = $(this).data('id');
                let profesionalSeleccionado = profesionales.find(prof => prof.id_profesional == idProfesional);

                $('#exampleModalLabel').text(profesionalSeleccionado.titulo + ' ' + profesionalSeleccionado.nombre);

                const imagenUrlModal = obtenerURLImagen(profesionalSeleccionado.imagen, SERVERURL) || 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';
                $('.modal-body img').attr('src', imagenUrlModal);
                $('.modal-body img').on('error', function () {
                    $(this).attr('src', 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg');
                });
                $('.modal-body img').attr('alt', profesionalSeleccionado.nombre);
                $('.modal-body .tituloModalProfesional').text(profesionalSeleccionado.titulo + ' ' + profesionalSeleccionado.nombre || 'Sin descripción disponible');
                $('.modal-body .descripcionModal').text(profesionalSeleccionado.descripcion || 'Sin descripción disponible');

                // Agregar iconos de redes sociales en el pie del modal
                let redesHTML = '';
                if (profesionalSeleccionado.facebook) {
                    redesHTML += `<a href="${profesionalSeleccionado.facebook}" target="_blank" class="me-2"><i class="bi bi-facebook"></i></a>`;
                }
                if (profesionalSeleccionado.linkedin) {
                    redesHTML += `<a href="${profesionalSeleccionado.linkedin}" target="_blank" class="me-2"><i class="bi bi-linkedin"></i></a>`;
                }
                if (profesionalSeleccionado.instagram) {
                    redesHTML += `<a href="${profesionalSeleccionado.instagram}" target="_blank"><i class="bi bi-instagram"></i></a>`;
                }

                $('.modal-footer .redesSociales').html(redesHTML);
            });
        },
        error: function (error) {
            console.log("Error al obtener profesionales: ", error);
        }
    });


    /* Fin Sección profesionales */

</script>




<?php include 'Views/templates/footer3.php'; ?>