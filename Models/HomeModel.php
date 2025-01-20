<?php

class HomeModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function plantilla($id_plataforma)
    {
        $sql = "SELECT `plantilla` FROM `perfil` WHERE id_plataforma=$id_plataforma";
        return $this->select($sql);
    }
}
