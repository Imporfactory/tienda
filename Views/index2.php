<?php include 'Views/templates/header2.php'; ?>


<main style="background-color: #f9f9f9;">
    <!-- Slider -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade custom-carousel" data-bs-ride="carousel">
        <div class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Fin Slider -->
    <!-- Seccion de ofertas y promociones -->
    <div class="seccion">
        <div class="flex_seccionOfertas container">
            <div class="promotion-card">
                <img src="<?php echo SERVERURL . "" . IMAGEN_OFERTA1; ?>" class="promotion-image" alt="Smartphone">
                <div class="promotion-content" style="color: <?php echo COLOR_TEXTO_OFERTA1; ?>;">
                    <h2><?php echo TITULO_OFERTA1; ?></h2>
                    <h1><?php echo OFERTA1; ?></h1>
                    <p><?php echo DESCRIPCION_OFERTA1; ?></p>
                    <a href="<?php echo ENLACE_OFERTA1; ?>" target="_blank">
                        <button class="btn btn-light"
                            style="background-color: <?php echo COLOR_BTN_OFERTA1; ?>; color: <?php echo COLOR_TEXTOBTN_OFERTA1; ?>;"><?php echo TEXTO_BTN_OFERTA1; ?></button>
                    </a>
                </div>
            </div>
            <div class="promotion-card">
                <img src="<?php echo SERVERURL . "" . IMAGEN_OFERTA2; ?>" class="promotion-image" alt="Headphones">
                <div class="promotion-content" style="color: <?php echo COLOR_TEXTO_OFERTA2; ?>" ;>
                    <h2><?php echo TITULO_OFERTA2; ?></h2>
                    <h1><?php echo OFERTA2; ?></h1>
                    <p><?php echo DESCRIPCION_OFERTA2; ?></p>
                    <a href="<?php echo ENLACE_OFERTA2; ?>" target="_blank">
                        <button class="btn btn-light"
                            style="background-color: <?php echo COLOR_BTN_OFERTA2; ?>; color: <?php echo COLOR_TEXTOBTN_OFERTA2; ?>;"><?php echo TEXTO_BTN_OFERTA2; ?></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Seccion ofertas y promociones -->
    <!-- seccion iconos -->
    <section class="container">
        <div class="row" id="iconos-container" style="max-width: 1150px; margin: auto;">
            <!-- Los iconos serán insertados aquí dinámicamente -->
        </div>
    </section>
    <!-- fin seccion iconos -->
    <!-- Productos Destacados -->
    <div class="mas_vendidos">
        <div class="caja container">
            <h2>Productos destacados</h2>
            <div class="flex_mas_vendidos" id="productos-destacados">
                <!-- Los productos serán insertados aquí dinámicamente -->
            </div>
        </div>
    </div>
    <!-- Fin Productos destacados -->
    <!-- Sección Ahorra -->
    <div class="ahorro-section">
        <div class="ahorro-image">
            <img src="<?php echo SERVERURL . "" . IMAGEN_PROMOCION; ?>" alt="Producto">
            <!-- <div class="circle-badge">Mejor precio</div> -->
        </div>
        <div class="ahorro-content" style="background-color: <?php echo COLOR_FONDO_PROMOCION; ?>;">
            <div class="text-content  d-flex flex-column">
                <h2 style="color: <?php echo COLOR_LETRA_PROMOCION; ?>;"><?php echo TITULO_PROMOCION; ?></h2>
                <h1 style="color: <?php echo COLOR_LETRA_PROMOCION; ?>;">$<?php echo PRECIO_PROMOCION; ?></h1>
                <p style="color: <?php echo COLOR_LETRA_PROMOCION; ?>;"><?php echo DESCRIPCION_PROMOCION; ?></p>
                <a href="<?php echo ENLACE_BTN_PROMOCION; ?>" target="_blank">
                    <button class="tienda-btn"
                        style="background-color: <?php echo COLOR_BTN_PROMOCION; ?>; color: <?php echo COLOR_LETRABTN_PROMOCION; ?>;"><?php echo TEXTO_BTN_PROMOCION; ?></button>
                </a>
            </div>
        </div>
    </div>
    <!-- Fin Sección Ahorra -->

</main>

<script>

    $(document).ready(function () {
        function obtenerURLImagen(imagePath, serverURL) {
            // Verificar si el imagePath no es null
            if (imagePath) {
                // Verificar si el imagePath ya es una URL completa
                if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
                    // Si ya es una URL completa, retornar solo el imagePath
                    return imagePath;
                } else {
                    // Si no es una URL completa, agregar el serverURL al inicio
                    return `${serverURL}${imagePath}`;
                }
            } else {
                // Manejar el caso cuando imagePath es null
                console.error("imagePath es null o undefined");
                return null; // o un valor por defecto si prefieres
            }
        }

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
                let inner = '';
                let alineacion = "";
                $.each(data, function (index, banner) {

                    let image_path = obtenerURLImagen(banner.fondo_banner, SERVERURL);
                    if (banner.alineacion == 1) {
                        alineacion = "text-align-last: left;";
                    } else if (banner.alineacion == 2) {
                        alineacion = "text-align-last: center;";
                    } else if (banner.alineacion == 3) {
                        alineacion = "text-align-last: right;";
                    }

                    const isActive = index === 0 ? 'active' : '';
                    inner += `<div class="carousel-item ${isActive}">
                                <img src="${image_path}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block" style="${alineacion}">
                                    <h1 style="color:${banner.color_texto_banner};">${banner.titulo}</h1>
                                    <p style="color:${banner.color_texto_banner};">${banner.texto_banner}</p>
                                    <a class="btn btn-primary" href="${banner.enlace_boton}" style="color:${banner.color_textoBtn_banner} !important; background-color:${banner.color_btn_banner} !important;" target="_blank">${banner.texto_boton}</a>
                                </div>
                              </div>`;
                });

                $('.carousel-inner').html(inner);
            },
            error: function (error) {
                console.error('Error fetching banner data', error);
            }
        });
        /* Fin Slider */
        /* iconos */
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
                        var color_icono = icono.color_icono

                        // Aquí está el HTML para el nuevo diseño con el formato correcto
                        var iconoItem = `
                       <div class="col-md-4 mb-3 icon_responsive">
                                <a ${enlace_icon}>
                                    <div class="card card_icon text-center">
                                        <div class="card-body card-body_icon d-flex flex-row justify-content-between align-items-center" >
                                            <i class="fa ${icon_text} fa-2x me-3" style="color: ${color_icono} !important"></i>
                                            <div class="text-end">
                                                <h5 class="card-title">${texto}</h5>
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
        /* Fin iconos */
        /* Productos Destacados */
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
            var $productosContainer = $("#productos-destacados");
            $productosContainer.empty(); // Limpiar el contenedor antes de agregar nuevos productos

            var productosAMostrar = productos.slice(0, 8); // Limita el número de productos a 8
            var fila = $('<div style="height: fit-content;" class="row align-items-stretch g-4 mt-3"></div>'); // Crear una única fila
            $productosContainer.append(fila); // Agregar la fila al contenedor

            productosAMostrar.forEach(function (producto) {
                var precioEspecial = parseFloat(producto.pvp_tienda);
                var precioNormal = parseFloat(producto.pref_tienda);
                var ahorro = 0;

                if (precioNormal > 0) {
                    ahorro = 100 - (precioEspecial * 100 / precioNormal);
                }

                var image_path = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL);

                let oferta = precioNormal > 0 ? `<div class="mas_vendidos-tag">OFERTA</div>` : '';

                // Verificar si el producto tiene funnelish habilitado y construir la URL en consecuencia
                const urlProducto = producto.funnelish === '1' && producto.funnelish_url 
                    ? ensureProtocol(producto.funnelish_url) 
                    : `producto2?id=${producto.id_producto_tienda}`;

                // HTML para cada producto destacado
                var productItem = `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-2">
                        <div class="overflow-hidden mas_vendidos-card card bg-transparent rounded-4 h-100">
                            ${oferta}
                            <a href="${urlProducto}">
                                <img src="${image_path}" class="card-img-top mas_vendidos-image" alt="${producto.nombre_producto_tienda}">
                            </a>
                            <div class="d-flex flex-column body_card h-100 p-3 mt-4 mb-2">
                                <h5 class="card-title fs-6">${producto.nombre_producto_tienda}</h5>
                                <p class="mas_vendidos-price mt-auto mb-0">
                                    ${precioNormal > 0 ? `
                                        <span class="mas_vendidos-old-price">$${number_format(precioNormal, 2)}</span>
                                    ` : ''}
                                    $${number_format(precioEspecial, 2)}
                                </p>
                            </div>
                        </div>
                    </div>
                `;

                // Agregar el producto a la única fila
                fila.append(productItem);
            });
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



        /* Fin productos destacados */
    });

    function number_format(number, decimals = 2) {
        return number.toFixed(decimals);
    }
</script>

<?php include 'Views/templates/footer2.php'; ?>