<?php

class RepaircbController extends Controller {
    
        private $pageTpl = "/views/repaircb.php";
        private $pageTpl_back = "/views/repaircb_back.php";
        private $pageTpl_excel = "/views/repaircb_excel.php";
        
                public function __construct() {
        $this->model = new RepaircbModel();
        $this->view = new View();
    }
    
    public function table() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    public function repaircb_back() {
        
            if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        if(isset($_POST['variant'])){
            $variant_repair = $_POST['variant'];
            $_SESSION['variant_repair'] = $_POST['variant'];
        } else {
            $variant_repair = $_SESSION['variant_repair'];
        }
        
        $this->pageData['info'] = $this->model->repaircb_back($variant_repair);
        $this->pageData['total'] = $this->model->total($variant_repair);
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
    
    public function excel() {
              
              if (!$_SESSION['user']) {
                       header("Location: /reporting");
                  }
                  
                 
            $variant_repair = $_SESSION['variant_repair'];
        
        
        $this->pageData['info'] = $this->model->repaircb_back($variant_repair);
        $this->pageData['total'] = $this->model->total($variant_repair);
        
        $this->view->render($this->pageTpl_excel, $this->pageData);
              
          }
    
}

