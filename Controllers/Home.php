<?php

use FontLib\EOT\Header;

/* session_start(); */

class Home extends Controller
{
    private $homeModel;

    public function __construct()
    {
        parent::__construct();
    }

    ///Vistas
    public function index()
    {
        $id_plataforma = ID_PLATAFORMA;
        $home = $this->model->plantilla($id_plataforma);

        $plantilla = $home[0]['plantilla'];

        // Condicional dependiendo del resultado
        if ($plantilla == 1) {
            // Renderizar la vista normalmente si hay productos
            $this->views->render($this, "index");
        } else if ($plantilla == 2) {
            // Renderizar la vista normalmente si hay productos
            $this->views->render($this, "index2");
        } else if ($plantilla == 3){
            $this->views->render($this, "index3");
        }else if ($plantilla == 4){
            $this->views->render($this, "index4");
        }
    }
}