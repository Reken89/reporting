<?php


class IndexModel extends Model {
    
    public function checkUser() {
        
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM budget_users WHERE login = :name AND password = :password";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        
        
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
       
        
        
       if (!empty($res)) {
   
            $_SESSION['user'] = $_POST['name'];
            $_SESSION['role'] = $res['role'];
            $_SESSION['id'] = $res['id'];
            
            header("Location: /reporting/cabinet");
        } else {
            return false;
            
        }
        
    }
    
}
