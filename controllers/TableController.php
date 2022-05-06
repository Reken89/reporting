<?php

class TableController extends Controller {

    private $pageTpl = "/views/ofs.php";
    private $pageTpl_back = "/views/ofs_back.php";
    private $pageTpl_excel = "/views/ofs_excel.php";
    
    
    
        public function __construct() {

        $this->model = new TableModel();
        $this->view = new View();
    }

    public function ofs() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
    
    
    public function back() {
        
                if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        if($_SESSION['role'] == 'admin'){
        $_SESSION['rendering'] = "simple";
        }
                
            if (!empty($_POST['svod_mounth'])) {
        
            $svod_mounth = $_POST['svod_mounth'];
            $_SESSION['svod_mounth'] = $svod_mounth;
            $count_svod_mounth = count($svod_mounth);           
            $_SESSION['rendering'] = "table";
  
                     } else {

                        $svod_mounth = $_SESSION['svod_mounth'];
                        $count_svod_mounth = count($svod_mounth);
                        
                        
                    }
        
                 
                                if (!empty($_POST['svod_chapter'])) {
        
            $svod_chapter = $_POST['svod_chapter'];
            $_SESSION['svod_chapter'] = $svod_chapter;
            $count_svod_chapter = count($svod_chapter);
            $_SESSION['rendering'] = "table";
                             
                     } else {

                        $svod_chapter = $_SESSION['svod_chapter'];
                        $count_svod_chapter = count($svod_chapter);
                    }
                    
                    
                                                    if (!empty($_POST['svod_title'])) {
        
            $svod_title = $_POST['svod_title'];
            $_SESSION['svod_title'] = $svod_title;
            $count_svod_title = count($svod_title);
            $_SESSION['rendering'] = "table";
                             
                     } else {

                        $svod_title = $_SESSION['svod_title'];
                        $count_svod_title = count($svod_title);
                    }
        
        
        
        
        $a = $this->model->back($svod_mounth, $svod_chapter, $svod_title, $count_svod_mounth, $count_svod_chapter, $count_svod_title);
        $this->pageData['info'] = $a;
        
        $b = $this->model->total($svod_mounth, $svod_chapter, $svod_title);
        $this->pageData['total'] = $b;
        
        # Сохраняем информацию в сессию, для выгрузки в excel
        $_SESSION['for_excel'] = $a['res'];
        $_SESSION['for_excel_total'] = $b;
        
        $this->view->render($this->pageTpl_back, $this->pageData);
        
    }
    
    
    public function test() {
        
    }
    
    public function update() {
        
                        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        $id = $_POST['id'];
        
 
        $debit_end_term = $_POST['debit_end_term'];
        $debit_end_all = $_POST['debit_end_all'];
        $credit_end_term = $_POST['credit_end_term'];
        $credit_end_all = $_POST['credit_end_all'];
        $kassa_mounth = $_POST['kassa_mounth'];
        $kassa_all = $_POST['kassa_all'];
        $fact_mounth = $_POST['fact_mounth'];
        $fact_all = $_POST['fact_all'];
        $debit_year_term = $_POST['debit_year_term'];
        $debit_year_all = $_POST['debit_year_all'];
        $credit_year_term = $_POST['credit_year_term'];
        $credit_year_all = $_POST['credit_year_all'];
        $lbo = $_POST['lbo'];
        $marker_b = $_POST['marker_b'];
        $return_old = $_POST['return_old'];
        $prepaid = $_POST['prepaid'];
        
        # Убираем пробелы и меняем запятые на точки
        $debit_end_term = str_replace(" ", "", $debit_end_term);
        $debit_end_term = str_replace(",", ".", $debit_end_term);
        
        #Подставляем формулу арифметических действий в строку
        $str = $debit_end_term;
        $str2 = '$res='.$str.';';
        eval($str2);
        $debit_end_term = $res;
        
        $debit_end_all = str_replace(" ", "", $debit_end_all);
        $debit_end_all = str_replace(",", ".", $debit_end_all);
        
        #Подставляем формулу арифметических действий в строку
        $str = $debit_end_all;
        $str2 = '$res='.$str.';';
        eval($str2);
        $debit_end_all = $res;
        
        $credit_end_term = str_replace(" ", "", $credit_end_term);
        $credit_end_term = str_replace(",", ".", $credit_end_term);
        
        #Подставляем формулу арифметических действий в строку
        $str = $credit_end_term;
        $str2 = '$res='.$str.';';
        eval($str2);
        $credit_end_term = $res;
        
        $credit_end_all = str_replace(" ", "", $credit_end_all);
        $credit_end_all = str_replace(",", ".", $credit_end_all);
        
        #Подставляем формулу арифметических действий в строку
        $str = $credit_end_all;
        $str2 = '$res='.$str.';';
        eval($str2);
        $credit_end_all = $res;
        
        $kassa_mounth = str_replace(" ", "", $kassa_mounth);
        $kassa_mounth = str_replace(",", ".", $kassa_mounth);
        
        #Подставляем формулу арифметических действий в строку
        $str = $kassa_mounth;
        $str2 = '$res='.$str.';';
        eval($str2);
        $kassa_mounth = $res;
        
        $kassa_all = str_replace(" ", "", $kassa_all);
        $kassa_all = str_replace(",", ".", $kassa_all);
        
        $fact_mounth = str_replace(" ", "", $fact_mounth);
        $fact_mounth = str_replace(",", ".", $fact_mounth);
        
        #Подставляем формулу арифметических действий в строку
        $str = $fact_mounth;
        $str2 = '$res='.$str.';';
        eval($str2);
        $fact_mounth = $res;
        
        $fact_all = str_replace(" ", "", $fact_all);
        $fact_all = str_replace(",", ".", $fact_all);
        
        $debit_year_term = str_replace(" ", "", $debit_year_term);
        $debit_year_term = str_replace(",", ".", $debit_year_term);
        
        #Подставляем формулу арифметических действий в строку
        $str = $debit_year_term;
        $str2 = '$res='.$str.';';
        eval($str2);
        $debit_year_term = $res;
        
        $debit_year_all = str_replace(" ", "", $debit_year_all);
        $debit_year_all = str_replace(",", ".", $debit_year_all);
        
        #Подставляем формулу арифметических действий в строку
        $str = $debit_year_all;
        $str2 = '$res='.$str.';';
        eval($str2);
        $debit_year_all = $res;
        
        $credit_year_term = str_replace(" ", "", $credit_year_term);
        $credit_year_term = str_replace(",", ".", $credit_year_term);
        
        #Подставляем формулу арифметических действий в строку
        $str = $credit_year_term;
        $str2 = '$res='.$str.';';
        eval($str2);
        $credit_year_term = $res;
        
        $credit_year_all = str_replace(" ", "", $credit_year_all);
        $credit_year_all = str_replace(",", ".", $credit_year_all);
        
        #Подставляем формулу арифметических действий в строку
        $str = $credit_year_all;
        $str2 = '$res='.$str.';';
        eval($str2);
        $credit_year_all = $res;
        
        $lbo = str_replace(" ", "", $lbo);
        $lbo = str_replace(",", ".", $lbo);
        
        #Подставляем формулу арифметических действий в строку
        $str = $lbo;
        $str2 = '$res='.$str.';';
        eval($str2);
        $lbo = $res;
        
        $return_old = str_replace(" ", "", $return_old);
        $return_old = str_replace(",", ".", $return_old);
        
        #Подставляем формулу арифметических действий в строку
        $str = $return_old;
        $str2 = '$res='.$str.';';
        eval($str2);
        $return_old = $res;
        
        $prepaid = str_replace(" ", "", $prepaid);
        $prepaid = str_replace(",", ".", $prepaid);
        
        #Подставляем формулу арифметических действий в строку
        $str = $prepaid;
        $str2 = '$res='.$str.';';
        eval($str2);
        $prepaid = $res;
                
        $mounth = $_SESSION['svod_mounth'];
        $mounth = $mounth[0];
        
        $chapter = $_SESSION['svod_chapter'];
        $chapter = $chapter[0];
        
        $title = $_SESSION['svod_title'];
        $title = $title[0];
               
        
        $this->model->update($id, $debit_end_term, $debit_end_all, $credit_end_term, $credit_end_all, $kassa_mounth, $kassa_all, $fact_mounth, $fact_all, $debit_year_term, $debit_year_all, $credit_year_term, $credit_year_all, $lbo, $mounth, $chapter, $title, $marker_b, $return_old, $prepaid);
        
    }
    
    public function dispatch() {
        
            if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        $error1 = $_SESSION['error1'];
        $error2 = $_SESSION['error2'];
        
        $mounth = $_SESSION['svod_mounth'];
        $mounth = $mounth[0];
        
        $chapter = $_SESSION['svod_chapter'];
        $chapter = $chapter[0];
        
        $title = $_SESSION['svod_title'];
        $title = $title[0];
        
        $this->model->dispatch($error1,$error2,$mounth,$chapter,$title);
        
    }
    
    
    public function editing1() {
        
            if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
                
        $mounth = $_SESSION['svod_mounth'];
        $mounth = $mounth[0];
        
        $chapter = $_SESSION['svod_chapter'];
        $chapter = $chapter[0];
        
        $title = $_SESSION['svod_title'];
        $title = $title[0];
        
        $this->model->editing1($mounth,$chapter,$title);
    }
    
    
        public function editing2() {
        
            if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
                
        $mounth = $_SESSION['svod_mounth'];
        $mounth = $mounth[0];
        
        $chapter = $_SESSION['svod_chapter'];
        $chapter = $chapter[0];
        
        $title = $_SESSION['svod_title'];
        $title = $title[0];
        
        $this->model->editing2($mounth,$chapter,$title);
    }
    
    
    public function excel(){
        
                    if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        $this->view->render($this->pageTpl_excel, $this->pageData);
        
    }
    
    public function reset(){
        
        $debit_end_term = $_POST['debit_end_term'];
        $debit_end_all = $_POST['debit_end_all'];
        $credit_end_term = $_POST['credit_end_term'];
        $credit_end_all = $_POST['credit_end_all'];        
        $debit_year_term = $_POST['debit_year_term'];
        $debit_year_all = $_POST['debit_year_all'];
        $credit_year_term = $_POST['credit_year_term'];
        $credit_year_all = $_POST['credit_year_all'];
        $lbo = $_POST['lbo'];
        $return_old = $_POST['return_old'];
        $prepaid = $_POST['prepaid'];

        
        # Убираем пробелы и меняем запятые на точки
        $debit_end_term = str_replace(" ", "", $debit_end_term);
        $debit_end_term = str_replace(",", ".", $debit_end_term);
        
        $debit_end_all = str_replace(" ", "", $debit_end_all);
        $debit_end_all = str_replace(",", ".", $debit_end_all);
        
        $credit_end_term = str_replace(" ", "", $credit_end_term);
        $credit_end_term = str_replace(",", ".", $credit_end_term);
        
        $credit_end_all = str_replace(" ", "", $credit_end_all);
        $credit_end_all = str_replace(",", ".", $credit_end_all);
        
        $debit_year_term = str_replace(" ", "", $debit_year_term);
        $debit_year_term = str_replace(",", ".", $debit_year_term);
        
        $debit_year_all = str_replace(" ", "", $debit_year_all);
        $debit_year_all = str_replace(",", ".", $debit_year_all);
        
        $credit_year_term = str_replace(" ", "", $credit_year_term);
        $credit_year_term = str_replace(",", ".", $credit_year_term);
        
        $credit_year_all = str_replace(" ", "", $credit_year_all);
        $credit_year_all = str_replace(",", ".", $credit_year_all);
        
        $lbo = str_replace(" ", "", $lbo);
        $lbo = str_replace(",", ".", $lbo);
        
        $return_old = str_replace(" ", "", $return_old);
        $return_old = str_replace(",", ".", $return_old);
        
        $prepaid = str_replace(" ", "", $prepaid);
        $prepaid = str_replace(",", ".", $prepaid);
        
        $id = $_POST['id'];
        $marker_b = $_POST['marker_b'];
        $id_name = $_POST['id_name'];
        
        $mounth = $_SESSION['svod_mounth'];
        $mounth = $mounth[0];
        
        $chapter = $_SESSION['svod_chapter'];
        $chapter = $chapter[0];
        
        $title = $_SESSION['svod_title'];
        $title = $title[0];
        
        $this->model->reset($id, $mounth, $marker_b, $chapter, $title, $debit_end_term, $debit_end_all, $credit_end_term, $credit_end_all, $debit_year_term, $debit_year_all, $credit_year_term, $credit_year_all, $lbo, $id_name, $return_old, $prepaid);
        
    }
    
    
    public function filling(){
        
                    if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
                
        $mounth = $_SESSION['svod_mounth'];
        $mounth = $mounth[0];
        
        $chapter = $_SESSION['svod_chapter'];
        $chapter = $chapter[0];
        
        $title = $_SESSION['svod_title'];
        $title = $title[0];
        
        $this->model->filling($mounth,$chapter,$title);
        
    }
    
}

