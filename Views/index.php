<?php include 'Views/templates/header.php'; ?>

<main>
    <style>
        
    </style>
    <!-- Slider -->
    <div id="carouselExampleIndicators carouselBanner1" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators"></div>
        <div class="carousel-inner" style="width: 100%; height: auto !important; max-width: 100vw;"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- fin slider -->

    <!-- animacion -->
    <div class="marquee-containerArriba">
        <div class="marqueeArriba">
            <!-- Los contenidos se llenarán aquí -->
        </div>
    </div>
    <!-- fin animacion -->

    <!-- categorias -->
    <section class="container">
        <h1 class="text-center display-4 mb-4">Categorías</h1>
        <div class="caja ">
            <div class="owl-carousel owl-theme" id="categories-container">
                <!-- Aquí se insertarán las categorías dinámicamente -->
            </div>
        </div>
    </section>
    <!-- fin categorias -->
    <div class="degraded-line"></div>
    <!-- destacados -->
    <section class="container" >
        <h1 class="text-center display-4 mb-4">Destacados</h1>
        <!-- Productos -->
        <div class="owl-carousel owl-theme" id="productos-carousel">
            <!-- Los productos se cargarán aquí dinámicamente -->
        </div>
        <!-- Fin Productos -->
    </section>

    <!-- fin destacados -->

    <!-- Iconos -->
    <section class="container" >
        <div class="row" id="iconos-container" style="max-width: 1000px; margin: auto;">
            <!-- Los iconos se cargarán aquí dinámicamente -->
        </div>
    </section>
    <!-- Fin Iconos -->

    <!-- animacion -->
    <div class="marquee-containerAbajo">
        <div class="marqueeAbajo">
            <!-- Los contenidos se llenarán aquí -->
        </div>
    </div>
    <!-- fin animacion -->

    <!-- Testimonios -->
    <section class=" testimonios">
        <div class="container mx-auto" style="max-width: 1000px;">

            <h1 class="text-center display-4 mb-4">Testimonios</h1>
            <div class="caja">
                <div class="owl-carousel owl-theme " id="testimonios-carousel">
                    <!-- Los testimonios se cargarán aquí dinámicamente -->
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Testimonios -->

    <!-- boton whatsapp -->

    <a  href="https://wa.me/<?php echo formatPhoneNumber(TELEFONO); ?>" class="whatsapp-float shadow rounded-circle" style="background-color: #5ABD43;" target="_blank"><i class="bi bi-whatsapp rounded fs-3 text-white"></i></a>

    <!-- Fin boton whatsapp-->

</main>

<script>
    $(document).ready(function () {
        /* Slider */
        let formDataSlider = new FormData();
        formDataSlider.append("id_plataforma", ID_PLATAFORMA);
        $.ajax({
            url: SERVERURL + 'Tienda/bannertienda',
            method: 'POST',
            data: formDataSlider,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {

                let indicators = '';
                let inner = '';
                let alineacion = "";
                $.each(data, function (index, banner) {

                    image_path = obtenerURLImagen(banner.fondo_banner, SERVERURL);
                    if (banner.alineacion == 1) {
                        alineacion = "text-align-last: left;"
                    } else if (banner.alineacion == 2) {
                        alineacion = "text-align-last: center;"
                    } else if (banner.alineacion == 3) {
                        alineacion = "text-align-last: right;"
                    }
                    const isActive = index === 0 ? 'active' : '';
                    indicators += `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}" class="${isActive}" aria-current="true" aria-label="Slide ${index + 1}"></button>`;
                    inner += `<div class="carousel-item ${isActive}" style="width: 100%; height: auto !important; max-width: 100vw;">
                              <img src="${image_path}" class="d-block w-100" alt="..." style="height: auto !important;
                                    width: 100% !important;
                                    object-fit: cover;">
                              <div class="carousel-caption d-none d-md-block" style="${alineacion}">
                                  <h5 style="color:${banner.color_texto_banner};">${banner.titulo}</h5>
                                  <p style="color:${banner.color_texto_banner};">${banner.texto_banner}</p>
                                  <a class="btn texto_boton" href="${banner.enlace_boton}" style="color:${banner.color_textoBtn_banner} !important; background-color:${banner.color_btn_banner} !important;" target="_blank">${banner.texto_boton}</a>
                              </div>
                          </div>`;
                });
                $('.carousel-indicators').html(indicators);
                $('.carousel-inner').html(inner);
            },
            error: function (error) {
                console.error('Error fetching banner data', error);
            }
        });
        /* Fin Slider */
        /* Categorias */
        let formDataCategoria = new FormData();
        formDataCategoria.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/categoriastienda',
            method: 'POST',
            data: formDataCategoria,
            contentType: false,
            processData: false,
            success: function (response) {
                let categorias = JSON.parse(response); // Asegúrate de que la respuesta sea un objeto JSON

                // Verifica si la respuesta es un array o un objeto
                if (!Array.isArray(categorias)) {
                    categorias = Object.values(categorias);
                }

                categorias.forEach(categoria => {
                    let imagePath = obtenerURLImagen(categoria.imagen, SERVERURL);
                    let categoriaHtml = `
                        <div class="item">
                            <div class="category-container d-flex flex-column align-items-center">
                                <a href="categoria?id_cat=${categoria.id_linea}" class="category-link">
                                    <div class="category-image rounded-circle" style="background-image: url('${imagePath}');"></div>
                                </a>
                                <a class="btn category-button boton texto_boton" style="border-radius: 0.5rem;" href="categoria?id_cat=${categoria.id_linea}" role="button">
                                    ${categoria.nombre_linea}
                                </a>
                            </div>
                        </div>
                    `;

                    $('#categories-container').append(categoriaHtml);
                });

                $('#categories-container').owlCarousel({
                    loop: false,
                    margin: 10,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 3
                        }
                    },
                    nav: true,
                    navText: [
                        '<i class="fas fa-chevron-left fs-2"></i>',
                        '<i class="fas fa-chevron-right fs-2"></i>'
                    ]
                });
            },
            error: function (error) {
                console.error("Error al consumir la API:", error);
            }
        });
        /* Fin Categorias */
        /* Destacados */
        // Inicializar el carrusel vacío
        $("#productos-carousel").owlCarousel({
            loop: false,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            },
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left fs-2"></i>',
                '<i class="fas fa-chevron-right fs-2"></i>'
            ]
        });

        // Cargar productos destacados mediante AJAX
        let formDataProductos = new FormData();
        formDataProductos.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
    url: SERVERURL + 'Tienda/destacadostienda',
    method: 'POST',
    data: formDataProductos,
    contentType: false,
    processData: false,
    success: function (response) {
        try {
            var productos = JSON.parse(response);
        } catch (e) {
            console.error('Error al parsear la respuesta:', e);
            return;
        }

        if (productos && Array.isArray(productos)) {
            var $carousel = $("#productos-carousel");
            let image_path = "";

            productos.forEach(function (producto) {
                var precioEspecial = parseFloat(producto.pvp_tienda);
                var precioNormal = parseFloat(producto.pref_tienda);

                var ahorro = 0;
                if (precioNormal > 0) {
                    ahorro = 100 - (precioEspecial * 100 / precioNormal);
                }
                image_path = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL);

                // Verificar si el producto tiene funnelish habilitado y construir la URL en consecuencia
                const urlProducto = producto.funnelish === '1' && producto.funnelish_url 
                    ? ensureProtocol(producto.funnelish_url) 
                    : `producto?id=${producto.id_producto_tienda}`;

                var productItem = `
                    <div class="item">
                        <div class="grid-container">
                            <div class="card rounded">
                                <div class="img-container position-relative">
                                    ${precioNormal > 0 ? `
                                    <div class="px-3 py-1 text-white position-absolute bg-primary rounded-start" style="top: 20px; right: 0px;">
                                        <span class="ahorro"><i class="bi bi-tag-fill me-1"></i>
                                            <strong>AHORRA UN ${number_format(ahorro)}%</strong>
                                        </span>
                                    </div>
                                     ` : ''}

                                    <a href="${urlProducto}">
                                        <img src="${image_path}" class="card-img-top mx-auto d-block" alt="Product Name">
                                    </a>
                                </div>
                                <div class="card-body card-body-proDes d-flex flex-column">
                                    <p class="card-text flex-grow-1 mt-4 fs-6">
                                        <a href="${urlProducto}" style="text-decoration: none;" class="text-dark">
                                            <strong>${producto.nombre_producto_tienda}</strong>
                                        </a>
                                    </p>
                                    <div class="product-footer mb-2">
                                        <div class="d-flex flex-row">
                                            <span class="texto_precio me-2 fs-5">
                                                <p class="mb-0">$ ${number_format(precioEspecial, 2)}</p>
                                            </span>
                                            ${precioNormal > 0 ? `
                                                <span class="tachado d-flex align-items-center fs-6">
                                                    <p class="mb-0">$ ${number_format(precioNormal, 2)}</p>
                                                </span>
                                            ` : ''}
                                        </div>
                                    </div>
                                    <a style="z-index:2; height: 40px; font-size: 16px" class="btn boton texto_boton mt-2" href="${urlProducto}">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Agregar el producto al carrusel
                $carousel.trigger('add.owl.carousel', [$(productItem)]);
            });

            // Refrescar el carrusel
            $carousel.trigger('refresh.owl.carousel');
        } else {
            console.error('La respuesta no contiene productos válidos.');
        }
    },
    error: function (error) {
        console.log('Error al cargar los productos destacados:', error);
    }
});

// Función para asegurar que la URL tenga el protocolo
function ensureProtocol(url) {
    if (url && !/^https?:\/\//i.test(url)) {
        return `https://${url}`;
    }
    return url;
}


        function obtenerURLImagen(imagePath, serverURL) {
            if (imagePath) {
                if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
                    return imagePath;
                } else {
                    return `${serverURL}${imagePath}`;
                }
            } else {
                console.error("imagePath es null o undefined");
                return null; // o un valor por defecto si prefieres
            }
        }
        /* Fin Destacados */

        /* Iconos */
        // Cargar iconos mediante AJAX
        let formDataIconos = new FormData();
        formDataIconos.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/iconostienda',
            method: 'POST',
            data: formDataIconos,
            contentType: false,
            processData: false,
            success: function (response) {
                try {
                    var iconos = JSON.parse(response);
                } catch (e) {
                    console.error('Error al parsear la respuesta:', e);
                    return;
                }

                if (iconos && Array.isArray(iconos)) {
                    var $iconosContainer = $("#iconos-container");

                    iconos.forEach(function (icono) {
                        var texto = icono.texto || '';
                        var icon_text = icono.icon_text || '';
                        var enlace_icon = icono.enlace_icon || '#';
                        var subtexto_icon = icono.subtexto_icon || '';

                        var enlaceHTML = enlace_icon ? `href="${enlace_icon}" target="_blank" style="text-decoration: none; color: inherit;"` : '';

                        var iconoItem = `
                            <div class="col-md-4 mb-3 icon_responsive">
                                <a ${enlaceHTML}>
                                    <div class="card card_icon text-center">
                                        <div class="card-body card-body_icon d-flex flex-row justify-content-between align-items-center" >
                                            <i class="fa ${icon_text} fa-2x me-3" style="color: ${icono.color_icono} !important"></i>
                                            <div class="text-end">
                                                <h5 class="card-title card-title_icon">${texto}</h5>
                                                <p class="card-text card-text_icon" style="font-size: 12px !important;">${subtexto_icon}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;

                        // Agregar el icono al contenedor
                        $iconosContainer.append(iconoItem);
                    });
                } else {
                    console.error('La respuesta no contiene iconos válidos.');
                }
            },
            error: function (error) {
                console.log('Error al cargar los iconos:', error);
            }
        });
        /* Fin Iconos */
        /* Testimonios */
        // Inicializar el carrusel vacío
        $("#testimonios-carousel").owlCarousel({
            loop: false,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            },
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left fs-2"></i>',
                '<i class="fas fa-chevron-right fs-2"></i>'
            ]
        });

        // Cargar testimonios mediante AJAX
        let formDataTestimonio = new FormData();
        formDataTestimonio.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/testimoniostienda',
            method: 'POST',
            data: formDataIconos,
            contentType: false,
            processData: false,
            success: function (response) {
                try {
                    var testimonios = JSON.parse(response);
                } catch (e) {
                    console.error('Error al parsear la respuesta:', e);
                    return;
                }

                if (testimonios && Array.isArray(testimonios)) {
                    var $carousel = $("#testimonios-carousel");

                    testimonios.forEach(function (testimonio) {
                        var id_testimonio = testimonio.id_testimonio;
                        var nombre_testimonio = testimonio.nombre || '';
                        var texto_testimonio = testimonio.testimonio || '';
                        var image_path = obtenerURLImagen(testimonio.imagen, SERVERURL)

                        var testimonioItem = `

                                <div class="card p-3 border-0">
                                    <img src="${image_path}" class="card-img-top rounded-circle img_card_testimonio mx-auto mb-4" alt="...">
                                    <div class="card-body p-0 card_body_testimonios text-center">
                                        <h5 class="card-title">${nombre_testimonio}</h5>
                                        <p class="card-text">${texto_testimonio}</p>
                                    </div>
                                </div>
                        `;

                        // Agregar el testimonio al carrusel
                        $carousel.trigger('add.owl.carousel', [$(testimonioItem)]);
                    });

                    // Refrescar el carrusel
                    $carousel.trigger('refresh.owl.carousel');
                } else {
                    console.error('La respuesta no contiene testimonios válidos.');
                }
            },
            error: function (error) {
                console.log('Error al cargar los testimonios:', error);
            }
        });
        /* Fin Testimonios*/
        /* Horizontal */
        let formDataHorizontal = new FormData();
        formDataHorizontal.append("id_plataforma", ID_PLATAFORMA);

        // Realiza la llamada AJAX
        $.ajax({
            url: SERVERURL + 'Tienda/obtener_horizontalTienda',
            method: 'POST',
            data: formDataHorizontal,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                const ofertas = response;

                if (Array.isArray(ofertas)) {
                    let contentArriba = '';
                    let contentAbajo = '';

                    ofertas.forEach(oferta => {
                        if (oferta.posicion == 1) {
                            contentArriba += `<p class="marquee-contentArriba"> ${oferta.texto} </p>`;
                        } else if (oferta.posicion == 2) {
                            contentAbajo += `<p class="marquee-contentAbajo"> ${oferta.texto} </p>`;
                        }
                    });

                    $('.marqueeArriba').html(contentArriba);
                    $('.marqueeAbajo').html(contentAbajo);
                } else {
                    console.error('La respuesta no es un array:', ofertas);
                }
            },
            error: function (error) {
                console.error('Error al obtener las ofertas:', error);
            }
        });
        /* Fin Horizontal */
    });

    function number_format(number, decimals = 2) {
        return number.toFixed(decimals);
    }
</script>

<?php include 'Views/templates/footer.php'; ?>