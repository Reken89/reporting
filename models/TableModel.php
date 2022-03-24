<?php

class TableModel extends Model {
    

    public function back($svod_mounth, $svod_chapter, $svod_title, $count_svod_mounth, $count_svod_chapter, $count_svod_title) {

        if($_SESSION['id'] == '1'){
            
                if ($count_svod_mounth >= '1' && $count_svod_chapter >= '1' && $count_svod_title >= '1') {
                    
                    $_SESSION['rendering'] = "vault";
                    $mounth = implode(",",$svod_mounth);
                    $chapter = implode(",",$svod_chapter);
                    $title = implode("','",$svod_title);
                
        $sql = "SELECT `t1`. `name`, ekr, `t2`.id , marker_a, marker_b, SUM(lbo), SUM(credit_year_all), "
                . "SUM(credit_year_term), SUM(debit_year_all), SUM(debit_year_term), SUM(fact_all), SUM(fact_mounth), SUM(kassa_all), "
                . "SUM(kassa_mounth), SUM(credit_end_all), SUM(credit_end_term), SUM(debit_end_all), SUM(debit_end_term), status, SUM(total1), SUM(total2), SUM(return_old), SUM(prepaid) "
                . "FROM `reporting_name` as `t1` INNER JOIN `reporting_meaning` as `t2` WHERE "
                . "`t2`.`mounth` IN($mounth) AND `variant_table` IN($chapter) AND `t2`.`name` IN('$title') AND `t1`.`id` = `t2`.`id_name` GROUP BY `id_name`";
        
        }
        
   
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               
                              # Разделяем число на блоки
               $block = ['SUM(lbo)', 'SUM(credit_year_all)', 'SUM(credit_year_term)', 'SUM(debit_year_all)', 'SUM(debit_year_term)', 'SUM(fact_all)', 'SUM(fact_mounth)', 'SUM(kassa_all)', 'SUM(kassa_mounth)', 'SUM(credit_end_all)', 'SUM(credit_end_term)', 'SUM(debit_end_all)', 'SUM(debit_end_term)', 'SUM(total1)', 'SUM(total2)', 'SUM(return_old)', 'SUM(prepaid)'];
               for ($num = 0 ; $num <= 16 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               $res[$row['id']] = $row;
               
           }
           
        
    } if($_SESSION['id'] == '2' || $_SESSION['id'] == '3'){
        
               if ($count_svod_mounth == '1' && $count_svod_chapter == '1' && $count_svod_title == '1') {
                
                   
                   
        $sql = "SELECT `t1`. `name`, ekr, `t2`.id , id_name, marker_a, marker_b, lbo, credit_year_all, "
                . "credit_year_term, debit_year_all, debit_year_term, fact_all, fact_mounth, kassa_all, "
                . "kassa_mounth, credit_end_all, credit_end_term, debit_end_all, debit_end_term, status, total1, total2, return_old, prepaid "
                . "FROM `reporting_name` as `t1` INNER JOIN `reporting_meaning` as `t2` WHERE "
                . "`t2`.`mounth` = '$svod_mounth[0]' AND `variant_table` = '$svod_chapter[0]' AND `t2`.`name` = '$svod_title[0]' AND `t1`.`id` = `t2`.`id_name`";
        
        }
        
                                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               
               # Разделяем число на блоки
               $block = ['lbo', 'credit_year_all', 'credit_year_term', 'debit_year_all', 'debit_year_term', 'fact_all', 'fact_mounth', 'kassa_all', 'kassa_mounth', 'credit_end_all', 'credit_end_term', 'debit_end_all', 'debit_end_term', 'total1', 'total2', 'return_old', 'prepaid'];
               for ($num = 0 ; $num <= 16 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               $res[$row['id']] = $row;
               
           }
                           
    }
    
           $contacts = ['mounth' => $svod_mounth, 'chapter' => $svod_chapter, 'title' => $svod_title];
           
           $info = ['res' => $res, 'info' => $contacts];
           
           return $info; 
    
    }
    

    
    
    public function total($svod_mounth, $svod_chapter, $svod_title) {
        
                    $mounth = implode(",",$svod_mounth);
                    $chapter = implode(",",$svod_chapter);
                    $title = implode("','",$svod_title);
                    
                  $sql = "SELECT id, SUM(lbo), SUM(credit_year_all), SUM(credit_year_term), SUM(debit_year_all),"
                . "SUM(debit_year_term), SUM(fact_all), SUM(fact_mounth), SUM(kassa_all),"
                . "SUM(kassa_mounth), SUM(credit_end_all), SUM(credit_end_term), SUM(debit_end_all),"
                . "SUM(debit_end_term), SUM(total1), SUM(total2), SUM(return_old), SUM(prepaid) from reporting_meaning WHERE "
                          . "`mounth` IN($mounth) AND `variant_table` IN($chapter) AND `name` IN('$title') "
                          . "AND marker_a = '10' AND marker_b != '15' AND marker_b != '18' AND marker_b != '24' "
                          . "AND marker_b != '32'";  
        
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               
               # Разделяем число на блоки
               $block = ['SUM(lbo)', 'SUM(credit_year_all)', 'SUM(credit_year_term)', 'SUM(debit_year_all)', 'SUM(debit_year_term)', 'SUM(fact_all)', 'SUM(fact_mounth)', 'SUM(kassa_all)', 'SUM(kassa_mounth)', 'SUM(credit_end_all)', 'SUM(credit_end_term)', 'SUM(debit_end_all)', 'SUM(debit_end_term)', 'SUM(total1)', 'SUM(total2)', 'SUM(return_old)', 'SUM(prepaid)'];
               for ($num = 0 ; $num <= 16 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               $res[$row['id']] = $row;
               
           }
           
           return $res;
                  
    }
    
    public function ofs() {
        
    }
    
       public function update($id, $debit_end_term, $debit_end_all, $credit_end_term, $credit_end_all, $kassa_mounth, $kassa_all, $fact_mounth, $fact_all, $debit_year_term, $debit_year_all, $credit_year_term, $credit_year_all, $lbo, $mounth, $chapter, $title, $marker_b, $return_old, $prepaid) {
       
           $sql = "SELECT fact_mounth, kassa_mounth "
                   . "from reporting_meaning WHERE id = '$id'";
           
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
       if($row['kassa_mounth'] == $kassa_mounth){
       $kassa_all = $kassa_all;
       } else {
       $kassa_all = $kassa_all + $kassa_mounth;    
       }
       
       if($row['fact_mounth'] == $fact_mounth){
       $fact_all = $fact_all;
       } else {
       $fact_all = $fact_all + $fact_mounth;
       }
       
           
       $total1 = ($credit_year_all + $fact_all - $debit_year_all - $kassa_all) - ($credit_end_all - $debit_end_all) + $return_old;
       $total2 = $lbo - $fact_all + $prepaid - $credit_year_all;
           
       $sql = "UPDATE reporting_meaning SET lbo = :lbo, credit_year_all = :credit_year_all, credit_year_term = :credit_year_term,"
               . "debit_year_all = :debit_year_all, debit_year_term = :debit_year_term, fact_all = :fact_all,"
               . "fact_mounth = :fact_mounth, kassa_all = :kassa_all, kassa_mounth = :kassa_mounth, credit_end_all = :credit_end_all,"
               . "credit_end_term = :credit_end_term, debit_end_all = :debit_end_all, debit_end_term = :debit_end_term, return_old = :return_old, prepaid = :prepaid, total1 = :total1, total2 = :total2 WHERE id = '$id'"; 
        
               $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":lbo", $lbo, PDO::PARAM_STR);
        $stmt->bindValue(":credit_year_all", $credit_year_all, PDO::PARAM_STR);
        $stmt->bindValue(":credit_year_term", $credit_year_term, PDO::PARAM_STR);
        $stmt->bindValue(":debit_year_all", $debit_year_all, PDO::PARAM_STR);
        $stmt->bindValue(":debit_year_term", $debit_year_term, PDO::PARAM_STR);
        $stmt->bindValue(":fact_all", $fact_all, PDO::PARAM_STR);
        $stmt->bindValue(":fact_mounth", $fact_mounth, PDO::PARAM_STR);
        $stmt->bindValue(":kassa_all", $kassa_all, PDO::PARAM_STR);
        $stmt->bindValue(":kassa_mounth", $kassa_mounth, PDO::PARAM_STR);
        $stmt->bindValue(":credit_end_all", $credit_end_all, PDO::PARAM_STR);
        $stmt->bindValue(":credit_end_term", $credit_end_term, PDO::PARAM_STR);
        $stmt->bindValue(":debit_end_all", $debit_end_all, PDO::PARAM_STR);
        $stmt->bindValue(":debit_end_term", $debit_end_term, PDO::PARAM_STR);
        $stmt->bindValue(":return_old", $return_old, PDO::PARAM_STR);
        $stmt->bindValue(":prepaid", $prepaid, PDO::PARAM_STR);
        $stmt->bindValue(":total1", $total1, PDO::PARAM_STR);
        $stmt->bindValue(":total2", $total2, PDO::PARAM_STR);

        $stmt->execute();
        
        
        $sql = "SELECT SUM(lbo), SUM(credit_year_all), SUM(credit_year_term), SUM(debit_year_all),"
                . "SUM(debit_year_term), SUM(fact_all), SUM(fact_mounth), SUM(kassa_all),"
                . "SUM(kassa_mounth), SUM(credit_end_all), SUM(credit_end_term), SUM(debit_end_all),"
                . "SUM(debit_end_term), SUM(return_old), SUM(prepaid), SUM(total1), SUM(total2) from reporting_meaning WHERE marker_a = '5' "
                . "AND marker_b = '$marker_b' AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title'";
        
                   
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $lbo = $row['SUM(lbo)'];
                   $credit_year_all = $row['SUM(credit_year_all)'];
                   $credit_year_term = $row['SUM(credit_year_term)'];
                   $debit_year_all = $row['SUM(debit_year_all)'];
                   $debit_year_term = $row['SUM(debit_year_term)'];
                   $fact_all = $row['SUM(fact_all)'];
                   $fact_mounth = $row['SUM(fact_mounth)'];
                   $kassa_all = $row['SUM(kassa_all)'];
                   $kassa_mounth = $row['SUM(kassa_mounth)'];
                   $credit_end_all = $row['SUM(credit_end_all)'];
                   $credit_end_term = $row['SUM(credit_end_term)'];
                   $debit_end_all = $row['SUM(debit_end_all)'];
                   $debit_end_term = $row['SUM(debit_end_term)'];
                   $return_old = $row['SUM(return_old)'];
                   $prepaid = $row['SUM(prepaid)'];
                   $total1 = $row['SUM(total1)'];
                   $total2 = $row['SUM(total2)'];

        
        $sql = "UPDATE reporting_meaning SET lbo = '$lbo', credit_year_all = '$credit_year_all',"
                . "credit_year_term = '$credit_year_term', debit_year_all = '$debit_year_all',"
                . "debit_year_term = '$debit_year_term', fact_all = '$fact_all', fact_mounth = '$fact_mounth',"
                . "kassa_all = '$kassa_all', kassa_mounth = '$kassa_mounth', credit_end_all = '$credit_end_all',"
                . "credit_end_term = '$credit_end_term', debit_end_all = '$debit_end_all',"
                . "debit_end_term = '$debit_end_term', return_old = '$return_old', prepaid = '$prepaid', total1 = '$total1', total2 = '$total2' WHERE marker_a = '10' "
                . "AND marker_b = '$marker_b' AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
         
         #240 260 290 340
        if($marker_b >= '16' && $marker_b <= '17' || $marker_b >= '19' && $marker_b <= '23' || $marker_b >= '25' && $marker_b <= '30' || $marker_b >= '33' && $marker_b <= '39'){
            
            if($marker_b >= '16' && $marker_b <= '17'){
                $B = 15;
                $number1 = 16;
                $number2 = 17;
            }
            
            if($marker_b >= '19' && $marker_b <= '23'){
                $B = 18;
                $number1 = 19;
                $number2 = 23;
            }
            
            if($marker_b >= '25' && $marker_b <= '30'){
                $B = 24;
                $number1 = 25;
                $number2 = 30;
            }
            
            if($marker_b >= '33' && $marker_b <= '39'){
                $B = 32;
                $number1 = 33;
                $number2 = 39;
            }
            
            
            
                    $sql = "SELECT SUM(lbo), SUM(credit_year_all), SUM(credit_year_term), SUM(debit_year_all),"
                . "SUM(debit_year_term), SUM(fact_all), SUM(fact_mounth), SUM(kassa_all),"
                . "SUM(kassa_mounth), SUM(credit_end_all), SUM(credit_end_term), SUM(debit_end_all),"
                . "SUM(debit_end_term), SUM(return_old), SUM(prepaid), SUM(total1), SUM(total2) from reporting_meaning WHERE marker_a = '10' "
                . "AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title' AND marker_b BETWEEN '$number1' AND '$number2'";
             
          

                   
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $lbo = $row['SUM(lbo)'];
                   $credit_year_all = $row['SUM(credit_year_all)'];
                   $credit_year_term = $row['SUM(credit_year_term)'];
                   $debit_year_all = $row['SUM(debit_year_all)'];
                   $debit_year_term = $row['SUM(debit_year_term)'];
                   $fact_all = $row['SUM(fact_all)'];
                   $fact_mounth = $row['SUM(fact_mounth)'];
                   $kassa_all = $row['SUM(kassa_all)'];
                   $kassa_mounth = $row['SUM(kassa_mounth)'];
                   $credit_end_all = $row['SUM(credit_end_all)'];
                   $credit_end_term = $row['SUM(credit_end_term)'];
                   $debit_end_all = $row['SUM(debit_end_all)'];
                   $debit_end_term = $row['SUM(debit_end_term)'];
                   $return_old = $row['SUM(return_old)'];
                   $prepaid = $row['SUM(prepaid)'];
                   $total1 = $row['SUM(total1)'];
                   $total2 = $row['SUM(total2)'];
                   
                   $sql = "UPDATE reporting_meaning SET lbo = '$lbo', credit_year_all = '$credit_year_all',"
                . "credit_year_term = '$credit_year_term', debit_year_all = '$debit_year_all',"
                . "debit_year_term = '$debit_year_term', fact_all = '$fact_all', fact_mounth = '$fact_mounth',"
                . "kassa_all = '$kassa_all', kassa_mounth = '$kassa_mounth', credit_end_all = '$credit_end_all',"
                . "credit_end_term = '$credit_end_term', debit_end_all = '$debit_end_all',"
                . "debit_end_term = '$debit_end_term', return_old = '$return_old', prepaid = '$prepaid', total1 = '$total1', total2 = '$total2' WHERE marker_a = '10' "
                . "AND marker_b = '$B' AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
            
        }
        
        
        
           
       
    }
    
    public function dispatch($error1,$error2,$mounth,$chapter,$title) {
        
        if($error1 == 'no' && $error2 == 'no'){
            
            $sql = "UPDATE reporting_meaning SET `status` = '10' WHERE mounth = '$mounth' "
                    . "AND variant_table = '$chapter' AND name = '$title'";
            
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
            
            echo "Вы отправили информацию в ФУ";
     
            
        } else {
            echo "В таблице присутствуют ошибки, отправка в ФУ невозможна";
           
        }
        
    }
    
    
    public function editing1($mounth,$chapter,$title) {
        
                    $sql = "UPDATE reporting_meaning SET `status` = '66' WHERE mounth = '$mounth' "
                    . "AND variant_table = '$chapter' AND name = '$title'";
            
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
            
            echo "Вы отправили запрос на редактирование ФУ";
        
        
    }
    
    
    
        public function editing2($mounth,$chapter,$title) {
        
                    $sql = "UPDATE reporting_meaning SET `status` = '2022' WHERE mounth = '$mounth' "
                    . "AND variant_table = '$chapter' AND name = '$title'";
            
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
            
            echo "Вы открыли редактирование";
        
        
    }
    
    
    public function excel() {
        
    }
    
    public function reset($id, $mounth, $marker_b, $chapter, $title, $debit_end_term, $debit_end_all, $credit_end_term, $credit_end_all, $debit_year_term, $debit_year_all, $credit_year_term, $credit_year_all, $lbo, $id_name, $return_old, $prepaid) {
        
        # Обнуляем нужную строчку
        
        # Если месяц январь
        if($mounth < 2){
        
               $total1 = ($credit_year_all + 0 - $debit_year_all - 0) - ($credit_end_all - $debit_end_all) + $return_old;
       $total2 = $lbo - 0 + $prepaid - $credit_year_all;
           
       $sql = "UPDATE reporting_meaning SET lbo = :lbo, credit_year_all = :credit_year_all, credit_year_term = :credit_year_term,"
               . "debit_year_all = :debit_year_all, debit_year_term = :debit_year_term, fact_all = '0',"
               . "fact_mounth = '0', kassa_all = '0', kassa_mounth = '0', credit_end_all = :credit_end_all,"
               . "credit_end_term = :credit_end_term, debit_end_all = :debit_end_all, debit_end_term = :debit_end_term, return_old = :return_old, prepaid = :prepaid, total1 = :total1, total2 = :total2 WHERE id = '$id'"; 
        
                      $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":lbo", $lbo, PDO::PARAM_STR);
        $stmt->bindValue(":credit_year_all", $credit_year_all, PDO::PARAM_STR);
        $stmt->bindValue(":credit_year_term", $credit_year_term, PDO::PARAM_STR);
        $stmt->bindValue(":debit_year_all", $debit_year_all, PDO::PARAM_STR);
        $stmt->bindValue(":debit_year_term", $debit_year_term, PDO::PARAM_STR);

        $stmt->bindValue(":credit_end_all", $credit_end_all, PDO::PARAM_STR);
        $stmt->bindValue(":credit_end_term", $credit_end_term, PDO::PARAM_STR);
        $stmt->bindValue(":debit_end_all", $debit_end_all, PDO::PARAM_STR);
        $stmt->bindValue(":debit_end_term", $debit_end_term, PDO::PARAM_STR);
        $stmt->bindValue(":return_old", $return_old, PDO::PARAM_STR);
        $stmt->bindValue(":prepaid", $prepaid, PDO::PARAM_STR);
        $stmt->bindValue(":total1", $total1, PDO::PARAM_STR);
        $stmt->bindValue(":total2", $total2, PDO::PARAM_STR);

        $stmt->execute();
        
        # Все месяца кроме января
        } else {
            
            # Получаем значения с прошлого месяца
            $mounth_old = $mounth - 1;
            
                  $sql = "SELECT fact_all, kassa_all from reporting_meaning WHERE mounth = '$mounth_old' "
                 . "AND name = '$title' AND variant_table = '$chapter' AND id_name = '$id_name'";
                                  
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $fact_x = $row['fact_all'];
                   $kassa_x = $row['kassa_all'];
                   
                          $total1 = ($credit_year_all + $fact_x - $debit_year_all - $kassa_x) - ($credit_end_all - $debit_end_all) + $return_old;
                          $total2 = $lbo - $fact_x + $prepaid - $credit_year_all;
                          
                                 $sql = "UPDATE reporting_meaning SET lbo = :lbo, credit_year_all = :credit_year_all, credit_year_term = :credit_year_term,"
               . "debit_year_all = :debit_year_all, debit_year_term = :debit_year_term, fact_all = '$fact_x',"
               . "fact_mounth = '0', kassa_all = '$kassa_x', kassa_mounth = '0', credit_end_all = :credit_end_all,"
               . "credit_end_term = :credit_end_term, debit_end_all = :debit_end_all, debit_end_term = :debit_end_term, return_old = :return_old, prepaid = :prepaid, total1 = :total1, total2 = :total2 WHERE id = '$id'"; 
        
                      $stmt = $this->db->prepare($sql);
                        $stmt->bindValue(":lbo", $lbo, PDO::PARAM_STR);
                        $stmt->bindValue(":credit_year_all", $credit_year_all, PDO::PARAM_STR);
                        $stmt->bindValue(":credit_year_term", $credit_year_term, PDO::PARAM_STR);
                        $stmt->bindValue(":debit_year_all", $debit_year_all, PDO::PARAM_STR);
                        $stmt->bindValue(":debit_year_term", $debit_year_term, PDO::PARAM_STR);

                        $stmt->bindValue(":credit_end_all", $credit_end_all, PDO::PARAM_STR);
                        $stmt->bindValue(":credit_end_term", $credit_end_term, PDO::PARAM_STR);
                        $stmt->bindValue(":debit_end_all", $debit_end_all, PDO::PARAM_STR);
                        $stmt->bindValue(":debit_end_term", $debit_end_term, PDO::PARAM_STR);
                        $stmt->bindValue(":return_old", $return_old, PDO::PARAM_STR);
                        $stmt->bindValue(":prepaid", $prepaid, PDO::PARAM_STR);
                        $stmt->bindValue(":total1", $total1, PDO::PARAM_STR);
                        $stmt->bindValue(":total2", $total2, PDO::PARAM_STR);

        $stmt->execute();
            
        }
       
        # Пересчитываем блоки
        $sql = "SELECT SUM(lbo), SUM(credit_year_all), SUM(credit_year_term), SUM(debit_year_all),"
                . "SUM(debit_year_term), SUM(fact_all), SUM(fact_mounth), SUM(kassa_all),"
                . "SUM(kassa_mounth), SUM(credit_end_all), SUM(credit_end_term), SUM(debit_end_all),"
                . "SUM(debit_end_term), SUM(return_old), SUM(prepaid), SUM(total1), SUM(total2) from reporting_meaning WHERE marker_a = '5' "
                . "AND marker_b = '$marker_b' AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title'";
        
                   
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $lbo = $row['SUM(lbo)'];
                   $credit_year_all = $row['SUM(credit_year_all)'];
                   $credit_year_term = $row['SUM(credit_year_term)'];
                   $debit_year_all = $row['SUM(debit_year_all)'];
                   $debit_year_term = $row['SUM(debit_year_term)'];
                   $fact_all = $row['SUM(fact_all)'];
                   $fact_mounth = $row['SUM(fact_mounth)'];
                   $kassa_all = $row['SUM(kassa_all)'];
                   $kassa_mounth = $row['SUM(kassa_mounth)'];
                   $credit_end_all = $row['SUM(credit_end_all)'];
                   $credit_end_term = $row['SUM(credit_end_term)'];
                   $debit_end_all = $row['SUM(debit_end_all)'];
                   $debit_end_term = $row['SUM(debit_end_term)'];
                   $return_old = $row['SUM(return_old)'];
                   $prepaid = $row['SUM(prepaid)'];
                   $total1 = $row['SUM(total1)'];
                   $total2 = $row['SUM(total2)'];

        
        $sql = "UPDATE reporting_meaning SET lbo = '$lbo', credit_year_all = '$credit_year_all',"
                . "credit_year_term = '$credit_year_term', debit_year_all = '$debit_year_all',"
                . "debit_year_term = '$debit_year_term', fact_all = '$fact_all', fact_mounth = '$fact_mounth',"
                . "kassa_all = '$kassa_all', kassa_mounth = '$kassa_mounth', credit_end_all = '$credit_end_all',"
                . "credit_end_term = '$credit_end_term', debit_end_all = '$debit_end_all',"
                . "debit_end_term = '$debit_end_term', return_old = '$return_old', prepaid = '$prepaid', total1 = '$total1', total2 = '$total2' WHERE marker_a = '10' "
                . "AND marker_b = '$marker_b' AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
         
         #240 260 290 340
        if($marker_b >= '16' && $marker_b <= '17' || $marker_b >= '19' && $marker_b <= '23' || $marker_b >= '25' && $marker_b <= '30' || $marker_b >= '33' && $marker_b <= '39'){
            
            if($marker_b >= '16' && $marker_b <= '17'){
                $B = 15;
                $number1 = 16;
                $number2 = 17;
            }
            
            if($marker_b >= '19' && $marker_b <= '23'){
                $B = 18;
                $number1 = 19;
                $number2 = 23;
            }
            
            if($marker_b >= '25' && $marker_b <= '30'){
                $B = 24;
                $number1 = 25;
                $number2 = 30;
            }
            
            if($marker_b >= '33' && $marker_b <= '39'){
                $B = 32;
                $number1 = 33;
                $number2 = 39;
            }
            
            
            
                    $sql = "SELECT SUM(lbo), SUM(credit_year_all), SUM(credit_year_term), SUM(debit_year_all),"
                . "SUM(debit_year_term), SUM(fact_all), SUM(fact_mounth), SUM(kassa_all),"
                . "SUM(kassa_mounth), SUM(credit_end_all), SUM(credit_end_term), SUM(debit_end_all),"
                . "SUM(debit_end_term), SUM(return_old), SUM(prepaid), SUM(total1), SUM(total2) from reporting_meaning WHERE marker_a = '10' "
                . "AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title' AND marker_b BETWEEN '$number1' AND '$number2'";
             
          
                             
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                   $lbo = $row['SUM(lbo)'];
                   $credit_year_all = $row['SUM(credit_year_all)'];
                   $credit_year_term = $row['SUM(credit_year_term)'];
                   $debit_year_all = $row['SUM(debit_year_all)'];
                   $debit_year_term = $row['SUM(debit_year_term)'];
                   $fact_all = $row['SUM(fact_all)'];
                   $fact_mounth = $row['SUM(fact_mounth)'];
                   $kassa_all = $row['SUM(kassa_all)'];
                   $kassa_mounth = $row['SUM(kassa_mounth)'];
                   $credit_end_all = $row['SUM(credit_end_all)'];
                   $credit_end_term = $row['SUM(credit_end_term)'];
                   $debit_end_all = $row['SUM(debit_end_all)'];
                   $debit_end_term = $row['SUM(debit_end_term)'];
                   $return_old = $row['SUM(return_old)'];
                   $prepaid = $row['SUM(prepaid)'];
                   $total1 = $row['SUM(total1)'];
                   $total2 = $row['SUM(total2)'];
                   
                   $sql = "UPDATE reporting_meaning SET lbo = '$lbo', credit_year_all = '$credit_year_all',"
                . "credit_year_term = '$credit_year_term', debit_year_all = '$debit_year_all',"
                . "debit_year_term = '$debit_year_term', fact_all = '$fact_all', fact_mounth = '$fact_mounth',"
                . "kassa_all = '$kassa_all', kassa_mounth = '$kassa_mounth', credit_end_all = '$credit_end_all',"
                . "credit_end_term = '$credit_end_term', debit_end_all = '$debit_end_all',"
                . "debit_end_term = '$debit_end_term', return_old = '$return_old', prepaid = '$prepaid', total1 = '$total1', total2 = '$total2' WHERE marker_a = '10' "
                . "AND marker_b = '$B' AND variant_table = '$chapter' AND mounth = '$mounth' "
                . "AND name = '$title'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
            
        }
        
        
    }
    
        public function filling($mounth,$chapter,$title){
            
            # Определяем предыдущий месяц
            $old_mounth = $mounth - 1;
            
            if($old_mounth > '0'){
            
                # Получаем массив с данными за прошлый месяц
                $sql = "SELECT id_name, lbo, fact_all, kassa_all, return_old, prepaid, credit_year_all, "
                        . "credit_year_term, debit_year_all, debit_year_term from reporting_meaning WHERE mounth = '$old_mounth' "
                 . "AND name = '$title' AND variant_table = '$chapter'";
                
                                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                   
                   # Считаем количество строк в массиве (НЕ ОБЯЗАТЕЛЬНО)
                   $num = $stmt->rowCount();
           
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                     $res[$row['id_name']] = $row;
                      }
            
                      # Запускаем цикл для записи в текущий месяц
                      # Пропускаем значение 99, так как оно не используется в таблице reporting_meaning
                      for ($a = 1 ; $a < 99  ; ++$a){
                          
                          $lbo_x = $res[$a]['lbo'];
                          $fact_x = $res[$a]['fact_all'];
                          $kassa_x = $res[$a]['kassa_all'];
                          $return_old_x = $res[$a]['return_old'];
                          
                          $prepaid_x = $res[$a]['prepaid'];
                          $credit_year_all_x = $res[$a]['credit_year_all'];
                          $credit_year_term_x = $res[$a]['credit_year_term'];
                          $debit_year_all_x = $res[$a]['debit_year_all'];
                          $debit_year_term_x = $res[$a]['debit_year_term'];
                          
                          $proverka = $lbo_x + $fact_x + $kassa_x + $return_old_x + $prepaid_x + $credit_year_all_x +
                                  $credit_year_term_x + $debit_year_all_x + $debit_year_term_x;
                          
                          # Ставим проверку, что бы лишний раз не трогать БД
                          if($proverka == '0'){
                              # Заглушка
                          } else {
                          
                              
                              
                          $total1 = ($credit_year_all_x + $fact_x - $debit_year_all_x - $kassa_x) - (0 - 0) + $return_old_x;
                          $total2 = $lbo_x - $fact_x + $prepaid_x - $credit_year_all_x;
                              
                          
                            $sql = "UPDATE reporting_meaning SET lbo = '$lbo_x', fact_all = '$fact_x', "
                           . "kassa_all = '$kassa_x', return_old = '$return_old_x', prepaid = '$prepaid_x', credit_year_all = '$credit_year_all_x', "
                                    . "credit_year_term = '$credit_year_term_x', debit_year_all = '$debit_year_all_x', debit_year_term = '$debit_year_term_x', "
                                    . "total1 = '$total1', total2 = '$total2' WHERE id_name = '$a' AND mounth = '$mounth' "
                           . "AND name = '$title' AND variant_table = '$chapter'";
                           

                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
                               
                               
                          }
                          
                      }
                      
                        # Запускаем цикл для записи в текущий месяц
                        # Пропускаем значение 99, так как оно не используется в таблице reporting_meaning
                        for ($b = 100 ; $b <= 176  ; ++$b){
                          
                          $lbo_x = $res[$b]['lbo'];
                          $fact_x = $res[$b]['fact_all'];
                          $kassa_x = $res[$b]['kassa_all'];
                          $return_old_x = $res[$b]['return_old'];
                          
                          $prepaid_x = $res[$b]['prepaid'];
                          $credit_year_all_x = $res[$b]['credit_year_all'];
                          $credit_year_term_x = $res[$b]['credit_year_term'];
                          $debit_year_all_x = $res[$b]['debit_year_all'];
                          $debit_year_term_x = $res[$b]['debit_year_term'];
                          
                          $proverka = $lbo_x + $fact_x + $kassa_x + $return_old_x + $prepaid_x + $credit_year_all_x + $credit_year_term_x + $debit_year_all_x + $debit_year_term_x;
                                  #$credit_year_term_x + $debit_year_all_x + $debit_year_term_x;
                          
                          # Ставим проверку, что бы лишний раз не трогать БД
                          if($proverka == '0'){
                              #Заглушка
                              
                          } else {
                              
                              
                          $total1 = ($credit_year_all_x + $fact_x - $debit_year_all_x - $kassa_x) - (0 - 0) + $return_old_x;
                          $total2 = $lbo_x - $fact_x + $prepaid_x - $credit_year_all_x;
                          
                          
                            $sql = "UPDATE reporting_meaning SET lbo = '$lbo_x', fact_all = '$fact_x', "
                           . "kassa_all = '$kassa_x', return_old = '$return_old_x', prepaid = '$prepaid_x', credit_year_all = '$credit_year_all_x', "
                                    . "credit_year_term = '$credit_year_term_x', debit_year_all = '$debit_year_all_x', debit_year_term = '$debit_year_term_x', "
                                    . "total1 = '$total1', total2 = '$total2' WHERE id_name = '$b' AND mounth = '$mounth' "
                           . "AND name = '$title' AND variant_table = '$chapter'";
                           

                   
                         $stmt = $this->db->prepare($sql);
                         $stmt->execute();
                               
                               
                         
                          }
                          
                      }
                                            
                      echo "Данные успешно заполнены";
                      
            } else {
                      echo "Данные не могут быть заполнены!";
            }

        
    }
    
}

