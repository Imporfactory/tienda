<style>
    body {
        background-color: #f9f9f9;
    }

    section {
        margin-top: 100px;
        margin-bottom: 100px;
    }

    /* header */

    /* Cambiar el color del ícono de la hamburguesa */
    .navbar-toggler-icon {
        background-color: transparent;
        /* Hacer que el fondo sea transparente */
        border: none;
        /* Eliminar el borde */
        background-image: none;
        /* Eliminar la imagen de fondo predeterminada */
    }

    .navbar-toggler-icon::before {
        content: '\2630';
        /* Ícono de hamburguesa */
        font-size: 24px;
        /* Tamaño del ícono */
        color:
            <?php echo COLOR_TEXTO_CABECERA; ?>
        ;
        /* Cambiar a tu color preferido */
    }

    .navbar-custom {
        background-color:
            <?php echo COLOR_BACKGROUND; ?>
        ;
        /* Ajusta el color según sea necesario */
    }

    .navbar-custom .nav-link {
        color: white;
    }

    .navbar-custom .navbar-brand img {
        height: 60px;
        width: auto;
    }

    @media (max-width: 768px) {
        .navbar-custom .navbar-brand img {
            height: 45px;
        }
    }

    .search-box {
        border: none;
        border-radius: 20px;
        padding: 5px 15px;
    }

    .search-box:focus {
        box-shadow: none;
        outline: none;
    }

    @media (min-width: 992px) {
        .navbar-nav {
            gap: 10px;
            display: flex;
            justify-content: flex-start;
            /* Menú alineado a la izquierda en pantallas grandes */
        }

        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    }

    /* slider */
    .carousel-item {
        height: 452px !important;
    }

    .carousel-inner {
        height: 452px !important;
    }

    .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: fill;
        /* Ajusta la imagen sin distorsionarla */
    }

    @media (max-width: 768px) {
        .carousel-item {
            height: 200px !important;
        }

        .carousel-inner {
            height: 200px !important;
        }

        .carousel-item img {
            object-fit: fill;
        }
    }

    /* Arriba */
    .marquee-containerArriba {
        overflow: hidden;
        background-color:
            <?php echo COLOR_BACKGROUND; ?>
        ;
        color: white;
        width: 100%;
        height: 40px;
        position: relative;
    }

    .marqueeArriba {
        display: flex;
        white-space: nowrap;
        animation: marqueeAnimationArriba 20s linear infinite;
    }

    .marquee-contentArriba {
        display: inline-block;
        width: 100%;
        text-align: center;
        padding-right: 100% !important;
    }

    @keyframes marqueeAnimationArriba {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* fin arriba */
    /* Abajo */
    .marquee-containerAbajo {
        overflow: hidden;
        background-color:
            <?php echo COLOR_BACKGROUND; ?>
        ;
        color: white;
        width: 100%;
        height: 40px;
        position: relative;
    }

    .marqueeAbajo {
        display: flex;
        white-space: nowrap;
        animation: marqueeAnimationAbajo 20s linear infinite;
    }

    .marquee-contentAbajo {
        display: inline-block;
        width: 100%;
        text-align: center;
        padding-right: 100% !important;
    }

    @keyframes marqueeAnimationAbajo {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* Fin abajo */

    /* fin slider */
    .seccion {
        padding-top: 50px;
        padding-bottom: 50px;
        padding-right: 15%;
        padding-left: 15%;
    }


    /* Fin header */

    /* FOOTER TEMPORAL */
    footer {
        background-color: #f8f9fa;
    }

    .footer {
        color: #6c757d;
    }

    .footer .copyright {
        background-color: #343a40;
        color: #ffffff;
        padding: 10px 0;
    }

    .footer a {
        color: #6c757d;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    /* FIN FOOTER TEMPORAL */

    /* Seccion de css añadido del anteiror sistema */
    .caja {
        padding-top: 40px !important;
        padding-bottom: 90px !important;
    }

    .degraded-line {
        width: 100%;
        height: 1px;
        background: radial-gradient(circle, #000000 30%, transparent 90%);
    }

    .category-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding-left: 20px;
        padding-right: 20px;
    }

    .category-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-position: center;
        background-size: cover;
        display: inline-block;
        margin-bottom: 10px;
    }

    .category-button {
        display: inline-block;
        width: auto;
        padding: 5px 20px;
        margin: 0 auto;
        border: none;
        cursor: pointer;
        text-align: center;
    }

    .category-container a {
        text-decoration: none;
        color: inherit;
    }

    .card_body_testimonios {
        min-height: 135px !important;
    }

    .card_body_testimonios p {
       max-width: 300px;
       margin: auto;
    }


    .img_card_testimonio {
        height: 150px !important;
        width: 150px !important;
        object-fit: cover !important;
    }

    /* Owl Carousel Customizations */

    .owl-carousel .owl-item img {
        object-fit: cover;
        height: 100%;
    }

    .owl-carousel .owl-nav {
        position: absolute;
        bottom: -35px;
        transform: translateY(-50%);
        width: 100%;
        z-index: 100;
    }

    .owl-dots {
        position: absolute;
        bottom: -50px;
        left: 0;
        right: 0;
        margin: auto;
    }

    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 25px;
    }

    .owl-carousel .owl-nav button.owl-prev {
        right: 85%;
    }

    .owl-carousel .owl-nav button.owl-next {
        left: 85%;
    }

    .owl-carousel .owl-nav button {
        font-size: 10em;
        color: #333;
    }

    .card {
        margin: auto;
    }

    .card h5 {
        font-size: 1rem !important;
        color: #000 !important;
    }

    .card-text {
        font-size: 0.9rem !important;
        color: #6c757d !important;
    }

    .text-muted.text-decoration-line-through {
        font-size: 14px;
    }

    .img-container {
        height: 250px;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .text-primary.fs-5.pe-2 {
        font-size: 1rem;
    }

    .product-footer {
        display: flex;
        align-items: center;
    }



    .btn-primary {
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
    }

    .btn-primary:hover {
        background-color: #0b5ed7 !important;
        border-color: #0a58ca !important;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #fff;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.375rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .carousel-item {
        min-height: 300px;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }

    @media (max-width: 768px) {
        .carousel-item {
            height: auto !important;
            min-height: 120px;
            background-position: center;
            background-size: contain;
        }

        .carousel-caption {
            display: none;
        }
    }

    .carousel-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color:
            <?php /* echo get_row('perfil', 'banner_color_filtro', 'id_perfil', '1')  */ ?> !important;
        opacity:
            <?php /* echo get_row('perfil', 'banner_opacidad', 'id_perfil', '1') */ ?> !important;
    }

    .carousel-caption {
        position: relative;
        z-index: 3;
    }

    .carousel-control-prev,
    .carousel-control-next {
        z-index: 1;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .text-decoration-none {
        text-decoration: none !important;
    }

    .text-dark {
        color: #343a40 !important;
    }

    .texto_precio {
        color:
            <?php echo COLOR_TEXTO_PRECIO; ?>
        ;
        ;
    }

    .card-body-proDes a {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
    }

    .card-title {
        margin-bottom: 0.75rem;
    }


    /* Botón flotante para WhatsApp */
    .whatsapp-float {
        position: fixed;
        width: auto;
        bottom: 40px;
        right: 40px;
        background-color: transparent;
        padding: -5px;
        text-decoration: none;
        z-index: 100;
        padding: 10px;

    }

    @media (max-width: 768px) {
        .whatsapp-float {
            bottom: 20px;
            /* Distancia desde el fondo para dispositivos móviles */
            right: 20px;
            /* Distancia desde el lado derecho para dispositivos móviles */
        }
    }


    .ws_flotante {
        color: #24d366 !important;
        background-color: transparent !important;
        font-size: 4em !important;
        transition: transform 0.3s ease;
        /* Transición suave */
    }

    .ws_flotante:hover {
        animation: bounce 0.5s ease infinite;
        /* Repetir la animación de forma indefinida */
    }

    /* Definimos la animación de "salto" */
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
            /* Ajusta el valor según la altura que quieras */
        }
    }


    /* Fin Botón flotante para WhatsApp */

    /* Fin seccion de css añadido del anteiror sistema */

    /* footer del anterior sistema */
    .footer-contenedor {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        padding: 20px;
        justify-content: space-around;
        place-content: center;
        background-color: #f1f1f1;
        flex-wrap: wrap;
    }

    .footer-contenido {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .descripcion {
        font-size: 12px;
        text-align: center;
    }

    .lista_legal {
        list-style: none;
        padding: 0;
    }

    .lista_legal li {
        font-size: 12px;
        margin: 5px;
    }

    #navbarLogo {
        width: 50px;
        height: 50px;
    }

    .icon-redes {
        margin: 5px;
    }

    .redes {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-redes img {
        width: 40px;
        height: 40px;
    }

    .icon-redes img:hover {
        transform: scale(1.4);
    }

    .icon-redes img:active {
        transform: scale(1);
    }

    .ws {
        color: #24d366;
        font-size: 2em;
    }

    .send {
        color: red;
        font-size: 2em;
    }

    @keyframes sacudir {
        0% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(10deg);
        }

        50% {
            transform: rotate(-10deg);
        }

        75% {
            transform: rotate(10deg);
        }

        100% {
            transform: rotate(-10deg);
        }
    }

    .icon-redes:hover {
        animation: sacudir 0.5s;
    }

    .icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }

    /* Añadir media queries para responsividad */
    @media (max-width: 768px) {
        .footer-contenedor {
            grid-template-columns: repeat(2, 1fr);
        }


    }

    @media (max-width: 480px) {
        .footer-contenedor {
            grid-template-columns: 1fr;
        }

        .descripcion,
        .lista_legal li {
            font-size: 14px;
        }

        .icon-redes img {
            width: 30px;
            height: 30px;
        }
    }

    .footer-container {
        background-color: #333;
        color: white;
        padding: 20px 0;
        text-align: center;
    }

    .footer-container h3,
    .footer-container p {
        margin: 5px 0;
    }

    .footer-container a {
        color: white;
        text-decoration: none;
    }

    .footer-container a:hover {
        text-decoration: underline;
    }



    .tachado {
        text-decoration: line-through;
    }

    .ahorro {
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .ahorro {
            font-size: 15px;
        }
    }

    .texto_boton {
        color:
            <?php echo COLOR_TEXTO_BOTON; ?>
            !important;
        background-color:
            <?php echo COLOR_BOTONES; ?>
            !important;
    }

    /* fin css faltante */

    /* carrito checkout */
    /* .productos_carrito-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        font-weight: 400;
    }

    .productos_carrito-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }

    .productos_carrito-item .productos_carrito-info {
        flex: 1;
        margin-left: 15px;
        font-size: 18px;
        font-weight: 600;
    }

    .productos_carrito-item .productos_carrito-info a {
        font-size: 18px;
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .productos_carrito-item .productos_carrito-info a:hover {
        text-decoration: underline;
    }

    .productos_carrito-item .productos_carrito-precio {
        margin-right: 10px;
        font-size: 18px;
        font-weight: 700;
        color: #000;
    }

    .resumen_carrito {
        border-top: 1px solid #ddd;
        padding-top: 15px;
        font-size: 16px;
        font-weight: bold;
    }

    .custom-card {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        max-width: 350px;
        margin: auto;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        font-weight: 400;
    }

    .custom-card-header {
        font-weight: bold;
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 10px;
    }

    .custom-card-body {
        background-color: #f4f6f9;
        padding: 10px;
        border-radius: 8px;
    }

    .custom-product {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        margin-bottom: 10px;
        background-color: white;
        border: 2px solid #f0f0f0;
        border-radius: 8px;
    }

    .custom-product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }

    .custom-product-info {
        flex-grow: 1;
        margin-left: 10px;
        font-weight: 600;
    }

    .custom-discount {
        display: inline-block;
        background-color: #fe0000;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9rem;
        font-weight: bold;
        margin-top: 5px;
    }

    .custom-product-price {
        text-align: right;
        font-size: 1rem;
    }

    .old-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9rem;
    }

    .new-price {
        font-weight: bold;
        font-size: 1.5rem;
        color: #000;
    }

    .custom-card-footer {
        margin-top: 10px;
        background-color: #e9e9e9;
        padding: 10px;
        border-radius: 8px;
    }

    .custom-summary {
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .free-shipping {
        color: #007bff;
        font-weight: bold;
    }

    .custom-total {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 1rem;
    }

    .total-price {
        color: #007bff;
        font-size: 1.2rem;
    } */
        /* fin carrito checkout */

</style>