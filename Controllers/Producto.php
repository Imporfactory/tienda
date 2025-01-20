<?php

class Producto extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->views->render($this, "index");
    }

    public function producto()
    {
        $this->views->render($this, "producto");
    }

    public function categorias()
    {
        $this->views->render($this, "categorias");
    }

    public function listar()
    {

        $data = $this->model->listar(ID_PLATAFORMA);
        echo json_encode($data);
    }
}
