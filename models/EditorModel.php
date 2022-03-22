<?php

class EditorModel extends Model {
    
    public function editor_ofs() {
        
    }
    
    public function editor_back() {
        
        
        $sql = "SELECT `t1`. id, `t1`.`name`, ekr, `t2`. marker_a, marker_b FROM "
                . "`reporting_name` as `t1` INNER JOIN `reporting_meaning` as `t2` WHERE "
                . "`t1`.`id` = `t2`.`id_name`";
         
         
        
        
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $res[$row['id']] = $row;
           }
           
           #print_r($res);
           return $res;
        
    }
    
    
    public function rewriting($id, $name, $ekr) {
        
        $sql = "UPDATE reporting_name SET name = :name, ekr = :ekr WHERE id = '$id'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":ekr", $ekr, PDO::PARAM_STR);
        $stmt->execute();
        
        echo "Информация обновлена";
        
    }
    
}
