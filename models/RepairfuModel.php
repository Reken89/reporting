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
         
         public function synch($variant_repair){
             
             # Определяем какую информацию нужно обновить в БД
              switch ($variant_repair) {
        
            case "one":
                
                # Получаем информацию по БУ и АУ на 241 и 530 ЭКР
                
                $sql = "SELECT SUM(fu) FROM repair WHERE marker_a = '10' AND ekr = '241'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum241 = $row['SUM(fu)'];
                
                $sql = "SELECT SUM(fu) FROM repair WHERE marker_a = '10' AND ekr = '530'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum530 = $row['SUM(fu)'];
                
                ###################################################################################################
                
                # Выполняем запись в таблицу СМЕТА по 241 ЭКР
                $sql = "UPDATE reporting_budget SET adm = '$sum241' WHERE id = '230'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                           
                   # Выполняем пересчет итоговой суммы по 241 в таблице СМЕТА
                 $sql = "SELECT SUM(adm) FROM reporting_budget WHERE marker_a = '0' AND ekr = '241'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum = $row['SUM(adm)'];
                
                $sql = "UPDATE reporting_budget SET adm = '$sum' WHERE marker_a = '10' AND ekr = '241'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                           
                           # Выполняем перерасчет по 240 ЭКР таблицы СМЕТА
                           $sql = "SELECT SUM(adm) FROM reporting_budget WHERE marker_a = '10' AND marker_b BETWEEN '16' AND '18'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum = $row['SUM(adm)'];
                
                $sql = "UPDATE reporting_budget SET adm = '$sum' WHERE marker_a = '10' AND ekr = '240'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                
                ################################################################################################################
                           
                           # Выполняем запись в таблицу СМЕТА по 530 ЭКР
                $sql = "UPDATE reporting_budget SET adm = '$sum530' WHERE id = '229'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                           
                   # Выполняем пересчет итоговой суммы по 530 в таблице СМЕТА
                 $sql = "SELECT SUM(adm) FROM reporting_budget WHERE marker_a = '0' AND ekr = '530'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum = $row['SUM(adm)'];
                
                $sql = "UPDATE reporting_budget SET adm = '$sum' WHERE marker_a = '10' AND ekr = '530'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                           
                           
                ################################################################################################################
                           
                echo "Синхронизация выполнена успешно";
                break;
            
            case "two":
                
                # Применяем цикл
                $user_budget = ["aurinko", "berezka", "gnomik", "zoloto", "korablik", "skazka", "solnishko"];
                $user_repair = [11, 12, 13, 14, 15, 16, 17];
                
                foreach ( $user_budget as $key=>$vol1 ) {
                        foreach($user_repair as $key1=>$vol2) {
                            if ($key == $key1){
                                $user_b = $vol1;
                                $user_r = $vol2;
                            }
                        }
                
                # Получаем нужную информацию из таблицы Ремонтов
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '225'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum225 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '226'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum226 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '228'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum228 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '344'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum344 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '346'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum346 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '310'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum310 = $row['fu'];
                
                $sum = ["$sum225", "$sum226", "$sum228", "$sum344", "$sum346", "$sum310"];
                $id = [231, 232, 233, 236, 237, 234];
                
                # Записываем значения в таблицу СМЕТА
                                    foreach ( $sum as $key=>$volume_1 ) {
                        foreach($id as $key1=>$volume_2) {
                            if ($key == $key1){
                                $a = $volume_1;
                                $b = $volume_2;
                            }
                        }

                        $sql = "UPDATE reporting_budget SET $user_b = '$a' WHERE id = '$b'";
                
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                        
                        
                    }
                    
                    
                    
                    # пересчитываем общие блоки в таблице СМЕТА
                    $ekr = [225, 226, 228, 310, 344, 346];
                foreach ($ekr as $key => $value) {
                    
                $sql = "SELECT SUM($user_b) FROM reporting_budget WHERE marker_a = '0' AND ekr = '$value'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if($user_b == "aurinko"){
                $sum_ = $row['SUM(aurinko)'];
                }
                if($user_b == "berezka"){
                $sum_ = $row['SUM(berezka)'];
                }
                if($user_b == "gnomik"){
                $sum_ = $row['SUM(gnomik)'];
                }
                if($user_b == "zoloto"){
                $sum_ = $row['SUM(zoloto)'];
                }
                if($user_b == "korablik"){
                $sum_ = $row['SUM(korablik)'];
                }
                if($user_b == "skazka"){
                $sum_ = $row['SUM(skazka)'];
                }
                if($user_b == "solnishko"){
                $sum_ = $row['SUM(solnishko)'];
                }
                
                $sql = "UPDATE reporting_budget SET $user_b = '$sum_' WHERE marker_a = '10' AND ekr = '$value'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                }
                
                
                # Пересчитываем итоговые блоки по 340 ЭКР
                $sql = "SELECT SUM($user_b) FROM reporting_budget WHERE marker_a = '10' AND marker_b BETWEEN '35' AND '41'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if($user_b == "aurinko"){
                $sum340 = $row['SUM(aurinko)'];
                }
                if($user_b == "berezka"){
                $sum340 = $row['SUM(berezka)'];
                }
                if($user_b == "gnomik"){
                $sum340 = $row['SUM(gnomik)'];
                }
                if($user_b == "zoloto"){
                $sum340 = $row['SUM(zoloto)'];
                }
                if($user_b == "korablik"){
                $sum340 = $row['SUM(korablik)'];
                }
                if($user_b == "skazka"){
                $sum340 = $row['SUM(skazka)'];
                }
                if($user_b == "solnishko"){
                $sum340 = $row['SUM(solnishko)'];
                }
                
                $sql = "UPDATE reporting_budget SET $user_b = '$sum340' WHERE marker_a = '10' AND ekr = '340'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                
                
                     
                }   
                echo "Синхронизация выполнена успешно";
                     
                break;
            
            case "three":
                
                # Применяем цикл
                $user_budget = ["adm", "uprava"];
                $user_repair = [18, 19];
                
                foreach ( $user_budget as $key=>$vol1 ) {
                        foreach($user_repair as $key1=>$vol2) {
                            if ($key == $key1){
                                $user_b = $vol1;
                                $user_r = $vol2;
                            }
                        }
                
                # Получаем нужную информацию из таблицы Ремонтов
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '225'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum225 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '226'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum226 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '228'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum228 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '344'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum344 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '346'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum346 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '310'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum310 = $row['fu'];
                
                $sum = ["$sum225", "$sum226", "$sum228", "$sum344", "$sum346", "$sum310"];
                $id = [231, 232, 233, 236, 237, 234];
                
                # Записываем значения в таблицу СМЕТА
                                    foreach ( $sum as $key=>$volume_1 ) {
                        foreach($id as $key1=>$volume_2) {
                            if ($key == $key1){
                                $a = $volume_1;
                                $b = $volume_2;
                            }
                        }

                        $sql = "UPDATE reporting_budget SET $user_b = '$a' WHERE id = '$b'";
                
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                        
                        
                    }
                    
                    
                    
                    # пересчитываем общие блоки в таблице СМЕТА
                    $ekr = [225, 226, 228, 310, 344, 346];
                foreach ($ekr as $key => $value) {
                    
                $sql = "SELECT SUM($user_b) FROM reporting_budget WHERE marker_a = '0' AND ekr = '$value'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if($user_b == "adm"){
                $sum_ = $row['SUM(adm)'];
                }
                if($user_b == "uprava"){
                $sum_ = $row['SUM(uprava)'];
                }
              
                
                $sql = "UPDATE reporting_budget SET $user_b = '$sum_' WHERE marker_a = '10' AND ekr = '$value'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                }
                
                
                # Пересчитываем итоговые блоки по 340 ЭКР
                $sql = "SELECT SUM($user_b) FROM reporting_budget WHERE marker_a = '10' AND marker_b BETWEEN '35' AND '41'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if($user_b == "adm"){
                $sum340 = $row['SUM(adm)'];
                }
                if($user_b == "uprava"){
                $sum340 = $row['SUM(uprava)'];
                }
                
                $sql = "UPDATE reporting_budget SET $user_b = '$sum340' WHERE marker_a = '10' AND ekr = '340'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                
                
                     
                }   
                echo "Синхронизация выполнена успешно";
                
                break;
            
            case "four":
                
                # Применяем цикл
                $user_budget = ["dmsh", "dhsh"];
                $user_repair = [20, 21];
                
                foreach ( $user_budget as $key=>$vol1 ) {
                        foreach($user_repair as $key1=>$vol2) {
                            if ($key == $key1){
                                $user_b = $vol1;
                                $user_r = $vol2;
                            }
                        }
                
                # Получаем нужную информацию из таблицы Ремонтов
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '225'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum225 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '226'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum226 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '228'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum228 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '344'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum344 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '346'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum346 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '$user_r' AND ekr = '310'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum310 = $row['fu'];
                
                $sum = ["$sum225", "$sum226", "$sum228", "$sum344", "$sum346", "$sum310"];
                $id = [231, 232, 233, 236, 237, 234];
                
                # Записываем значения в таблицу СМЕТА
                                    foreach ( $sum as $key=>$volume_1 ) {
                        foreach($id as $key1=>$volume_2) {
                            if ($key == $key1){
                                $a = $volume_1;
                                $b = $volume_2;
                            }
                        }

                        $sql = "UPDATE reporting_budget SET $user_b = '$a' WHERE id = '$b'";
                
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                        
                        
                    }
                    
                    
                    
                    # пересчитываем общие блоки в таблице СМЕТА
                    $ekr = [225, 226, 228, 310, 344, 346];
                foreach ($ekr as $key => $value) {
                    
                $sql = "SELECT SUM($user_b) FROM reporting_budget WHERE marker_a = '0' AND ekr = '$value'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if($user_b == "dmsh"){
                $sum_ = $row['SUM(dmsh)'];
                }
                if($user_b == "dhsh"){
                $sum_ = $row['SUM(dhsh)'];
                }
              
                
                $sql = "UPDATE reporting_budget SET $user_b = '$sum_' WHERE marker_a = '10' AND ekr = '$value'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                }
                
                
                # Пересчитываем итоговые блоки по 340 ЭКР
                $sql = "SELECT SUM($user_b) FROM reporting_budget WHERE marker_a = '10' AND marker_b BETWEEN '35' AND '41'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if($user_b == "dmsh"){
                $sum340 = $row['SUM(dmsh)'];
                }
                if($user_b == "dhsh"){
                $sum340 = $row['SUM(dhsh)'];
                }
                
                $sql = "UPDATE reporting_budget SET $user_b = '$sum340' WHERE marker_a = '10' AND ekr = '340'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                
                
                     
                }   
                echo "Синхронизация выполнена успешно";
                
                break;
            
            case "five":

                # Получаем нужную информацию из таблицы Ремонтов
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '22' AND ekr = '225'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum225 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '22' AND ekr = '226'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum226 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '22' AND ekr = '228'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum228 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '22' AND ekr = '344'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum344 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '22' AND ekr = '346'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum346 = $row['fu'];
                
                $sql = "SELECT fu FROM repair WHERE marker_a = '10' AND marker_b = '22' AND ekr = '310'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum310 = $row['fu'];
                
                $sum = ["$sum225", "$sum226", "$sum228", "$sum344", "$sum346", "$sum310"];
                $id = [231, 232, 233, 236, 237, 234];
                
                # Записываем значения в таблицу СМЕТА
                                    foreach ( $sum as $key=>$volume_1 ) {
                        foreach($id as $key1=>$volume_2) {
                            if ($key == $key1){
                                $a = $volume_1;
                                $b = $volume_2;
                            }
                        }

                        $sql = "UPDATE reporting_budget SET vsosh_school = '$a' WHERE id = '$b'";
                
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                        
                        
                    }
                    
                    
                    
                    # пересчитываем общие блоки в таблице СМЕТА
                    $ekr = [225, 226, 228, 310, 344, 346];
                foreach ($ekr as $key => $value) {
                    
                $sql = "SELECT SUM(vsosh_school) FROM reporting_budget WHERE marker_a = '0' AND ekr = '$value'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum_ = $row['SUM(vsosh_school)'];
                

              
                
                $sql = "UPDATE reporting_budget SET vsosh_school = '$sum_' WHERE marker_a = '10' AND ekr = '$value'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
                }
                
                
                # Пересчитываем итоговые блоки по 340 ЭКР
                $sql = "SELECT SUM(vsosh_school) FROM reporting_budget WHERE marker_a = '10' AND marker_b BETWEEN '35' AND '41'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $sum340 = $row['SUM(vsosh_school)'];

                
                $sql = "UPDATE reporting_budget SET vsosh_school = '$sum340' WHERE marker_a = '10' AND ekr = '340'";
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();

                echo "Синхронизация выполнена успешно";
                
                break;
            
            case "six":
                echo "В СВОДЕ синхронизация не выполняется!";
                break;
            
              }
             
         }
         
        
    
}

