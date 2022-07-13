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
    
        public function update(){
            
                        if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        # Определяем что мы получили из формы, тариф или значение объема
                if(isset($_POST['id_tarif'])){
                    
                    $id_tarif = $_POST['id_tarif'];
                    
                    $tarif1 = $_POST['tarif1'];
                    # Убираем пробелы и меняем запятые на точки
                    $tarif1 = str_replace(" ", "", $tarif1);
                    $tarif1 = str_replace(",", ".", $tarif1);
        
                    $tarif2 = $_POST['tarif2'];
                    # Убираем пробелы и меняем запятые на точки
                    $tarif2 = str_replace(" ", "", $tarif2);
                    $tarif2 = str_replace(",", ".", $tarif2);
                    
                    $variant = "tarif";
                    
                    $info = [
                        "id_tarif" => $id_tarif,
                        "tarif1" => $tarif1,
                        "tarif2" => $tarif2,
                        "variant" => $variant
                    ];
                    
                    $this->model->update($info);
                    
                }
                
                if(isset($_POST['id'])){
                    
                    $id = $_POST['id'];
                    
                    $volume1 = $_POST['volume1'];
                    # Убираем пробелы и меняем запятые на точки
                    $volume1 = str_replace(" ", "", $volume1);
                    $volume1 = str_replace(",", ".", $volume1);
                    
                    $volume2 = $_POST['volume2'];
                    # Убираем пробелы и меняем запятые на точки
                    $volume2 = str_replace(" ", "", $volume2);
                    $volume2 = str_replace(",", ".", $volume2);
                    
                    $variant = "ob";
                    
                    $info = [
                        "id" => $id,
                        "volume1" => $volume1,
                        "volume2" => $volume2,
                        "variant" => $variant
                    ];
                    
                    $this->model->update($info);
                    
                }
            
        }
        
        public function synch_ku(){
            
                                   if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
            
            $this->model->synch_ku();
            
        }
    
}


