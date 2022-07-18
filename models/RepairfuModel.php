<?php

class RepairfuModel extends Model {
    
                public function table(){
        
         }
         
         public function repairfu_back() {
             
         }
         
                  public function status(){
             
             $sql = "SELECT * FROM repair_status";
             
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
             
         }
    
}

