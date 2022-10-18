<?php

header('Content-Type: application/vnd.ms-excel; format=attachment;');
header('Content-Disposition: attachment; filename=Таблица_' . date('Y-m-d H:i:s') . '.xls');
header('Expires: Mon, 18 Jul 1998 01:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
echo <<<HTML
                <meta http-equiv="content-type" content="text/html; charset=utf-8">
HTML;
 
# Определяем какую таблицу отображать
              switch ($_SESSION['variant_budget']) {
        
            case "one":
              ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Итог Финуправление</th>
                          <th style="min-width: 200px; width: 200px;">Глава</th>
                          <th style="min-width: 200px; width: 200px;">Администрация</th>
                          <th style="min-width: 200px; width: 200px;">Совет</th>
                          <th style="min-width: 200px; width: 200px;">КСО</th>
                          <th style="min-width: 200px; width: 200px;">Итог ЦБ</th>
                          <th style="min-width: 200px; width: 200px;">Глава</th>
                          <th style="min-width: 200px; width: 200px;">Администрация</th>
                          <th style="min-width: 200px; width: 200px;">Совет</th>
                          <th style="min-width: 200px; width: 200px;">КСО</th>
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
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "<td><b>" . $value['glava'] . "</td></b>";
                                  echo "<td><b>" . $value['adm'] . "</td></b>";
                                  echo "<td><b>" . $value['sovet'] . "</td></b>";
                                  echo "<td><b>" . $value['kso'] . "</td></b>";
                                  echo "<td><b>" . $value['cb'] . "</td></b>";
                                  echo "<td><b>" . $value['u_glava'] . "</td></b>";
                                  echo "<td><b>" . $value['u_adm'] . "</td></b>";
                                  echo "<td><b>" . $value['u_sovet'] . "</td></b>";
                                  echo "<td><b>" . $value['u_kso'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 0 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<td class='col-id-no' scope='row'>" . $value['name'] . "</td>";
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['fu'] . "</td>";
                                  
                                  echo "<td>" . $value['glava'] . "</td>";
                                  echo "<td>" . $value['adm'] . "</td>";
                                  echo "<td>" . $value['sovet'] . "</td>";
                                  echo "<td>" . $value['kso'] . "</td>";
                                  
                                  echo "<td>" . $value['cb'] . "</td>";
                                  echo "<td>" . $value['u_glava'] . "</td>";
                                  echo "<td>" . $value['u_adm'] . "</td>";
                                  echo "<td>" . $value['u_sovet'] . "</td>";
                                  echo "<td>" . $value['u_kso'] . "</td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['fu'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(glava)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(adm)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(sovet)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(kso)'] . "</b></td>";
                      echo "<td><b>" . $value['cb'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_glava)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_adm)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_sovet)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_kso)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>
                      
                  </tbody>
                  
              </table>
              
              <?php
              
              break;
              
       case "two":
       ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Итог Финуправление</th>
                          <th style="min-width: 200px; width: 200px;">Централизованная бухгалтерия</th>
                          <th style="min-width: 200px; width: 200px;">Закупки</th>
                          <th style="min-width: 200px; width: 200px;">Итог ЦБ</th>
                          <th style="min-width: 200px; width: 200px;">Централизованная бухгалтерия</th>
                          <th style="min-width: 200px; width: 200px;">Закупки</th>
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
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "<td><b>" . $value['cb'] . "</td></b>";
                                  echo "<td><b>" . $value['zakupki'] . "</td></b>";
                                  echo "<td><b>" . $value['itog_cb'] . "</td></b>";
                                  echo "<td><b>" . $value['u_cb'] . "</td></b>";
                                  echo "<td><b>" . $value['u_zakupki'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 0 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<td class='col-id-no' scope='row'>" . $value['name'] . "</td>";
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['fu'] . "</td>";
                                  
                                  echo "<td>" . $value['cb'] . "</td>";
                                  echo "<td>" . $value['zakupki'] . "</td>";
                                  
                                  echo "<td>" . $value['itog_cb'] . "</td>";
                                  echo "<td>" . $value['u_cb'] . "</td>";
                                  echo "<td>" . $value['u_zakupki'] . "</td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['fu'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(cb)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(zakupki)'] . "</b></td>";
                      echo "<td><b>" . $value['cb'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_cb)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_zakupki)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>
                      
                  </tbody>
                  
              </table>
              
              <?php
           
           
       break;
   
       case "three":

           ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Итог Финуправление</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Ауринко</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Березка</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Золотой ключик</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Кораблик</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Гномик</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Сказка</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Солнышко</th>
                          
                          <th style="min-width: 200px; width: 200px;">Итог ЦБ</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Ауринко</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Березка</th>
                          <th style="min-width: 200px; width: 200px;">Детский сад Золотой ключик</th>
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
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "<td><b>" . $value['aurinko'] . "</td></b>";
                                  echo "<td><b>" . $value['berezka'] . "</td></b>";
                                  echo "<td><b>" . $value['zoloto'] . "</td></b>";
                                  echo "<td><b>" . $value['korablik'] . "</td></b>";
                                  echo "<td><b>" . $value['gnomik'] . "</td></b>";
                                  echo "<td><b>" . $value['skazka'] . "</td></b>";
                                  echo "<td><b>" . $value['solnishko'] . "</td></b>";
                                  
                                  echo "<td><b>" . $value['cb'] . "</td></b>";
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
                                  echo "<td>" . $value['fu'] . "</td>";
                                  
                                  echo "<td>" . $value['aurinko'] . "</td>";
                                  echo "<td>" . $value['berezka'] . "</td>";
                                  echo "<td>" . $value['zoloto'] . "</td>";
                                  echo "<td>" . $value['korablik'] . "</td>";
                                  echo "<td>" . $value['gnomik'] . "</td>";
                                  echo "<td>" . $value['skazka'] . "</td>";
                                  echo "<td>" . $value['solnishko'] . "</td>";
                                  
                                  echo "<td>" . $value['cb'] . "</td>";
                                  echo "<td>" . $value['u_aurinko'] . "</td>";
                                  echo "<td>" . $value['u_berezka'] . "</td>";
                                  echo "<td>" . $value['u_zoloto'] . "</td>";
                                  echo "<td>" . $value['u_korablik'] . "</td>";
                                  echo "<td>" . $value['u_gnomik'] . "</td>";
                                  echo "<td>" . $value['u_skazka'] . "</td>";
                                  echo "<td>" . $value['u_solnishko'] . "</td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['fu'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(aurinko)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(berezka)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(zoloto)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(korablik)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(gnomik)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(skazka)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(solnishko)'] . "</b></td>";
                      
                      echo "<td><b>" . $value['cb'] . "</b></td>";
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
   
       case "four":

           ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Итог Финуправление</th>
                          <th style="min-width: 200px; width: 200px;">ДМШ</th>
                          <th style="min-width: 200px; width: 200px;">ДХШ</th>
                          <th style="min-width: 200px; width: 200px;">Итог ЦБ</th>
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
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "<td><b>" . $value['dmsh'] . "</td></b>";
                                  echo "<td><b>" . $value['dhsh'] . "</td></b>";
                                  echo "<td><b>" . $value['cb'] . "</td></b>";
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
                                  echo "<td>" . $value['fu'] . "</td>";
                                  
                                  echo "<td>" . $value['dmsh'] . "</td>";
                                  echo "<td>" . $value['dhsh'] . "</td>";
                                  
                                  echo "<td>" . $value['cb'] . "</td>";
                                  echo "<td>" . $value['u_dmsh'] . "</td>";
                                  echo "<td>" . $value['u_dhsh'] . "</td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['fu'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(dmsh)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(dhsh)'] . "</b></td>";
                      echo "<td><b>" . $value['cb'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_dmsh)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_dhsh)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>
                      
                  </tbody>
                  
              </table>
              
              <?php
           
       break;
   
       case "five":
           
                      ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Итог Финуправление</th>
                          <th style="min-width: 200px; width: 200px;">ВСОШ детский сад</th>
                          <th style="min-width: 200px; width: 200px;">ВСОШ школа</th>
                          <th style="min-width: 200px; width: 200px;">Итог ЦБ</th>
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
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "<td><b>" . $value['vsosh_ds'] . "</td></b>";
                                  echo "<td><b>" . $value['vsosh_school'] . "</td></b>";
                                  echo "<td><b>" . $value['cb'] . "</td></b>";
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
                                  echo "<td>" . $value['fu'] . "</td>";
                                  
                                  echo "<td>" . $value['vsosh_ds'] . "</td>";
                                  echo "<td>" . $value['vsosh_school'] . "</td>";
                                  
                                  echo "<td>" . $value['cb'] . "</td>";
                                  echo "<td>" . $value['u_vsosh_ds'] . "</td>";
                                  echo "<td>" . $value['u_vsosh_school'] . "</td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['fu'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(vsosh_ds)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(vsosh_school)'] . "</b></td>";
                      echo "<td><b>" . $value['cb'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_vsosh_ds)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(u_vsosh_school)'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>
                      
                  </tbody>
                  
              </table>
              
              <?php

       break;
   
       case "six":
       
                                 ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Итог Финуправление</th>
                          <th style="min-width: 200px; width: 200px;">КУМС</th>
                          <th style="min-width: 200px; width: 200px;">Управление собственностью</th>
                          <th style="min-width: 200px; width: 200px;">ЕДДС</th>
                          <th style="min-width: 200px; width: 200px;">Итог ЦБ</th>
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
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "<td><b>" . $value['kums'] . "</td></b>";
                                  echo "<td><b>" . $value['uprava'] . "</td></b>";
                                  echo "<td><b>" . $value['edds'] . "</td></b>";
                                  echo "<td><b>" . $value['cb'] . "</td></b>";
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
                                  echo "<td>" . $value['fu'] . "</td>";
                                  
                                  echo "<td>" . $value['kums'] . "</td>";
                                  echo "<td>" . $value['uprava'] . "</td>";
                                  echo "<td>" . $value['edds'] . "</td>";
                                  
                                  echo "<td>" . $value['cb'] . "</td>";
                                  echo "<td>" . $value['u_kums'] . "</td>";
                                  echo "<td>" . $value['u_uprava'] . "</td>";
                                  echo "<td>" . $value['u_edds'] . "</td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['fu'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(kums)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(uprava)'] . "</b></td>";
                      echo "<td><b>" . $value['SUM(edds)'] . "</b></td>";
                      echo "<td><b>" . $value['cb'] . "</b></td>";
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
       
            case "seven";
                
                ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Финуправление</th>
                          <th style="min-width: 200px; width: 200px;">ЦБ</th>

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
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "<td><b>" . $value['cb'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 0 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<td class='col-id-no' scope='row'>" . $value['name'] . "</td>";
                                  echo "<td>" . $value['ekr'] . "</td>";                              
                                  echo "<td>" . $value['fu'] . "</td>";
                                  echo "<td>" . $value['cb'] . "</td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                      }
                      
                      #Итоговая строка
                      foreach ($pageData['total'] as $key => $value) {
                      echo "<tr>";
                      echo "<td class='col-id-no' scope='row'><b>Итого</td>";
                      echo "<td></td>";
                      echo "<td><b>" . $value['fu'] . "</b></td>";
                      echo "<td><b>" . $value['cb'] . "</b></td>";
                      echo "</tr>";
                      }
                      
                      ?>
                      
                  </tbody>
                  
              </table>
              
              <?php
                
                break;
   
              }



