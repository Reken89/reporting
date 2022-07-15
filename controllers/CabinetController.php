<?php

class CabinetController extends Controller {
    
    private $pageTpl = "/views/cabinet.php";
    
    public function __construct() {
        
        $this->model = new CabinetModel();
        $this->view = new View();
        
    }
    
    public function index() {
        
        if(!$_SESSION['user']) {
             header("Location: /reporting");
        }
        
        $this->pageData['title'] = "Кабинет";
        
        # Для корректного отображения таблицы администратора
        $_SESSION['svod_mounth'] = ['1'];
        $_SESSION['svod_chapter'] = ['1'];
        $_SESSION['svod_title'] = ['СОШ1'];
        
        $_SESSION['rendering'] = "simple";
        
        # Для корректного отображения таблицы коммунальные услуги (администратор)
        $_SESSION['communal_year'] = ["2022"];
        $_SESSION['communal_mounth'] = ["1"];
        
        # Для корректного отображения таблицы СМЕТА бюджет (Администратор)
        $_SESSION['variant_budget'] = "one";
        
        # Для корректного отображения таблицы прогноз коммуналки
        $_SESSION['variant_prognoz'] = "teplo";
        
        # Для корректного отображения таблицы ремонты
        $_SESSION['variant_repair'] = "one";
        

        $this->view->render($this->pageTpl, $this->pageData);
        
    }
    
}

# Проверочный комит