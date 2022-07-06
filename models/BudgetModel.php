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
                     
                 break;
             }
             
         }
    
}

