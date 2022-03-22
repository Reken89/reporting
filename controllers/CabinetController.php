<?php

class CabinetController extends Controller {
    
    private $pageTpl = "/views/cabinet.php";
    
    public function __construct() {
        
        $this->model = new CabinetModel();
        $this->view = new View();
        
    }
    
    public function index() {
        
        if(!$_SESSION['user']) {
             header("Location: /reporting");
        }
        
        $this->pageData['title'] = "Кабинет";
        
        # Для корректного отображения таблицы администратора
        $_SESSION['svod_mounth'] = ['1'];
        $_SESSION['svod_chapter'] = ['1'];
        $_SESSION['svod_title'] = ['СОШ1'];
        
        $_SESSION['rendering'] = "simple";
        
        $this->view->render($this->pageTpl, $this->pageData);
        
    }
    
}