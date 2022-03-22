<?php

class EditorController extends Controller {
    
    private $pageTpl = "/views/editor.php";
    private $pageTpl_back = "/views/editor_back.php";
    
    
    public function __construct() {
        $this->model = new EditorModel();
        $this->view = new View();
    }
    
    
    
        public function editor_ofs() {

        if (!$_SESSION['user']) {
            header("Location: /reporting");
        }

        $this->pageData['title'] = "Таблица";

        $this->view->render($this->pageTpl, $this->pageData);
    }
    
    
        public function editor_back() {
        
                if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
        
        $a = $this->model->editor_back();
        $this->pageData['info'] = $a;
    
        
        $this->view->render($this->pageTpl_back, $this->pageData);
        
        }
        
        public function rewriting() {
            
            if (!$_SESSION['user']) {
            header("Location: /reporting");
        }
           
        $id = $_POST['id'];
        $name = $_POST['name'];
        $ekr = $_POST['ekr'];
        
        $this->model->rewriting($id, $name, $ekr);
            
        }
    
    
    
    
    
}


