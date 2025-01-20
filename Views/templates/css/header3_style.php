<style>
    img {
        object-fit: cover;
    }

    * {
        box-sizing: border-box !important;
        margin: 0;
        padding: 0;
        transition: all .2s linear;
    }

    :root {
        --color1: #F8F9FA;
        --color2: #000;
        --color3: #5BBDCF;
        --color4: #0A4680;
        --color5: #3480D1;
    }

    section {
        margin-bottom: 150px;
    }

    .container {
        max-width: 1200px !important;
    }

    body {
        background-color: var(--color1) !important;
    }

    .fondo-primary {
        background-color: var(--color4) !important;
    }

    .fondo-secondary {
        background-color: var(--color3) !important;
    }

    .fondo-tertiary {
        background-color: var(--color1) !important;
    }

    .texto-primary {
        color: var(--color3);
    }

    .texto-secondary {
        color: var(--color4);
    }

    .texto-tertiary {
        color: var(--color5);
    }

    .btn-primary {
        border: 0px;
        background-color: var(--color4) !important;
    }

    .btn-secondary {
        border-color: transparent;
        border: 0px !important;
        color: #ffffff !important;
        background-color: var(--color3) !important;
    }

    a {
        text-decoration: none !important;
    }

    .active {
        color: var(--color3) !important;
        border-bottom: 2px solid var(--color3);
    }

    .padding {
        padding-top: 100px;
        padding-bottom: 100px;
    }

    .card-title {
        display: -webkit-box !important;
        -webkit-box-orient: vertical !important;
        -webkit-line-clamp: 1 !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }


    /* boton de wpp ################################ */
    #chatOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9;
    }

    .chat-body {
        background-color: #E2D9D1;
    }

    .chat-window {
        z-index: 10;
    }

    .chat-window {
        border: 1px solid #ccc;
    }

    .chat-header {
        background-color: #3C876E;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    /* header ##########################*/

    header {
        min-height: 80vh;
    }

    .texto1Header {
        font-size: 50px;
        line-height: 50px;
    }

    /* seccion1 ##########################*/

    .seccion1 {
        margin-top: -97px;
    }

    /* seccion2 ##########################*/

    .seccion2 {
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .seccion2>* {
        position: relative;
        z-index: 2;
    }

    #parallax-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #5bbecf;
        z-index: 1;
        opacity: 0.3;
    }

    .seccion2 .container {
        position: relative;
        z-index: 2;
        /* Contenido por encima del overlay */
    }


    /* seccion3 ##########################*/


    .card_body_productos_destacados p {
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        text-align: justify;
    }

    .seccion3 {
        background-image: url(https://content.app-sources.com/s/53156514013336927/uploads/Images/Funnel_odontolog%C3%ADa-02-4441408.png?format=webp);
    }

    .card-cover::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #052646e7;
        z-index: 1;
    }

    .card-cover .d-flex {
        position: relative;
        z-index: 2;
    }


    /* seccion 5 ##########################*/
    .img2Seccion5 {
        width: 100%;
        max-width: 400px;
    }

    /* seccion 6 ##########################*/

    .seccion6 {
        background-image: url(https://content.app-sources.com/s/53156514013336927/uploads/Images/Funnel_odontolog%C3%ADa-02-4441408.png?format=webp);
    }

    .seccion6 .card img {
        height: 200px;
        object-fit: cover;
    }

    .descripcionCardProfesional {
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        text-align: justify;
    }

    .modal-footer-profesionales{
        justify-content: space-between !important;
    }

    .redesSociales i {
        font-size: 20px !important;
        color: #666666 !important;
    }

    /* calendario ##########################*/
    .contenedor-calendario {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        margin: auto;
    }

    .cabecera-calendario {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .table td {
        cursor: pointer;
    }

    .table .hoy {
        background-color: #007bff;
        color: white;
    }

    .table .seleccionado {
        background-color: #28a745;
        color: white;
    }

    .horas-reservadas li {
        cursor: pointer;
    }

    .horas-reservadas .reservada {
        color: rgba(255, 0, 0, 0.77);
        background-color: rgba(255, 0, 0, 0.188);
    }

    .horas-reservadas .disponible {
        color: green;
    }

    .horas-reservadas .seleccionada {
        background-color: #28a745;
        color: white;
    }

    .horas-reservadas li {
        position: relative;
        display: block;
        padding: var(--bs-list-group-item-padding-y) var(--bs-list-group-item-padding-x);
        color: var(--bs-list-group-color);
        text-decoration: none;
        background-color: var(--bs-list-group-bg);
        border: var(--bs-list-group-border-width) solid var(--bs-list-group-border-color);
    }

    /* pagina productos ##########################*/

    .card-body-paginaProductos p {
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        -webkit-line-clamp: 1 !important;
        text-align: justify;
    }

    /* Media querys pagina tienda*/

    @media (max-width: 1400px) {}

    @media (max-width: 1200px) {}

    @media (max-width: 992px) {

        /* header ##########################*/

        .containerHeader {
            padding-top: 80px;
        }

        .textosHeader {
            max-width: 400px;
        }

        .texto1Header {
            font-size: 30px;
            line-height: 40px;
        }
    }

    @media (max-width: 768px) {
        .row>* {

            padding-right: calc(var(--bs-gutter-x)* .1);
            padding-left: calc(var(--bs-gutter-x)* .1);
        }

        section {
            margin-bottom: 60px;
        }

        .padding {
            padding-top: 60px;
            padding-bottom: 60px;
        }

        /* header ##########################*/


        .imgHeader {
            max-width: 500px;
            margin: auto;
        }

        /* seccion 1 ##########################*/
        .seccion1 {
            margin-top: 50px;
        }

        .containerSeccion1 .card p {
            font-size: 14px !important;
        }

        /* seccion 3 ##########################*/



        .cardSevicio h3 {
            font-size: 25px;
        }

        /* seccion 5 ##########################*/

        .img2Seccion5 {
            width: 100%;
            max-width: 430px;
        }
    }

    @media (max-width: 576px) {


        /* calendario ############################# */
        .contenedor-calendario {
            padding: 30px 10px !important;
        }


    }
</style>