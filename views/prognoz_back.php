
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
                  
                  <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn1" class="btn" value="Сформировать таблицу" /></p>              
                  
              </form>
              
              <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn2" class="btn" value="Синхронизация с таблицей КУ" /></p> 
              
              <?php
              
              # Определяем какой раздел таблицы показывать
              switch ($_SESSION['variant_prognoz']) {
                  
                  case "teplo":
                      $volume1 = "teplo_vol1";
                      $volume2 = "teplo_vol2";
                      $sum1 = "teplo_sum1";
                      $sum2 = "teplo_sum2";
                      $title = "Теплоснабжение";
                      $tarif1 = $pageData['tarif']['teplo']['tarif1'];
                      $tarif2 = $pageData['tarif']['teplo']['tarif2'];
                      break;
                  
                  case "water":
                      $volume1 = "water_vol1";
                      $volume2 = "water_vol2";
                      $sum1 = "water_sum1";
                      $sum2 = "water_sum2";
                      $title = "Водоснабжение";
                      $tarif1 = $pageData['tarif']['water']['tarif1'];
                      $tarif2 = $pageData['tarif']['water']['tarif2'];
                      break;
                  
                  case "stoki":
                      $volume1 = "stoki_vol1";
                      $volume2 = "stoki_vol2";
                      $sum1 = "stoki_sum1";
                      $sum2 = "stoki_sum2";
                      $title = "Водоотведение";
                      $tarif1 = $pageData['tarif']['stoki']['tarif1'];
                      $tarif2 = $pageData['tarif']['stoki']['tarif2'];
                      break;
                  
                  case "elektro":
                      $volume1 = "elektro_vol1";
                      $volume2 = "elektro_vol2";
                      $sum1 = "elektro_sum1";
                      $sum2 = "elektro_sum2";
                      $title = "Электроснабжение";
                      $tarif1 = $pageData['tarif']['elektro']['tarif1'];
                      $tarif2 = $pageData['tarif']['elektro']['tarif2'];
                      break;
                  
                  case "trash":
                      $volume1 = "trash_vol1";
                      $volume2 = "trash_vol2";
                      $sum1 = "trash_sum1";
                      $sum2 = "trash_sum2";
                      $title = "Вывоз мусора";
                      $tarif1 = $pageData['tarif']['trash']['tarif1'];
                      $tarif2 = $pageData['tarif']['trash']['tarif2'];
                      break;
                  
                  case "negativka":
                      $volume1 = "negativka_vol1";
                      $volume2 = "negativka_vol2";
                      $sum1 = "negativka_sum1";
                      $sum2 = "negativka_sum2";
                      $title = "Негативка";
                      $tarif1 = $pageData['tarif']['negativka']['tarif1'];
                      $tarif2 = $pageData['tarif']['negativka']['tarif2'];
                      break;
              }
              
                  # Выводим часть таблицы с тарифом
              ?>

              <table class="freeze-table" width="700px">
                  <tr>
                      <?php
                      echo "<td>" . $title . "</td>";
                      echo <<<HTML
                      <td><input type="text" id='user' class='aurinko' value="$tarif1"></td>
                      <td><input type="text" id='user' class='aurinko' value="$tarif2"></td>
                      HTML;
                      ?>
                  </tr>
              </table>

