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
        $this->pageData['total'] = $this->model->total($variant_repair);
        $this->pageData['status'] = $this->model->status();
        
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
        
        $fu = $_POST['fu'];
        # Убираем пробелы и меняем запятые на точки
        $fu = str_replace(" ", "", $fu);
        $fu = str_replace(",", ".", $fu);
        
        $this->model->update($id, $marker_b, $ekr, $title, $fu);
        
    }
    
    
            public function add() {
                 
                           if (!$_SESSION['user']) {
                       header("Location: /reporting");
                  } 
        
        $marker_b = $_POST['marker_b'];
        $ekr = $_POST['ekr'];
        $title = $_POST['title'];
        
        $variant_repair = $_SESSION['variant_repair'];
        $fu = $_POST['fu'];
        # Убираем пробелы и меняем запятые на точки
        $fu = str_replace(" ", "", $fu);
        $fu = str_replace(",", ".", $fu);
        
        $this->model->add($marker_b, $ekr, $title, $fu, $variant_repair);
        
        
             
         }
         
         
          public function delete(){
              
              if (!$_SESSION['user']) {
                       header("Location: /reporting");
                  } 
                  
        $marker_b = $_POST['marker_b'];
        $ekr = $_POST['ekr'];
        $id = $_POST['id'];
        
        $this->model->delete($marker_b, $ekr, $id);
              
          }
          
          
          public function update_status(){
              
              if (!$_SESSION['user']) {
                       header("Location: /reporting");
                  } 
              
                  $variant_repair = $_SESSION['variant_repair'];
                 
                  $this->model->update_status($variant_repair);
          }
    
}

