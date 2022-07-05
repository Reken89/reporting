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
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
}

