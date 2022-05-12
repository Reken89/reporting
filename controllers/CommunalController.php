<?php

class CommunalController extends Controller {
    
    private $pageTpl = "/views/communal.php";
    private $pageTpl_back = "/views/communal_back.php";
    private $pageExcel = "/views/communal_excel.php";
    
    
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
        $_SESSION['communal_mounth'] = $svod_mounth ;
        } else {
         $svod_mounth = $_SESSION['communal_mounth'];   
        }
        
        if (!empty($_POST['svod_year'])) {
        $svod_year = $_POST['svod_year'];
        $_SESSION['communal_year'] = $svod_year;
        } else {
         $svod_year = $_SESSION['communal_year'];   
        }
        
        $count_mounth = count($svod_mounth);
        $count_year = count($svod_year);
        
        $a = $this->model->communal_back($svod_mounth, $svod_year, $count_mounth, $count_year);
        $this->pageData['info'] = $a;
        $this->pageData['communal_mounth'] = $svod_mounth;
        $this->pageData['communal_year'] = $svod_year;
        
        # Для рассылки EMAIL записываем значения в глобальные переменные
        #$_SESSION['communal_year'] = $svod_year;
        #$_SESSION['communal_mounth'] = $svod_mounth;
        
        $b = $this->model->total($svod_mounth, $svod_year);
        $this->pageData['total'] = $b;
    
        # Для выгрузки в EXCEL записываем значения в глобальные переменные
        $_SESSION['for_excel'] = $a;
        $_SESSION['for_excel_total'] = $b;
        
        $this->view->render($this->pageTpl_back, $this->pageData);
        
        }
        
        
        public function email(){
            
             if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        $year = $_SESSION['communal_year'];
        $mounth = $_SESSION['communal_mounth'];
        
        $this->model->email($year, $mounth);
            
        }
        
        
        public function excel(){
            
                    if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->view->render($this->pageExcel, $this->pageData);
            
        }
        
        
        public function update_status(){
            
                    if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
                $id = $_POST['id'];

        $this->model->update_status($id);
        echo "Информация отправленна";
            
        }
    
}

