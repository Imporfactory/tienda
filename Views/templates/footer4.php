<footer class="fondo-primary rounded-top-5 text-white overflow-hidden">
    <div class="container d-flex w-100 pb-4 py-md-5 border-bottom flex-wrap justify-content-between">
        <div class="colfFoo px-2 px-md-4 mb-4 mb-md-0">
            <img class="rounded-5 mb-3"
                src="https://multi-catalogo.encatalogo.com/static/media/logo.f09ef3c6cf9fdd7660e0.png" width="50"
                height="50" alt="">
            <h5>Multi catalogo</h5>
            <div class="redesFoo d-flex gap-4">
                <a href="#"><i class="bi bi-instagram text-white fs-5"></i></a>
                <a href="#"><i class="bi bi-facebook text-white fs-5"></i></a>
                <a href="#"> <i class="bi bi-whatsapp text-white fs-5"></i></a>
            </div>
        </div>
        <div class="colfFoo px-2 px-md-4">
            <h5 class="bold">
                Contacto
            </h5>
            <hr>
            <a href="#" class="text-white">
                <p>Indumentaria@gmail.com</p>
            </a>
            <a href="#" class="text-white">
                <p>541169966255</p>
            </a>
            <a href="#" class="text-white">
                <p>SALTA CAPITAL</p>
            </a>
        </div>

        <div class="colfFoo px-2 px-md-4">
            <h5 class="bold">
                Tiendas
            </h5>
            <hr>
            <a href="#" class="text-white">
                <p>Fitness Gym</p>
            </a>
            <a href="#" class="text-white">
                <p>Sabor Único</p>
            </a>
            <a href="#" class="text-white">
                <p>Energy gym</p>
            </a>
        </div>

        <div class="colfFoo px-2 px-md-4 d-flex flex-column">
            <h5 class="bold">
                Acceso
            </h5>
            <hr>
            <a class="btn btn-light w-100 mb-3" href="#">Dashboard</a>
            <a class="btn btn-outline-light w-100" href="#">Mi cuenta</a>
        </div>


    </div>
    <div class="container py-3 ">
        <p class="m-0 text-center">© 2024 En catálogo</p>
    </div>
</footer>
<div
    class="w-100 sticky-bottom bg-light text-center p-2 d-flex d-md-none gap-3 menuFixed justify-content-around align-items-center">
    <a href="/" class="d-flex flex-column justify-content-center align-items-center btnFixedMenuInicio">
        <i class="bi bi-house-fill"></i>
        <span>Inicio</span>
    </a>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-search"></i>
        <span>Buscar</span>
    </button>
    <button class="btn btn-primary rounded-circle">
        <i class="bi bi-plus fs-3"></i>
    </button>
    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle right navigation">
        <i class="bi bi-heart-fill"></i>
        <span>Favoritos</span>
    </button>
    <button onclick="openChat()" class="btn">
        <i class="bi bi-whatsapp"></i>
        <span>Whatsapp</span>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buscar</h1>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-header p-3 d-flex flex-column">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar ...">
                    <button class="btn btn-outline-secondary text-white fondo-primary" type="button"
                        id="button-addon2"><i class="bi bi-search"></i></button>
                </div>

            </div>
            <div class="modal-body" style="min-height: 400px;">
                Aqui resultados de busqueda...
            </div>
        </div>
    </div>
</div>

<!-- No repetir la carga de jQuery -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://kit.fontawesome.com/0022adc953.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>