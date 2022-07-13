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

 # Определяем какой раздел таблицы показывать
              switch ($_SESSION['variant_prognoz']) {
                  
                  case "teplo":
                      $volume1 = "teplo_vol1";
                      $volume2 = "teplo_vol2";
                      $vol = "teplo_vol";
                      $sum1 = "teplo_sum1";
                      $sum2 = "teplo_sum2";
                      $sum = "teplo_sum";
                      
                      $sum_volume1 = "SUM(teplo_vol1)";
                      $sum_volume2 = "SUM(teplo_vol2)";
                      $sum_vol = "teplo_vol";
                      $sum_sum1 = "SUM(teplo_sum1)";
                      $sum_sum2 = "SUM(teplo_sum2)";
                      $sum_sum = "teplo_sum";
                      
                      $title = "Теплоснабжение";
                      break;
                  
                  case "water":
                      $volume1 = "water_vol1";
                      $volume2 = "water_vol2";
                      $vol = "water_vol";
                      $sum1 = "water_sum1";
                      $sum2 = "water_sum2";
                      $sum = "water_sum";
                      
                      $sum_volume1 = "SUM(water_vol1)";
                      $sum_volume2 = "SUM(water_vol2)";
                      $sum_vol = "water_vol";
                      $sum_sum1 = "SUM(water_sum1)";
                      $sum_sum2 = "SUM(water_sum2)";
                      $sum_sum = "water_sum";
                      
                      $title = "Водоснабжение";
                      break;
                  
                  case "stoki":
                      $volume1 = "stoki_vol1";
                      $volume2 = "stoki_vol2";
                      $vol = "stoki_vol";
                      $sum1 = "stoki_sum1";
                      $sum2 = "stoki_sum2";
                      $sum = "stoki_sum";
                      
                      $sum_volume1 = "SUM(stoki_vol1)";
                      $sum_volume2 = "SUM(stoki_vol2)";
                      $sum_vol = "stoki_vol";
                      $sum_sum1 = "SUM(stoki_sum1)";
                      $sum_sum2 = "SUM(stoki_sum2)";
                      $sum_sum = "stoki_sum";
                      
                      $title = "Водоотведение";
                      break;
                  
                  case "elektro":
                      $volume1 = "elektro_vol1";
                      $volume2 = "elektro_vol2";
                      $vol = "elektro_vol";
                      $sum1 = "elektro_sum1";
                      $sum2 = "elektro_sum2";
                      $sum = "elektro_sum";
                      
                      $sum_volume1 = "SUM(elektro_vol1)";
                      $sum_volume2 = "SUM(elektro_vol2)";
                      $sum_vol = "elektro_vol";
                      $sum_sum1 = "SUM(elektro_sum1)";
                      $sum_sum2 = "SUM(elektro_sum2)";
                      $sum_sum = "elektro_sum";
                      
                      $title = "Электроснабжение";
                      break;
                  
                  case "trash":
                      $volume1 = "trash_vol1";
                      $volume2 = "trash_vol2";
                      $vol = "trash_vol";
                      $sum1 = "trash_sum1";
                      $sum2 = "trash_sum2";
                      $sum = "trash_sum";
                      
                      $sum_volume1 = "SUM(trash_vol1)";
                      $sum_volume2 = "SUM(trash_vol2)";
                      $sum_vol = "trash_vol";
                      $sum_sum1 = "SUM(trash_sum1)";
                      $sum_sum2 = "SUM(trash_sum2)";
                      $sum_sum = "trash_sum";
                      
                      $title = "Вывоз мусора";
                      break;
                  
                  case "negativka":
                      $volume1 = "negativka_vol1";
                      $volume2 = "negativka_vol2";
                      $vol = "negativka_vol";
                      $sum1 = "negativka_sum1";
                      $sum2 = "negativka_sum2";
                      $sum = "negativka_sum";
                      
                      $sum_volume1 = "SUM(negativka_vol1)";
                      $sum_volume2 = "SUM(negativka_vol2)";
                      $sum_vol = "negativka_vol";
                      $sum_sum1 = "SUM(negativka_sum1)";
                      $sum_sum2 = "SUM(negativka_sum2)";
                      $sum_sum = "negativka_sum";
                      
                      $title = "Негативка";
                      break;
              }
              
              # Оределяем какую таблицу показывать, общую или итоговую
              if ($_SESSION['variant_prognoz'] !== "itogo"){
              
              
              
                  # Выводим часть таблицы с тарифом
              ?>

              
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Объем 1-полугодие</th>
                          <th style="min-width: 200px; width: 200px;">Сумма 1-полугодие</th>
                          <th style="min-width: 200px; width: 200px;">Объем 2-полугодие</th>
                          <th style="min-width: 200px; width: 200px;">Сумма 2-полугодие</th>
                          <th style="min-width: 200px; width: 200px;">Объем за год</th>
                          <th style="min-width: 200px; width: 200px;">Сумма за год</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                      
                      <?php
                      
                      foreach ($pageData['info'] as $key => $value) {
                          
                          echo "<tr>";
                          echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                          echo "<td class='col-id-no' scope='row'>" . $value['full_name'] . "</td>";
                          echo "<td>" . $value[$volume1] . "</td>";                           
                          echo "<td>" . $value[$sum1] . "</td>";
                          echo "<td>" . $value[$volume2] . "</td>";                           
                          echo "<td>" . $value[$sum2] . "</td>";                       
                          echo "<td>" . $value[$vol] . "</td>";
                          echo "<td>" . $value[$sum] . "</td>";
                          echo "</tr>";
                          
                      }
                      
                      # Итоговая строчка
                        foreach ($pageData['total'] as $key => $value) {
                          
                          echo "<tr>";
                          echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                          echo "<td>" . $value[$sum_volume1] . "</td>";
                          echo "<td>" . $value[$sum_sum1] . "</td>";
                          echo "<td>" . $value[$sum_volume2] . "</td>";
                          echo "<td>" . $value[$sum_sum2] . "</td>";
                          echo "<td>" . $value[$sum_vol] . "</td>";
                          echo "<td>" . $value[$sum_sum] . "</td>";
                          echo "</tr>";
                          
                      }
                      
                      ?>
                      
                  </tbody>
                            </table>

      <?php
      
              } elseif ($_SESSION['variant_prognoz'] == "itogo") {
              
                  ?>
              
              
                                  <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Теплоснабжение</th>
                          <th style="min-width: 200px; width: 200px;">Водоснабжение</th>
                          <th style="min-width: 200px; width: 200px;">Водоотведение</th>
                          <th style="min-width: 200px; width: 200px;">Электроснабжение</th>
                          <th style="min-width: 200px; width: 200px;">Вывоз мусора</th>
                          <th style="min-width: 200px; width: 200px;">Негативка</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                      
                      <?php
                                    foreach ($pageData['info'] as $key => $value) {
                          
                          echo "<tr>";
                          echo "<td class='col-id-no' scope='row'>" . $value['full_name'] . "</td>";
                          echo "<td>" . $value['teplo_sum'] . "</td>";
                          echo "<td>" . $value['water_sum'] . "</td>";
                          echo "<td>" . $value['stoki_sum'] . "</td>";
                          echo "<td>" . $value['elektro_sum'] . "</td>";
                          echo "<td>" . $value['trash_sum'] . "</td>";
                          echo "<td>" . $value['negativka_sum'] . "</td>";
                          echo "</tr>";
                          
                      }
                      
                                            # Итоговая строчка
                        foreach ($pageData['total'] as $key => $value) {
                          
                          echo "<tr>";
                          echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                          echo "<td>" . $value['teplo_sum'] . "</td>";
                          echo "<td>" . $value['water_sum'] . "</td>";
                          echo "<td>" . $value['stoki_sum'] . "</td>";
                          echo "<td>" . $value['elektro_sum'] . "</td>";
                          echo "<td>" . $value['trash_sum'] . "</td>";
                          echo "<td>" . $value['negativka_sum'] . "</td>";
                          echo "</tr>";
                          
                      }
                      ?>
                      
                      
                  </tbody>
                    </table>
              
              <?php
                  
          }

