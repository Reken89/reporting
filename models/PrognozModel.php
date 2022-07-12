<?php

class PrognozModel extends Model {
    
 public function table() {
     
 }
 
  public function prognoz_back() {
      
                      $sql = "SELECT * from reporting_prognoz";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['teplo_vol1', 'teplo_vol2', 'teplo_sum1', 'teplo_sum2',
                   'water_vol1', 'water_vol2', 'water_sum1', 'water_sum2',
                   'stoki_vol1', 'stoki_vol2', 'stoki_sum1', 'stoki_sum2',
                   'elektro_vol1', 'elektro_vol2', 'elektro_sum1', 'elektro_sum2',
                   'trash_vol1', 'trash_vol2', 'trash_sum1', 'trash_sum2',
                   'negativka_vol1', 'negativka_vol2', 'negativka_sum1', 'negativka_sum2'];
               for ($num = 0 ; $num <= 23 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
     
 }
 
   public function total() {
     
 }
 
   public function tarif() {
     
                $sql = "SELECT * from reporting_prognoz_tarif";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['name']] = $row;
                   }
        
                   return $res;
       
 }
    
}

