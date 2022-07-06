<?php

class BudgetController extends Controller {
    
    private $pageTpl = "/views/budget.php";
    private $pageTpl_back = "/views/budget_back.php";
    
        public function __construct() {
        $this->model = new BudgetModel();
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
        
        if(isset($_POST['variant'])){
            $variant_budget = $_POST['variant'];
            $_SESSION['variant_budget'] = $_POST['variant'];
        } else {
            $variant_budget = $_SESSION['variant_budget'];
        }
        
        $this->pageData['info'] = $this->model->budget_back($variant_budget);
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
    public function update() {
                    if (!$_SESSION['user']) {
                       header("Location: /reporting");
        }
        
        $id = $_POST['id'];
        $marker_b = $_POST['marker_b'];
        
        if(isset($_POST['glava'])){
            $glava = $_POST['glava'];
        } else {
            $glava = "x";
        }
        
        if(isset($_POST['adm'])){
            $adm = $_POST['adm'];
        } else {
            $adm = "x";
        }
        
        if(isset($_POST['sovet'])){
            $sovet = $_POST['sovet'];
        } else {
            $sovet = "x";
        }
        
        if(isset($_POST['kso'])){
            $kso = $_POST['kso'];
        } else {
            $kso = "x";
        }
        
        if(isset($_POST['cb'])){
            $cb = $_POST['cb'];
        } else {
            $cb = "x";
        }
        
        if(isset($_POST['zakupki'])){
            $zakupki = $_POST['zakupki'];
        } else {
            $zakupki = "x";
        }
        
        if(isset($_POST['aurinko'])){
            $aurinko = $_POST['aurinko'];
        } else {
            $aurinko = "x";
        }
        
        if(isset($_POST['berezka'])){
            $berezka = $_POST['berezka'];
        } else {
            $berezka = "x";
        }
        
        if(isset($_POST['zoloto'])){
            $zoloto = $_POST['zoloto'];
        } else {
            $zoloto = "x";
        }
        
        if(isset($_POST['korablik'])){
            $korablik = $_POST['korablik'];
        } else {
            $korablik = "x";
        }
        
        if(isset($_POST['gnomik'])){
            $gnomik = $_POST['gnomik'];
        } else {
            $gnomik = "x";
        }
        
        if(isset($_POST['skazka'])){
            $skazka = $_POST['skazka'];
        } else {
            $skazka = "x";
        }
        
        if(isset($_POST['solnishko'])){
            $solnishko = $_POST['solnishko'];
        } else {
            $solnishko = "x";
        }
        
        if(isset($_POST['dmsh'])){
            $dmsh = $_POST['dmsh'];
        } else {
            $dmsh = "x";
        }
        
        if(isset($_POST['dhsh'])){
            $dhsh = $_POST['dhsh'];
        } else {
            $dhsh = "x";
        }
        
        if(isset($_POST['vsosh_ds'])){
            $vsosh_ds = $_POST['vsosh_ds'];
        } else {
            $vsosh_ds = "x";
        }
        
        if(isset($_POST['vsosh_school'])){
            $vsosh_school = $_POST['vsosh_school'];
        } else {
            $vsosh_school = "x";
        }
        
        if(isset($_POST['kums'])){
            $kums = $_POST['kums'];
        } else {
            $kums = "x";
        }
        
        if(isset($_POST['uprava'])){
            $uprava = $_POST['uprava'];
        } else {
            $uprava = "x";
        }
        
        if(isset($_POST['edds'])){
            $edds = $_POST['edds'];
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

