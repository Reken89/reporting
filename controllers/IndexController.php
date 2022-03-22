<?php


class IndexController extends Controller {
    
    private $pageTpl = '/views/main.php';
    
    public function __construct() {
        
        $this->model = new IndexModel();
        $this->view = new View();
    }
    
    public function index() {
        
    
        
        $this->pageData['title'] = "Вход в личный кабинет";
             
        
        if(!empty($_POST)) {
            if(!$this->name()) {
                $this->pageData['error'] = "Неправильный логин или пароль";
            }
        }
        
       
        $this->view->render($this->pageTpl, $this->pageData);
        
    }
    
    public function name(){
        
        if(!$this->model->checkUser()){
            return false;
        }
    }
    
}