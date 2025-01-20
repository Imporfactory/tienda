<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 style="text-transform: uppercase;">Acerca de <?php echo NOMBRE_TIENDA; ?></h5>
                    <img src="<?php echo SERVERURL . LOGO_TIENDA; ?>" alt="IMPORT SHOP" width="40px" height="40px">
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                    <h5>Síguenos</h5>
                    <p>
                        <a href="<?php echo FACEBOOK; ?>" target="_blank"><i class="fab fa-facebook"></i> Facebook</a><br>
                        <a href="<?php echo INSTRAGRAM; ?>" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br>
                        <a href="<?php echo TIKTOK; ?>" target="_blank"><i class="fab fa-tiktok"></i> TikTok</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <h5>Información de contacto</h5>
                    <p><i class="fab fa-whatsapp"></i> <?php echo formatPhoneNumber(TELEFONO); ?></p>
                    <!-- <p><i class="fas fa-envelope"></i> ventas@imporshop.app</p> -->
                </div>
            </div>
        </div>
    </div>
    <div class="footer copyright text-center">
        <p>&copy; 2024 Construye tu tienda online con IMPORSUIT S.A.| Todos los derechos reservados.</p>
    </div>
</footer>
<!-- No repetir la carga de jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://kit.fontawesome.com/0022adc953.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script>
    // Cargar categorías y construir el menú de navegación
    let formDataCategoria = new FormData();
    formDataCategoria.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/categoriastienda',
        method: 'POST',
        data: formDataCategoria,
        contentType: false,
        processData: false,
        success: function(response) {
            let categorias = JSON.parse(response);

            // Verifica si la respuesta es un array o un objeto
            if (!Array.isArray(categorias)) {
                categorias = Object.values(categorias);
            }

            let categoriasHtml = '';

            categorias.forEach(categoria => {
                categoriasHtml += `
                <li class="nav-item">
                    <a class="nav-link" href="categoria2?id_cat=${categoria.id_linea}">${categoria.nombre_linea}</a>
                </li>
            `;
            });

            // Agrega el HTML generado al menú de navegación
            $('#categories-menu').html(categoriasHtml);

            // Inicializar OwlCarousel para pantallas grandes
            if (window.innerWidth >= 992) {
                $('#categories-menu').addClass('owl-carousel');
                $('#categories-menu').owlCarousel({
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
                            items: 5 // Muestra 5 ítems en pantallas grandes
                        }
                    },
                    nav: true,
                    navText: [
                        '<i class="fas fa-chevron-left"></i>',
                        '<i class="fas fa-chevron-right"></i>'
                    ]
                });
            } else {
                $('#categories-menu').removeClass('owl-carousel');
            }
        },
        error: function(error) {
            console.error("Error al consumir la API:", error);
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const subNavbar = document.getElementById('subNavbar');

        navbarToggler.addEventListener('click', function() {
            subNavbar.classList.toggle('show');
        });
    });

    // Abrir el panel del carrito cuando se haga clic en el icono
    $('#cartDropdown').on('click', function(event) {
        event.preventDefault();

        // Mostrar el panel del carrito y el overlay
        $('#cartSidebar').addClass('open');
        $('#cartOverlay').addClass('show');

        session_id = "<?php echo session_id(); ?>";
        let formData = new FormData();
        formData.append("session_id", session_id);

        // Cargar los productos del carrito vía AJAX
        $.ajax({
            url: SERVERURL + 'Tienda/buscar_carrito', // Cambia esta URL a tu API real
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    let cartHTML = '';
                    let total = 0; // Variable para almacenar el total

                    data.forEach(function(product) {
                        let enlace_imagen = obtenerURLImagen(product.image_path, "https://new.imporsuitpro.com/");
                        let precioProducto = parseFloat(product.precio_tmp).toFixed(2);
                        let cantidadProducto = parseInt(product.cantidad_tmp);
                        let subtotal = precioProducto * cantidadProducto;

                        total += subtotal; // Sumar al total

                        cartHTML += `
                    <div class="cart-product" data-product-id="${product.id_tmp}">
                        <img src="${enlace_imagen}" class="icon-button" alt="imagen" width="50px">
                        <button class="eliminar_producto_carrito custom-delete-button"><i class='bx bx-x' style="color:white;"></i></button>
                        <p><strong>${product.nombre_producto}</strong></p>
                        <div class="d-flex flex-column">
                            <p>Cantidad: </p>
                            <div class="quantity-controls d-flex flex-row gap-3">
                                <button class="btn btn-sm btn-secondary decrease-quantity" style="width:35px;">-</button>
                                <span class="product-quantity" style="align-content: center;">${cantidadProducto}</span>
                                <button class="btn btn-sm btn-primary increase-quantity" style="width:35px;">+</button>
                                <div class="hr_vertical"></div>
                                <p>${precioProducto}</p>
                            </div>
                        </div>
                        <hr>
                    </div>`;
                    });

                    cartHTML += `<hr><p><strong>Total: $${total.toFixed(2)}</strong></p>`;
                    cartHTML += `<button id="realizarCompra_carritoBtn" class="btn btn-success">Realizar compra</button>`;

                    $('#cartContent').html(cartHTML);
                } else {
                    $('#cartContent').html('<p>No hay productos en el carrito.</p>');
                }
            },
            error: function() {
                $('#cartContent').html('<p>Error al cargar el carrito.</p>');
            }
        });
    });

    // Cerrar el panel del carrito cuando se haga clic en el botón de cerrar
    $(document).on('click', '#closeCart', function() {
        cerrarCarrito();
    });

    function cerrarCarrito() {
        $('#cartSidebar').removeClass('open');
        $('#cartOverlay').removeClass('show');
    }


    // Cerrar el panel del carrito cuando se haga clic en el botón de cerrar
    $('#closeCart').on('click', function() {
        $('#cartSidebar').removeClass('open');
        $('#cartOverlay').removeClass('show');
    });

    // Cerrar el panel del carrito cuando se haga clic fuera del mismo (en el overlay)
    $('#cartOverlay').on('click', function() {
        $('#cartSidebar').removeClass('open');
        $('#cartOverlay').removeClass('show');
    });

    // Aumentar o disminuir la cantidad de productos
    $(document).on('click', '.increase-quantity', function() {
        let productId = $(this).closest('.cart-product').data('product-id');
        let quantityElement = $(`.cart-product[data-product-id="${productId}"] .product-quantity`);
        let currentQuantity = parseInt(quantityElement.text());
        let newQuantity = currentQuantity + 1;

        let formData = new FormData();
        formData.append("id_tmp", productId);
        formData.append("cantidad_nueva", newQuantity);

        $.ajax({
            url: 'https://new.imporsuitpro.com/Tienda/sumar_carrito', // URL de la API para actualizar la cantidad
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function(response) {
                if (response.status == 200) {
                    quantityElement.text(newQuantity);
                    // Recargar el carrito para actualizar el total
                    $('#cartDropdown').trigger('click');
                } else {
                    alert('Error al actualizar la cantidad');
                }
            },
            error: function() {
                alert('Error al actualizar la cantidad');
            }
        });
    });

    $(document).on('click', '.eliminar_producto_carrito', function() {
        let productId = $(this).closest('.cart-product').data('product-id');
        let productElement = $(this).closest('.cart-product'); // Referencia al contenedor del producto en el DOM

        let formData = new FormData();
        formData.append("id_tmp", productId);

        $.ajax({
            url: 'https://new.imporsuitpro.com/Tienda/eliminar_carrito', // URL de la API para eliminar el producto del carrito
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function(response) {
                if (response.status == 200) {
                    // Eliminar el producto del DOM tras una eliminación exitosa
                    productElement.remove();
                    // Recargar el carrito para actualizar el total
                    $('#cartDropdown').trigger('click');
                } else {
                    alert('Error al eliminar el producto.');
                }
            },
            error: function() {
                alert('Error al eliminar el producto.');
            }
        });
    });

    $(document).on('click', '.decrease-quantity', function() {
        let productId = $(this).closest('.cart-product').data('product-id');
        let quantityElement = $(`.cart-product[data-product-id="${productId}"] .product-quantity`);
        let currentQuantity = parseInt(quantityElement.text());

        // Asegurarnos de que la cantidad no sea menor que 1
        if (currentQuantity > 1) {
            let newQuantity = currentQuantity - 1;

            let formData = new FormData();
            formData.append("id_tmp", productId);
            formData.append("cantidad_nueva", newQuantity);

            $.ajax({
                url: 'https://new.imporsuitpro.com/Tienda/sumar_carrito', // URL de la API para actualizar la cantidad
                method: 'POST',
                data: formData,
                processData: false, // No procesar los datos
                contentType: false, // No establecer ningún tipo de contenido
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        quantityElement.text(newQuantity);
                        // Recargar el carrito para actualizar el total
                        $('#cartDropdown').trigger('click');
                    } else {
                        alert('Error al actualizar la cantidad');
                    }
                },
                error: function() {
                    alert('Error al actualizar la cantidad');
                }
            });
        } else {
            alert('La cantidad no puede ser menor que 1');
        }
    });

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

    function llenarCantidad_carrito() {
        session_id = "<?php echo session_id(); ?>";
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
            success: function(data) {
                let cantidad = 0;

                data.forEach((datos, index) => {
                    cantidad += 1;
                });

                $("#cantidad_carrito").text(cantidad);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                alert("Hubo un problema al obtener la información de la categoría");
            },
        });

    }

    // Función para realizar la compra
    $(document).on('click', '#realizarCompra_carritoBtn', function() {

        session_id = "<?php echo session_id(); ?>";
        let formData = new FormData();
        formData.append("session_id", session_id);

        // Cargar los productos del carrito vía AJAX
        $.ajax({
            url: SERVERURL + 'Tienda/buscar_carrito', // Cambia esta URL a tu API real
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(data) {
                let cartHTML = '';
                let comboHTML = '';
                let subtotal = 0;

                data.forEach(function(product) {
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
                            success: function(response) {
                                let comboHTML = '';

                                response.forEach(function(combo) {
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
                                        success: function(response2) {
                                            // Iterar sobre cada elemento en la respuesta
                                            response2.forEach(function(detalle_combo) {
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
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            alert(errorThrown);
                                        },
                                    });
                                    /* Fin detalle combo */
                                });
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
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
                        <p>${product.cantidad_tmp} x $${parseFloat(product.precio_tmp).toFixed(2)}</p>
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
                    success: function(oferta) {
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
                    error: function(jqXHR, textStatus, errorThrown) {
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
            error: function(jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });

        // Mostrar el modal del carrito
        $("#checkout_carritoModal").modal("show");
    });

    // Función para manejar la eliminación de productos dentro del modal del carrito
    $(document).on('click', '.productos_checkout_remove', function() {
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
            success: function(response) {
                if (response.status == 200) {
                    // Eliminar el producto del DOM tras una eliminación exitosa
                    productElement.remove();

                    // Recalcular el subtotal y total después de la eliminación
                    recalcularTotales();

                    // Recargar el carrito para actualizar el total
                    $('#cartDropdown').trigger('click');

                } else {
                    alert('Error al eliminar el producto.');
                }
            },
            error: function() {
                alert('Error al eliminar el producto.');
            }
        });
    });

    // Función para recalcular el subtotal y el total
    function recalcularTotales() {
        let subtotal = 0;

        // Recorre todos los productos restantes y recalcula el subtotal
        $('.productos_carrito-item').each(function() {
            let priceText = $(this).find('.productos_carrito-precio span').text().replace('$', '');
            let productPrice = parseFloat(priceText);
            subtotal += productPrice;
        });

        // Actualizar los valores de subtotal y total en el modal
        $('#productos_carritoSubtotal').text(`$${subtotal.toFixed(2)}`);
        $('#productos_carritoTotal').text(`$${subtotal.toFixed(2)}`);
    }

    function limpiar_carrito() {
        return new Promise((resolve, reject) => {
            session_id = "<?php echo session_id(); ?>";
            let formData = new FormData();
            formData.append("session_id", session_id);

            $.ajax({
                url: SERVERURL + 'Tienda/limpiar_carrito',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    // Resuelve la promesa cuando la limpieza del carrito se completa
                    resolve(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Rechaza la promesa en caso de error
                    reject(errorThrown);
                },
            });
        });
    }

    //cargar select ciudades y provincias
    $(document).ready(function() {
        cargarProvincias(); // Llamar a cargarProvincias cuando la página esté lista

        // Llamar a cargarCiudades cuando se seleccione una provincia
        $("#provinica").on("change", cargarCiudades);

        llenarCantidad_carrito();
    });

    // Función para cargar provincias
    function cargarProvincias() {
        $.ajax({
            url: SERVERURL + "Ubicaciones/obtenerProvincias", // Reemplaza con la ruta correcta a tu controlador
            method: "GET",
            success: function(response) {
                let provincias = JSON.parse(response);
                let provinciaSelect = $("#provinica");
                provinciaSelect.empty();
                provinciaSelect.append('<option value="">Provincia *</option>'); // Añadir opción por defecto

                provincias.forEach(function(provincia) {
                    provinciaSelect.append(
                        `<option value="${provincia.codigo_provincia}">${provincia.provincia}</option>`
                    );
                });
            },
            error: function(error) {
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
                success: function(response) {
                    let ciudades = JSON.parse(response);
                    let ciudadSelect = $("#ciudad_entrega");
                    ciudadSelect.empty();
                    ciudadSelect.append('<option value="">Ciudad *</option>'); // Añadir opción por defecto

                    ciudades.forEach(function(ciudad) {
                        ciudadSelect.append(
                            `<option value="${ciudad.id_cotizacion}">${ciudad.ciudad}</option>`
                        );
                    });

                    ciudadSelect.prop("disabled", false); // Habilitar el select de ciudades
                },
                error: function(error) {
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
</script>
</body>

</html>