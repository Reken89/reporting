<?php

class RepairstrModel extends Model {
    
            public function table(){
        
         }
         
                 public function repairstr_back($variant_repair){
                     
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
               
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
            break;   
        
            case "two":
            break; 
        
            case "three":
            break; 
                
            case "four":
            break; 
        
            case "five":
            break; 
        
            case "six":
            break;
        
              }
        
         }
         
         
         public function update($id, $marker_b, $ekr, $title, $str) {
             
             # Обновляем значение в БД
             $sql = "UPDATE repair SET str = :str, fu = :str, title = :title WHERE id = '$id'";
             
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":str", $str, PDO::PARAM_STR);
                     $stmt->bindValue(":title", $title, PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     
            # Пересчитываем суммы по учреждению и ЭКР   
              $sql = "SELECT SUM(str), SUM(fu) from repair "
               . "WHERE marker_b = '$marker_b' AND marker_a = '5' AND ekr = '$ekr'";
              
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $str = $row['SUM(str)'];
                   $fu = $row['SUM(fu)'];
                   
                   $sql = "UPDATE repair SET str = '$str', fu = '$fu' "
                           . "WHERE marker_a = '10' AND marker_b = '$marker_b' AND ekr = '$ekr'";
                   
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
             
         }
         
         public function add($marker_b, $ekr, $title, $str) {
             
             # Проверяем ЭКР на соответствие
             if($ekr == 241 || $ekr == 530){
             
             # Вставляем новую запись в БД
             
             $sql = "INSERT INTO repair (marker_a, marker_b, nik, title, ekr, str, fu) VALUES "
                     . "('5', '$marker_b', 'repair', :title, '$ekr', :str, :str)";
             
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":str", $str, PDO::PARAM_STR);
                     $stmt->bindValue(":title", $title, PDO::PARAM_STR);
                     
                     $stmt->execute();
             }
                     
              # Пересчитываем суммы по учреждению и ЭКР   
                     
              $sql = "SELECT SUM(str), SUM(fu) from repair "
               . "WHERE marker_b = '$marker_b' AND marker_a = '5' AND ekr = '$ekr'";
              
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $str = $row['SUM(str)'];
                   $fu = $row['SUM(fu)'];
                   
                   $sql = "UPDATE repair SET str = '$str', fu = '$fu' "
                           . "WHERE marker_a = '10' AND marker_b = '$marker_b' AND ekr = '$ekr'";
                   
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
                    
                    if($ekr == 241 || $ekr == 530){
                        echo "Запись успешно добавлена";
                    } elseif ($ekr !== 241 || $ekr !== 530) {
                        echo "Вы допустили ошибку в КОСГУ!";
                }
  
         }
    
}

