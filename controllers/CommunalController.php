<?php

class CommunalController extends Controller {
    
    private $pageTpl = "/views/communal.php";
    private $pageTpl_back = "/views/communal_back.php";
    
    
    public function __construct() {
        $this->model = new CommunalModel();
        $this->view = new View();
    }
    
                public function com() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
        public function communal_back() {
        
                if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        if (!empty($_POST['svod_mounth'])) {
        $svod_mounth = $_POST['svod_mounth'];
        } else {
         $svod_mounth = ["1"];   
        }
        
        if (!empty($_POST['svod_year'])) {
        $svod_year = $_POST['svod_year'];
        } else {
         $svod_year = ["2022"];   
        }
        
        $count_mounth = count($svod_mounth);
        $count_year = count($svod_year);
        
        $a = $this->model->communal_back($svod_mounth, $svod_year, $count_mounth, $count_year);
        $this->pageData['info'] = $a;
        $this->pageData['communal_mounth'] = $svod_mounth;
        $this->pageData['communal_year'] = $svod_year;
        
        $b = $this->model->total($svod_mounth, $svod_year);
        $this->pageData['total'] = $b;
    
        
        $this->view->render($this->pageTpl_back, $this->pageData);
        
        }
    
}

