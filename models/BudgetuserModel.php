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

                   break;

              case "report_kultura":

                   break;

              case "report_kinder";

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
                  
                                       #Опрделяем роль для выборки из БД
                     $role = $_SESSION['role'];

            switch ($role) {
              case "report":
                         break;

              case "report_school":

                   break;

              case "report_kultura":

                   break;

              case "report_kinder";

                  break;
            }
                  
              }
    
}

