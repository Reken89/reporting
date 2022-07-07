<?php

class BudgetModel extends Model {
    
        public function table(){
        
         }
    
    public function budget_back($variant_budget){
        
        # Определяем какую информацию собираем из БД
        switch ($variant_budget) {
        
            case "one":
                
                    $sql = "SELECT id, marker_a, marker_b, name, ekr, glava, adm, sovet, kso, u_glava, "
                . "u_adm, u_sovet, u_kso from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['glava', 'adm', 'sovet', 'kso', 'u_glava', 'u_adm', 'u_sovet', 'u_kso'];
               for ($num = 0 ; $num <= 7 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
            break;
            
           }

         }
         
         public function update($value){
             
             # Определяем какой раздел таблицы нужно обновить
             switch ($_SESSION['variant_budget']){
               
                 case "one":
                 
                     $id = $value['id'];
                     
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET glava = :glava, adm = :adm, "
                         . "sovet = :sovet, kso = :kso WHERE id = '$id'";
                     
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":glava", $value['glava'], PDO::PARAM_STR);
                     $stmt->bindValue(":adm", $value['adm'], PDO::PARAM_STR);
                     $stmt->bindValue(":sovet", $value['sovet'], PDO::PARAM_STR);
                     $stmt->bindValue(":kso", $value['kso'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(glava), SUM(adm), SUM(sovet), SUM(kso) from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $glava = $row['SUM(glava)'];
                   $adm = $row['SUM(adm)'];
                   $sovet = $row['SUM(sovet)'];
                   $kso = $row['SUM(kso)'];
                   
                   $sql = "UPDATE reporting_budget SET glava = '$glava', adm = '$adm', sovet = '$sovet', "
                           . "kso = '$kso' WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
                    

                    # Пересчитаем строки 240/260/290/340
                    if($marker_b >= '16' && $marker_b <= '18' || $marker_b >= '20' && $marker_b <= '24' || $marker_b >= '26' && $marker_b <= '31' || $marker_b >= '35' && $marker_b <= '41'){
                        
            if($marker_b >= '16' && $marker_b <= '18'){
                $B = 15;
                $number1 = 16;
                $number2 = 18;
            }
            
            if($marker_b >= '20' && $marker_b <= '24'){
                $B = 19;
                $number1 = 20;
                $number2 = 24;
            }
            
            if($marker_b >= '26' && $marker_b <= '31'){
                $B = 25;
                $number1 = 26;
                $number2 = 31;
            }
            
            if($marker_b >= '35' && $marker_b <= '41'){
                $B = 34;
                $number1 = 35;
                $number2 = 41;
            }
                       
                 $sql = "SELECT SUM(glava), SUM(adm), SUM(sovet), SUM(kso) FROM reporting_budget WHERE "
                         . "marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
                 
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   
                   $glava = $row['SUM(glava)'];
                   $adm = $row['SUM(adm)'];
                   $sovet = $row['SUM(sovet)'];
                   $kso = $row['SUM(kso)'];
                   
                   $sql = "UPDATE reporting_budget SET glava = '$glava', adm = '$adm', sovet = '$sovet', kso = '$kso' "
                           . "WHERE marker_a = '10' AND marker_b = '$B'";
                   
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                     
                 break;
             }
             
         }
         
         public function total($variant_budget){
             
        # Определяем какую информацию собираем из БД
        switch ($variant_budget) {
        
            case "one":
                
                    $sql = "SELECT id, SUM(glava), SUM(adm), SUM(sovet), SUM(kso), SUM(u_glava), "
                . "SUM(u_adm), SUM(u_sovet), SUM(u_kso) from reporting_budget WHERE marker_a = '10' AND "
                    . "id != '118' AND id != '151' AND id != '171' AND id != '197'";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['SUM(glava)', 'SUM(adm)', 'SUM(sovet)', 'SUM(kso)', 'SUM(u_glava)', 'SUM(u_adm)', 'SUM(u_sovet)', 'SUM(u_kso)'];
               for ($num = 0 ; $num <= 7 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
            break;
            
           }
             
         }
    
}

