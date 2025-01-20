<style>
body {
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, sans-serif;
	margin: 0
}

code {
	font-family: source-code-pro, Menlo, Monaco, Consolas, Courier New, monospace
}

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
	--text-color: #000;
	--text-color2: #5c5959;
	--blanco: #FFFFFF;
	--gris1: #FAFAFA;
	--gris2: #EFEFEF;
	--color1: #0c71cf;
	--color2: #752fb5;
	--color3: rgba(31, 135, 233, .455);
	--input: #c1bfbf;
	--loading: #0076e479
}

section {
	margin-bottom: 30px;
}

.container {
	max-width: 1200px !important;
}

body {
	background-color: var(--gris1) !important;
}

.fondo-primary {
	background-color: var(--color1) !important;
}

.texto-primary {
	color: var(--color1);
}

.btn-primary {
	background-color: var(--color1) !important;
}

.btn-secondary {
	border-color: transparent;
	border: 0px !important;
	color: #5C5959 !important;
	background-color: var(--gris2) !important;
}

h2,
h3,
h4,
h5 {
	color: #000;
	color: var(--text-color)
}

a {
	text-decoration: none !important;
}

body {
	background-color: #fafafa;
	background-color: var(--gris)
}

.flickity-page-dots {
	display: none;
}




/* menu fijo inferior ################################ */
.menuFixed span{
	font-size: 13px;
}
.menuFixed button, .btnFixedMenuInicio{
	height: 40px;
	width: 40px;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
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

.chat-window {
	z-index: 10;
}
.chat-window {
	border: 1px solid #ccc;
}

.chat-header {
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.cursor-pointer {
	cursor: pointer;
}


/* nav ################################ */
.navbar1 {
	background-color: white;
}

.navbar-toggler {
	border: 0px !important;
}

.contNav .btn {
	border: 0px;
}

/* header ################################ */

.container-header {
	background-color: #FAFAFA;
}

.carousel1 {
	height: 500px;
}


.gallery {
	background: #EEE;
}

.gallery-cell {
	border-radius: 10px;
	width: 66%;
	height: 200px;
	margin-right: 30px;
	background: #8C8;
	counter-increment: gallery-cell;
}

.carou1 img {
	object-fit: cover;
}

/* seccion 1 ################################ */
.seccion1 {
	margin-top: 80px;
}

.imgCard {
	height: 150px;
	object-fit: cover;
}

.gallery2 .card {
	width: 23rem;
}

/* seccion 2 ################################ */

.imgCarta3 {
	object-fit: cover;
	height: 80px;
	width: 80px;
}

.seccion2 .card {
	width: 22rem
}

.seccion2 .card img {}

/* seccion 3 ################################ */
.seccion3 .card {
	width: 23rem;
	height: 200px;
	display: flex;
	/* Agrega display flex para centrar */
	justify-content: center;
	/* Centra horizontalmente */
	align-items: center;
	/* Centra verticalmente */
	overflow: hidden;
	/* Evita que la imagen se desborde */
}

.seccion3 .card img {
	max-height: 100%;
	max-width: 100%;
	object-fit: cover;
	margin: auto;
}

/* seccion 4 ################################ */
.seccion4 .card {
	width: 23rem;
	height: 200px;
	display: flex;
	justify-content: center;
	align-items: center;
	overflow: hidden;
}

.seccion4 .card img {
	max-height: 100%;
	max-width: 100%;
	object-fit: cover;
	margin: auto;
}

/* footer ################################ */
.colfFoo {
	width: 100%;
	max-width: 25%;
}

footer {
	margin-top: 100px;
	border-radius: 30px 30px 0px 0px !important;
}

/* Media querys index */

@media (max-width: 1400px) {
	/* Tu CSS aquí */
}

@media (max-width: 1200px) {
	/* Tu CSS aquí */
}

@media (max-width: 992px) {
	.flickity-prev-next-button {
		display: none !important;
	}
}

@media (max-width: 768px) {
	
	section {
		margin-bottom: 0px;
	}

	.gallery-cell {
		margin-right: 15px !important;
	}

	/* header ################################ */
	/* nav ################################ */

	.navbar1 {
		background-color: var(--color1) !important;
		border-radius: 0px 0px 0px 30px;
	}

	.navbar1 .container {
		padding-top: 7px !important;
		padding-bottom: 7px !important;
	}

	.contNav button,
	.contNav i {
		color: white !important;
	}

	.contNav .dropdown {
		display: none !important;
	}

	.contNav .navbar-toggler p {
		display: none;
	}

	.logo img {
		width: 40px !important;
	}

	.offcanvasIzquierdo {
		max-width: 300px !important;
	}

	/* header ################################ */

	header {
		background-color: var(--color1);
	}

	.container-header {
		border-radius: 0px 30px 0px 0px;
	}

	.carousel1 {
		height: 200px;
	}

	.carou1 img {
		height: 110px;

	}

	.flickity-viewport {
		height: 150px;
	}

	/* seccion 1 ################################ */
	.seccion1 {
		margin-top: 20px;
	}

	.imgCard {
		height: 110px;
	}

	.gallery2 .card {
		width: 19rem;
	}

	/* seccion 2 ################################ */
	.imgCarta3 {
		height: 80px;
		width: 80px;
	}

	.gallery3 h5,
	.gallery3 p {
		margin-bottom: 0px !important;
	}

	/* footer ################################ */
	footer {
		margin-top: 0px;
		border-radius: 0px 0px 0px 0px !important;
	}

	.colfFoo {
		width: 100%;
		max-width: none;
		margin-top: 25px;
	}

	.redesFoo i {
		font-size: 18px !important;
	}
}

@media (max-width: 576px) {

	/* header  ################################ */


	/* seccion 1 ################################ */
	.seccion1 {
		margin-top: 18px;
	}

	.imgCard {
		height: 110px;
	}

	.gallery2 .card-body {
		padding: 8px;
	}

	.gallery2 .card-body p,
	.gallery2 .card-body h5 {
		font-size: 15px;
	}

	/* seccion 2 ################################ */
	.seccion2 .card {
		width: 18rem
	}

	/* seccion 3 ################################ */
	.seccion3 .card {
		width: 18rem;
	}

	.seccion3 .card {
		width: 18rem;
		height: 190px;
	}

	/* seccion 4 ################################ */
	.seccion4 .card {
		width: 18rem;
	}

	.seccion4 .card {
		width: 18rem;
		height: 190px;
	}
}


/*  ############################################# */
/* Pagina Tienda ################################ */
/*  ############################################# */

/* header ################################ */
.PTcontainerHeader {
	background-color: #FAFAFA;
}

.PTtextosHeader {
	position: relative;
}

.PTtextosHeader2 {
	padding-left: 160px !important;
}

.PTtextosHeader img {
	width: 130px;
	height: 130px;
	position: absolute;
	z-index: 1;
	top: -70px;
}

/* seccion 1 ################################ */

.PTcardsSection1 img {
	height: 170px;
}

.PTcardsSection1 .card {
	width: 15rem !important;
}

.card-title,
.card-text {
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}

.PTtipoProductoCont .card {
	width: 22rem;
	height: fit-content !important;
}

.PTimgCarta3 {
	object-fit: cover;
	height: 120px;
	width: 120px;
}

/* Media querys pagina tienda*/

@media (max-width: 1400px) {}

@media (max-width: 1200px) {}

@media (max-width: 992px) {}

@media (max-width: 768px) {

	/* nav ################################ */
	.PTiconoRegresar i {
		color: white !important;
	}

	/* header ################################ */
	.PTcontainerHeader {
		border-radius: 0px 30px 0px 0px !important;
	}

	.PTtextosHeader {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	.PTtextosHeader2 {
		padding-left: 0px !important;
		padding-top: 50px;
		text-align: center;
	}

	.PTredesHeader {
		justify-content: center;
	}

}

@media (max-width: 576px) {}



/*  ############################################# */
/* Pagina producto ################################ */
/*  ############################################# */

.PPbtnsHeader i{
	display: flex;
	justify-content: center;
	align-items: center;
	height: 36px;
	width: 36px;
}
.PPImagenHeaderImg1 {
	width: 100%;
	max-width: 400px;
	height: 400px;
}

.PPgaleriaProducto {
	width: 100%;
	max-width: 400px;
}

.PPgaleriaProducto img {
	width: 70px;
	height: 70px;
	object-fit: cover;

}

.PPcont2 {
	border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;;
	border-radius: 30px 30px 30px 30px;
	box-shadow: var(--bs-box-shadow) !important;
}

.PPcantidad button {
	width: 27px !important;
}

.PPcantidad span {
	font-size: 18px;
	min-width: 20px;
	text-align: center;
	display: inline-block;
}

/* Media querys pagina tienda*/

@media (max-width: 1400px) {}

@media (max-width: 1200px) {}

@media (max-width: 992px) {}

@media (max-width: 768px) {


	.PPcont2 {
		border: 0px !important;
		border-radius: 0px 30px 0px 30px;
		box-shadow: none !important;
	}
	footer{
		margin-top: 0px;
		border-radius: 0px 30px 0px 0px !important;
	}


}

@media (max-width: 576px) {}


</style>