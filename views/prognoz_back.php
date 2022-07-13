
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
   <input type="checkbox" name="variant" value="teplo">
   <span class="checkmark">Теплоснабжение</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="water">
   <span class="checkmark">Водоснабжение</span>
   </label>
                  
                      <label class="container">
   <input type="checkbox" name="variant" value="stoki">
   <span class="checkmark">Водоотведение</span>
   </label>
                  
                      <label class="container">
   <input type="checkbox" name="variant" value="elektro">
   <span class="checkmark">Электроснабжение</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="trash">
   <span class="checkmark">Вывоз мусора</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="negativka">
   <span class="checkmark">Негативка</span>
   </label>
                  
                     <label class="container">
   <input type="checkbox" name="variant" value="itogo">
   <span class="checkmark">ИТОГО (Суммы)</span>
   </label>
                  
                  <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn1" class="btn" value="Сформировать таблицу" /></p>              
                  
              </form>
              
                                    <form action="/reporting/prognoz/excel" method="post">       
            <button type="submit" style="width:250px;height:25px" class="btn">EXCEL</button>
            </form>
              
              <?php
              if ($_SESSION['variant_prognoz'] !== "itogo"){
              ?>
              
              <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn2" class="btn" value="Синхронизация с таблицей КУ" /></p> 
              
              <?php
              }
              
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
                      $tarif1 = $pageData['tarif']['teplo']['tarif1'];
                      $tarif2 = $pageData['tarif']['teplo']['tarif2'];
                      $id_tarif = $pageData['tarif']['teplo']['id'];
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
                      $tarif1 = $pageData['tarif']['water']['tarif1'];
                      $tarif2 = $pageData['tarif']['water']['tarif2'];
                      $id_tarif = $pageData['tarif']['water']['id'];
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
                      $tarif1 = $pageData['tarif']['stoki']['tarif1'];
                      $tarif2 = $pageData['tarif']['stoki']['tarif2'];
                      $id_tarif = $pageData['tarif']['stoki']['id'];
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
                      $tarif1 = $pageData['tarif']['elektro']['tarif1'];
                      $tarif2 = $pageData['tarif']['elektro']['tarif2'];
                      $id_tarif = $pageData['tarif']['elektro']['id'];
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
                      $tarif1 = $pageData['tarif']['trash']['tarif1'];
                      $tarif2 = $pageData['tarif']['trash']['tarif2'];
                      $id_tarif = $pageData['tarif']['trash']['id'];
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
                      $tarif1 = $pageData['tarif']['negativka']['tarif1'];
                      $tarif2 = $pageData['tarif']['negativka']['tarif2'];
                      $id_tarif = $pageData['tarif']['negativka']['id'];
                      break;
              }
              
              # Оределяем какую таблицу показывать, общую или итоговую
              if ($_SESSION['variant_prognoz'] !== "itogo"){
              
              
              
                  # Выводим часть таблицы с тарифом
              ?>

              <table class="freeze-table" width="700px">
                  <tr>
                      <?php
                      echo "<input type=hidden class='id_tarif' value=" . $id_tarif . ">";
                      echo "<td>" . $title . "</td>";
                      echo <<<HTML
                      <td><input type="text" id='user' class='tarif1' value="$tarif1"></td>
                      <td><input type="text" id='user' class='tarif2' value="$tarif2"></td>
                      HTML;
                      ?>
                  </tr>
              </table>
              
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
                          echo <<<HTML
                          <td><input type="text" id='user' class='volume1' value="$value[$volume1]"></td>
                          HTML;
                          echo "<td>" . $value[$sum1] . "</td>";
                          echo <<<HTML
                          <td><input type="text" id='user' class='volume2' value="$value[$volume2]"></td>
                          HTML;
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
              
              <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn3" class="btn" value="Синхронизация с таблицей Смета" /></p>
              
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