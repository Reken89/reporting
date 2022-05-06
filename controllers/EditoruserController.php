<?php

class EditoruserController extends Controller {
    
    private $pageTpl = "/views/editoruser.php";
    private $pageTpl_back = "/views/editoruser_back.php";
    
    
    public function __construct() {
        $this->model = new EditoruserModel();
        $this->view = new View();
    }
    
            public function editor_user() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
        public function editor_user_back() {
        
                if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        $a = $this->model->editor_user_back();
        $this->pageData['info'] = $a;
    
        
        $this->view->render($this->pageTpl_back, $this->pageData);
        
        }
        
                public function editor_user_update() {
            
            if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
           
        $id = $_POST['id'];
        $login = $_POST['login'];
        $role = $_POST['role'];
        
        $this->model->editor_user_update($id, $login, $role);
            
        }
        
        
                        public function editor_user_add() {
            
            if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
           
        $password = $_POST['password'];
        $login = $_POST['login'];
        $role = $_POST['role'];
        
        $this->model->editor_user_add($password, $login, $role);
            
        }
    
}

