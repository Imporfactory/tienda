<?php include 'Views/templates/header.php'; ?>
<?php include 'Views/Categoria/css/categoria_style.php'; ?>
<?php /* require_once './Views/Producto/Modales/checkout.php'; */ ?>

<main>
    <!-- área de categorías -->
    <div class="container mt-4">
        <h1 style="text-align: center">Categorías</h1>
        <br>
        <div class="content_left_right gap-4">
            <!-- Modal -->
            <div class="modal fade" id="leftColumnModal" tabindex="-1" aria-labelledby="leftColumnModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <!-- Cabeza del modal con el botón de cerrar -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="leftColumnModalLabel">Filtros</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Contenido del modal -->
                        <div class="modal-body">
                            <!-- Aquí incluyes el contenido de tu left-column -->
                            <div class="filtro_productos caja px-3">
                                <!-- Acordeón -->
                                <div class="accordion" id="accordionCategoriasModal">
                                    <!-- Este es el acordeón padre para la categoría principal -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingCategoriasModal">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseCategoriasModal" aria-expanded="true"
                                                aria-controls="collapseCategoriasModal">
                                                <strong>Categorías</strong>
                                            </button>
                                        </h2>
                                        <div id="collapseCategoriasModal" class="accordion-collapse collapse show"
                                            aria-labelledby="headingCategoriasModal"
                                            data-bs-parent="#accordionCategoriasModal">
                                            <div class="accordion-body">
                                                <!-- Aquí comienza el acordeón anidado para las subcategorías -->
                                                <div class="accordion" id="accordionSubcategoriasModal"></div>
                                                <!-- Fin del acordeón anidado para las subcategorías -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Acordeón -->

                                <div>
                                    <form id="form-rango-precios-modal" method="post">
                                        <div class="filter-header"><strong>Rango de precios</strong></div>
                                        <div id="slider-rango-precios-modal"></div>
                                        <p>Valor mínimo: $<span id="valorMinimo-modal">0</span></p>
                                        <p>Valor máximo: $<span id="valorMaximo-modal">0</span></p>
                                        <input type="hidden" id="inputValorMinimo-modal" name="valorMinimo" value="0">
                                        <input type="hidden" id="inputValorMaximo-modal" name="valorMaximo" value="0">
                                        <button type="submit" class="texto_boton btn">Filtrar</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal -->

            <div class="left-column d-none d-md-block col-md-5">
                <div class="filtro_productos caja pt-0">
                    <!-- Acordeón -->
                    <div class="accordion mb-3" id="accordionCategorias">
                        <!-- Este es el acordeón padre para la categoría principal -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCategorias">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseCategorias" aria-expanded="true"
                                    aria-controls="collapseCategorias">
                                    <strong>Categorías</strong>
                                </button>
                            </h2>
                            <div id="collapseCategorias" class="accordion-collapse collapse show"
                                aria-labelledby="headingCategorias" data-bs-parent="#accordionCategorias">
                                <div class="accordion-body p-0">
                                    <!-- Aquí comienza el acordeón anidado para las subcategorías -->
                                    <div class="accordion" id="accordionSubcategorias"></div>
                                    <!-- Fin del acordeón anidado para las subcategorías -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Acordeón -->

                    <div>
                        <form id="form-rango-precios-left" method="post">
                            <div class="filter-header"><strong>Rango de precios</strong></div>
                            <div id="slider-rango-precios-left" class="my-3"></div>
                            <p>Valor mínimo: $<span id="valorMinimo-left">0</span></p>
                            <p>Valor máximo: $<span id="valorMaximo-left">0</span></p>
                            <input type="hidden" id="inputValorMinimo-left" name="valorMinimo" value="0">
                            <input type="hidden" id="inputValorMaximo-left" name="valorMaximo" value="0">
                            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="right-column w-100">
                <form id="ordenarForm" method="post">
                    <!-- <div class="custom-select-wrapper" onclick="this.querySelector('.custom-select').classList.toggle('open');">
                            <div class="custom-select">
                                <div class="custom-select-trigger">Ordenar por</div>
                                <div class="custom-options">
                                    <button type="submit" class="option" name="ordenar_por" value="Mayor precio">Mayor precio</button>
                                    <button type="submit" class="option" name="ordenar_por" value="Menor precio">Menor precio</button>
                                </div>
                            </div>
                        </div> -->
                    <!-- Campos ocultos para mantener los valores de rango de precios -->
                    <input type="hidden" name="valorMinimo" id="hiddenValorMinimo">
                    <input type="hidden" name="valorMaximo" id="hiddenValorMaximo">
                </form>
                <!-- Botón que se muestra solo en pantallas pequeñas -->
                <div class="d-md-none ms-auto mb-3">
                    <button type="button" class="texto_boton btn" data-bs-toggle="modal"
                        data-bs-target="#leftColumnModal">
                        <i class='bx bxs-filter-alt text-white'></i> Filtro
                    </button>
                </div>
                <div class="row" id="productosContainer">
                    <!-- Productos filtrados se mostrarán aquí -->
                </div>
                <div class="text-center">
                    <button id="btnVerMas" class="mt-3" onclick="verMasProductos()">Ver Más</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin área de categorías -->
</main>

<script>
    let productosTotales = []; // Almacena todos los productos
    let productosMostrados = 0; // Contador de productos mostrados
    const productosPorPagina = 30; // Número de productos a mostrar por carga

    document.addEventListener('DOMContentLoaded', function () {
        // Inicializa los sliders
        initSlider('slider-rango-precios-left', 'valorMinimo-left', 'valorMaximo-left', 'inputValorMinimo-left', 'inputValorMaximo-left', actualizarProductos);
        initSlider('slider-rango-precios-modal', 'valorMinimo-modal', 'valorMaximo-modal', 'inputValorMinimo-modal', 'inputValorMaximo-modal', actualizarProductos);

        // Obtén las instancias de noUiSlider para cada slider
        const sliderLeft = document.getElementById('slider-rango-precios-left').noUiSlider;
        const sliderModal = document.getElementById('slider-rango-precios-modal').noUiSlider;

        // Función para sincronizar los sliders
        function sincronizarSliders(sourceSlider, targetSlider) {
            sourceSlider.on('update', function (values) {
                const targetValues = targetSlider.get().map(v => parseFloat(v));
                if (values[0] != targetValues[0] || values[1] != targetValues[1]) {
                    targetSlider.set(values);
                }
            });
        }

        // Sincroniza los sliders entre sí
        sincronizarSliders(sliderLeft, sliderModal);
        sincronizarSliders(sliderModal, sliderLeft);

        // Carga las categorías dinámicamente
        cargarCategorias();

        // Verifica si hay un ID de categoría en la URL y actualiza los productos si lo hay
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('id_cat')) {
            const idCategoria = urlParams.get('id_cat');
            filtrarPorCategoria(idCategoria);
        } else {
            // Si no hay categoría en la URL, cargar todas las categorías
            verTodasCategorias();
        }

        // Evento scroll para navbar
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

        // Form submit handlers
        document.getElementById('form-rango-precios-left').addEventListener('submit', function (event) {
            event.preventDefault();
            actualizarProductos();
        });

        document.getElementById('form-rango-precios-modal').addEventListener('submit', function (event) {
            event.preventDefault();
            actualizarProductos();
        });

        document.getElementById('ordenarForm').addEventListener('submit', function (event) {
            event.preventDefault();
            actualizarProductos();
        });
    });

    // Función para cargar categorías dinámicamente
    function cargarCategorias() {
        let formDataCategoria = new FormData();
        formDataCategoria.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/categoriastienda',
            method: 'POST',
            data: formDataCategoria,
            contentType: false,
            processData: false,
            success: function (response) {
                let categorias = JSON.parse(response);

                if (!Array.isArray(categorias)) {
                    categorias = Object.values(categorias);
                }

                let categoriasHtml = '';
                categorias.forEach(categoria => {
                    let categoryHtml = `
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-${categoria.id_linea}">
                                <button class="accordion-button collapsed" type="button" style="font-size: 12px;" onclick="filtrarPorCategoria(${categoria.id_linea})">
                                    ${categoria.nombre_linea}
                                </button>
                            </h2>
                        </div>
                    `;
                    categoriasHtml += categoryHtml;
                });

                categoriasHtml += `
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-ver-todas">
                            <button class="accordion-button collapsed" type="button" style="font-size: 12px;" onclick="verTodasCategorias()">
                                Ver todas
                            </button>
                        </h2>
                    </div>
                `;

                $('#accordionSubcategorias').html(categoriasHtml);
                $('#accordionSubcategoriasModal').html(categoriasHtml);
            },
            error: function (error) {
                console.error("Error al consumir la API:", error);
            }
        });
    }

    // Función para filtrar por categoría y cargar productos
    function filtrarPorCategoria(idCategoria) {
        const valorMinimo = document.getElementById('inputValorMinimo-left').value || document.getElementById('inputValorMinimo-modal').value;
        const valorMaximo = document.getElementById('inputValorMaximo-left').value || document.getElementById('inputValorMaximo-modal').value;
        const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
        const idPlataforma = ID_PLATAFORMA;

        const formData = new FormData();
        formData.append('id_plataforma', idPlataforma);
        formData.append('id_categoria', idCategoria);
        formData.append('precio_minimo', valorMinimo);
        formData.append('precio_maximo', valorMaximo);
        formData.append('ordenar_por', ordenarPor);

        fetch(SERVERURL + 'Tienda/obtener_productos_tienda_filtro', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                productosTotales = data; // Guarda todos los productos
                productosMostrados = 0; // Reinicia el contador
                document.getElementById('productosContainer').innerHTML = ''; // Limpia el contenedor antes de mostrar nuevos productos
                mostrarProductos(); // Llama a la función para mostrar productos

                $('#leftColumnModal').modal('hide');
            })
            .catch(error => console.error('Error:', error));
    }

    // Función para ver todas las categorías
    function verTodasCategorias() {
        const valorMinimo = document.getElementById('inputValorMinimo-left').value || document.getElementById('inputValorMinimo-modal').value;
        const valorMaximo = document.getElementById('inputValorMaximo-left').value || document.getElementById('inputValorMaximo-modal').value;
        const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
        const idPlataforma = ID_PLATAFORMA;

        const formData = new FormData();
        formData.append('id_plataforma', idPlataforma);
        formData.append('id_categoria', ""); // Dejar vacío para ver todas las categorías
        formData.append('precio_minimo', valorMinimo);
        formData.append('precio_maximo', valorMaximo);
        formData.append('ordenar_por', ordenarPor);

        fetch(SERVERURL + 'Tienda/obtener_productos_tienda_filtro', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                productosTotales = data; // Guarda todos los productos
                productosMostrados = 0; // Reinicia el contador
                document.getElementById('productosContainer').innerHTML = ''; // Limpia el contenedor antes de mostrar nuevos productos
                mostrarProductos(); // Llama a la función para mostrar productos

                $('#leftColumnModal').modal('hide');
            })
            .catch(error => console.error('Error:', error));
    }

    // Función para mostrar productos
    function mostrarProductos() {
        const productosContainer = document.getElementById('productosContainer');

        if (!Array.isArray(productosTotales)) {
            console.error('Productos no es un array:', productosTotales);
            return;
        }

        const nuevosProductos = productosTotales.slice(productosMostrados, productosMostrados + productosPorPagina);
        productosMostrados += nuevosProductos.length;

        nuevosProductos.forEach(producto => {
            const precioEspecial = parseFloat(producto.pvp_tienda);
            const precioNormal = parseFloat(producto.pref_tienda);

            const image_path = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL);
            let texto_precioNormal = ``;
            if (precioNormal > 0) {
                texto_precioNormal = `<span class="text-muted">${precioNormal.toFixed(2)}</span>`;
            }
            const urlProducto = producto.funnelish === '1' && producto.funnelish_url
                ? identificarProtocolo(producto.funnelish_url)
                : `producto2?id=${producto.id_producto_tienda}`;
            const productoHtml = `
                    <div class="col-md-4 col-sm-6 col-12 mb-4 px-2">
                        <div class="card h-100" style="border-radius: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <a href="${urlProducto}" class="category-link">
                                <div class="img-container mx-auto d-flex w-100" style="aspect-ratio: 1 / 1; overflow: hidden; justify-content: center; align-items: center;">
                                    <img src="${image_path}" class="card-img-top primary-img w-100 p-4 rounded-2" alt="${producto.nombre_producto_tienda}" style="object-fit: cover;">
                                </div>
                            </a>
                            <div class="card-body d-flex flex-column">
                                <a href="${urlProducto}" style="text-decoration: none; color:black;">
                                    <h6 class="card-title titulo_producto">${producto.nombre_producto_tienda}</h6>
                                </a>
                                <div class="product-footer mb-2">
                                    ${texto_precioNormal}
                                    <span class="text-price texto_precio">$${precioEspecial.toFixed(2)}</span>
                                </div>
                                <a class="btn texto_boton mt-auto" href="${urlProducto}">
                                    Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                `;
                // <a class="btn texto_boton mt-auto" href="producto?id=${producto.id_producto_tienda}">Comprar</a>

            productosContainer.innerHTML += productoHtml;
        });

        // Mostrar el botón de "Ver Más" si hay más productos para mostrar
        const btnVerMas = document.getElementById('btnVerMas');
        if (productosMostrados >= productosTotales.length) {
            btnVerMas.style.display = 'none'; // Oculta el botón si no hay más productos
        } else {
            btnVerMas.style.display = 'block'; // Muestra el botón si hay más productos
        }
    }

    function identificarProtocolo(url) {
        // Verificar si la URL ya empieza con 'http://' o 'https://'
        if (!/^https?:\/\//i.test(url)) {
            return `https://${url}`; // Agregar 'https://' si falta el protocolo
        }
        return url; // Devolver la URL sin cambios si ya incluye el protocolo
    }

    // Función para ver más productos
    function verMasProductos() {
        mostrarProductos(); // Muestra más productos al hacer clic
    }

    // Función para obtener URL de la imagen
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

    // Función para inicializar un slider
    function initSlider(sliderId, valorMinimoId, valorMaximoId, inputValorMinimoId, inputValorMaximoId, onSliderUpdateCallback) {
        var slider = document.getElementById(sliderId);
        noUiSlider.create(slider, {
            start: [parseInt(localStorage.getItem(inputValorMinimoId) || 0), parseInt(localStorage.getItem(inputValorMaximoId) || 3000)],
            connect: true,
            range: {
                'min': 0,
                'max': 3000
            }
        });

        slider.noUiSlider.on('update', function (values, handle) {
            var value = values[handle];
            var valorMinimo = document.getElementById(valorMinimoId);
            var valorMaximo = document.getElementById(valorMaximoId);
            var inputValorMinimo = document.getElementById(inputValorMinimoId);
            var inputValorMaximo = document.getElementById(inputValorMaximoId);

            if (handle) {
                valorMaximo.textContent = Math.round(value);
                inputValorMaximo.value = Math.round(value);
                localStorage.setItem(inputValorMaximoId, Math.round(value));
            } else {
                valorMinimo.textContent = Math.round(value);
                inputValorMinimo.value = Math.round(value);
                localStorage.setItem(inputValorMinimoId, Math.round(value));
            }

            // Ejecutar el callback después de actualizar el slider
            if (onSliderUpdateCallback) {
                onSliderUpdateCallback(values[0], values[1]);
            }
        });
    }

    // Función para actualizar los productos
    function actualizarProductos() {
        const valorMinimo = document.getElementById('inputValorMinimo-left').value || document.getElementById('inputValorMinimo-modal').value;
        const valorMaximo = document.getElementById('inputValorMaximo-left').value || document.getElementById('inputValorMaximo-modal').value;
        const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
        const urlParams = new URLSearchParams(window.location.search);
        const idCategoria = urlParams.has('id_cat') ? urlParams.get('id_cat') : '';

        const idPlataforma = ID_PLATAFORMA;

        document.getElementById('hiddenValorMinimo').value = valorMinimo;
        document.getElementById('hiddenValorMaximo').value = valorMaximo;

        const formData = new FormData();
        formData.append('id_plataforma', idPlataforma);
        formData.append('id_categoria', idCategoria);
        formData.append('precio_minimo', valorMinimo);
        formData.append('precio_maximo', valorMaximo);
        formData.append('ordenar_por', ordenarPor);

        fetch(SERVERURL + 'Tienda/obtener_productos_tienda_filtro', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                productosTotales = data; // Guarda todos los productos
                productosMostrados = 0; // Reinicia el contador
                document.getElementById('productosContainer').innerHTML = ''; // Limpia el contenedor antes de mostrar nuevos productos
                mostrarProductos(); // Llama a la función para mostrar productos
            })
            .catch(error => console.error('Error:', error));
    }

    function agregar_tmp(id_producto, precio, id_inventario) {
        $("#id_productoTmp").val(id_producto);
        $("#precio_productoTmp").val(precio);
        $("#id_inventario").val(id_inventario);

        /* $("#boton_compraModal").modal("show"); */
        $("#checkoutModal").modal("show");
    }

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
</script>



<?php include 'Views/templates/footer.php'; ?>