<?php

class RepairfuModel extends Model {
    
                public function table(){
        
         }
         
         public function repairfu_back($variant_repair) {
             
            # Определяем какую информацию получать из БД
              switch ($variant_repair) {
        
            case "one":
                
                   $sql = "SELECT * from repair WHERE marker_b BETWEEN '1' AND '10'";
                
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки

               $row['str'] = number_format($row['str'], 2, ',', ' ');
               $row['fu'] = number_format($row['fu'], 2, ',', ' ');
               
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                break;
            
            case "two":
                
                $sql = "SELECT * from repair WHERE marker_b BETWEEN '11' AND '17'";
                
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки

               $row['str'] = number_format($row['str'], 2, ',', ' ');
               $row['fu'] = number_format($row['fu'], 2, ',', ' ');
               
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                break;
            
            case "three":
                
                $sql = "SELECT * from repair WHERE marker_b BETWEEN '18' AND '19'";
                
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки

               $row['str'] = number_format($row['str'], 2, ',', ' ');
               $row['fu'] = number_format($row['fu'], 2, ',', ' ');
               
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                break;
            
            case "four":
                
                $sql = "SELECT * from repair WHERE marker_b BETWEEN '20' AND '21'";
                
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки

               $row['str'] = number_format($row['str'], 2, ',', ' ');
               $row['fu'] = number_format($row['fu'], 2, ',', ' ');
               
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                break;
            
            case "five":
                
                $sql = "SELECT * from repair WHERE marker_b = '22'";
                
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки

               $row['str'] = number_format($row['str'], 2, ',', ' ');
               $row['fu'] = number_format($row['fu'], 2, ',', ' ');
               
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                break;
            
            case "six":
                
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '241' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r241 = $row;
                           
                           
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '530' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r530 = $row;
                           
                           
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '225' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r225 = $row;
                           
                           
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '226' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r226 = $row;
                           
                           
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '228' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r228 = $row;
                           
                           
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '344' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r344 = $row;
                           
                           
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '346' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r346 = $row;
                           
                           
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '310' AND marker_a = '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r310 = $row;
                           
                           
                           $row = [
                               "225" => $r225,
                               "226" => $r226,
                               "228" => $r228,
                               "344" => $r344,
                               "346" => $r346,
                               "310" => $r310,
                               "241" => $r241,
                               "530" => $r530
                           ];
                            
                            
                           
                           return $row;
                
                break;
            
              }
             
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
         
         
                  public function update($id, $marker_b, $ekr, $title, $fu) {
             
             # Обновляем значение в БД
             $sql = "UPDATE repair SET fu = :fu, title = :title WHERE id = '$id'";
             
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":fu", $fu, PDO::PARAM_STR);
                     $stmt->bindValue(":title", $title, PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     
            # Пересчитываем суммы по учреждению и ЭКР   
              $sql = "SELECT SUM(fu) from repair "
               . "WHERE marker_b = '$marker_b' AND marker_a = '5' AND ekr = '$ekr'";
              
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $fu = $row['SUM(fu)'];
                   
                   $sql = "UPDATE repair SET fu = '$fu' "
                           . "WHERE marker_a = '10' AND marker_b = '$marker_b' AND ekr = '$ekr'";
                   
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
             
         }
         
         
         public function add($marker_b, $ekr, $title, $fu, $variant_repair) {
             
             # Проверяем какой раздел таблицы нужно заполнять
             if($variant_repair == "one"){
             
             # Проверяем ЭКР на соответствие
             if($ekr == 241 || $ekr == 530){
             
             # Вставляем новую запись в БД
             
             $sql = "INSERT INTO repair (marker_a, marker_b, nik, title, ekr, str, fu) VALUES "
                     . "('5', '$marker_b', 'repair', :title, '$ekr', '0', :fu)";
             
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":fu", $fu, PDO::PARAM_STR);
                     $stmt->bindValue(":title", $title, PDO::PARAM_STR);
                     
                     $stmt->execute();
             }
             }
             # Проверяем ЭКР на соответствие
             if($variant_repair !== "one"){
                 
             if($ekr == 225 || $ekr == 226 || $ekr == 228 || $ekr == 344 || $ekr == 346 || $ekr == 310){
             
             # Вставляем новую запись в БД
             
             $sql = "INSERT INTO repair (marker_a, marker_b, nik, title, ekr, str, fu) VALUES "
                     . "('5', '$marker_b', 'repair', :title, '$ekr', '0', :fu)";
             
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":fu", $fu, PDO::PARAM_STR);
                     $stmt->bindValue(":title", $title, PDO::PARAM_STR);
                     
                     $stmt->execute();
             }
             
             }
             
             
                     
              # Пересчитываем суммы по учреждению и ЭКР   
                     
              $sql = "SELECT SUM(fu) from repair "
               . "WHERE marker_b = '$marker_b' AND marker_a = '5' AND ekr = '$ekr'";
              
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $fu = $row['SUM(fu)'];
                   
                   $sql = "UPDATE repair SET fu = '$fu' "
                           . "WHERE marker_a = '10' AND marker_b = '$marker_b' AND ekr = '$ekr'";
                   
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
                    
                    
                    if($variant_repair == "one"){
                    if($ekr == 241 || $ekr == 530){
                        echo "Запись успешно добавлена";
                    } elseif ($ekr !== 241 || $ekr !== 530) {
                        echo "Вы допустили ошибку в КОСГУ!";
                }
                    }elseif ($variant_repair !== "one") {

                       if($ekr == 225 || $ekr == 226 || $ekr == 228 || $ekr == 344 || $ekr == 346 || $ekr == 310){
                        echo "Запись успешно добавлена";
                    } elseif ($ekr !== 225 || $ekr !== 226 || $ekr !== 228 || $ekr !== 344 || $ekr !== 346 || $ekr !== 310) {
                        echo "Вы допустили ошибку в КОСГУ!";
                }
                    }
                     
                     
  
         }
         
         
         public function delete($marker_b, $ekr, $id){
             
             # Удаляем запись из БД
             $sql = "DELETE FROM repair WHERE id = '$id'";
             
             $stmt = $this->db->prepare($sql);
             $stmt->execute();
             
             # Пересчитываем значения
             $sql = "SELECT SUM(fu), SUM(str) from repair "
               . "WHERE marker_b = '$marker_b' AND marker_a = '5' AND ekr = '$ekr'";
              
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $fu = $row['SUM(fu)'];
                   $str = $row['SUM(str)'];
                   
                   $sql = "UPDATE repair SET fu = '$fu', str = '$str' "
                           . "WHERE marker_a = '10' AND marker_b = '$marker_b' AND ekr = '$ekr'";
                   
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
             
         }
         
         
         public function total($variant_repair){
             
                         # Определяем какую информацию получать из БД
              switch ($variant_repair) {
        
            case "one":
                
                  $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '241' AND marker_a = '10' AND marker_b BETWEEN '1' AND '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r241 = $row;
                   
                 $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '530' AND marker_a = '10' AND marker_b BETWEEN '1' AND '10'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r530 = $row;      
                           
                      $row = ["241" => $r241, "530" => $r530];     
                                                      
                   return $row;
                
                break;
            
            case "two":
                
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '225' AND marker_a = '10' AND marker_b BETWEEN '11' AND '17'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r225 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '226' AND marker_a = '10' AND marker_b BETWEEN '11' AND '17'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r226 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '228' AND marker_a = '10' AND marker_b BETWEEN '11' AND '17'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r228 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '344' AND marker_a = '10' AND marker_b BETWEEN '11' AND '17'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r344 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '346' AND marker_a = '10' AND marker_b BETWEEN '11' AND '17'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r346 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '310' AND marker_a = '10' AND marker_b BETWEEN '11' AND '17'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r310 = $row;
                           
                           $row = [
                               "225" => $r225,
                               "226" => $r226,
                               "228" => $r228,
                               "344" => $r344,
                               "346" => $r346,
                               "310" => $r310
                           ];
                           
                           return $row;
                
                break;
            
            case "four":
                
                $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '225' AND marker_a = '10' AND marker_b BETWEEN '20' AND '21'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r225 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '226' AND marker_a = '10' AND marker_b BETWEEN '20' AND '21'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r226 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '228' AND marker_a = '10' AND marker_b BETWEEN '20' AND '21'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r228 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '344' AND marker_a = '10' AND marker_b BETWEEN '20' AND '21'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r344 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '346' AND marker_a = '10' AND marker_b BETWEEN '20' AND '21'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r346 = $row;
                           
                   $sql = "SELECT SUM(str), SUM(fu) FROM repair WHERE ekr = '310' AND marker_a = '10' AND marker_b BETWEEN '20' AND '21'";
                
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                           $r310 = $row;
                           
                           $row = [
                               "225" => $r225,
                               "226" => $r226,
                               "228" => $r228,
                               "344" => $r344,
                               "346" => $r346,
                               "310" => $r310
                           ];
                           
                           return $row;
                
                break;
            
              }
             
         }
         
         public function update_status($variant_repair){
             
             # Определяем какую информацию нужно обновить в БД
              switch ($variant_repair) {
        
            case "one":
                $id = 1;
                break;
            
            case "two":
                $id = 2;
                break;
            
            case "three":
                $id = 3;
                break;
            
            case "four":
                $id = 4;
                break;
            
            case "five":
                $id = 5;
                break;
            
              }
             
              # Обновляем статус в таблице
              $sql = "UPDATE repair_status SET `status` = 'open' WHERE id = '$id'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
              
         }
         
         
         public function excel(){
             
         }
         
        
    
}

