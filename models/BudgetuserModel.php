<?php

class BudgetuserModel extends Model {
    
            public function table(){
        
         }
         
                 public function budget_back(){
                     
                     #Опрделяем роль для выборки из БД
                     $role = $_SESSION['role'];

            switch ($role) {
              case "report":
                  
                    $sql = "SELECT id, marker_a, marker_b, name, ekr, u_glava, u_adm, u_sovet, u_kso, u_cb, "
                . "u_zakupki, u_kums, u_uprava, u_edds from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['u_glava', 'u_adm', 'u_sovet', 'u_kso', 'u_cb', 'u_zakupki', 'u_kums', 'u_uprava', 'u_edds'];
               for ($num = 0 ; $num <= 8 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                  
                         break;

              case "report_school":
                  
                $sql = "SELECT id, marker_a, marker_b, name, ekr, u_vsosh_ds, u_vsosh_school "
                . "from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['u_vsosh_ds', 'u_vsosh_school'];
               for ($num = 0 ; $num <= 1 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;

                   break;

              case "report_kultura":
                  
                    $sql = "SELECT id, marker_a, marker_b, name, ekr, u_dmsh, u_dhsh "
                . "from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['u_dmsh', 'u_dhsh'];
               for ($num = 0 ; $num <= 1 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;

                   break;

              case "report_kinder";
                  
                  $sql = "SELECT id, marker_a, marker_b, name, ekr, u_aurinko, u_berezka, u_zoloto, u_korablik, u_gnomik, "
                . "u_skazka, u_solnishko from reporting_budget";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['u_aurinko', 'u_berezka', 'u_zoloto', 'u_korablik', 'u_gnomik', 'u_skazka', 'u_solnishko'];
               for ($num = 0 ; $num <= 6 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;

                  break;
            }
        
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
         
              public function total(){
                  
                    $sql = "SELECT id, SUM(u_glava), SUM(u_adm), SUM(u_sovet), SUM(u_kso), SUM(u_cb), "
                . "SUM(u_zakupki), SUM(u_aurinko), SUM(u_berezka), SUM(u_zoloto),"
                . " SUM(u_korablik), SUM(u_gnomik), SUM(u_skazka), SUM(u_solnishko),"
                . " SUM(u_dmsh), SUM(u_dhsh), SUM(u_vsosh_ds), SUM(u_vsosh_school),"
                . " SUM(u_kums), SUM(u_uprava), SUM(u_edds)"
                            . " from reporting_budget WHERE marker_a = '10' AND "
                    . "id != '118' AND id != '151' AND id != '171' AND id != '197'";

                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       
               # Разделяем число на блоки
               $block = ['SUM(u_glava)', 'SUM(u_adm)', 'SUM(u_sovet)', 'SUM(u_kso)', 'SUM(u_cb)', 'SUM(u_zakupki)', 'SUM(u_aurinko)', 'SUM(u_berezka)', 
                   'SUM(u_zoloto)', 'SUM(u_korablik)', 'SUM(u_gnomik)', 'SUM(u_skazka)', 'SUM(u_solnishko)', 'SUM(u_dmsh)', 'SUM(u_dhsh)', 
                   'SUM(u_vsosh_ds)', 'SUM(u_vsosh_school)', 'SUM(u_kums)', 'SUM(u_uprava)', 'SUM(u_edds)'];
               for ($num = 0 ; $num <= 19 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
                       
                       $res[$row['id']] = $row;
                   }
        
                   return $res;
                  
              }
              
              
                  public function update($value){
        
                     #Опрделяем роль для выборки из БД
                     $role = $_SESSION['role'];

            switch ($role) {
              case "report":
                  
                     $id = $value['id'];
                     
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET glava = :glava, adm = :adm, "
                         . "sovet = :sovet, kso = :kso, cb = :cb, zakupki = :zakupki,"
                         . " kums = :kums, uprava = :uprava, edds = :edds, "
                         . "u_glava = :glava, u_adm = :adm, u_sovet = :sovet, u_kso = :kso, "
                         . "u_cb = :cb, u_zakupki = :zakupki, u_kums = :kums, u_uprava = :uprava, u_edds = :edds"
                             . " WHERE id = '$id'";
                     
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":glava", $value['glava'], PDO::PARAM_STR);
                     $stmt->bindValue(":adm", $value['adm'], PDO::PARAM_STR);
                     $stmt->bindValue(":sovet", $value['sovet'], PDO::PARAM_STR);
                     $stmt->bindValue(":kso", $value['kso'], PDO::PARAM_STR);
                     $stmt->bindValue(":cb", $value['cb'], PDO::PARAM_STR);
                     $stmt->bindValue(":zakupki", $value['zakupki'], PDO::PARAM_STR);
                     $stmt->bindValue(":kums", $value['kums'], PDO::PARAM_STR);
                     $stmt->bindValue(":uprava", $value['uprava'], PDO::PARAM_STR);
                     $stmt->bindValue(":edds", $value['edds'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(glava), SUM(adm), SUM(sovet), SUM(kso), SUM(cb), SUM(zakupki),"
                             . " SUM(kums), SUM(uprava), SUM(edds), SUM(u_glava), SUM(u_adm), SUM(u_sovet), SUM(u_kso), SUM(u_cb), SUM(u_zakupki), "
                             . "SUM(u_kums), SUM(u_uprava), SUM(u_edds)"
                             . " from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $glava = $row['SUM(glava)'];
                   $adm = $row['SUM(adm)'];
                   $sovet = $row['SUM(sovet)'];
                   $kso = $row['SUM(kso)'];
                   $cb = $row['SUM(cb)'];
                   $zakupki = $row['SUM(zakupki)'];
                   $kums = $row['SUM(kums)'];
                   $uprava = $row['SUM(uprava)'];
                   $edds = $row['SUM(edds)'];
                   
                   $u_glava = $row['SUM(u_glava)'];
                   $u_adm = $row['SUM(u_adm)'];
                   $u_sovet = $row['SUM(u_sovet)'];
                   $u_kso = $row['SUM(u_kso)'];
                   $u_cb = $row['SUM(u_cb)'];
                   $u_zakupki = $row['SUM(u_zakupki)'];
                   $u_kums = $row['SUM(u_kums)'];
                   $u_uprava = $row['SUM(u_uprava)'];
                   $u_edds = $row['SUM(u_edds)'];
                   
                   $sql = "UPDATE reporting_budget SET glava = '$glava', adm = '$adm', sovet = '$sovet', "
                           . "kso = '$kso', cb = '$cb', zakupki = '$zakupki', kums = '$kums', uprava = '$uprava', edds = '$edds',"
                           . " u_glava = '$u_glava', u_adm = '$u_adm', u_sovet = '$u_sovet', u_kso = '$u_kso', u_cb = '$u_cb', "
                           . "u_zakupki = '$u_zakupki', u_kums = '$u_kums', u_uprava = '$u_uprava', u_edds = '$u_edds'"
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
                       
                                 $sql = "SELECT SUM(glava), SUM(adm), SUM(sovet), SUM(kso), SUM(cb), SUM(zakupki),"
                             . " SUM(kums), SUM(uprava), SUM(edds), SUM(u_glava), SUM(u_adm), SUM(u_sovet), SUM(u_kso), SUM(u_cb), SUM(u_zakupki), "
                             . "SUM(u_kums), SUM(u_uprava), SUM(u_edds)"
                             . " from reporting_budget "
                             . "WHERE marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
            
                 
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $glava = $row['SUM(glava)'];
                   $adm = $row['SUM(adm)'];
                   $sovet = $row['SUM(sovet)'];
                   $kso = $row['SUM(kso)'];
                   $cb = $row['SUM(cb)'];
                   $zakupki = $row['SUM(zakupki)'];
                   $kums = $row['SUM(kums)'];
                   $uprava = $row['SUM(uprava)'];
                   $edds = $row['SUM(edds)'];
                   
                   $u_glava = $row['SUM(u_glava)'];
                   $u_adm = $row['SUM(u_adm)'];
                   $u_sovet = $row['SUM(u_sovet)'];
                   $u_kso = $row['SUM(u_kso)'];
                   $u_cb = $row['SUM(u_cb)'];
                   $u_zakupki = $row['SUM(u_zakupki)'];
                   $u_kums = $row['SUM(u_kums)'];
                   $u_uprava = $row['SUM(u_uprava)'];
                   $u_edds = $row['SUM(u_edds)'];
                   
                                      $sql = "UPDATE reporting_budget SET glava = '$glava', adm = '$adm', sovet = '$sovet', "
                           . "kso = '$kso', cb = '$cb', zakupki = '$zakupki', kums = '$kums', uprava = '$uprava', edds = '$edds',"
                           . " u_glava = '$u_glava', u_adm = '$u_adm', u_sovet = '$u_sovet', u_kso = '$u_kso', u_cb = '$u_cb', "
                           . "u_zakupki = '$u_zakupki', u_kums = '$u_kums', u_uprava = '$u_uprava', u_edds = '$u_edds'"
                           . " WHERE marker_a = '10' AND marker_b = '$B'";
                                     
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                  
                         break;

              case "report_school":

                   $id = $value['id'];
                     
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET vsosh_ds = :vsosh_ds, vsosh_school = :vsosh_school, "
                             . "u_vsosh_ds = :vsosh_ds, u_vsosh_school = :vsosh_school WHERE id = '$id'";
                     
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":vsosh_ds", $value['vsosh_ds'], PDO::PARAM_STR);
                     $stmt->bindValue(":vsosh_school", $value['vsosh_school'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(vsosh_ds), SUM(vsosh_school), SUM(u_vsosh_ds), SUM(u_vsosh_school)"
                             . " from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $vsosh_ds = $row['SUM(vsosh_ds)'];
                   $vsosh_school = $row['SUM(vsosh_school)'];
                   $u_vsosh_ds = $row['SUM(u_vsosh_ds)'];
                   $u_vsosh_school = $row['SUM(u_vsosh_school)'];

                   
                   $sql = "UPDATE reporting_budget SET vsosh_ds = '$vsosh_ds', vsosh_school = '$vsosh_school', u_vsosh_ds = '$u_vsosh_ds', "
                           . "u_vsosh_school = '$u_vsosh_school' WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                                 $sql = "SELECT SUM(vsosh_ds), SUM(vsosh_school), SUM(u_vsosh_ds), SUM(u_vsosh_school)"
                             . " from reporting_budget "
                             . "WHERE marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
            
            
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $vsosh_ds = $row['SUM(vsosh_ds)'];
                   $vsosh_school = $row['SUM(vsosh_school)'];
                   $u_vsosh_ds = $row['SUM(u_vsosh_ds)'];
                   $u_vsosh_school = $row['SUM(u_vsosh_school)'];

                   
                            $sql = "UPDATE reporting_budget SET vsosh_ds = '$vsosh_ds', vsosh_school = '$vsosh_school', u_vsosh_ds = '$u_vsosh_ds', "
                           . "u_vsosh_school = '$u_vsosh_school' WHERE marker_a = '10' AND marker_b = '$B'";
                   
                                     
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }

              case "report_kultura":

                  $id = $value['id'];
                     
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET dmsh = :dmsh, dhsh = :dhsh, "
                             . "u_dmsh = :dmsh, u_dhsh = :dhsh WHERE id = '$id'";
                     
                     $stmt = $this->db->prepare($sql);
                     $stmt->bindValue(":dmsh", $value['dmsh'], PDO::PARAM_STR);
                     $stmt->bindValue(":dhsh", $value['dhsh'], PDO::PARAM_STR);
                     
                     $stmt->execute();
                     
                     # Пересчитываем значение общего пункта
                     $marker_b = $value['marker_b'];
                     
                     $sql = "SELECT SUM(dmsh), SUM(dhsh), SUM(u_dmsh), SUM(u_dhsh)"
                             . " from reporting_budget "
                             . "WHERE marker_b = '$marker_b' AND marker_a = '0'";
                     
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $dmsh = $row['SUM(dmsh)'];
                   $dhsh = $row['SUM(dhsh)'];
                   $u_dmsh = $row['SUM(u_dmsh)'];
                   $u_dhsh = $row['SUM(u_dhsh)'];

                   
                   $sql = "UPDATE reporting_budget SET dmsh = '$dmsh', dhsh = '$dhsh', u_dmsh = '$u_dmsh', "
                           . "u_dhsh = '$u_dhsh' WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                                 $sql = "SELECT SUM(dmsh), SUM(dhsh), SUM(u_dmsh), SUM(u_dhsh)"
                             . " from reporting_budget "
                             . "WHERE marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
            
            
            
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $dmsh = $row['SUM(dmsh)'];
                   $dhsh = $row['SUM(dhsh)'];
                   $u_dmsh = $row['SUM(u_dmsh)'];
                   $u_dhsh = $row['SUM(u_dhsh)'];

                                      $sql = "UPDATE reporting_budget SET dmsh = '$dmsh', dhsh = '$dhsh', u_dmsh = '$u_dmsh', "
                           . "u_dhsh = '$u_dhsh' WHERE marker_a = '10' AND marker_b = '$B'";
                   
                   
                                     
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                  
                   break;

              case "report_kinder";

                  $id = $value['id'];
                     
                     # Обновляем значения нужных нам учреждений
                     $sql = "UPDATE reporting_budget SET aurinko = :aurinko, berezka = :berezka, "
                         . "zoloto = :zoloto, korablik = :korablik, gnomik = :gnomik, skazka = :skazka,"
                         . " solnishko = :solnishko, u_aurinko = :aurinko, u_berezka = :berezka, "
                         . "u_zoloto = :zoloto, u_korablik = :korablik, u_gnomik = :gnomik, u_skazka = :skazka, "
                         . "u_solnishko = :solnishko"
                             . " WHERE id = '$id'";
                     
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
                     
                     $sql = "SELECT SUM(aurinko), SUM(berezka), SUM(zoloto), SUM(korablik), SUM(gnomik), SUM(skazka),"
                             . " SUM(solnishko), SUM(u_aurinko), SUM(u_berezka), SUM(u_zoloto), SUM(u_korablik), SUM(u_gnomik), SUM(u_skazka), SUM(u_solnishko)"
                             . " from reporting_budget "
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

                   
                   $u_aurinko = $row['SUM(u_aurinko)'];
                   $u_berezka = $row['SUM(u_berezka)'];
                   $u_zoloto = $row['SUM(u_zoloto)'];
                   $u_korablik = $row['SUM(u_korablik)'];
                   $u_gnomik = $row['SUM(u_gnomik)'];
                   $u_skazka = $row['SUM(u_skazka)'];
                   $u_solnishko = $row['SUM(u_solnishko)'];
                   
                   $sql = "UPDATE reporting_budget SET aurinko = '$aurinko', berezka = '$berezka', zoloto = '$zoloto', "
                           . "korablik = '$korablik', gnomik = '$gnomik', skazka = '$skazka', solnishko = '$solnishko', u_aurinko = '$u_aurinko', u_berezka = '$u_berezka',"
                           . " u_zoloto = '$u_zoloto', u_korablik = '$u_korablik', u_gnomik = '$u_gnomik', u_skazka = '$u_skazka', u_solnishko = '$u_solnishko' "
                           . "WHERE marker_a = '10' AND marker_b = '$marker_b'";
                   
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
                       
                                 $sql = "SELECT SUM(aurinko), SUM(berezka), SUM(zoloto), SUM(korablik), SUM(gnomik), SUM(skazka),"
                             . " SUM(solnishko), SUM(u_aurinko), SUM(u_berezka), SUM(u_zoloto), SUM(u_korablik), SUM(u_gnomik), SUM(u_skazka), SUM(u_solnishko)"
                             . " from reporting_budget "
                             . "WHERE marker_a = '10' AND marker_b BETWEEN '$number1' AND '$number2'";
            
            
                 
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

                   
                   $u_aurinko = $row['SUM(u_aurinko)'];
                   $u_berezka = $row['SUM(u_berezka)'];
                   $u_zoloto = $row['SUM(u_zoloto)'];
                   $u_korablik = $row['SUM(u_korablik)'];
                   $u_gnomik = $row['SUM(u_gnomik)'];
                   $u_skazka = $row['SUM(u_skazka)'];
                   $u_solnishko = $row['SUM(u_solnishko)'];
                   
                                      $sql = "UPDATE reporting_budget SET aurinko = '$aurinko', berezka = '$berezka', zoloto = '$zoloto', "
                           . "korablik = '$korablik', gnomik = '$gnomik', skazka = '$skazka', solnishko = '$solnishko', u_aurinko = '$u_aurinko', u_berezka = '$u_berezka',"
                           . " u_zoloto = '$u_zoloto', u_korablik = '$u_korablik', u_gnomik = '$u_gnomik', u_skazka = '$u_skazka', u_solnishko = '$u_solnishko' "
                           . "WHERE marker_a = '10' AND marker_b = '$B'";
                   
                                     
                           $stmt = $this->db->prepare($sql);
                           $stmt->execute();
            
                    }
                  
                  break;
            }
                      
    }
    
}

