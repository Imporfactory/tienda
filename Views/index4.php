<?php include 'Views/templates/header4.php'; ?>

    <header class="">
        <div class="container container-header gap-3 gap-md-4 d-flex flex-column pt-3">
            <div id="carouselExample" class="carousel carousel1 slide rounded-5 overflow-hidden"
                data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner h-100">
                    <div class="carousel-item h-100 active">
                        <img src="imgs/head1.png" class="d-block w-100 mx-auto" alt="..."
                            style="object-fit: cover; height: 100%;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="imgs/head2.png" class="d-block w-100 mx-auto" alt="..."
                            style="object-fit: cover; height: 100%;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="imgs/head3.png" class="d-block w-100 mx-auto" alt="..."
                            style="object-fit: cover; height: 100%;">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="gallery js-flickity bg-transparent carou1"
                data-flickity-options='{ "wrapAround": false, "autoPlay": 3000, "contain": true }'>
                <img class="gallery-cell"
                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/Carrusel_01-1800x500.jpg" alt="Image 1">

                <img class="gallery-cell" src="https://multi-catalogo.encatalogo.com/imagenes_tiendas/logotipo.png"
                    alt="Image 1">

                <img class="gallery-cell"
                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/c16f1790-4bf7-4449-bf22-7dd87b0916ba___02546700710ad6b9fbe78a688c0b9b0c.webp"
                    alt="Image 1">

                <img class="gallery-cell" src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/banneeer%20(1).png"
                    alt="Image 1">

            </div>
        </div>

    </header>

    <section class="seccion1">
        <div class="container">
            <div class="btnsSection1 d-flex gap-4 text-nowrap w-100 overflow-x-scroll">
                <button class="btn btn-secondary rounded-pill">Tiendas</button>
                <button class="btn btn-secondary rounded-pill">Indumentaria</button>
                <button class="btn btn-secondary rounded-pill">Moda</button>
                <button class="btn btn-secondary rounded-pill">Entretenimiento</button>
                <button class="btn btn-secondary rounded-pill">Gym</button>
                <button class="btn btn-secondary rounded-pill">Tecnologia</button>
                <button class="btn btn-secondary rounded-pill">Pizzeria</button>
            </div>
            <div class="gallery js-flickity gallery2 bg-transparent mt-3"
                data-flickity-options='{ "wrapAround": false, "autoPlay": 3000, "contain": true }'>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <p class="position-absolute top-0 start-0 fondo-primary text-white p-1"
                        style="font-size: 12px; border-radius: 0px 0px 8px 0px;">Entrenamiento</p>
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/1.png" class="card-img-top imgCard"
                        alt="...">
                    <div class="card-body d-flex align-items-center">
                        <img class="me-3" width="40px" height="40px"
                            src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/descarga%20(2).png" alt="">
                        <div class="contCard">
                            <h5 class="card-title mb-0">texto ejemplo</h5>
                            <p class="card-text">Some quick</p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>

                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <p class="position-absolute top-0 start-0 fondo-primary text-white p-1"
                        style="font-size: 12px; border-radius: 0px 0px 8px 0px;">Entrenamiento</p>
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/c16f1790-4bf7-4449-bf22-7dd87b0916ba___02546700710ad6b9fbe78a688c0b9b0c.webp"
                        class="imgCard card-img-top" alt="...">
                    <div class="card-body d-flex align-items-center">
                        <img class="me-3" width="40px" height="40px"
                            src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/bag-logo-premium-quality-handbag-600nw-2418460513.webp"
                            alt="">
                        <div class="contCard">
                            <h5 class="card-title mb-0">texto ejemplo</h5>
                            <p class="card-text">Some quick</p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>

                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <p class="position-absolute top-0 start-0 fondo-primary text-white p-1"
                        style="font-size: 12px; border-radius: 0px 0px 8px 0px;">Entrenamiento</p>
                    <img src="https://multi-catalogo.encatalogo.com/imagenes_tiendas/logotipo.png"
                        class="card-img-top imgCard" alt="...">
                    <div class="card-body d-flex align-items-center">
                        <img class="me-3" width="40px" height="40px"
                            src="https://multi-catalogo.encatalogo.com/imagenes_tiendas/IMG_20240827_211544.jpg" alt="">
                        <div class="contCard">
                            <h5 class="card-title mb-0">texto ejemplo</h5>
                            <p class="card-text">Some quick</p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>

                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <p class="position-absolute top-0 start-0 fondo-primary text-white p-1"
                        style="font-size: 12px; border-radius: 0px 0px 8px 0px;">Entrenamiento</p>
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/Carrusel_01-1800x500.jpg"
                        class="card-img-top imgCard" alt="...">
                    <div class="card-body d-flex align-items-center">
                        <img class="me-3" width="40px" height="40px"
                            src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/attachment_97489210.jpeg" alt="">
                        <div class="contCard">
                            <h5 class="card-title mb-0">texto ejemplo</h5>
                            <p class="card-text">Some quick</p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>

                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <p class="position-absolute top-0 start-0 fondo-primary text-white p-1"
                        style="font-size: 12px; border-radius: 0px 0px 8px 0px;">Entrenamiento</p>
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/banneeer%20(1).png"
                        class="card-img-top imgCard" alt="...">
                    <div class="card-body d-flex align-items-center">
                        <img class="me-3" width="40px" height="40px"
                            src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                            alt="">
                        <div class="contCard">
                            <h5 class="card-title mb-0">texto ejemplo</h5>
                            <p class="card-text">Some quick</p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <p class="position-absolute top-0 start-0 fondo-primary text-white p-1"
                        style="font-size: 12px; border-radius: 0px 0px 8px 0px;">Entrenamiento</p>
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/3%20(1).png"
                        class="card-img-top imgCard" alt="...">
                    <div class="card-body d-flex align-items-center">
                        <img class="me-3" width="40px" height="40px"
                            src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/descarga%20(3).png" alt="">
                        <div class="contCard">
                            <h5 class="card-title mb-0">texto ejemplo</h5>
                            <p class="card-text">Some quick</p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <section class="seccion2">
        <div class="container">
            <div class="btnsSection2 d-flex gap-4 text-nowrap w-100 overflow-x-scroll">
                <button class="btn btn-secondary rounded-pill">Mas Vendidos</button>
                <button class="btn btn-secondary rounded-pill">Zapatillas</button>
                <button class="btn btn-secondary rounded-pill">Remeras</button>
                <button class="btn btn-secondary rounded-pill">Bolsos</button>
                <button class="btn btn-secondary rounded-pill">Mochilas</button>
                <button class="btn btn-secondary rounded-pill">Medias</button>
                <button class="btn btn-secondary rounded-pill">suplementos</button>
                <button class="btn btn-secondary rounded-pill">Pesas-gym</button>
                <button class="btn btn-secondary rounded-pill">Comedores</button>
                <button class="btn btn-secondary rounded-pill">Pizzas</button>
            </div>

            <div class="gallery gallery3 js-flickity bg-transparent mt-3"
                data-flickity-options='{ "wrapAround": false, "autoPlay": 3000, "contain": true }'>
                <a class="card mb-3 overflow-hidden gallery-cell  rounded-4">
                    <div class="d-flex gap-3 g-0 p-3 align-items-center">
                        <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/IMG_8716.jpeg"
                            class="rounded-4 imgCarta3" alt="...">
                        <div class="card-body p-0 d-flex flex-column">
                            <h5 class="card-title fs-5">Card title</h5>
                            <p class="card-text fs-6"><b class="texto-primary me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                            <div class="w-100 d-flex gap-2">
                                <img width="30" height="30" class=""
                                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                                    alt="">
                                <p class="card-text w-100 d-flex align-items-center"><small
                                        class="text-body-secondary">Indumentaria</small><i
                                        class="bi bi-arrow-right ms-auto fs-4 pe-3"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="card mb-3 overflow-hidden gallery-cell  rounded-4">
                    <div class="d-flex gap-3 g-0 p-3 align-items-center">
                        <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/IMG_8716.jpeg"
                            class="rounded-4 imgCarta3" alt="...">
                        <div class="card-body p-0 d-flex flex-column">
                            <h5 class="card-title fs-5">Card title</h5>
                            <p class="card-text fs-6"><b class="texto-primary me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                            <div class="w-100 d-flex gap-2">
                                <img width="30" height="30" class=""
                                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                                    alt="">
                                <p class="card-text w-100 d-flex align-items-center"><small
                                        class="text-body-secondary">Indumentaria</small><i
                                        class="bi bi-arrow-right ms-auto fs-4 pe-3"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="card mb-3 overflow-hidden gallery-cell  rounded-4">
                    <div class="d-flex gap-3 g-0 p-3 align-items-center">
                        <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/IMG_8716.jpeg"
                            class="rounded-4 imgCarta3" alt="...">
                        <div class="card-body p-0 d-flex flex-column">
                            <h5 class="card-title fs-5">Card title</h5>
                            <p class="card-text fs-6"><b class="texto-primary me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                            <div class="w-100 d-flex gap-2">
                                <img width="30" height="30" class=""
                                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                                    alt="">
                                <p class="card-text w-100 d-flex align-items-center"><small
                                        class="text-body-secondary">Indumentaria</small><i
                                        class="bi bi-arrow-right ms-auto fs-4 pe-3"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="card mb-3 overflow-hidden gallery-cell  rounded-4">
                    <div class="d-flex gap-3 g-0 p-3 align-items-center">
                        <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/IMG_8716.jpeg"
                            class="rounded-4 imgCarta3" alt="...">
                        <div class="card-body p-0 d-flex flex-column">
                            <h5 class="card-title fs-5">Card title</h5>
                            <p class="card-text fs-6"><b class="texto-primary me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                            <div class="w-100 d-flex gap-2">
                                <img width="30" height="30" class=""
                                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                                    alt="">
                                <p class="card-text w-100 d-flex align-items-center"><small
                                        class="text-body-secondary">Indumentaria</small><i
                                        class="bi bi-arrow-right ms-auto fs-4 pe-3"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="card mb-3 overflow-hidden gallery-cell  rounded-4">
                    <div class="d-flex gap-3 g-0 p-3 align-items-center">
                        <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/IMG_8716.jpeg"
                            class="rounded-4 imgCarta3" alt="...">
                        <div class="card-body p-0 d-flex flex-column">
                            <h5 class="card-title fs-5">Card title</h5>
                            <p class="card-text fs-6"><b class="texto-primary me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                            <div class="w-100 d-flex gap-2">
                                <img width="30" height="30" class=""
                                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                                    alt="">
                                <p class="card-text w-100 d-flex align-items-center"><small
                                        class="text-body-secondary">Indumentaria</small><i
                                        class="bi bi-arrow-right ms-auto fs-4 pe-3"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="card mb-3 overflow-hidden gallery-cell  rounded-4">
                    <div class="d-flex gap-3 g-0 p-3 align-items-center">
                        <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/IMG_8716.jpeg"
                            class="rounded-4 imgCarta3" alt="...">
                        <div class="card-body p-0 d-flex flex-column">
                            <h5 class="card-title fs-5">Card title</h5>
                            <p class="card-text fs-6"><b class="texto-primary me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                            <div class="w-100 d-flex gap-2">
                                <img width="30" height="30" class=""
                                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                                    alt="">
                                <p class="card-text w-100 d-flex align-items-center"><small
                                        class="text-body-secondary">Indumentaria</small><i
                                        class="bi bi-arrow-right ms-auto fs-4 pe-3"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="card mb-3 overflow-hidden gallery-cell  rounded-4">
                    <div class="d-flex gap-3 g-0 p-3 align-items-center">
                        <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/IMG_8716.jpeg"
                            class="rounded-4 imgCarta3" alt="...">
                        <div class="card-body p-0 d-flex flex-column">
                            <h5 class="card-title fs-5">Card title</h5>
                            <p class="card-text fs-6"><b class="texto-primary me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                            <div class="w-100 d-flex gap-2">
                                <img width="30" height="30" class=""
                                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png"
                                    alt="">
                                <p class="card-text w-100 d-flex align-items-center"><small
                                        class="text-body-secondary">Indumentaria</small><i
                                        class="bi bi-arrow-right ms-auto fs-4 pe-3"></i></p>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <section class="seccion3">
        <div class="container">
            <div class="btnsSection3 d-flex w-100">
                <img class="me-3 rounded-5" width="50px" height="50px"
                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/logo.f09ef3c6cf9fdd7660e0.png" alt="">
                <div class="contCard1">
                    <h5 class="card-title mb-0">texto ejemplo</h5>
                    <p class="card-text">Some quick</p>
                </div>
                <i class="bi bi-arrow-right ms-auto fs-4"></i>
            </div>
            <div class="gallery js-flickity bg-transparent mt-3"
                data-flickity-options='{ "wrapAround": false, "autoPlay": 3000, "contain": true }'>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/699322-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/699322-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/699322-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/699322-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/699322-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/699322-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/699322-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>


            </div>
        </div>
    </section>

    <section class="seccion4">
        <div class="container">
            <div class="btnsSection4 d-flex w-100">
                <img class="me-3 rounded-5" width="50px" height="50px"
                    src="http://multi-catalogo.encatalogo.com/imagenes_tiendas/bag-logo-premium-quality-handbag-600nw-2418460513.webp"
                    alt="">
                <div class="contCard1">
                    <h5 class="card-title mb-0">texto ejemplo</h5>
                    <p class="card-text">Some quick</p>
                </div>
                <i class="bi bi-arrow-right ms-auto fs-4"></i>
            </div>
            <div class="gallery js-flickity bg-transparent mt-3"
                data-flickity-options='{ "wrapAround": false, "autoPlay": 3000, "contain": true }'>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/981476-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/981476-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/981476-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/981476-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/981476-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/981476-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>
                <a href="" class="gallery-cell  mb-4 card  overflow-hidden">
                    <img src="http://multi-catalogo.encatalogo.com/imagenes_productos/981476-800-800.webp"
                        class="card-img" alt="..." style="object-fit: cover;">
                    <div class="px-4 card-body d-flex align-items-center position-absolute bottom-0 w-100 text-white"
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.9), transparent);">
                        <div class="contCard">
                            <h5 class="card-title mb-0">Nike air max</h5>
                            <p class="card-text fs-6"><b class="me-2">$ 300.00</b><small
                                    style="text-decoration-line: line-through;">$ 500.00</small></p>
                        </div>
                        <i class="bi bi-arrow-right ms-auto fs-4"></i>
                    </div>
                </a>


            </div>
        </div>
    </section>


    <?php include 'Views/templates/footer4.php'; ?>