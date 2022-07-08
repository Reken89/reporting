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
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }
    
}

