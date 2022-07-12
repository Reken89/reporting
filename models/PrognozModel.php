<?php

class PrognozModel extends Model {
    
 public function table() {
     
 }
 
  public function prognoz_back() {
      
                      $sql = "SELECT *,(teplo_vol1 + teplo_vol2) AS teplo_vol, (teplo_sum1 + teplo_sum2) AS teplo_sum, "
                              . "(water_vol1 + water_vol2) AS water_vol, (water_sum1 + water_sum2) AS water_sum, "
                              . "(stoki_vol1 + stoki_vol2) AS stoki_vol, (stoki_sum1 + stoki_sum2) AS stoki_sum, "
                              . "(elektro_vol1 + elektro_vol2) AS elektro_vol, (elektro_sum1 + elektro_sum2) AS elektro_sum, "
                              . "(trash_vol1 + trash_vol2) AS trash_vol, (trash_sum1 + trash_sum2) AS trash_sum, "
                              . "(negativka_vol1 + negativka_vol2) AS negativka_vol, (negativka_sum1 + negativka_sum2) AS negativka_sum "
                              . "from reporting_prognoz";

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
                   'negativka_vol1', 'negativka_vol2', 'negativka_sum1', 'negativka_sum2',
                   'teplo_sum', 'teplo_vol', 'water_vol', 'water_sum', 'stoki_vol', 'stoki_sum',
                   'elektro_vol', 'elektro_sum', 'trash_vol', 'trash_sum', 'negativka_vol', 'negativka_sum'];
               for ($num = 0 ; $num <= 35 ; ++$num) {
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

