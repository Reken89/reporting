
<head>
             <meta charset="utf-8">
              <title>Таблица</title>
              </head>
              <body>

              <style>
               body { background: url(../images/bg.png); }
              </style>

              <link rel="stylesheet" href="../css/table2.css">

              <form id="my-form" method="post">
                  
                  <p><b>Выберите раздел</b></p> 
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="one">
   <span class="checkmark">Учреждения АУ, БУ</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="two">
   <span class="checkmark">Детские сады</span>
   </label>
                  
                      <label class="container">
   <input type="checkbox" name="variant" value="three">
   <span class="checkmark">Администрация и КУМС</span>
   </label>
                  
                      <label class="container">
   <input type="checkbox" name="variant" value="four">
   <span class="checkmark">ДМШ и ДХШ</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="five">
   <span class="checkmark">ВСОШ</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="six">
   <span class="checkmark">Общий СВОД</span>
   </label>
                  
                  <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn1" class="btn" value="Сформировать таблицу" /></p>              
                  
              </form>
              
              <form action="/reporting/repairfu/excel" method="post">       
            <button type="submit" style="width:250px;height:25px" class="btn">EXCEL</button>
            </form>
              
              <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn2" class="btn" value="Синхронизация с таблицей Смета" /></p> 
              
              <?php
              
              # Определяем какую таблицу отображать
              switch ($_SESSION['variant_repair']) {
        
            case "one":

                # Определяем статус выбранного раздела таблицы
            if($pageData['status'][1]['status'] == "open"){
              ?>
              <body>
              <div class="div">
                  <b>Отдел строительства ещё работает с таблицей</b>
              </div>
              </body>
              <?php
           } elseif ($pageData['status'][1]['status'] == "close") {
           ?>
              <input type="button" style="width:250px;height:25px" name="formSubmit" id="open" class="btn" value="Разрешить редактирование"><br>
           <?php
       }
              
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
                          <th style="min-width: 200px; width: 200px;">Утверждено</th>
                          <th style="min-width: 200px; width: 200px;"></th>
                          <th style="min-width: 200px; width: 200px;"></th>
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
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo <<<HTML
                                    <td><textarea rows='5' cols='45' type=text class='title'>$value[title]</textarea>></td>
                                  HTML;
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo <<<HTML
                                    <td><input type="text" id='user' class='fu' value="$value[fu]"></td>
                                  HTML;
                                  echo "<td><input type=button id='edit' value='Изменить'></td>";
                                  echo "<td><input type=button id='delete' value='Удалить'></td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                          echo "<tr>";

                          echo "<input type=hidden class='marker_b' value=" . $j . ">";
                          echo "<td></td>";
                          echo "<td><textarea rows='5' cols='45' type=text class='title'>Новый подпункт</textarea></td>";
                          
                          echo "<td><input type='text' id='user' class='ekr'></td>";
                          echo "<td></td>";
                          echo "<td><input type='text' id='user' class='fu'></td>";
                          echo "<td><input type=button id='add' value='Добавить'></td>";
                          echo "<td></td>";
                          
                          echo "</tr>";
                          
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
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО БУ АУ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>530</b></td>";
                          echo "<td><b>$str530</b></td>";
                          echo "<td><b>$fu530</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                    
                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "two":
                
                # Определяем статус выбранного раздела таблицы
            if($pageData['status'][2]['status'] == "open"){
              ?>
              <body>
              <div class="div">
                  <b>Отдел строительства ещё работает с таблицей</b>
              </div>
              </body>
              <?php
           } elseif ($pageData['status'][2]['status'] == "close") {
           ?>
              <input type="button" style="width:250px;height:25px" name="formSubmit" id="open" class="btn" value="Разрешить редактирование"><br>
           <?php
       }
              
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
                          <th style="min-width: 200px; width: 200px;">Утверждено</th>
                          <th style="min-width: 200px; width: 200px;"></th>
                          <th style="min-width: 200px; width: 200px;"></th>
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
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo <<<HTML
                                    <td><textarea rows='5' cols='45' type=text class='title'>$value[title]</textarea>></td>
                                  HTML;
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo <<<HTML
                                    <td><input type="text" id='user' class='fu' value="$value[fu]"></td>
                                  HTML;
                                  echo "<td><input type=button id='edit' value='Изменить'></td>";
                                  echo "<td><input type=button id='delete' value='Удалить'></td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                          echo "<tr>";

                          echo "<input type=hidden class='marker_b' value=" . $j . ">";
                          echo "<td></td>";
                          echo "<td><textarea rows='5' cols='45' type=text class='title'>Новый подпункт</textarea></td>";
                          
                          echo "<td><input type='text' id='user' class='ekr'></td>";
                          echo "<td></td>";
                          echo "<td><input type='text' id='user' class='fu'></td>";
                          echo "<td><input type=button id='add' value='Добавить'></td>";
                          echo "<td></td>";
                          
                          echo "</tr>";
                          
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
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>226</b></td>";
                          echo "<td><b>$str226</b></td>";
                          echo "<td><b>$fu226</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>228</b></td>";
                          echo "<td><b>$str228</b></td>";
                          echo "<td><b>$fu228</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>344</b></td>";
                          echo "<td><b>$str344</b></td>";
                          echo "<td><b>$fu344</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>346</b></td>";
                          echo "<td><b>$str346</b></td>";
                          echo "<td><b>$fu346</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ПО САДАМ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>310</b></td>";
                          echo "<td><b>$str310</b></td>";
                          echo "<td><b>$fu310</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                    
                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "three":
                
                # Определяем статус выбранного раздела таблицы
            if($pageData['status'][3]['status'] == "open"){
              ?>
              <body>
              <div class="div">
                  <b>Отдел строительства ещё работает с таблицей</b>
              </div>
              </body>
              <?php
           } elseif ($pageData['status'][3]['status'] == "close") {
           ?>
              <input type="button" style="width:250px;height:25px" name="formSubmit" id="open" class="btn" value="Разрешить редактирование"><br>
           <?php
       }
              
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
                          <th style="min-width: 200px; width: 200px;">Утверждено</th>
                          <th style="min-width: 200px; width: 200px;"></th>
                          <th style="min-width: 200px; width: 200px;"></th>
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
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo <<<HTML
                                    <td><textarea rows='5' cols='45' type=text class='title'>$value[title]</textarea>></td>
                                  HTML;
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo <<<HTML
                                    <td><input type="text" id='user' class='fu' value="$value[fu]"></td>
                                  HTML;
                                  echo "<td><input type=button id='edit' value='Изменить'></td>";
                                  echo "<td><input type=button id='delete' value='Удалить'></td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                          echo "<tr>";

                          echo "<input type=hidden class='marker_b' value=" . $j . ">";
                          echo "<td></td>";
                          echo "<td><textarea rows='5' cols='45' type=text class='title'>Новый подпункт</textarea></td>";
                          
                          echo "<td><input type='text' id='user' class='ekr'></td>";
                          echo "<td></td>";
                          echo "<td><input type='text' id='user' class='fu'></td>";
                          echo "<td><input type=button id='add' value='Добавить'></td>";
                          echo "<td></td>";
                          
                          echo "</tr>";
                          
                      }

                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "four":
                
                # Определяем статус выбранного раздела таблицы
            if($pageData['status'][4]['status'] == "open"){
              ?>
              <body>
              <div class="div">
                  <b>Отдел строительства ещё работает с таблицей</b>
              </div>
              </body>
              <?php
           } elseif ($pageData['status'][4]['status'] == "close") {
           ?>
              <input type="button" style="width:250px;height:25px" name="formSubmit" id="open" class="btn" value="Разрешить редактирование"><br>
           <?php
       }
              
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
                          <th style="min-width: 200px; width: 200px;">Утверждено</th>
                          <th style="min-width: 200px; width: 200px;"></th>
                          <th style="min-width: 200px; width: 200px;"></th>
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
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo <<<HTML
                                    <td><textarea rows='5' cols='45' type=text class='title'>$value[title]</textarea>></td>
                                  HTML;
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo <<<HTML
                                    <td><input type="text" id='user' class='fu' value="$value[fu]"></td>
                                  HTML;
                                  echo "<td><input type=button id='edit' value='Изменить'></td>";
                                  echo "<td><input type=button id='delete' value='Удалить'></td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                          echo "<tr>";

                          echo "<input type=hidden class='marker_b' value=" . $j . ">";
                          echo "<td></td>";
                          echo "<td><textarea rows='5' cols='45' type=text class='title'>Новый подпункт</textarea></td>";
                          
                          echo "<td><input type='text' id='user' class='ekr'></td>";
                          echo "<td></td>";
                          echo "<td><input type='text' id='user' class='fu'></td>";
                          echo "<td><input type=button id='add' value='Добавить'></td>";
                          echo "<td></td>";
                          
                          echo "</tr>";
                          
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
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>226</b></td>";
                          echo "<td><b>$str226</b></td>";
                          echo "<td><b>$fu226</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>228</b></td>";
                          echo "<td><b>$str228</b></td>";
                          echo "<td><b>$fu228</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>344</b></td>";
                          echo "<td><b>$str344</b></td>";
                          echo "<td><b>$fu344</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>346</b></td>";
                          echo "<td><b>$str346</b></td>";
                          echo "<td><b>$fu346</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                          
                          echo "<tr>";
                          echo "<td><b>ИТОГО ДМШ ДХШ</b></td>";
                          echo "<td><b>ИТОГО</b></td>";
                          echo "<td><b>310</b></td>";
                          echo "<td><b>$str310</b></td>";
                          echo "<td><b>$fu310</b></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "</tr>";
                    
                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
                break;
            
            case "five":
                
                # Определяем статус выбранного раздела таблицы
            if($pageData['status'][5]['status'] == "open"){
              ?>
              <body>
              <div class="div">
                  <b>Отдел строительства ещё работает с таблицей</b>
              </div>
              </body>
              <?php
           } elseif ($pageData['status'][5]['status'] == "close") {
           ?>
              <input type="button" style="width:250px;height:25px" name="formSubmit" id="open" class="btn" value="Разрешить редактирование"><br>
           <?php
       }
              
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
                          <th style="min-width: 200px; width: 200px;">Утверждено</th>
                          <th style="min-width: 200px; width: 200px;"></th>
                          <th style="min-width: 200px; width: 200px;"></th>
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
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "</tr>";
                              }
                              
                              if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                                  echo "<tr>";
                                  echo "<input type=hidden class='marker_b' value=" . $j . ">";
                                  echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                                  echo "<input type=hidden class='ekr' value=" . $value['ekr'] . ">";
                                  
                                  echo "<td class='col-id-no' scope='row'></td>";
                                  echo <<<HTML
                                    <td><textarea rows='5' cols='45' type=text class='title'>$value[title]</textarea>></td>
                                  HTML;
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo "<td>" . $value['str'] . "</td>";
                                  echo <<<HTML
                                    <td><input type="text" id='user' class='fu' value="$value[fu]"></td>
                                  HTML;
                                  echo "<td><input type=button id='edit' value='Изменить'></td>";
                                  echo "<td><input type=button id='delete' value='Удалить'></td>";
                                  echo "</tr>";
                              }
                              
                          }
                          
                          echo "<tr>";

                          echo "<input type=hidden class='marker_b' value=" . $j . ">";
                          echo "<td></td>";
                          echo "<td><textarea rows='5' cols='45' type=text class='title'>Новый подпункт</textarea></td>";
                          
                          echo "<td><input type='text' id='user' class='ekr'></td>";
                          echo "<td></td>";
                          echo "<td><input type='text' id='user' class='fu'></td>";
                          echo "<td><input type=button id='add' value='Добавить'></td>";
                          echo "<td></td>";
                          
                          echo "</tr>";
                          
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
                          <th style="min-width: 200px; width: 200px;">Утверждено</th>
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

