<head>
             <meta charset="utf-8">
              <title>Таблица</title>
              </head>
              <body>

              <style>
               body { background: url(../images/bg.png); }
              </style>

              <link rel="stylesheet" href="../css/table2.css">

<?php

# Определяем через роль пользователя какую таблицу показывать

$role = $_SESSION['role'];

switch ($role) {
  case "report":

      #Определяем статус в таблице (открыт/закрыт/запрос)
      $status = $pageData['status'][1]['status'];
      
      #Рисуем кнопку в зависимости от статуса
      if ($status == "open"){
          echo <<<HTML
          <input type="button" style="width:250px;height:25px" name="formSubmit" id="btn1" class="btn" value="Отправить в ФУ">
          HTML;
      } 
      
      #Рисуем таблицу
      ?>

              </br>
              <br>
              <table class="freeze-table" width="700px">
                  
                                    <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Глава</th>
                          <th style="min-width: 200px; width: 200px;">Администрация</th>
                          <th style="min-width: 200px; width: 200px;">Совет</th>
                          <th style="min-width: 200px; width: 200px;">КСО</th>
                          <th style="min-width: 200px; width: 200px;">Централизованная бухгалтерия</th>
                          <th style="min-width: 200px; width: 200px;">Закупки</th>
                          <th style="min-width: 200px; width: 200px;">КУМС</th>
                          <th style="min-width: 200px; width: 200px;">Управление собственностью</th>
                          <th style="min-width: 200px; width: 200px;">ЕДДС</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                      
                                            <?php
                     
                      # Этот бред в цикле нужно убрать!!! Переменную J нужно получать иначе!!!
                      for ($j = 1 ; $j < 44 ; ++$j){
                          
                          foreach ($pageData['info'] as $key => $value) {

                              if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<td class='col-id-no' scope='row'><b>" . $value['name'] . "</td></b>";
                                  echo "<td><b>" . $value['ekr'] . "</td></b>";
                                  
                                  echo "<td><b>" . $value['u_glava'] . "</td></b>";
                                  echo "<td><b>" . $value['u_adm'] . "</td></b>";
                                  echo "<td><b>" . $value['u_sovet'] . "</td></b>";
                                  echo "<td><b>" . $value['u_kso'] . "</td></b>";
                                  echo "<td><b>" . $value['u_cb'] . "</td></b>";
                                  echo "<td><b>" . $value['u_zakupki'] . "</td></b>";
                                  echo "<td><b>" . $value['u_kums'] . "</td></b>";
                                  echo "<td><b>" . $value['u_uprava'] . "</td></b>";
                                  echo "<td><b>" . $value['u_edds'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 0 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<td class='col-id-no' scope='row'>" . $value['name'] . "</td>";
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  
                                  if ($status == "open"){
                                  echo <<<HTML
                                  <td><input type="text" id='user' class='u_glava' value="$value[u_glava]"></td>
                                  <td><input type="text" id='user' class='u_adm' value="$value[u_adm]"></td>
                                  <td><input type="text" id='user' class='u_sovet' value="$value[u_sovet]"></td>
                                  <td><input type="text" id='user' class='u_kso' value="$value[u_kso]"></td>
                                  <td><input type="text" id='user' class='u_cb' value="$value[u_cb]"></td>
                                  <td><input type="text" id='user' class='u_zakupki' value="$value[u_zakupki]"></td>
                                  <td><input type="text" id='user' class='u_kums' value="$value[u_kums]"></td>
                                  <td><input type="text" id='user' class='u_uprava' value="$value[u_uprava]"></td>
                                  <td><input type="text" id='user' class='u_edds' value="$value[u_edds]"></td>
                                  HTML;
                                  } elseif ($status == "close") {
                                  echo "<td>" . $value['u_glava'] . "</td>";
                                  echo "<td>" . $value['u_adm'] . "</td>";
                                  echo "<td>" . $value['u_sovet'] . "</td>";
                                  echo "<td>" . $value['u_kso'] . "</td>";
                                  echo "<td>" . $value['u_cb'] . "</td>";
                                  echo "<td>" . $value['u_zakupki'] . "</td>";
                                  echo "<td>" . $value['u_kums'] . "</td>";
                                  echo "<td>" . $value['u_uprava'] . "</td>";
                                  echo "<td>" . $value['u_edds'] . "</td>";
                              }
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка

                      
                      ?>

                  </tbody>    
                  
              </table>
              
      <?php
       break;
   
  case "report_school":
       echo "Блок номер 2";
       break;
   
  case "report_kultura":
       echo "Блок номер 3";
       break;
   
  case "report_kinder";
      echo "Блок номер 4";
      break;
}
