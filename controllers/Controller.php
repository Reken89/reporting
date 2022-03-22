<?php

class Controller {
    public $model;
    public $view;
    protected $pageData = [];
    protected $table;
    
    public function __construct() {
        $this->view = new View();
        $this->model = new Model();
    }
}