<?php

class RepairstrController extends Controller {
    
        private $pageTpl = "/views/repairstr.php";
        private $pageTpl_back = "/views/repairstr_back.php";
        
                public function __construct() {
        $this->model = new RepairstrModel();
        $this->view = new View();
    }
    
            public function table() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
        public function repairstr_back() {
        
            if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        if(isset($_POST['variant'])){
            $variant_repair = $_POST['variant'];
            $_SESSION['variant_repair'] = $_POST['variant'];
        } else {
            $variant_repair = $_SESSION['variant_repair'];
        }
        
        $this->pageData['info'] = $this->model->repairstr_back($variant_repair);
        #$this->pageData['total'] = $this->model->total($variant_budget);
        #$this->pageData['status'] = $this->model->status();
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
    public function update() {
        
                    if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        $id = $_POST['id'];
        $marker_b = $_POST['marker_b'];
        $ekr = $_POST['ekr'];
        $title = $_POST['title'];
        
        $str = $_POST['str'];
        # Убираем пробелы и меняем запятые на точки
        $str = str_replace(" ", "", $str);
        $str = str_replace(",", ".", $str);
        
        $this->model->update($id, $marker_b, $ekr, $title, $str);
        
    }
    
             public function add() {
                 
                           if (!$_SESSION['user']) {
                       header("Location: /reporting");
        } 
        
        $marker_b = $_POST['marker_b'];
        $ekr = $_POST['ekr'];
        $title = $_POST['title'];
        
        $str = $_POST['str'];
        # Убираем пробелы и меняем запятые на точки
        $str = str_replace(" ", "", $str);
        $str = str_replace(",", ".", $str);
        
        $this->model->add($marker_b, $ekr, $title, $str);
        
        
             
         }
    
}

