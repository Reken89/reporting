<?php

class RepaircbModel extends Model {
    
    public function table(){
        
         }
         
          public function repaircb_back($variant_repair) {
             
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
         
         
         public function excel() {
             
         }
    
}

