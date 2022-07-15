
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

<?php
              
              # Определяем какую таблицу отображать
              switch ($_SESSION['variant_repair']) {
        
            case "one":
                
                # Рисуем таблицу
                ?>
              
                            <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Учреждение</th>
                          <th style="min-width: 200px; width: 200px;">Наименование вида работ</th>
                          <th style="min-width: 200px; width: 200px;">КОСГУ</th>
                          <th style="min-width: 200px; width: 200px;">Сумма</th>
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
                                  #echo "<td><textarea rows='5' cols='45' type=text class='title'>$value[title]</textarea></td>";
                                  echo "<td>" . $value['ekr'] . "</td>";
                                  echo <<<HTML
                                    <td><input type="text" id='user' class='str' value="$value[str]"></td>
                                  HTML;
                                  echo "<td><input type=button id='edit' value='Изменить'></td>";
                                  echo "</tr>";
                              }
                              
                              
                          }
                          
                     
                          echo "<tr>";

                          echo "<input type=hidden class='marker_b' value=" . $j . ">";
                          echo "<td></td>";
                          echo "<td><textarea rows='5' cols='45' type=text class='title'>Новый подпункт</textarea></td>";
                          /*
                          echo "<td>"
                          . "<select name='ekr'><option value='241'>241</option><option value='530'>530</option><option value='s2' selected>Выберите ЭКР</option></select>"
                                  . "</td>";

                           */
                           
                          echo "<td><input type='text' id='user' class='ekr'></td>";
                          echo "<td><input type='text' id='user' class='str'></td>";
                          echo "<td><input type=button id='add' value='Добавить'></td>";

                          echo "</tr>";
                          
                          }
                    
                      ?>
                  </tbody>  
                            </table>
              
              <?php
                
            break;   
        
            case "two":
                echo "Второй вариант таблицы";
            break; 
        
            case "three":
                echo "Третий вариант таблицы";
            break; 
                
            case "four":
                echo "Четвертый вариант таблицы";
            break; 
        
            case "five":
                echo "Пятый вариант таблицы";
            break; 
        
            case "six":
                echo "Шестой вариант таблицы";
            break;
        
              }
