<?php

class RepairfuController extends Controller {
    
        private $pageTpl = "/views/repairfu.php";
        private $pageTpl_back = "/views/repairfu_back.php";
        
                public function __construct() {
        $this->model = new RepairfuModel();
        $this->view = new View();
    }
    
            public function table() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
            public function repairfu_back() {
        
            if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        if(isset($_POST['variant'])){
            $variant_repair = $_POST['variant'];
            $_SESSION['variant_repair'] = $_POST['variant'];
        } else {
            $variant_repair = $_SESSION['variant_repair'];
        }
        
        $this->pageData['info'] = $this->model->repairfu_back($variant_repair);
        #$this->pageData['total'] = $this->model->total($variant_repair);
        #$this->pageData['status'] = $this->model->status();
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
}

