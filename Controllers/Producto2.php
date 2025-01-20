<?php

class Producto2 extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->views->render($this, "index");
    }

    public function producto2()
    {
        $this->views->render($this, "producto2");
    }

    public function categorias2()
    {
        $this->views->render($this, "categorias2");
    }

    public function listar()
    {

        $data = $this->model->listar(ID_PLATAFORMA);
        echo json_encode($data);
    }
}
