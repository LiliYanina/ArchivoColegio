<?php

class Home extends Controller
{

    protected $views, $model;

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        if (!empty($_SESSION['activo'])) {
            header("location: " . base_url . "Usuarios");
        }
        $this->views->getView($this, "index");
    }
}
