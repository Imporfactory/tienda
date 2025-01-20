<?php

class Agendar_cita_p3 extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->views->render($this, "index");
    }

    public function Agendar_cita_p3()
    {
        $this->views->render($this, "Agendar_cita_p3");
    }
}
