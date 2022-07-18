
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
              
                
                break;
            
            case "two":
                echo "Второй раздел";
                break;
            
            case "three":
                echo "Третий раздел";
                break;
            
            case "four":
                echo "Четвертый раздел";
                break;
            
            case "five":
                echo "Пятый раздел";
                break;
            
            case "six":
                echo "Шестой раздел";
                break;
            
              }

