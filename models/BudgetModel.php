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
            
            case "two":
       
                   $sql = "SELECT id, marker_a, marker_b, name, ekr, cb, zakupki, u_cb, u_zakupki"
                . " from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['cb', 'zakupki', 'u_cb', 'u_zakupki'];
               for ($num = 0 ; $num <= 3 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                
             break;
             
                    case "three":
       
                    $sql = "SELECT id, marker_a, marker_b, name, ekr, aurinko, berezka, zoloto, korablik, gnomik, skazka, solnishko, "
                . "u_aurinko, u_berezka, u_zoloto, u_korablik, u_gnomik, u_skazka, u_solnishko from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['aurinko', 'berezka', 'zoloto', 'korablik', 'gnomik', 'skazka', 'solnishko', 'u_aurinko', 'u_berezka', 'u_zoloto', 'u_korablik', 'u_gnomik', 'u_skazka', 'u_solnishko'];
               for ($num = 0 ; $num <= 13 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                        
                 break;
                 
                        case "four":

                     $sql = "SELECT id, marker_a, marker_b, name, ekr, dmsh, dhsh, u_dmsh, u_dhsh"
                . " from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['dmsh', 'dhsh', 'u_dmsh', 'u_dhsh'];
               for ($num = 0 ; $num <= 3 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                            
                   break;
                   
            case "five";
                
                $sql = "SELECT id, marker_a, marker_b, name, ekr, vsosh_ds, vsosh_school, u_vsosh_ds, u_vsosh_school"
                . " from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['vsosh_ds', 'vsosh_school', 'u_vsosh_ds', 'u_vsosh_school'];
               for ($num = 0 ; $num <= 3 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                break;
                
                case "six":
                    
                    $sql = "SELECT id, marker_a, marker_b, name, ekr, kums, uprava, edds, u_kums, u_uprava, u_edds"
                . " from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['kums', 'uprava', 'edds', 'u_kums', 'u_uprava', 'u_edds'];
               for ($num = 0 ; $num <= 5 ; ++$num) {
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
                 
                        case "two":
       
                            $id = $value['id'];
                              
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET cb = :cb, zakupki = :zakupki "
                         . "WHERE id = '$id'";

                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":cb", $value['cb'], PDO::PARAM_STR);
                     $stmt->bindValue(":zakupki", $value['zakupki'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(cb), SUM(zakupki) from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $cb = $row['SUM(cb)'];
                   $zakupki = $row['SUM(zakupki)'];
                 
                   $sql = "UPDATE reporting_budget SET cb = '$cb', zakupki = '$zakupki'"
                           . " WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                 $sql = "SELECT SUM(cb), SUM(zakupki) FROM reporting_budget WHERE "
                         . "marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
                 
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   
                   $cb = $row['SUM(cb)'];
                   $zakupki = $row['SUM(zakupki)'];
                   
                   $sql = "UPDATE reporting_budget SET cb = '$cb', zakupki = '$zakupki' "
                           . "WHERE marker_a = '10' AND marker_b = '$B'";
                   
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                            
               break;
               
                case "three":
      
                     $id = $value['id'];
                              
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET aurinko = :aurinko, berezka = :berezka, zoloto = :zoloto, korablik = :korablik, "
                             . "gnomik = :gnomik, skazka = :skazka, solnishko = :solnishko "
                         . "WHERE id = '$id'";

                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":aurinko", $value['aurinko'], PDO::PARAM_STR);
                     $stmt->bindValue(":berezka", $value['berezka'], PDO::PARAM_STR);
                     $stmt->bindValue(":zoloto", $value['zoloto'], PDO::PARAM_STR);
                     $stmt->bindValue(":korablik", $value['korablik'], PDO::PARAM_STR);
                     $stmt->bindValue(":gnomik", $value['gnomik'], PDO::PARAM_STR);
                     $stmt->bindValue(":skazka", $value['skazka'], PDO::PARAM_STR);
                     $stmt->bindValue(":solnishko", $value['solnishko'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(aurinko), SUM(berezka), SUM(zoloto), SUM(korablik), SUM(gnomik), SUM(skazka), SUM(solnishko) from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $aurinko = $row['SUM(aurinko)'];
                   $berezka = $row['SUM(berezka)'];
                   $zoloto = $row['SUM(zoloto)'];
                   $korablik = $row['SUM(korablik)'];
                   $gnomik = $row['SUM(gnomik)'];
                   $skazka = $row['SUM(skazka)'];
                   $solnishko = $row['SUM(solnishko)'];
                                  
                   $sql = "UPDATE reporting_budget SET aurinko = '$aurinko', berezka = '$berezka', zoloto = '$zoloto', korablik = '$korablik', "
                           . "gnomik = '$gnomik', skazka = '$skazka', solnishko = '$solnishko'"
                           . " WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                 $sql = "SELECT SUM(aurinko), SUM(berezka), SUM(zoloto), SUM(korablik), SUM(gnomik), SUM(skazka), SUM(solnishko) FROM reporting_budget WHERE "
                         . "marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
                 
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   
                   $aurinko = $row['SUM(aurinko)'];
                   $berezka = $row['SUM(berezka)'];
                   $zoloto = $row['SUM(zoloto)'];
                   $korablik = $row['SUM(korablik)'];
                   $gnomik = $row['SUM(gnomik)'];
                   $skazka = $row['SUM(skazka)'];
                   $solnishko = $row['SUM(solnishko)'];
                   
                   $sql = "UPDATE reporting_budget SET aurinko = '$aurinko', berezka = '$berezka', zoloto = '$zoloto', korablik = '$korablik', "
                           . "gnomik = '$gnomik', skazka = '$skazka', solnishko = '$solnishko'"
                           . " WHERE marker_a = '10' AND marker_b = '$B'";
                   
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                    
                   break;
                   
                        case "four":
      
                                                        $id = $value['id'];
                              
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET dmsh = :dmsh, dhsh = :dhsh "
                         . "WHERE id = '$id'";

                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":dmsh", $value['dmsh'], PDO::PARAM_STR);
                     $stmt->bindValue(":dhsh", $value['dhsh'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(dmsh), SUM(dhsh) from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $dmsh = $row['SUM(dmsh)'];
                   $dhsh = $row['SUM(dhsh)'];
                 
                   $sql = "UPDATE reporting_budget SET dmsh = '$dmsh', dhsh = '$dhsh'"
                           . " WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                 $sql = "SELECT SUM(dmsh), SUM(dhsh) FROM reporting_budget WHERE "
                         . "marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
                 
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   
                   $dmsh = $row['SUM(dmsh)'];
                   $dhsh = $row['SUM(dhsh)'];
                   
                   $sql = "UPDATE reporting_budget SET dmsh = '$dmsh', dhsh = '$dhsh' "
                           . "WHERE marker_a = '10' AND marker_b = '$B'";
                   
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                            
                        break;
                        
                        case "five":
                            
                       $id = $value['id'];
                              
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET vsosh_ds = :vsosh_ds, vsosh_school = :vsosh_school "
                         . "WHERE id = '$id'";

                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":vsosh_ds", $value['vsosh_ds'], PDO::PARAM_STR);
                     $stmt->bindValue(":vsosh_school", $value['vsosh_school'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(vsosh_ds), SUM(vsosh_school) from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $vsosh_ds = $row['SUM(vsosh_ds)'];
                   $vsosh_school = $row['SUM(vsosh_school)'];
                 
                   $sql = "UPDATE reporting_budget SET vsosh_ds = '$vsosh_ds', vsosh_school = '$vsosh_school'"
                           . " WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                 $sql = "SELECT SUM(vsosh_ds), SUM(vsosh_school) FROM reporting_budget WHERE "
                         . "marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
                 
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   
                   $vsosh_ds = $row['SUM(vsosh_ds)'];
                   $vsosh_school = $row['SUM(vsosh_school)'];
                   
                   $sql = "UPDATE reporting_budget SET vsosh_ds = '$vsosh_ds', vsosh_school = '$vsosh_school' "
                           . "WHERE marker_a = '10' AND marker_b = '$B'";
                   
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                            
                        break;
                        
                 case "six";
                     
                     $id = $value['id'];
                              
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET kums = :kums, uprava = :uprava, edds = :edds "
                         . "WHERE id = '$id'";

                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":kums", $value['kums'], PDO::PARAM_STR);
                     $stmt->bindValue(":uprava", $value['uprava'], PDO::PARAM_STR);
                     $stmt->bindValue(":edds", $value['edds'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(kums), SUM(uprava), SUM(edds) from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $kums = $row['SUM(kums)'];
                   $uprava = $row['SUM(uprava)'];
                   $edds = $row['SUM(edds)'];
                 
                   $sql = "UPDATE reporting_budget SET kums = '$kums', uprava = '$uprava', edds = '$edds'"
                           . " WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                 $sql = "SELECT SUM(kums), SUM(uprava), SUM(edds) FROM reporting_budget WHERE "
                         . "marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
                 
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   
                   $kums = $row['SUM(kums)'];
                   $uprava = $row['SUM(uprava)'];
                   $edds = $row['SUM(edds)'];
                   
                   $sql = "UPDATE reporting_budget SET kums = '$kums', uprava = '$uprava', edds = '$edds' "
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
            
                   case "two":

                       $sql = "SELECT id, SUM(cb), SUM(zakupki), SUM(u_cb), SUM(u_zakupki)"
                . " from reporting_budget WHERE marker_a = '10' AND "
                    . "id != '118' AND id != '151' AND id != '171' AND id != '197'";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['SUM(cb)', 'SUM(zakupki)', 'SUM(u_cb)', 'SUM(u_zakupki)'];
               for ($num = 0 ; $num <= 3 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                       
            break;
            
                   case "three":
       
                    $sql = "SELECT id, SUM(aurinko), SUM(berezka), SUM(zoloto), SUM(korablik), SUM(gnomik), SUM(skazka), SUM(solnishko), "
                           . "SUM(u_aurinko), SUM(u_berezka), SUM(u_zoloto), SUM(u_korablik), SUM(u_gnomik), SUM(u_skazka), SUM(u_solnishko)"
                . " from reporting_budget WHERE marker_a = '10' AND "
                    . "id != '118' AND id != '151' AND id != '171' AND id != '197'";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['SUM(aurinko)', 'SUM(berezka)', 'SUM(zoloto)', 'SUM(korablik)', 'SUM(gnomik)', 'SUM(skazka)', 'SUM(solnishko)', 
                   'SUM(u_aurinko)', 'SUM(u_berezka)', 'SUM(u_zoloto)', 'SUM(u_korablik)', 'SUM(u_gnomik)', 'SUM(u_skazka)', 'SUM(u_solnishko)'];
               for ($num = 0 ; $num <= 13 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                       
                 break;
                 
                    case "four":
      
                        $sql = "SELECT id, SUM(dmsh), SUM(dhsh), SUM(u_dmsh), SUM(u_dhsh)"
                . " from reporting_budget WHERE marker_a = '10' AND "
                    . "id != '118' AND id != '151' AND id != '171' AND id != '197'";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['SUM(dmsh)', 'SUM(dhsh)', 'SUM(u_dmsh)', 'SUM(u_dhsh)'];
               for ($num = 0 ; $num <= 3 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                            
                   break;
                   
                   case "five":
                       
                    $sql = "SELECT id, SUM(vsosh_ds), SUM(vsosh_school), SUM(u_vsosh_ds), SUM(u_vsosh_school)"
                . " from reporting_budget WHERE marker_a = '10' AND "
                    . "id != '118' AND id != '151' AND id != '171' AND id != '197'";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['SUM(vsosh_ds)', 'SUM(vsosh_school)', 'SUM(u_vsosh_ds)', 'SUM(u_vsosh_school)'];
               for ($num = 0 ; $num <= 3 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                       
                   break;
                   
            case "six";
                
                    $sql = "SELECT id, SUM(kums), SUM(uprava), SUM(edds), SUM(u_kums), SUM(u_uprava), SUM(u_edds)"
                . " from reporting_budget WHERE marker_a = '10' AND "
                    . "id != '118' AND id != '151' AND id != '171' AND id != '197'";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['SUM(kums)', 'SUM(uprava)', 'SUM(edds)', 'SUM(u_kums)', 'SUM(u_uprava)', 'SUM(u_edds)'];
               for ($num = 0 ; $num <= 5 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                
                break;
                 
                 
            
           }
             
         }
         
             public function excel() {
        
             }
             
             public function status(){
                 
                   $sql = "SELECT * from reporting_budget_status";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                 
             }
             
             public function update_status(){
                 
             # Определяем у какого блока нужно обновить статус
             switch ($_SESSION['variant_budget']){
               
                 case "one":
                     $id = 1;
                 break;
             
             case "two":
                 $id = 1;
                 break;
             
             case "three":
                 $id = 4;
                 break;
             
             case "four":
                 $id = 3;
                 break;
             
             case "five":
                 $id = 2;
                 break;
             
               case "six":
                   $id = 1;
                 break;
             }
             
            $sql = "UPDATE reporting_budget_status SET `status` = 'open' WHERE id = '$id'";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
                 
             }
    
}

