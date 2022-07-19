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
              switch ($_SESSION['variant_repair']) {
        
            case "one":

                       # Рисуем таблицу
                ?>
              
              </br>
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Наименование вида работ</th>
                          <th style="min-width: 200px; width: 200px;">КОСГУ</th>
                          <th style="min-width: 200px; width: 200px;">Сумма отдела строительства</th>
                          <th style="min-width: 200px; width: 200px;">Сумма ФУ</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    
                    # Этот бред в цикле нужно убрать!!! Переменную J нужно получать иначе!!!
                      for ($j = 1 ; $j < 11 ; ++$j){
                          
                          foreach ($pageData['info'] as $key => $value) {
                              
                              if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<td class='col-id-no' scope='row'><b>" . $value['nik'] . "</td></b>";
                                  echo "<td><b>" . $value['title'] . "</td></b>";
                                  echo "<td><b>" . $value['ekr'] . "</td></b>";
                                  echo "<td><b>" . $value['str'] . "</td></b>";
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo "<td>" . $value['title'] . "</td>";
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo "<td>" . $value['fu'] . "</td>";
                                  
                                  echo "</tr>";
                              }
                              
                          }
                          
                          
                      }
                      
                          # Итоговая строка
                          $str241 = $pageData['total'][241]['SUM(str)'];
                          $str530 = $pageData['total'][530]['SUM(str)'];
                          
                          $fu241 = $pageData['total'][241]['SUM(fu)'];
                          $fu530 = $pageData['total'][530]['SUM(fu)'];
                          
                          $str241 = number_format($str241, 2, ',', ' ');
                          $str530 = number_format($str530, 2, ',', ' ');
                          
                          $fu241 = number_format($fu241, 2, ',', ' ');
                          $fu530 = number_format($fu530, 2, ',', ' ');
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО БУ АУ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>241</b></td>";
                          echo "<td><b>$str241</b></td>";
                          echo "<td><b>$fu241</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО БУ АУ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>530</b></td>";
                          echo "<td><b>$str530</b></td>";
                          echo "<td><b>$fu530</b></td>";
                          echo "</tr>";
                    
                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "two":
                
                       # Рисуем таблицу
                ?>
              
              </br>
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Наименование вида работ</th>
                          <th style="min-width: 200px; width: 200px;">КОСГУ</th>
                          <th style="min-width: 200px; width: 200px;">Сумма отдела строительства</th>
                          <th style="min-width: 200px; width: 200px;">Сумма ФУ</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    
                    # Этот бред в цикле нужно убрать!!! Переменную J нужно получать иначе!!!
                      for ($j = 11 ; $j < 18 ; ++$j){
                          
                          foreach ($pageData['info'] as $key => $value) {
                              
                              if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<td class='col-id-no' scope='row'><b>" . $value['nik'] . "</td></b>";
                                  echo "<td><b>" . $value['title'] . "</td></b>";
                                  echo "<td><b>" . $value['ekr'] . "</td></b>";
                                  echo "<td><b>" . $value['str'] . "</td></b>";
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo "<td>" . $value['title'] . "</td>";

                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo "<td>" . $value['fu'] . "</td>";

                                  echo "</tr>";
                              }
                              
                          }
                                                   
                      }
                      
                          # Итоговая строка
                          $str225 = $pageData['total'][225]['SUM(str)'];
                          $str226 = $pageData['total'][226]['SUM(str)'];
                          $str228 = $pageData['total'][228]['SUM(str)'];
                          $str344 = $pageData['total'][344]['SUM(str)'];
                          $str346 = $pageData['total'][346]['SUM(str)'];
                          $str310 = $pageData['total'][310]['SUM(str)'];
                          
                          $fu225 = $pageData['total'][225]['SUM(fu)'];
                          $fu226 = $pageData['total'][226]['SUM(fu)'];
                          $fu228 = $pageData['total'][228]['SUM(fu)'];
                          $fu344 = $pageData['total'][344]['SUM(fu)'];
                          $fu346 = $pageData['total'][346]['SUM(fu)'];
                          $fu310 = $pageData['total'][310]['SUM(fu)'];
                          
                          $str225 = number_format($str225, 2, ',', ' ');
                          $str226 = number_format($str226, 2, ',', ' ');
                          $str228 = number_format($str228, 2, ',', ' ');
                          $str344 = number_format($str344, 2, ',', ' ');
                          $str346 = number_format($str346, 2, ',', ' ');
                          $str310 = number_format($str310, 2, ',', ' ');
                          
                          $fu225 = number_format($fu225, 2, ',', ' ');
                          $fu226 = number_format($fu226, 2, ',', ' ');
                          $fu228 = number_format($fu228, 2, ',', ' ');
                          $fu344 = number_format($fu344, 2, ',', ' ');
                          $fu346 = number_format($fu346, 2, ',', ' ');
                          $fu310 = number_format($fu310, 2, ',', ' ');
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>225</b></td>";
                          echo "<td><b>$str225</b></td>";
                          echo "<td><b>$fu225</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>226</b></td>";
                          echo "<td><b>$str226</b></td>";
                          echo "<td><b>$fu226</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>228</b></td>";
                          echo "<td><b>$str228</b></td>";
                          echo "<td><b>$fu228</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>344</b></td>";
                          echo "<td><b>$str344</b></td>";
                          echo "<td><b>$fu344</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>346</b></td>";
                          echo "<td><b>$str346</b></td>";
                          echo "<td><b>$fu346</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>310</b></td>";
                          echo "<td><b>$str310</b></td>";
                          echo "<td><b>$fu310</b></td>";
                          echo "</tr>";
                    
                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "three":
                
              
                       # Рисуем таблицу
                ?>
              
              </br>
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Наименование вида работ</th>
                          <th style="min-width: 200px; width: 200px;">КОСГУ</th>
                          <th style="min-width: 200px; width: 200px;">Сумма отдела строительства</th>
                          <th style="min-width: 200px; width: 200px;">Сумма ФУ</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    
                    # Этот бред в цикле нужно убрать!!! Переменную J нужно получать иначе!!!
                      for ($j = 18 ; $j < 20 ; ++$j){
                          
                          foreach ($pageData['info'] as $key => $value) {
                              
                              if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<td class='col-id-no' scope='row'><b>" . $value['nik'] . "</td></b>";
                                  echo "<td><b>" . $value['title'] . "</td></b>";
                                  echo "<td><b>" . $value['ekr'] . "</td></b>";
                                  echo "<td><b>" . $value['str'] . "</td></b>";
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo "<td>" . $value['title'] . "</td>";

                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo "<td>" . $value['fu'] . "</td>";

                                  echo "</tr>";
                              }
                              
                          }
                                                   
                      }

                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "four":
                
              
                       # Рисуем таблицу
                ?>
              
              </br>
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Наименование вида работ</th>
                          <th style="min-width: 200px; width: 200px;">КОСГУ</th>
                          <th style="min-width: 200px; width: 200px;">Сумма отдела строительства</th>
                          <th style="min-width: 200px; width: 200px;">Сумма ФУ</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    
                    # Этот бред в цикле нужно убрать!!! Переменную J нужно получать иначе!!!
                      for ($j = 20 ; $j < 22 ; ++$j){
                          
                          foreach ($pageData['info'] as $key => $value) {
                              
                              if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<td class='col-id-no' scope='row'><b>" . $value['nik'] . "</td></b>";
                                  echo "<td><b>" . $value['title'] . "</td></b>";
                                  echo "<td><b>" . $value['ekr'] . "</td></b>";
                                  echo "<td><b>" . $value['str'] . "</td></b>";
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo "<td>" . $value['title'] . "</td>";

                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo "<td>" . $value['fu'] . "</td>";

                                  echo "</tr>";
                              }
                              
                          }                          
                          
                      }
                      
                          # Итоговая строка
                          $str225 = $pageData['total'][225]['SUM(str)'];
                          $str226 = $pageData['total'][226]['SUM(str)'];
                          $str228 = $pageData['total'][228]['SUM(str)'];
                          $str344 = $pageData['total'][344]['SUM(str)'];
                          $str346 = $pageData['total'][346]['SUM(str)'];
                          $str310 = $pageData['total'][310]['SUM(str)'];
                          
                          $fu225 = $pageData['total'][225]['SUM(fu)'];
                          $fu226 = $pageData['total'][226]['SUM(fu)'];
                          $fu228 = $pageData['total'][228]['SUM(fu)'];
                          $fu344 = $pageData['total'][344]['SUM(fu)'];
                          $fu346 = $pageData['total'][346]['SUM(fu)'];
                          $fu310 = $pageData['total'][310]['SUM(fu)'];
                          
                          $str225 = number_format($str225, 2, ',', ' ');
                          $str226 = number_format($str226, 2, ',', ' ');
                          $str228 = number_format($str228, 2, ',', ' ');
                          $str344 = number_format($str344, 2, ',', ' ');
                          $str346 = number_format($str346, 2, ',', ' ');
                          $str310 = number_format($str310, 2, ',', ' ');
                          
                          $fu225 = number_format($fu225, 2, ',', ' ');
                          $fu226 = number_format($fu226, 2, ',', ' ');
                          $fu228 = number_format($fu228, 2, ',', ' ');
                          $fu344 = number_format($fu344, 2, ',', ' ');
                          $fu346 = number_format($fu346, 2, ',', ' ');
                          $fu310 = number_format($fu310, 2, ',', ' ');
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>225</b></td>";
                          echo "<td><b>$str225</b></td>";
                          echo "<td><b>$fu225</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>226</b></td>";
                          echo "<td><b>$str226</b></td>";
                          echo "<td><b>$fu226</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>228</b></td>";
                          echo "<td><b>$str228</b></td>";
                          echo "<td><b>$fu228</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>344</b></td>";
                          echo "<td><b>$str344</b></td>";
                          echo "<td><b>$fu344</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>346</b></td>";
                          echo "<td><b>$str346</b></td>";
                          echo "<td><b>$fu346</b></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>310</b></td>";
                          echo "<td><b>$str310</b></td>";
                          echo "<td><b>$fu310</b></td>";
                          echo "</tr>";
                    
                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "five":
                
              
                       # Рисуем таблицу
                ?>
              
              </br>
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Наименование вида работ</th>
                          <th style="min-width: 200px; width: 200px;">КОСГУ</th>
                          <th style="min-width: 200px; width: 200px;">Сумма отдела строительства</th>
                          <th style="min-width: 200px; width: 200px;">Сумма ФУ</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    
                    # Этот бред в цикле нужно убрать!!! Переменную J нужно получать иначе!!!
                      for ($j = 22 ; $j < 23 ; ++$j){
                          
                          foreach ($pageData['info'] as $key => $value) {
                              
                              if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<td class='col-id-no' scope='row'><b>" . $value['nik'] . "</td></b>";
                                  echo "<td><b>" . $value['title'] . "</td></b>";
                                  echo "<td><b>" . $value['ekr'] . "</td></b>";
                                  echo "<td><b>" . $value['str'] . "</td></b>";
                                  echo "<td><b>" . $value['fu'] . "</td></b>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo "<td>" . $value['title'] . "</td>";

                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo "<td>" . $value['fu'] . "</td>";

                                  echo "</tr>";
                              }
                              
                          }
                                                
                      }

                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "six":
                
                # Рисуем таблицу
                ?>
              
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">КОСГУ</th>
                          <th style="min-width: 200px; width: 200px;">Сумма отдела строительства</th>
                          <th style="min-width: 200px; width: 200px;">Сумма ФУ</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    
                    
                          $str225 = $pageData['info'][225]['SUM(str)'];
                          $str226 = $pageData['info'][226]['SUM(str)'];
                          $str228 = $pageData['info'][228]['SUM(str)'];
                          $str344 = $pageData['info'][344]['SUM(str)'];
                          $str346 = $pageData['info'][346]['SUM(str)'];
                          $str310 = $pageData['info'][310]['SUM(str)'];
                          $str241 = $pageData['info'][241]['SUM(str)'];
                          $str530 = $pageData['info'][530]['SUM(str)'];
                          
                          $fu225 = $pageData['info'][225]['SUM(fu)'];
                          $fu226 = $pageData['info'][226]['SUM(fu)'];
                          $fu228 = $pageData['info'][228]['SUM(fu)'];
                          $fu344 = $pageData['info'][344]['SUM(fu)'];
                          $fu346 = $pageData['info'][346]['SUM(fu)'];
                          $fu310 = $pageData['info'][310]['SUM(fu)'];
                          $fu241 = $pageData['info'][241]['SUM(fu)'];
                          $fu530 = $pageData['info'][530]['SUM(fu)'];
                          
                          $str225 = number_format($str225, 2, ',', ' ');
                          $str226 = number_format($str226, 2, ',', ' ');
                          $str228 = number_format($str228, 2, ',', ' ');
                          $str344 = number_format($str344, 2, ',', ' ');
                          $str346 = number_format($str346, 2, ',', ' ');
                          $str310 = number_format($str310, 2, ',', ' ');
                          $str241 = number_format($str241, 2, ',', ' ');
                          $str530 = number_format($str530, 2, ',', ' ');
                          
                          $fu225 = number_format($fu225, 2, ',', ' ');
                          $fu226 = number_format($fu226, 2, ',', ' ');
                          $fu228 = number_format($fu228, 2, ',', ' ');
                          $fu344 = number_format($fu344, 2, ',', ' ');
                          $fu346 = number_format($fu346, 2, ',', ' ');
                          $fu310 = number_format($fu310, 2, ',', ' ');
                          $fu241 = number_format($fu241, 2, ',', ' ');
                          $fu530 = number_format($fu530, 2, ',', ' ');
                          
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>241</b></td><td><b>$str241</b></td><td><b>$fu241</b></td></tr>";
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>530</b></td><td><b>$str530</b></td><td><b>$fu530</b></td></tr>";
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>225</b></td><td><b>$str225</b></td><td><b>$fu225</b></td></tr>";
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>226</b></td><td><b>$str226</b></td><td><b>$fu226</b></td></tr>";
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>228</b></td><td><b>$str228</b></td><td><b>$fu228</b></td></tr>";
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>344</b></td><td><b>$str344</b></td><td><b>$fu344</b></td></tr>";
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>346</b></td><td><b>$str346</b></td><td><b>$fu346</b></td></tr>";
                          echo "<tr><td><b>Общий СВОД</b></td><td><b>310</b></td><td><b>$str310</b></td><td><b>$fu310</b></td></tr>";
                
                break;
            
              }

