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
                                  <td><input type="text" id='user' class='glava' value="$value[u_glava]"></td>
                                  <td><input type="text" id='user' class='adm' value="$value[u_adm]"></td>
                                  <td><input type="text" id='user' class='sovet' value="$value[u_sovet]"></td>
                                  <td><input type="text" id='user' class='kso' value="$value[u_kso]"></td>
                                  <td><input type="text" id='user' class='cb' value="$value[u_cb]"></td>
                                  <td><input type="text" id='user' class='zakupki' value="$value[u_zakupki]"></td>
                                  <td><input type="text" id='user' class='kums' value="$value[u_kums]"></td>
                                  <td><input type="text" id='user' class='uprava' value="$value[u_uprava]"></td>
                                  <td><input type="text" id='user' class='edds' value="$value[u_edds]"></td>
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
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['SUM(u_glava)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_adm)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_sovet)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_kso)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_cb)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_zakupki)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_kums)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_uprava)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_edds)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>

                  </tbody>    
                  
              </table>
              
      <?php
       break;
   
  case "report_school":

      #Определяем статус в таблице (открыт/закрыт/запрос)
      $status = $pageData['status'][2]['status'];
      
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
                          <th style="min-width: 200px; width: 200px;">ВСОШ детский сад</th>
                          <th style="min-width: 200px; width: 200px;">ВСОШ школа</th>
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
                                  
                                  echo "<td><b>" . $value['u_vsosh_ds'] . "</td></b>";
                                  echo "<td><b>" . $value['u_vsosh_school'] . "</td></b>";
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
                                  <td><input type="text" id='user' class='vsosh_ds' value="$value[u_vsosh_ds]"></td>
                                  <td><input type="text" id='user' class='vsosh_school' value="$value[u_vsosh_school]"></td>
                                  HTML;
                                  } elseif ($status == "close") {
                                  echo "<td>" . $value['u_vsosh_ds'] . "</td>";
                                  echo "<td>" . $value['u_vsosh_school'] . "</td>";
                              }
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['SUM(u_vsosh_ds)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_vsosh_school)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>

                  </tbody>    
                  
              </table>
              
      <?php
      
       break;
   
  case "report_kultura":
       
            #Определяем статус в таблице (открыт/закрыт/запрос)
      $status = $pageData['status'][3]['status'];
      
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
                          <th style="min-width: 200px; width: 200px;">ДМШ</th>
                          <th style="min-width: 200px; width: 200px;">ДХШ</th>
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
                                  
                                  echo "<td><b>" . $value['u_dmsh'] . "</td></b>";
                                  echo "<td><b>" . $value['u_dhsh'] . "</td></b>";
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
                                  <td><input type="text" id='user' class='dmsh' value="$value[u_dmsh]"></td>
                                  <td><input type="text" id='user' class='dhsh' value="$value[u_dhsh]"></td>
                                  HTML;
                                  } elseif ($status == "close") {
                                  echo "<td>" . $value['u_dmsh'] . "</td>";
                                  echo "<td>" . $value['u_dhsh'] . "</td>";
                              }
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['SUM(u_dmsh)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_dhsh)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>

                  </tbody>    
                  
              </table>
              
      <?php
      
       break;
   
  case "report_kinder";
      
      #Определяем статус в таблице (открыт/закрыт/запрос)
      $status = $pageData['status'][4]['status'];
      
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
                          <th style="min-width: 200px; width: 200px;">Детский сад Ауринко</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Березка</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Золотой Ключик</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Кораблик</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Гномик</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Сказка</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Солнышко</th>
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
                                  
                                  echo "<td><b>" . $value['u_aurinko'] . "</td></b>";
                                  echo "<td><b>" . $value['u_berezka'] . "</td></b>";
                                  echo "<td><b>" . $value['u_zoloto'] . "</td></b>";
                                  echo "<td><b>" . $value['u_korablik'] . "</td></b>";
                                  echo "<td><b>" . $value['u_gnomik'] . "</td></b>";
                                  echo "<td><b>" . $value['u_skazka'] . "</td></b>";
                                  echo "<td><b>" . $value['u_solnishko'] . "</td></b>";
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
                                  <td><input type="text" id='user' class='aurinko' value="$value[u_aurinko]"></td>
                                  <td><input type="text" id='user' class='berezka' value="$value[u_berezka]"></td>
                                  <td><input type="text" id='user' class='zoloto' value="$value[u_zoloto]"></td>
                                  <td><input type="text" id='user' class='korablik' value="$value[u_korablik]"></td>
                                  <td><input type="text" id='user' class='gnomik' value="$value[u_gnomik]"></td>
                                  <td><input type="text" id='user' class='skazka' value="$value[u_skazka]"></td>
                                  <td><input type="text" id='user' class='solnishko' value="$value[u_solnishko]"></td>
                                  HTML;
                                  } elseif ($status == "close") {
                                  echo "<td>" . $value['u_aurinko'] . "</td>";
                                  echo "<td>" . $value['u_berezka'] . "</td>";
                                  echo "<td>" . $value['u_zoloto'] . "</td>";
                                  echo "<td>" . $value['u_korablik'] . "</td>";
                                  echo "<td>" . $value['u_gnomik'] . "</td>";
                                  echo "<td>" . $value['u_skazka'] . "</td>";
                                  echo "<td>" . $value['u_solnishko'] . "</td>";
                              }
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['SUM(u_aurinko)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_berezka)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_zoloto)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_korablik)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_gnomik)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_skazka)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_solnishko)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>

                  </tbody>    
                  
              </table>
              
      <?php
      
      break;
}
