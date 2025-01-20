<?php

class Categoria3 extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->views->render($this, "index");
    }

    public function listar()
    {

        $data = $this->model->listar(ID_PLATAFORMA);
        echo json_encode($data);
    }
}
