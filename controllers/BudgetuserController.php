<?php

class BudgetuserController extends Controller {
    
    private $pageTpl = "/views/budgetuser.php";
    private $pageTpl_back = "/views/budgetuser_back.php";
    
        public function __construct() {
        $this->model = new BudgetuserModel();
        $this->view = new View();
    }
    
            public function table() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
        public function budget_back() {
        
            if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
              
        $this->pageData['status'] = $this->model->status();
        $this->pageData['info'] = $this->model->budget_back();
        $this->pageData['total'] = $this->model->total();
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
    
    public function update(){
                            if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        $id = $_POST['id'];
        $marker_b = $_POST['marker_b'];
        
        #################################################################
        if(isset($_POST['glava'])){
            $glava = $_POST['glava'];
            
        # Убираем пробелы и меняем запятые на точки
        $glava = str_replace(" ", "", $glava);
        $glava = str_replace(",", ".", $glava);
        
        #Подставляем формулу арифметических действий в строку
        $str = $glava;
        $str2 = '$res='.$str.';';
        eval($str2);
        $glava = $res;
        
        } else {
            $glava = "x";
        }
        
        #################################################################
        if(isset($_POST['adm'])){
            $adm = $_POST['adm'];
            
        # Убираем пробелы и меняем запятые на точки
        $adm = str_replace(" ", "", $adm);
        $adm = str_replace(",", ".", $adm);
        
        #Подставляем формулу арифметических действий в строку
        $str = $adm;
        $str2 = '$res='.$str.';';
        eval($str2);
        $adm = $res;
        
        } else {
            $adm = "x";
        }
        
        ##################################################################
        if(isset($_POST['sovet'])){
            $sovet = $_POST['sovet'];
            
        # Убираем пробелы и меняем запятые на точки
        $sovet = str_replace(" ", "", $sovet);
        $sovet = str_replace(",", ".", $sovet);
        
        #Подставляем формулу арифметических действий в строку
        $str = $sovet;
        $str2 = '$res='.$str.';';
        eval($str2);
        $sovet = $res;
        
        } else {
            $sovet = "x";
        }
        
        ##################################################################
        if(isset($_POST['kso'])){
            $kso = $_POST['kso'];
            
        # Убираем пробелы и меняем запятые на точки
        $kso = str_replace(" ", "", $kso);
        $kso = str_replace(",", ".", $kso);
        
        #Подставляем формулу арифметических действий в строку
        $str = $kso;
        $str2 = '$res='.$str.';';
        eval($str2);
        $kso = $res;
        
        } else {
            $kso = "x";
        }
        
        #################################################################
        if(isset($_POST['cb'])){
            $cb = $_POST['cb'];
            
        # Убираем пробелы и меняем запятые на точки
        $cb = str_replace(" ", "", $cb);
        $cb = str_replace(",", ".", $cb);
        
        #Подставляем формулу арифметических действий в строку
        $str = $cb;
        $str2 = '$res='.$str.';';
        eval($str2);
        $cb = $res;
        
        } else {
            $cb = "x";
        }
        
        ################################################################
        if(isset($_POST['zakupki'])){
            $zakupki = $_POST['zakupki'];
            
        # Убираем пробелы и меняем запятые на точки
        $zakupki = str_replace(" ", "", $zakupki);
        $zakupki = str_replace(",", ".", $zakupki);
        
        #Подставляем формулу арифметических действий в строку
        $str = $zakupki;
        $str2 = '$res='.$str.';';
        eval($str2);
        $zakupki = $res;
        
        } else {
            $zakupki = "x";
        }
        
        ###############################################################
        if(isset($_POST['aurinko'])){
            $aurinko = $_POST['aurinko'];
            
        # Убираем пробелы и меняем запятые на точки
        $aurinko = str_replace(" ", "", $aurinko);
        $aurinko = str_replace(",", ".", $aurinko);
        
        #Подставляем формулу арифметических действий в строку
        $str = $aurinko;
        $str2 = '$res='.$str.';';
        eval($str2);
        $aurinko = $res;
        
        } else {
            $aurinko = "x";
        }
        
        ###############################################################
        if(isset($_POST['berezka'])){
            $berezka = $_POST['berezka'];
            
        # Убираем пробелы и меняем запятые на точки
        $berezka = str_replace(" ", "", $berezka);
        $berezka = str_replace(",", ".", $berezka);
        
        #Подставляем формулу арифметических действий в строку
        $str = $berezka;
        $str2 = '$res='.$str.';';
        eval($str2);
        $berezka = $res;
        
        } else {
            $berezka = "x";
        }
        
        ##############################################################
        if(isset($_POST['zoloto'])){
            $zoloto = $_POST['zoloto'];
            
        # Убираем пробелы и меняем запятые на точки
        $zoloto = str_replace(" ", "", $zoloto);
        $zoloto = str_replace(",", ".", $zoloto);
        
        #Подставляем формулу арифметических действий в строку
        $str = $zoloto;
        $str2 = '$res='.$str.';';
        eval($str2);
        $zoloto = $res;
        
        } else {
            $zoloto = "x";
        }
        
        ##############################################################
        if(isset($_POST['korablik'])){
            $korablik = $_POST['korablik'];
            
        # Убираем пробелы и меняем запятые на точки
        $korablik = str_replace(" ", "", $korablik);
        $korablik = str_replace(",", ".", $korablik);
        
        #Подставляем формулу арифметических действий в строку
        $str = $korablik;
        $str2 = '$res='.$str.';';
        eval($str2);
        $korablik = $res;
        
        } else {
            $korablik = "x";
        }
        
        ##############################################################
        if(isset($_POST['gnomik'])){
            $gnomik = $_POST['gnomik'];
            
        # Убираем пробелы и меняем запятые на точки
        $gnomik = str_replace(" ", "", $gnomik);
        $gnomik = str_replace(",", ".", $gnomik);
        
        #Подставляем формулу арифметических действий в строку
        $str = $gnomik;
        $str2 = '$res='.$str.';';
        eval($str2);
        $gnomik = $res;
        
        } else {
            $gnomik = "x";
        }
        
        ##############################################################
        if(isset($_POST['skazka'])){
            $skazka = $_POST['skazka'];
            
        # Убираем пробелы и меняем запятые на точки
        $skazka = str_replace(" ", "", $skazka);
        $skazka = str_replace(",", ".", $skazka);
        
        #Подставляем формулу арифметических действий в строку
        $str = $skazka;
        $str2 = '$res='.$str.';';
        eval($str2);
        $skazka = $res;
        
        } else {
            $skazka = "x";
        }
        
        ##############################################################
        if(isset($_POST['solnishko'])){
            $solnishko = $_POST['solnishko'];
            
        # Убираем пробелы и меняем запятые на точки
        $solnishko = str_replace(" ", "", $solnishko);
        $solnishko = str_replace(",", ".", $solnishko);
        
        #Подставляем формулу арифметических действий в строку
        $str = $solnishko;
        $str2 = '$res='.$str.';';
        eval($str2);
        $solnishko = $res;
        
        } else {
            $solnishko = "x";
        }
        
        ##############################################################
        if(isset($_POST['dmsh'])){
            $dmsh = $_POST['dmsh'];
            
        # Убираем пробелы и меняем запятые на точки
        $dmsh = str_replace(" ", "", $dmsh);
        $dmsh = str_replace(",", ".", $dmsh);
        
        #Подставляем формулу арифметических действий в строку
        $str = $dmsh;
        $str2 = '$res='.$str.';';
        eval($str2);
        $dmsh = $res;
        
        } else {
            $dmsh = "x";
        }
        
        ###############################################################
        if(isset($_POST['dhsh'])){
            $dhsh = $_POST['dhsh'];
            
        # Убираем пробелы и меняем запятые на точки
        $dhsh = str_replace(" ", "", $dhsh);
        $dhsh = str_replace(",", ".", $dhsh);
        
        #Подставляем формулу арифметических действий в строку
        $str = $dhsh;
        $str2 = '$res='.$str.';';
        eval($str2);
        $dhsh = $res;
        
        } else {
            $dhsh = "x";
        }
        
        ################################################################
        if(isset($_POST['vsosh_ds'])){
            $vsosh_ds = $_POST['vsosh_ds'];
            
        # Убираем пробелы и меняем запятые на точки
        $vsosh_ds = str_replace(" ", "", $vsosh_ds);
        $vsosh_ds = str_replace(",", ".", $vsosh_ds);
        
        #Подставляем формулу арифметических действий в строку
        $str = $vsosh_ds;
        $str2 = '$res='.$str.';';
        eval($str2);
        $vsosh_ds = $res;
        
        } else {
            $vsosh_ds = "x";
        }
        
        ###############################################################
        if(isset($_POST['vsosh_school'])){
            $vsosh_school = $_POST['vsosh_school'];
            
        # Убираем пробелы и меняем запятые на точки
        $vsosh_school = str_replace(" ", "", $vsosh_school);
        $vsosh_school = str_replace(",", ".", $vsosh_school);
        
        #Подставляем формулу арифметических действий в строку
        $str = $vsosh_school;
        $str2 = '$res='.$str.';';
        eval($str2);
        $vsosh_school = $res;
        
        } else {
            $vsosh_school = "x";
        }
        
        ###############################################################
        if(isset($_POST['kums'])){
            $kums = $_POST['kums'];
            
        # Убираем пробелы и меняем запятые на точки
        $kums = str_replace(" ", "", $kums);
        $kums = str_replace(",", ".", $kums);
        
        #Подставляем формулу арифметических действий в строку
        $str = $kums;
        $str2 = '$res='.$str.';';
        eval($str2);
        $kums = $res;
        
        } else {
            $kums = "x";
        }
        
        ###############################################################
        if(isset($_POST['uprava'])){
            $uprava = $_POST['uprava'];
            
        # Убираем пробелы и меняем запятые на точки
        $uprava = str_replace(" ", "", $uprava);
        $uprava = str_replace(",", ".", $uprava);
        
        #Подставляем формулу арифметических действий в строку
        $str = $uprava;
        $str2 = '$res='.$str.';';
        eval($str2);
        $uprava = $res;
        
        } else {
            $uprava = "x";
        }
        
        ##############################################################
        if(isset($_POST['edds'])){
            $edds = $_POST['edds'];
            
        # Убираем пробелы и меняем запятые на точки
        $edds = str_replace(" ", "", $edds);
        $edds = str_replace(",", ".", $edds);
        
        #Подставляем формулу арифметических действий в строку
        $str = $edds;
        $str2 = '$res='.$str.';';
        eval($str2);
        $edds = $res;
        
        } else {
            $edds = "x";
        }
        
        $value = [
            "id" => $id,
            "marker_b" => $marker_b,
            "glava" => $glava,
            "adm" => $adm,
            "sovet" => $sovet,
            "kso" => $kso,
            "cb" => $cb,
            "zakupki" => $zakupki,
            "aurinko" => $aurinko,
            "berezka" => $berezka,
            "zoloto" => $zoloto,
            "korablik" => $korablik,
            "gnomik" => $gnomik,
            "skazka" => $skazka,
            "solnishko" => $solnishko,
            "dmsh" => $dmsh,
            "dhsh" => $dhsh,
            "vsosh_ds" => $vsosh_ds,
            "vsosh_school" => $vsosh_school,
            "kums" => $kums,
            "uprava" => $uprava,
            "edds" => $edds
        ];
        
        $this->model->update($value);
    }
    
}

