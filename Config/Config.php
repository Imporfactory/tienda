<?php
// ENV
require_once 'vendor/autoload.php';

const HOST = 'ls-8e06bb570f2cc81e5d618c19210a6effa1ee9ab6.czuooq2g4q5f.us-east-2.rds.amazonaws.com';
const USER = "dbmasteruser";
const PASSWORD = "db_82569_soi2uj32_ksn19210a6efczuooq2g4q";
const DB = "imporsuitpro_new_mx";
const CHARSET = "utf8";





if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('ENVIRONMENT', 'development');
} else {
    define('ENVIRONMENT', 'production');
}
if (ENVIRONMENT == 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    define("SERVERURL", "http://localhost/imporsutipro/");
} else {
}

$Ur = $_SERVER['HTTP_HOST'];



$url_actual = "https://" . $_SERVER['HTTP_HOST'] . '/';
$nombre_actual = str_replace("imporsuit.mx", "", $Ur);

//recibe pruebad.imporsuit.mx ydebe ser app.imporsuit.mx


$url_actual = str_replace($nombre_actual, "app.", $url_actual);

$mysqli = new mysqli(HOST, USER, PASSWORD, DB);
$mysqli->set_charset(CHARSET);
if ($mysqli->connect_errno) {
    echo "Error al conectarse con la base de datos";
    exit;
}

// devolver el host antes de app
$hostAntiguo = $_SERVER['HTTP_HOST'];
$hostNuevo = str_replace("imporsuit.mx", "", $hostAntiguo);


$recuperado = str_replace("app.", "", $hostNuevo);
$url_actual = "https://" . $recuperado . "imporsuit.mx";

$id_plataforma = "SELECT * FROM plataformas where url_imporsuit = '$url_actual' or dominio = '$hostAntiguo'";
//echo $id_plataforma;
$result = $mysqli->query($id_plataforma);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_plataforma = $row['id_plataforma'];

        $id_matriz = $row['id_matriz'];
    }
} else {
    echo "0 resultss";
}

//echo $id_matriz;
$url_matriz = "SELECT * FROM matriz where idmatriz = '$id_matriz'";
$result = $mysqli->query($url_matriz);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $url_matriz = $row['url_matriz'];
        $marca = $row['marca'];
        //echo $url_matriz;
        // $id_matriz = $row['id_matriz'];
    }
} else {
    echo "0 resultss";
}

$mysqli->close();




define("ID_PLATAFORMA", $id_plataforma);
define("SERVERURL", 'https://app.imporsuit.mx/');
define("MARCA", $marca);
