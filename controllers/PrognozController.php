<?php

class PrognozController extends Controller {
    
    private $pageTpl = "/views/prognoz.php";
    private $pageTpl_back = "/views/prognoz_back.php";
    
            public function __construct() {
        $this->model = new PrognozModel();
        $this->view = new View();
    }
    
            public function table() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
        public function prognoz_back() {
        
            if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        # Определяем какой вариант прогноза показывать
        if(isset($_POST['variant'])){
            $variant_prognoz = $_POST['variant'];
            $_SESSION['variant_prognoz'] = $_POST['variant'];
        } else {
            $variant_prognoz = $_SESSION['variant_prognoz'];
        }
        
        $this->pageData['info'] = $this->model->prognoz_back();
        $this->pageData['total'] = $this->model->total();
        $this->pageData['tarif'] = $this->model->tarif($variant_prognoz);
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
}


