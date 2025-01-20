<?php include 'Views/templates/header3.php'; ?>

<header class="py-3 py-md-5">
    <div class="container my-3 my-md-4 containerProductos3">
        <div class="d-flex justify-content-between align-items-center border-bottom border-2">
            <h3 class="display-6 fw-bold texto-secondary">Productos </h3>

        </div>
        <div class="cont2Productos row pt-4">

            <div class="filtro col-12 col-sm-6 col-md-3">
                <div class="x sticky-sm-top">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="buscador" placeholder="Buscar por nombre"
                            aria-label="Buscar por nombre" aria-describedby="button-addon2">
                        <label for="buscador">Buscar por nombre</label>
                    </div>
                    <a class="btn btn-primary w-100 mb-3" data-bs-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
                        Aplicar filtros
                    </a>

                    <div class="collapse mb-4" id="collapseExample">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="inputValorMinimo-left" placeholder="0">
                            <label for="inputValorMinimo-left">Precio Mínimo</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="inputValorMaximo-left" placeholder="1000">
                            <label for="inputValorMaximo-left">Precio Máximo</label>
                        </div>

                        <label>Ordenar Por:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ordenar_por" id="precioAscendente"
                                value="precio_ascendente">
                            <label class="form-check-label" for="precioAscendente">Precio Ascendente</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ordenar_por" id="precioDescendente"
                                value="precio_descendente">
                            <label class="form-check-label" for="precioDescendente">Precio Descendente</label>
                        </div>

                        <button id="btnBuscarActualizar2" class="btn btn-primary w-100 my-3">Actualizar</button>
                        <button id="btnLimpiarFiltros" class="btn btn-secondary w-100">Limpiar Filtros</button>
                    </div>
                </div>


            </div>

            <div class="row col-md-9 col-sm-6 col-12 mx-auto" id="productosContainer">


            </div>
        </div>

    </div>
    <!-- Modal para mostrar detalles del producto -->
    <div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productoModalLabel">Detalles del Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img style="height: 200px;" id="productoModalImagen" src="" class="w-100 mb-3"
                        alt="Imagen del Producto">
                    <h5 id="productoModalTitulo"></h5>
                    <p id="productoModalDescripcion"></p>
                    <p><strong>Precio: $<span id="productoModalPrecio"></span></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#checkout_carritoModal">
                        Comprar Ahora
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .x {
        top: 70px;
        z-index: 1000;
    }

    .imgCardProductos {
        padding: 15px;
        border: 0px;
        width: 180px;
        height: 180px;
        object-fit: cover;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        buscarActualizarProductos();
        document.getElementById('btnBuscarActualizar2').addEventListener('click', buscarActualizarProductos);

        // Añadir event listener para el campo de búsqueda
        document.getElementById('buscador').addEventListener('input', buscarActualizarProductos);
    });

    let productosTotales = [];
    let productosMostrados = 0;

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

    function buscarActualizarProductos() {
        const valorMinimo = document.getElementById('inputValorMinimo-left').value || 0;
        const valorMaximo = document.getElementById('inputValorMaximo-left').value || 1000;
        const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
        const buscadorInput = document.getElementById('buscador').value.toLowerCase();
        const urlParams = new URLSearchParams(window.location.search);
        const idCategoria = urlParams.has('id_cat') ? urlParams.get('id_cat') : '';

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
                    throw new Error('Error al obtener los productos');
                }
                return response.json();
            })
            .then(data => {
                productosTotales = data;
                mostrarProductos(buscadorInput, valorMinimo, valorMaximo, ordenarPor);
            })
            .catch(error => console.error('Error:', error));
    }

    function mostrarProductos(buscadorInput = '', valorMinimo = 0, valorMaximo = 1000, ordenarPor = null) {
    const container = document.getElementById('productosContainer');
    container.innerHTML = '';

    const productosFiltrados = productosTotales.filter(producto => {
        const nombreCoincide = producto.nombre_producto_tienda.toLowerCase().includes(buscadorInput);
        const precioCoincide = producto.pvp_tienda >= valorMinimo && producto.pvp_tienda <= valorMaximo;
        return nombreCoincide && precioCoincide;
    });

    if (ordenarPor) {
        productosFiltrados.sort((a, b) => {
            if (ordenarPor === 'precio_ascendente') {
                return a.pvp_tienda - b.pvp_tienda;
            } else if (ordenarPor === 'precio_descendente') {
                return b.pvp_tienda - a.pvp_tienda;
            }
            return 0;
        });
    }

    productosFiltrados.forEach((producto, index) => {
        const imagenUrl = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL) || 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';

        // Configurar la URL del producto según si tiene funnelish
        const urlProducto = producto.funnelish === '1' && producto.funnelish_url
            ? ensureProtocol(producto.funnelish_url)
            : `Producto3?id=${producto.id_producto_tienda}`;

        container.innerHTML += `
            <div class="col-16 col-md-6 col-lg-4 mb-4 px-2">
                <div class="card"> 
                    <img src="${imagenUrl}" class="w-100 imgCardProductos rounded-3" alt="${producto.nombre_producto_tienda}" onerror="this.onerror=null; this.src='https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg'">
                    <div class="card-body card-body-paginaProductos">
                        <h5 class="card-title">${producto.nombre_producto_tienda}</h5>
                        <p class="card-text">Precio: <strong>$${producto.pvp_tienda}</strong></p>
                        <p class="card-text">Descripción: ${producto.descripcion_tienda || 'No disponible'}</p>
                         
                        <button class="btn btn-primary w-100" onclick="verDetalles('${urlProducto}', ${index})">
                            Ver Detalles
                        </button>
                    </div>
                </div>
            </div>
        `;
    });
}

function ensureProtocol(url) {
    if (url && !/^https?:\/\//i.test(url)) {
        return `https://${url}`;
    }
    return url;
}

function verDetalles(urlProducto, index) {
    window.location.href = urlProducto;
}




    // function abrirModal(index) {
    //     const producto = productosTotales[index];
    //     if (!producto) return;

    //     const modalTitulo = document.getElementById('productoModalTitulo');
    //     const modalDescripcion = document.getElementById('productoModalDescripcion');
    //     const modalPrecio = document.getElementById('productoModalPrecio');
    //     const modalImagen = document.getElementById('productoModalImagen');

    //     if (modalTitulo && modalDescripcion && modalPrecio && modalImagen) {
    //         modalTitulo.innerText = producto.nombre_producto_tienda;
    //         modalDescripcion.innerText = producto.descripcion_tienda || 'No disponible';
    //         modalPrecio.innerText = producto.pvp_tienda;

    //         const imagenUrlModal = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL) || 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';

    //         modalImagen.src = imagenUrlModal;
    //         modalImagen.alt = producto.nombre_producto_tienda;

    //         modalImagen.onerror = function () {
    //             this.onerror = null;
    //             this.src = 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';
    //         };
    //     } else {
    //         console.error('Elementos del modal no encontrados');
    //     }
    // }


    document.getElementById('btnLimpiarFiltros').addEventListener('click', limpiarFiltros);
    function limpiarFiltros() {
        document.getElementById('buscador').value = '';
        document.getElementById('inputValorMinimo-left').value = '';
        document.getElementById('inputValorMaximo-left').value = '';

        const ordenacionRadios = document.querySelectorAll('input[name="ordenar_por"]');
        ordenacionRadios.forEach(radio => radio.checked = false);

        buscarActualizarProductos();
    }
</script>




<?php include 'Views/templates/footer3.php'; ?>