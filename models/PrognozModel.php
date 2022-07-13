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
       
       
       $sql = "SELECT id, SUM(teplo_vol1), SUM(teplo_vol2), SUM(teplo_sum1), SUM(teplo_sum2), "
               . "SUM(water_vol1), SUM(water_vol2), SUM(water_sum1), SUM(water_sum2), "
               . "SUM(stoki_vol1), SUM(stoki_vol2), SUM(stoki_sum1), SUM(stoki_sum2), "
               . "SUM(elektro_vol1), SUM(elektro_vol2), SUM(elektro_sum1), SUM(elektro_sum2), "
               . "SUM(trash_vol1), SUM(trash_vol2), SUM(trash_sum1), SUM(trash_sum2), "
               . "SUM(negativka_vol1), SUM(negativka_vol2), SUM(negativka_sum1), SUM(negativka_sum2), "
               . "SUM(teplo_vol1 + teplo_vol2) AS teplo_vol, SUM(teplo_sum1 + teplo_sum2) AS teplo_sum, "
               . "SUM(water_vol1 + water_vol2) AS water_vol, SUM(water_sum1 + water_sum2) AS water_sum, "
               . "SUM(stoki_vol1 + stoki_vol2) AS stoki_vol, SUM(stoki_sum1 + stoki_sum2) AS stoki_sum, "
               . "SUM(elektro_vol1 + elektro_vol2) AS elektro_vol, SUM(elektro_sum1 + elektro_sum2) AS elektro_sum, "
               . "SUM(trash_vol1 + trash_vol2) AS trash_vol, SUM(trash_sum1 + trash_sum2) AS trash_sum, "
               . "SUM(negativka_vol1 + negativka_vol2) AS negativka_vol, SUM(negativka_sum1 + negativka_sum2) AS negativka_sum "
               . "from reporting_prognoz";
        
        
       
       
                          $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   
  
               # Разделяем число на блоки
               $block = ['SUM(teplo_vol1)', 'SUM(teplo_vol2)', 'SUM(teplo_sum1)', 'SUM(teplo_sum2)',
                   'SUM(water_vol1)', 'SUM(water_vol2)', 'SUM(water_sum1)', 'SUM(water_sum2)',
                   'SUM(stoki_vol1)', 'SUM(stoki_vol2)', 'SUM(stoki_sum1)', 'SUM(stoki_sum2)',
                   'SUM(elektro_vol1)', 'SUM(elektro_vol2)', 'SUM(elektro_sum1)', 'SUM(elektro_sum2)',
                   'SUM(trash_vol1)', 'SUM(trash_vol2)', 'SUM(trash_sum1)', 'SUM(trash_sum2)',
                   'SUM(negativka_vol1)', 'SUM(negativka_vol2)', 'SUM(negativka_sum1)', 'SUM(negativka_sum2)',
                   'teplo_sum', 'teplo_vol', 'water_vol', 'water_sum', 'stoki_vol', 'stoki_sum',
                   'elektro_vol', 'elektro_sum', 'trash_vol', 'trash_sum', 'negativka_vol', 'negativka_sum'];
               for ($num = 0 ; $num <= 35 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                        
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
     
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
 
 public function update($info){
     
     # Определяем что нужно обновить, тариф или объемы
     
     if($info['variant'] == "tarif"){
         
         $id = $info['id_tarif'];
         
         $sql = "UPDATE reporting_prognoz_tarif SET tarif1 = :tarif1, tarif2 = :tarif2 "
                 . "WHERE id = '$id'";
         
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":tarif1", $info['tarif1'], PDO::PARAM_STR);
                     $stmt->bindValue(":tarif2", $info['tarif2'], PDO::PARAM_STR);
                     
                     $stmt->execute();
         
         
     } elseif ($info['variant'] == "ob") {
     
         $id = $info['id'];
         # Определяем какой именно объем и сумму пересчитывать
                       switch ($_SESSION['variant_prognoz']) {
                  
                  case "teplo":
                      
                      # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '1'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[1]['tarif1'];
                   $tarif2 = $res[1]['tarif2'];
                   
                  # Записываем новые значения в БД
                   $sql = "UPDATE reporting_prognoz SET teplo_vol1 = :teplo_vol1, teplo_vol2 = :teplo_vol2, "
                           . "teplo_sum1 = :teplo_vol1 * '$tarif1', teplo_sum2 = :teplo_vol2 * '$tarif2' "
                           . "WHERE id = '$id'";
                   
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":teplo_vol1", $info['volume1'], PDO::PARAM_STR);
                     $stmt->bindValue(":teplo_vol2", $info['volume2'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                      
                      break;
                  
                  case "water":
                        # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '2'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[2]['tarif1'];
                   $tarif2 = $res[2]['tarif2'];
                   
                  # Записываем новые значения в БД
                   $sql = "UPDATE reporting_prognoz SET water_vol1 = :water_vol1, water_vol2 = :water_vol2, "
                           . "water_sum1 = :water_vol1 * '$tarif1', water_sum2 = :water_vol2 * '$tarif2' "
                           . "WHERE id = '$id'";
                   
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":water_vol1", $info['volume1'], PDO::PARAM_STR);
                     $stmt->bindValue(":water_vol2", $info['volume2'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                      break;
                  
                  case "stoki":
                      
                       # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '3'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[3]['tarif1'];
                   $tarif2 = $res[3]['tarif2'];
                   
                  # Записываем новые значения в БД
                   $sql = "UPDATE reporting_prognoz SET stoki_vol1 = :stoki_vol1, stoki_vol2 = :stoki_vol2, "
                           . "stoki_sum1 = :stoki_vol1 * '$tarif1', stoki_sum2 = :stoki_vol2 * '$tarif2' "
                           . "WHERE id = '$id'";
                   
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":stoki_vol1", $info['volume1'], PDO::PARAM_STR);
                     $stmt->bindValue(":stoki_vol2", $info['volume2'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                      
                      break;
                  
                  case "elektro":
                      
                        # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '4'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[4]['tarif1'];
                   $tarif2 = $res[4]['tarif2'];
                   
                  # Записываем новые значения в БД
                   $sql = "UPDATE reporting_prognoz SET elektro_vol1 = :elektro_vol1, elektro_vol2 = :elektro_vol2, "
                           . "elektro_sum1 = :elektro_vol1 * '$tarif1', elektro_sum2 = :elektro_vol2 * '$tarif2' "
                           . "WHERE id = '$id'";
                   
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":elektro_vol1", $info['volume1'], PDO::PARAM_STR);
                     $stmt->bindValue(":elektro_vol2", $info['volume2'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                      
                      break;
                  
                  case "trash":
                      
                      # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '5'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[5]['tarif1'];
                   $tarif2 = $res[5]['tarif2'];
                   
                  # Записываем новые значения в БД
                   $sql = "UPDATE reporting_prognoz SET trash_vol1 = :trash_vol1, trash_vol2 = :trash_vol2, "
                           . "trash_sum1 = :trash_vol1 * '$tarif1', trash_sum2 = :trash_vol2 * '$tarif2' "
                           . "WHERE id = '$id'";
                   
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":trash_vol1", $info['volume1'], PDO::PARAM_STR);
                     $stmt->bindValue(":trash_vol2", $info['volume2'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                      
                      break;
                  
                  case "negativka":
                      
                                            # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '6'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[6]['tarif1'];
                   $tarif2 = $res[6]['tarif2'];
                   
                  # Записываем новые значения в БД
                   $sql = "UPDATE reporting_prognoz SET negativka_vol1 = :negativka_vol1, negativka_vol2 = :negativka_vol2, "
                           . "negativka_sum1 = :negativka_vol1 * '$tarif1', negativka_sum2 = :negativka_vol2 * '$tarif2' "
                           . "WHERE id = '$id'";
                   
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":negativka_vol1", $info['volume1'], PDO::PARAM_STR);
                     $stmt->bindValue(":negativka_vol2", $info['volume2'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                      
                      break;
                  
                       }
         
 }
     
 }
 
         public function synch_ku(){
            
                  # Определяем с каким разделом таблиц работаем
                           switch ($_SESSION['variant_prognoz']) {
                  
                  case "teplo":
                      $zn = "SUM(volume1)";
                      $num = 1;
                      
                      $vol1 = "teplo_vol1";
                      $sum1 = "teplo_sum1";
                      $vol2 = "teplo_vol2";
                      $sum2 = "teplo_sum2";
                       break;
                  
                 case "water":
                      $zn = "SUM(volume4)";
                      $num = 2;
                      
                      $vol1 = "water_vol1";
                      $sum1 = "water_sum1";
                      $vol2 = "water_vol2";
                      $sum2 = "water_sum2";
                      break;
                  
                  case "stoki":
                      $zn = "SUM(volume2)";
                      $num = 3;
                      
                      $vol1 = "stoki_vol1";
                      $sum1 = "stoki_sum1";
                      $vol2 = "stoki_vol2";
                      $sum2 = "stoki_sum2";
                      break;
                  
                  case "elektro":
                      $zn = "SUM(volume5)";
                      $num = 4;
                      
                      $vol1 = "elektro_vol1";
                      $sum1 = "elektro_sum1";
                      $vol2 = "elektro_vol2";
                      $sum2 = "elektro_sum2";
                      break;
                  
                  case "trash":
                      $zn = "SUM(volume6)";
                      $num = 5;
                      
                      $vol1 = "trash_vol1";
                      $sum1 = "trash_sum1";
                      $vol2 = "trash_vol2";
                      $sum2 = "trash_sum2";
                      break;
                  
                  case "negativka":
                      $zn = "SUM(volume3)";
                      $num = 6;
                      
                      $vol1 = "negativka_vol1";
                      $sum1 = "negativka_sum1";
                      $vol2 = "negativka_vol2";
                      $sum2 = "negativka_sum2";
                      break;
                  
                           }
                      
                      # Получаем объемы за первое полугодие из таблицы КУ:
                      
                      $mounth = [1, 2, 3, 4, 5, 6];
                      $mounth = implode(",",$mounth);
                      
                      $sql = "SELECT id, name, $zn FROM `portal_ku` WHERE `year` = '2022' AND `mounth` IN($mounth) GROUP BY `name` order by `id` ASC";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $res[$row['id']] = $row;
                    }
                    
                    # Массив info содержит информацию за первое полугодие
                    $info = $res;
                    
                      # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '$num'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[$num]['tarif1'];
                   $tarif2 = $res[$num]['tarif2'];
                   
                   # Выполняем запись в таблицу прогноз
                   
                   # Используем ЦИКЛ, ЭТО НЕ СОВСЕМ ПРАВИЛЬНО!!!
                   foreach ($info as $key => $value) {
                       
                       $teplo_vol1 = $value[$zn];
                       $name = $value['name'];
                       
                       $sql = "UPDATE reporting_prognoz SET $vol1 = '$teplo_vol1', $sum1 = '$teplo_vol1' * '$tarif1' "
                               . "WHERE name = '$name'";
                       
                                 $stmt = $this->db->prepare($sql);
                                 $stmt->execute();
                       
                   }
                      
                   ##################################################################################################
                   
                                         # Получаем объемы за второе полугодие из таблицы КУ:
                      
                      $mounth = [7, 8, 9, 10, 11, 12];
                      $mounth = implode(",",$mounth);
                      
                      $sql = "SELECT id, name, $zn FROM `portal_ku` WHERE `year` = '2021' AND `mounth` IN($mounth) GROUP BY `name` order by `id` ASC";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $res[$row['id']] = $row;
                    }
                    
                    # Массив info содержит информацию за первое полугодие
                    $info = $res;
                    
                      # Получаем тарифы
                      $sql = "SELECT * FROM reporting_prognoz_tarif WHERE id = '$num'";
                      
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $res[$row['id']] = $row;
                   }
                   
                   $tarif1 = $res[$num]['tarif1'];
                   $tarif2 = $res[$num]['tarif2'];
                   
                   # Выполняем запись в таблицу прогноз
                   
                   # Используем ЦИКЛ, ЭТО НЕ СОВСЕМ ПРАВИЛЬНО!!!
                   foreach ($info as $key => $value) {
                       
                       $teplo_vol1 = $value[$zn];
                       $name = $value['name'];
                       
                       $sql = "UPDATE reporting_prognoz SET $vol2 = '$teplo_vol1', $sum2 = '$teplo_vol1' * '$tarif2' "
                               . "WHERE name = '$name'";
                       
                                 $stmt = $this->db->prepare($sql);
                                 $stmt->execute();
                       
                   }
                     
             
        }
    
}

