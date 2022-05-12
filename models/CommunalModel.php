<?php

class CommunalModel extends Model {
    
    public function com(){
        
    }
    
    public function communal_back($svod_mounth, $svod_year, $count_mounth, $count_year){
       
        
        if ($count_mounth == '1' and $count_year == '1'){
            
            $sql = "SELECT id, volume1, sum1, volume2, sum2, volume3, sum3, volume4, "
                    . "sum4, volume5, sum5, volume6, sum6, volume7, sum7, "
                    . "total, `status`, full_name FROM `portal_ku` WHERE `year` = '$svod_year[0]' AND `mounth` = '$svod_mounth[0]'";
            
        } else {
        
        $mounth = implode(",",$svod_mounth);
        $year = implode(",",$svod_year);
        
        $sql = "SELECT id, SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), SUM(volume3), "
                . "SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), "
                . "SUM(sum6), SUM(volume7), SUM(sum7), SUM(total), `status`, "
                . "full_name FROM `portal_ku` WHERE `year` IN($year) AND `mounth` IN($mounth) GROUP BY `full_name` order by `id` ASC";
        
        }
       
                           $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

               if($count_mounth >= '2' || $count_year >= '2'){
               $row['status'] = 10;
               
               # Разделяем число на блоки
               $block = ['SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)', 'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)', 'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)', 'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)', 'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'];
               for ($num = 0 ; $num <= 14 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               } else {
                   
                   # Разделяем число на блоки
                   $block = ['volume1', 'sum1', 'volume2', 'sum2', 'volume3', 'sum3', 'volume4', 'sum4', 'volume5', 'sum5', 'volume6', 'sum6', 'volume7', 'sum7', 'total'];
                   for ($num = 0 ; $num <= 14 ; ++$num) {
                   $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                   }
               }
   
               $res[$row['id']] = $row;
               
           }


           return $res;
        
    }
    
    public function total($svod_mounth, $svod_year){
     
        $mounth = implode(",",$svod_mounth);
        $year = implode(",",$svod_year);
        
        $sql = "SELECT SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), SUM(volume3), "
                . "SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), "
                . "SUM(sum6), SUM(volume7), SUM(sum7), SUM(total) FROM `portal_ku` WHERE `year` IN($year) AND `mounth` IN($mounth)";
        
           $res = [];
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

               # Разделяем число на блоки
               $block = ['SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)', 'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)', 'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)', 'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)', 'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'];
               for ($num = 0 ; $num <= 14 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               
               $res[$row['SUM(volume1)']] = $row;
               
           }
        

           return $res;
        
    }
    
    
    public function email($year, $mounth){
        
                $quant_year = count($year);
                $quant_mounth = count($mounth);
        
        if($quant_year == '1' and $quant_mounth == '1'){
            
            $sql = "SELECT `t1`. id, mail FROM `users_ku` as `t1` INNER JOIN `portal_ku` as `t2` WHERE `t2`.`status` = '2' AND year = '$year[0]' AND mounth = '$mounth[0]' AND `t1`.`name` = `t2`.`name`";
            
           $res = []; 
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $res[$row['id']] = $row;
           }
           
           
           
           $email = [];
           foreach ($res as $key => $value) {
               $email[] = $value['mail'];
           }
          
           foreach ($email as $address){
               echo "Вы отправили письмо на адрес $address";
               
           }
           

        } else {
            echo "Для рассылки писем, нужно выбрать один месяц";
        }
        
    }
    
    
    public function update_status($id){
        
            $sql = "UPDATE portal_ku SET status = '2' WHERE id = '$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        
    }
    
}

