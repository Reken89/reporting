
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
                  
                  <p><b>Выберите учреждения</b></p> 
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="one">
   <span class="checkmark">Глава, Администрация, Совет, КСО</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="two">
   <span class="checkmark">Централизованная бухгалтерия, Закупки</span>
   </label>
                  
                      <label class="container">
   <input type="checkbox" name="variant" value="three">
   <span class="checkmark">Детские сады</span>
   </label>
                  
                      <label class="container">
   <input type="checkbox" name="variant" value="four">
   <span class="checkmark">ДХШ и ДМШ</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="five">
   <span class="checkmark">ВСОШ (школа и сад)</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="six">
   <span class="checkmark">КУМС, Управление собственностью, ЕДДС</span>
   </label>
                  
    <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn1" class="btn" value="Сформировать таблицу" /></p              
                  
              </form>

              <?php
              # Определяем какую таблицу отображать
              switch ($_SESSION['variant_budget']) {
        
            case "one":
              ?>
              
              <table class="freeze-table" width="700px">
                  
                  <thead>
                      <tr>
                          <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
                          <th style="min-width: 70px; width: 70px;">ЭКР</th>
                          <th style="min-width: 200px; width: 200px;">Глава</th>
                          <th style="min-width: 200px; width: 200px;">Администрация</th>
                          <th style="min-width: 200px; width: 200px;">Совет</th>
                          <th style="min-width: 200px; width: 200px;">КСО</th>
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
                                  echo "<td><b>" . $value['glava'] . "</td></b>";
                                  echo "<td><b>" . $value['adm'] . "</td></b>";
                                  echo "<td><b>" . $value['sovet'] . "</td></b>";
                                  echo "<td><b>" . $value['kso'] . "</td></b>";
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
                                  echo <<<HTML
                                  <td><input type="text" id='user' class='glava' value="$value[glava]"></td>
                                  <td><input type="text" id='user' class='adm' value="$value[adm]"></td>
                                  <td><input type="text" id='user' class='sovet' value="$value[sovet]"></td>
                                  <td><input type="text" id='user' class='kso' value="$value[kso]"></td>
                                  HTML;
                                  echo "<td>" . $value['u_glava'] . "</td>";
                                  echo "<td>" . $value['u_adm'] . "</td>";
                                  echo "<td>" . $value['u_sovet'] . "</td>";
                                  echo "<td>" . $value['u_kso'] . "</td>";
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
              
       case "two":
       echo "Второе сочетание";
       break;
   
       case "three":
       echo "Третье сочетание";
       break;
   
       case "four":
       echo "Четвертое сочетание";
       break;
   
       case "five":
       echo "Пятое сочетание";
       break;
   
       case "six":
       echo "Шестое сочетание";
       break;
   
              }
              ?>