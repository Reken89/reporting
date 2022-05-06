<?php

class EditoruserModel extends Model {
    
        public function editor_user() {
        
    }
    
        public function editor_user_back() {
        
        
        $sql = "SELECT id, login, role FROM `budget_users`";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $res[$row['id']] = $row;
           }
           
           #print_r($res);
           return $res;
        
    }
    
    
    public function editor_user_update($id, $login, $role) {
        
        $sql = "UPDATE budget_users SET login = :login, role = :role WHERE id = '$id'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":role", $role, PDO::PARAM_STR);
        $stmt->execute();
        
        echo "Информация обновлена";
        
    }
    
    
        public function editor_user_add($password, $login, $role) {
        
         $password = md5($password);   
            
        $sql = "INSERT INTO budget_users (`login`,`password`,`role`) VALUES (:login, :password, :role)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":role", $role, PDO::PARAM_STR);
        $stmt->execute();
        
        echo "Учетная запись добавлена";
        
    }
    
}
