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
        
        if($count_mounth == '1' && $count_year == '1'){
            $this->pageData['tarif'] = $this->model->tarif($svod_mounth, $svod_year);
        }else{
            $this->pageData['tarif'] = [
                'id'           => NULL,
                'heat_one'     => 'X',
                'heat_two'     => 'X',
                'drainage_one' => 'X',
                'drainage_two' => 'X',
                'negative_one' => 'X',
                'negative_two' => 'X',
                'water_one'    => 'X',
                'water_two'    => 'X',
                'electro_one'  => 'X',
                'electro_two'  => 'X',
                'trash_one'    => 'X',
                'trash_two'    => 'X'
            ];
        }   
        
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
        
        public function update_tarif()
        {
            $id = $_POST['id'];
            $heat_one = $_POST['heat_one'];
            $heat_one = str_replace(" ", "", $heat_one);
            $heat_one = str_replace(",", ".", $heat_one);
            
            $heat_two = $_POST['heat_two'];
            $heat_two = str_replace(" ", "", $heat_two);
            $heat_two = str_replace(",", ".", $heat_two);
            
            $drainage_one = $_POST['drainage_one'];
            $drainage_one = str_replace(" ", "", $drainage_one);
            $drainage_one = str_replace(",", ".", $drainage_one);
            
            $drainage_two = $_POST['drainage_two'];
            $drainage_two = str_replace(" ", "", $drainage_two);
            $drainage_two = str_replace(",", ".", $drainage_two);
            
            $negative_one = $_POST['negative_one'];
            $negative_one = str_replace(" ", "", $negative_one);
            $negative_one = str_replace(",", ".", $negative_one);
            
            $negative_two = $_POST['negative_two'];
            $negative_two = str_replace(" ", "", $negative_two);
            $negative_two = str_replace(",", ".", $negative_two);
            
            $water_one = $_POST['water_one'];
            $water_one = str_replace(" ", "", $water_one);
            $water_one = str_replace(",", ".", $water_one);
            
            $water_two = $_POST['water_two'];
            $water_two = str_replace(" ", "", $water_two);
            $water_two = str_replace(",", ".", $water_two);
            
            $electro_one = $_POST['electro_one'];
            $electro_one = str_replace(" ", "", $electro_one);
            $electro_one = str_replace(",", ".", $electro_one);
            
            $electro_two = $_POST['electro_two'];
            $electro_two = str_replace(" ", "", $electro_two);
            $electro_two = str_replace(",", ".", $electro_two);
            
            $trash_one = $_POST['trash_one'];
            $trash_one = str_replace(" ", "", $trash_one);
            $trash_one = str_replace(",", ".", $trash_one);
            
            $trash_two = $_POST['trash_two'];
            $trash_two = str_replace(" ", "", $trash_two);
            $trash_two = str_replace(",", ".", $trash_two);
            
            $values = [
                'heat_one'     => $heat_one,
                'heat_two'     => $heat_two,
                'drainage_one' => $drainage_one,
                'drainage_two' => $drainage_two,
                'negative_one' => $negative_one,
                'negative_two' => $negative_two,
                'water_one'    => $water_one,
                'water_two'    => $water_two,
                'electro_one'  => $electro_one,
                'electro_two'  => $electro_two,
                'trash_one'    => $trash_one,
                'trash_two'    => $trash_two
            ];
            
            $this->model->update_tarif($id, $values);
        }
    
}

