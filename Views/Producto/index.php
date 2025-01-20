<?php include 'Views/templates/header.php'; ?>
<?php include 'Views/Producto/css/producto_style.php'; ?>
<?php /* require_once './Views/Producto/Modales/boton_compra.php'; */ ?>
<?php /* require_once './Views/Producto/Modales/checkout.php'; */ ?>
<?php

$id_producto = $_GET['id'];

?>
<style>
    /* Estilo general del botón */
    .jump-button {
        width: 100%;
        position: relative;
    }

    

    #landing p{
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .stickyImagen{
        position: sticky;
        top: 130px;
    }

    /* Estilos para dispositivos móviles */
    @media (max-width: 992px) {
        .containerProductos{
        max-width: 500px !important;
        }

    }
    @media (max-width: 768px) {
        
        .jump-button {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            margin: 0;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .jump-button span {
            margin-top: 0;
        }
    }

    .scroll-y-imagenes {
    max-width: 400px;
    overflow-x: scroll; 
    overflow-y: hidden; 
    white-space: nowrap;
}
</style>

<main style="background-color: #f9f9f9;">
    <div class="container containerProductos flex-column align-items-center" style="padding-top: 6rem; padding-bottom: 6rem;" >
        <div class="row w-100">
            <div class="col-12 col-lg-6 mb-5">
                <div class="row stickyImagen ">
                   
                    <div class="col-12">
                        <!-- Área principal de visualización de imagen -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active d-flex" id="list-image1" role="tabpanel"
                                aria-labelledby="list-image1-list">
                                <img id="main-image" src="" class="mx-auto" alt="Responsive image"
                                    data-bs-toggle="modal" data-bs-target="#imagenModal">
                            </div>
                        </div>

                    </div>
                    <div class="d-flex col-12 mt-3"> 
                        <div class="w-100 d-flex gap-3 scroll-y-imagenes mx-auto" id="list-tab" role="tablist">
                            <!-- Imágenes dinámicas aquí -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="caja px-3 py-0 w-100 cajaProducto">
                    <div class="product-title" id="nombre-producto"></div>
                    <br>
                    <div class="precios_producto align-items-center gap-3">
                        <p class="display-6 mb-0">
                            <strong id="precio-especial"></strong>
                        </p>
                        <div id="precio-normal-container">
                            <p class="tachado fs-4 mb-0">
                                <span id="precio-normal"></span>
                            </p>
                        </div>
                        <div id="ahorra-container" class="text-white rounded p-1 px-3"
                            style="background-color: #4464ec;">
                            <p class="ahorra mb-0 d-flex align-items-center gap-3" style="font-size: 13px;">
                                <i class="bx bxs-purchase-tag" style="color: white; font-size: 17px;"></i>
                                <span id="ahorra"></span> 
                            </p>
                        </div>
                    </div>
                    <div class="my-4"> 
                        <label for="quantity" class="form-label">Cantidad</label>
                        <input type="number" id="cantidad_producto" class="form-control"
                            style="border-radius:0.3rem !important;width: 20%;" id="quantity" value="1" min="1">
                    </div>
                    <a class="jump-button btn btn-primary texto_boton rounded w-100" href="#" id="comprar-ahora">
                        COMPRAR AHORA
                    </a>
                    <div id="landing">

                    </div>
                </div>
            </div>
        </div>


        
        <section class="container" >
            <div class="row mx-auto w-100 mt-lg-5 mt-2" id="iconos-container" >
                <!-- Los iconos se cargarán aquí dinámicamente -->
            </div>
        </section>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagenModalLabel">Visualización de Imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="imagenEnModal" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function cargarLanding(id) {
        let formData = new FormData();
        formData.append("id_producto_tienda", id);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "https://imagenes.imporsuitpro.com/obtenerLandingTienda", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Respuesta de la API:", response);

                    // Decodificar entidades HTML
                    var decodedHTML = decodeEntities(response.data);
                    console.log("HTML decodificado:", decodedHTML);

                    // Crear un documento temporal para manipular el HTML decodificado
                    var parser = new DOMParser();
                    var doc = parser.parseFromString(decodedHTML, 'text/html');

                    // Comprobar si el body está presente en la respuesta
                    var body = doc.body;
                    if (body) {
                        var bodyContent = body.innerHTML;
                        console.log("Contenido del body:", bodyContent);

                        // Insertar el contenido del body en el div con id="landing"
                        document.getElementById("landing").innerHTML = bodyContent;
                    } else {
                        console.error("No se encontró la etiqueta <body> en la respuesta.");
                    }
                } catch (e) {
                    console.error("Error al decodificar JSON:", e);
                }
            } else {
                console.error("Error en la solicitud AJAX.");
            }
        };
        xhr.send(formData);
    }

    function decodeEntities(encodedString) {
        var textArea = document.createElement('textarea');
        textArea.innerHTML = encodedString;
        return textArea.value;
    }

    $(document).ready(function () {
        var id_producto = '<?php echo $_GET['id']; ?>';
        let formData = new FormData();
        formData.append("id_plataforma", ID_PLATAFORMA);
        formData.append("id_producto_tienda", id_producto);

        var id_productoPrincipal = "";

        $.ajax({
            url: SERVERURL + 'Tienda/obtener_productos_tienda',
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function (response) {

                if (response.length > 0) {

                    var producto = response[0]; // Asumimos que el primer producto es el deseado

                    var precioEspecial = parseFloat(producto.pvp_tienda);
                    var precioNormal = parseFloat(producto.pref_tienda);

                    var ahorro = 0;
                    if (precioNormal > 0) {
                        ahorro = 100 - (precioEspecial * 100 / precioNormal);
                    } else {
                        $('#precio-normal-container').hide();
                        $('#ahorra-container').hide();
                    }
                    $('#nombre-producto').text(producto.nombre_producto_tienda);
                    $('#precio-especial').text('$' + parseFloat(precioEspecial).toFixed(2));
                    $('#precio-normal').text('$' + parseFloat(precioNormal).toFixed(2));
                    $('#ahorra').text('%' + parseFloat(ahorro).toFixed(2));

                    // Ocultamos el precio normal y el contenedor de ahorro ya que no se utilizan en el ejemplo proporcionado
                    if (ahorro == 0) {
                        $('#ahorra-container').hide();
                    }

                    // Manejo de imágenes
                    var mainImageSrc = producto.imagen_principal_tienda;
                    mainImageSrc = obtenerURLImagen(mainImageSrc, SERVERURL);

                    $('#main-image').attr('src', mainImageSrc);

                    // Miniaturas - comenzamos con la imagen principal como primera miniatura
                    var thumbnailsHtml = `
                <a class="list-group-item list-group-item-action active" style="max-width: 100px !important; max-height: 100px !important; padding:0;" id="list-image0-list" data-bs-toggle="list" href="#list-image0" role="tab" aria-controls="image0">
                    <img src="${mainImageSrc}" class="img-thumbnail">
                </a>
            `;

                    // Suponemos que `producto.imagenes` es un array de URLs de imágenes
                    if (producto.imagenes && producto.imagenes.length > 0) {
                        producto.imagenes.forEach(function (imagen, index) {
                            var imagePath = imagen.url;
                            imagePath = obtenerURLImagen(imagePath, SERVERURL);
                            thumbnailsHtml += `
                        <a class="list-group-item list-group-item-action ${index === 0 ? 'active' : ''}" style="max-width: 100px !important; max-height: 100px !important; padding:0;" id="list-image${index + 1}-list" data-bs-toggle="list" href="#list-image${index + 1}" role="tab" aria-controls="image${index + 1}">
                            <img src="${imagePath}" class="img-thumbnail">
                        </a>
                    `;
                        });
                        $('#list-tab').html(thumbnailsHtml);

                        // Eventos para las miniaturas
                        $('#list-tab a').on('click', function (e) {
                            e.preventDefault();
                            var targetImage = $(this).find('img').attr('src');
                            $('#main-image').attr('src', targetImage);
                        });
                    }

                    // Solicitud adicional para cargar imágenes adicionales
                    $.ajax({
                        url: SERVERURL + 'Tienda/listar_imagenAdicional_productosTienda',
                        method: 'POST',
                        data: formData,
                        processData: false, // No procesar los datos
                        contentType: false, // No establecer ningún tipo de contenido
                        dataType: "json",
                        success: function (imagenesAdicionales) {
                            if (imagenesAdicionales && imagenesAdicionales.length > 0) {
                                imagenesAdicionales.forEach(function (imagen, index) {
                                    var imagePath = imagen.url;
                                    imagePath = obtenerURLImagen(imagePath, SERVERURL);
                                    thumbnailsHtml += `
                                <a class="list-group-item list-group-item-action" style="max-width: 100px !important; max-height: 100px !important; padding:0;" id="list-image-extra${index + 1}-list" data-bs-toggle="list" href="#list-image-extra${index + 1}" role="tab" aria-controls="image-extra${index + 1}">
                                    <img src="${imagePath}" class="img-thumbnail">
                                </a>
                            `;
                                });
                                // Añadimos las miniaturas adicionales al contenedor
                                $('#list-tab').append(thumbnailsHtml);

                                // Reasignamos los eventos de click para las nuevas miniaturas
                                $('#list-tab a').on('click', function (e) {
                                    e.preventDefault();
                                    var targetImage = $(this).find('img').attr('src');
                                    $('#main-image').attr('src', targetImage);
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error al obtener las imágenes adicionales:', error);
                            console.log(xhr.responseText);
                        }
                    });

                    // Modal para la imagen principal
                    $('#main-image').on('click', function () {
                        var modalImageSrc = $(this).attr('src');
                        $('#imagenEnModal').attr('src', modalImageSrc);
                    });

                    // Botón de comprar
                    $('#comprar-ahora').on('click', function () {
                        agregar_tmp(producto.id_producto, parseFloat(producto.pvp_tienda), producto.id_inventario);
                    });

                    id_productoPrincipal = producto.id_producto;
                    cargarLanding(id_producto);
                } else {
                    console.error('No se encontraron productos.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener los datos:', error);
                console.log(xhr.responseText);
            }
        });


        // Manejo del navbar y logo al hacer scroll
        window.onscroll = function () {
            var nav = document.getElementById('navbarId');
            var logo = document.getElementById("navbarLogo");
            logo.style.maxHeight = "60px";
            logo.style.maxWidth = "60px";
            if (window.pageYOffset > 100) {
                nav.style.height = "70px";
            } else {
                nav.style.height = "100px";
                logo.style.maxHeight = "100px";
                logo.style.maxWidth = "100px";
            }
        };

        // Evento para mostrar el modal de imagen
        $('#imagenModal').on('show.bs.modal', function (event) {
            var imageSrc = $('#main-image').attr('src');
            $('#imagenEnModal').attr('src', imageSrc);
        });

        /* Carga de landing */
        /* cargarLanding(id_productoPrincipal); */
        /* Fin carga de landing */
    });

    async function agregar_tmp(id_producto, precio, id_inventario) {
        try {
            // Esperar a que se complete agregar_carrito()
            await agregar_carrito(id_producto, precio, id_inventario);

            let session_id = "<?php echo session_id(); ?>";
            let formData = new FormData();
            formData.append("session_id", session_id);

            // Cargar los productos del carrito vía AJAX
            $.ajax({
                url: SERVERURL + 'Tienda/buscar_carrito',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data) {
                    let cartHTML = '';
                    let comboHTML = '';
                    let subtotal = 0;

                    data.forEach(function (product) {
                        if (data.length === 1) {
                            let formData_combo = new FormData();
                            formData_combo.append("id_producto", product.id_producto);
                            $.ajax({
                                url: SERVERURL + "Tienda/obtener_combo_id",
                                type: "POST",
                                data: formData_combo,
                                processData: false, // No procesar los datos
                                contentType: false, // No establecer ningún tipo de contenido
                                dataType: "json",
                                success: function (response) {
                                    let comboHTML = '';

                                    response.forEach(function (combo) {
                                        /* detalle combo */
                                        let formData_detalle = new FormData();
                                        formData_detalle.append("id_combo", combo.id);

                                        // Inicializar el acumulador
                                        let totalPvp = 0;
                                        let precio_total = 0;
                                        let valor_combo = combo.valor;
                                        let estado_combo = combo.estado_combo;
                                        let ahorro = "";

                                        $.ajax({
                                            url: SERVERURL + "Tienda/obtener_detalle_combo_id",
                                            type: "POST",
                                            data: formData_detalle,
                                            processData: false, // No procesar los datos
                                            contentType: false, // No establecer ningún tipo de contenido
                                            dataType: "json",
                                            success: function (response2) {
                                                // Iterar sobre cada elemento en la respuesta
                                                response2.forEach(function (detalle_combo) {
                                                    // Sumar el pvp de cada elemento al acumulador
                                                    totalPvp += parseFloat(detalle_combo.pvp) * detalle_combo.cantidad; // Asegúrate de convertir a número
                                                });

                                                if (estado_combo == 1) {
                                                    precio_total = totalPvp * (1 - valor_combo / 100);
                                                    ahorro = `<span class="custom-discount" id="ahorro_preview">${valor_combo}% OFF</span>`;
                                                } else if (estado_combo == 2) {
                                                    precio_total = totalPvp - valor_combo;
                                                }


                                                comboHTML += `
                            <div class="custom-product selectable-combo" data-id-combo="${combo.id}">
                              <img src="${SERVERURL}${combo.image_path}" alt="Producto" id="imagen_combo_preview" class="custom-product-image">
                              <div class="custom-product-info">
                                <span id="nombre_combo_preview">${combo.nombre}</span>
                                ${ahorro}
                              </div>
                              <div class="custom-product-price">
                                <span class="old-price" id="precio_normal_preview">$${totalPvp.toFixed(2)}</span>
                                <span class="new-price" id="precio_especial_preview">$${precio_total.toFixed(2)}</span>
                              </div>
                            </div>`;

                                                // Actualizamos el contenedor con el contenido generado
                                                $('#combos_carritoContainer').html(comboHTML);
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                alert(errorThrown);
                                            },
                                        });
                                        /* Fin detalle combo */
                                    });
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    alert(errorThrown);
                                },
                            });
                        }

                        const productPrice = parseFloat(product.precio_tmp) * parseInt(product.cantidad_tmp);
                        subtotal += productPrice;

                        let enlace_imagen = obtenerURLImagen(product.image_path, "https://new.imporsuitpro.com/");

                        cartHTML += `
            <div class="productos_carrito-item">
              <img src="${enlace_imagen}" alt="${product.nombre_producto}" />
              <div class="productos_carrito-info">
                <a href="#">${product.nombre_producto}</a>
                <p>
                  <button class="btn btn-sm btn-outline-secondary cantidad_decremento" data-product-id="${product.id_tmp}">
                    -
                  </button>
                  <span class="cantidad_producto" data-product-id="${product.id_tmp}">${product.cantidad_tmp}</span>
                  <button class="btn btn-sm btn-outline-secondary cantidad_incremento" data-product-id="${product.id_tmp}">
                    +
                  </button>
                </p>
                <p id="detalle_precio_${product.id_tmp}" data-precio-unitario="${parseFloat(product.precio_tmp)}">${product.cantidad_tmp} x $${parseFloat(product.precio_tmp).toFixed(2)} = $${productPrice.toFixed(2)}</p>
              </div>
              <div class="productos_carrito-precio">
                <span>$${productPrice.toFixed(2)}</span>
              </div>
              <button class="btn btn-danger btn-sm productos_checkout_remove" data-product-id="${product.id_tmp}">
                <i class="fas fa-times"></i>
              </button>
            </div>`;
                    });

                    /* oferta */
                    let formData_oferta = new FormData();
                    formData_oferta.append("id_plataforma", ID_PLATAFORMA);

                    $.ajax({
                        url: SERVERURL + "Tienda/obtener_oferta",
                        type: "POST",
                        data: formData_oferta,
                        processData: false, // No procesar los datos
                        contentType: false, // No establecer ningún tipo de contenido
                        dataType: "json",
                        success: function (oferta) {
                            // Verifica si la oferta existe y si el array tiene al menos un elemento
                            if (oferta && oferta.length > 0) {
                                $('#nombre_oferta').text(oferta[0].nombre_producto_tienda);
                                $('#precio_oferta').text(oferta[0].pvp_tienda);
                                $('#id_producto_oferta').val(oferta[0].id_producto_tienda);

                                $("#seccion_oferta").show();
                            } else {
                                $("#seccion_oferta").hide(); // Si no hay oferta, ocultar la sección
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown); // Manejo de errores
                        },
                    });

                    /* Fin oferta */

                    $('#productos_carritoContainer').html(cartHTML);
                    $('#productos_carritoSubtotal').text(`$${subtotal.toFixed(2)}`);
                    $('#productos_carritoTotal').text(`$${subtotal.toFixed(2)}`);

                    $("#total_principal").val(subtotal.toFixed(2));

                    $("#id_productoTmp_carrito").val(data[0].id_producto);
                    $("#total_carrito").val(subtotal.toFixed(2));
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });

            // Mostrar el modal del carrito
            $("#checkout_carritoModal").modal("show");
        } catch (error) {
            console.error("Error:", error);
        }
    }

    function agregar_carrito(id_producto, precio, id_inventario) {
        return new Promise((resolve, reject) => {
            session_id = "<?php echo session_id(); ?>";
            let formData = new FormData();
            formData.append("id_producto", id_producto);
            formData.append("precio", precio);
            formData.append("id_inventario", id_inventario);
            formData.append("session_id", session_id);
            formData.append("cantidad", $('#cantidad_producto').val());
            formData.append("id_plataforma", ID_PLATAFORMA);

            $.ajax({
                url: SERVERURL + "Tienda/agregar_carrito",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {
                    if (response.status == 500) {
                        toastr.error(
                            "NO SE AGREGÓ CORRECTAMENTE",
                            "NOTIFICACIÓN", {
                            positionClass: "toast-bottom-center"
                        }
                        );
                        reject("Error al agregar al carrito"); // Rechaza en caso de error lógico
                    } else if (response.status == 200) {
                        toastr.success("PRODUCTO AGREGADO CORRECTAMENTE", "NOTIFICACIÓN", {
                            positionClass: "toast-bottom-center",
                        });
                        resolve(response); // Resuelve la promesa cuando se agrega correctamente
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Rechaza la promesa en caso de error de red o servidor
                    reject(errorThrown);
                },
            });
        });
    }

    $(document).on('click', '.productos_checkout_remove', function () {
        let productId = $(this).data('product-id'); // Obtener el id del producto a eliminar
        let productElement = $(this).closest('.productos_carrito-item'); // Referencia al contenedor del producto en el DOM

        let formData = new FormData();
        formData.append("id_tmp", productId);

        $.ajax({
            url: 'https://new.imporsuitpro.com/Tienda/eliminar_carrito', // URL de la API para eliminar el producto del carrito
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    // Eliminar el producto del DOM tras una eliminación exitosa
                    productElement.remove();

                    // Recalcular el subtotal y total después de la eliminación
                    actualizarSubtotalYTotal(); // Aquí utilizamos la función existente

                    // Recargar el carrito para actualizar el total
                    $('#cartDropdown').trigger('click');
                } else {
                    alert('Error al eliminar el producto.');
                }
            },
            error: function () {
                alert('Error al eliminar el producto.');
            }
        });
    });


    $(document).on('click', '.cantidad_incremento', function () {
        const productId = $(this).data('product-id');
        const cantidadSpan = $(this).siblings('.cantidad_producto');
        let cantidadActual = parseInt(cantidadSpan.text());

        // Incrementar la cantidad
        let nuevaCantidad = cantidadActual + 1;
        cantidadSpan.text(nuevaCantidad);

        // Actualizar el precio y el subtotal
        actualizarCantidadProducto(productId, nuevaCantidad);
    });

    $(document).on('click', '.cantidad_decremento', function () {
        const productId = $(this).data('product-id');
        const cantidadSpan = $(this).siblings('.cantidad_producto');
        let cantidadActual = parseInt(cantidadSpan.text());

        // Decrementar la cantidad si es mayor que 1
        if (cantidadActual > 1) {
            let nuevaCantidad = cantidadActual - 1;
            cantidadSpan.text(nuevaCantidad);

            // Actualizar el precio y el subtotal
            actualizarCantidadProducto(productId, nuevaCantidad);
        }
    });

    function actualizarCantidadProducto(productId, newQuantity) {
        // Obtener el precio unitario del producto
        const precioUnitario = parseFloat($(`#detalle_precio_${productId}`).data('precio-unitario'));

        // Calcular el nuevo precio total para este producto
        const nuevoPrecioTotal = (precioUnitario * newQuantity).toFixed(2);

        // Actualizar el texto de la línea de detalle del precio
        $(`#detalle_precio_${productId}`).text(`${newQuantity} x $${precioUnitario.toFixed(2)} = $${nuevoPrecioTotal}`);

        // Actualizar el subtotal y el total
        actualizarSubtotalYTotal();

        // Realizar la actualización en el backend
        let formData = new FormData();
        formData.append("id_tmp", productId);
        formData.append("cantidad_nueva", newQuantity);

        $.ajax({
            url: 'https://new.imporsuitpro.com/Tienda/sumar_carrito', // URL de la API para actualizar la cantidad
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status !== 200) {
                    alert('Error al actualizar la cantidad');
                }
            },
            error: function () {
                alert('Error al actualizar la cantidad');
            }
        });
    }

    function actualizarSubtotalYTotal() {
        let subtotal = 0;

        // Recorrer cada línea de productos en el carrito
        $('.productos_carrito-item').each(function () {
            const productId = $(this).find('.cantidad_producto').data('product-id');
            const cantidad = parseInt($(this).find('.cantidad_producto').text());
            const precioUnitario = parseFloat($(`#detalle_precio_${productId}`).data('precio-unitario'));

            // Sumar el precio total del producto al subtotal
            subtotal += precioUnitario * cantidad;
        });

        // Actualizar el subtotal y el total en el DOM
        $('#productos_carritoSubtotal').text(`$${subtotal.toFixed(2)}`);
        $('#productos_carritoTotal').text(`$${subtotal.toFixed(2)}`);

        // También puedes actualizar el campo oculto total_carrito si es necesario
        $("#total_carrito").val(subtotal.toFixed(2));
    }

    // Función llamada si la imagen no puede cargarse
    function imagenError(image) {
        console.log("La imagen no pudo cargarse.");
        image.src = 'ruta/a/tu/imagen/por/defecto.jpg';
    }

    // Función llamada cuando la imagen se ha cargado correctamente
    function imagenCargada(image) {
        console.log("La imagen se cargó correctamente.");
        image.classList.add("cargada-correctamente");
    }


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
    /* Iconos */
    // Cargar iconos mediante AJAX
    let formDataIconos = new FormData();
    formDataIconos.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/iconostienda', // Actualiza esta URL según tu configuración
        method: 'POST',
        data: formDataIconos,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response); // Para depurar la respuesta
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
                    var enlace_icon = icono.enlace_icon || '';
                    var subtexto_icon = icono.subtexto_icon || '';

                    var enlaceHTML = enlace_icon ? `href="${enlace_icon}" target="_blank" style="text-decoration: none; color: inherit;"` : '';

                    var iconoItem = `
                    <div class="col-12 col-lg-4 mb-3 ">
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


    //cargar select ciudades y provincias
    $(document).ready(function () {
        cargarProvincias(); // Llamar a cargarProvincias cuando la página esté lista

        // Llamar a cargarCiudades cuando se seleccione una provincia
        $("#provinica").on("change", cargarCiudades);
    });

    // Función para cargar provincias
    function cargarProvincias() {
        $.ajax({
            url: SERVERURL + "Ubicaciones/obtenerProvincias", // Reemplaza con la ruta correcta a tu controlador
            method: "GET",
            success: function (response) {
                let provincias = JSON.parse(response);
                let provinciaSelect = $("#provinica");
                provinciaSelect.empty();
                provinciaSelect.append('<option value="">Provincia *</option>'); // Añadir opción por defecto

                provincias.forEach(function (provincia) {
                    provinciaSelect.append(
                        `<option value="${provincia.codigo_provincia}">${provincia.provincia}</option>`
                    );
                });
            },
            error: function (error) {
                console.log("Error al cargar provincias:", error);
            },
        });
    }

    // Función para cargar ciudades según la provincia seleccionada
    function cargarCiudades() {
        let provinciaId = $("#provinica").val();
        if (provinciaId) {
            $.ajax({
                url: SERVERURL + "Ubicaciones/obtenerCiudades/" + provinciaId, // Reemplaza con la ruta correcta a tu controlador
                method: "GET",
                success: function (response) {
                    let ciudades = JSON.parse(response);
                    let ciudadSelect = $("#ciudad_entrega");
                    ciudadSelect.empty();
                    ciudadSelect.append('<option value="">Ciudad *</option>'); // Añadir opción por defecto

                    ciudades.forEach(function (ciudad) {
                        ciudadSelect.append(
                            `<option value="${ciudad.id_cotizacion}">${ciudad.ciudad}</option>`
                        );
                    });

                    ciudadSelect.prop("disabled", false); // Habilitar el select de ciudades
                },
                error: function (error) {
                    console.log("Error al cargar ciudades:", error);
                },
            });
        } else {
            $("#ciudad_entrega")
                .empty()
                .append('<option value="">Ciudad *</option>')
                .prop("disabled", true); // Deshabilitar el select de ciudades si no hay provincia seleccionada
        }
    }
    /* Fin cargar provincia y ciudad*/

    function cerrarCarrito() {

    }
</script>

<?php include 'Views/templates/footer.php'; ?>