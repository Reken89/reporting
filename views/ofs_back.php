
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
                         
                         <p><b>Выберите месяц</b></p>                     
               
                         <div class="size_block">
                         
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="1">
   <span class="checkmark">Январь</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="2">
   <span class="checkmark">Февраль</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="3">
   <span class="checkmark">Март</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="4">
   <span class="checkmark">Апрель</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="5">
   <span class="checkmark">Май</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="6">
   <span class="checkmark">Июнь</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="7">
   <span class="checkmark">Июль</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="8">
   <span class="checkmark">Август</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="9">
   <span class="checkmark">Сентябрь</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="10">
   <span class="checkmark">Октябрь</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="11">
   <span class="checkmark">Ноябрь</span>
   </label>
   <label class="container">
   <input type="checkbox" name="svod_mounth[]" value="12">
   <span class="checkmark">Декабрь</span>
   </label>
                             
                         </div>
                         
                         </br><p><b>Выберите раздел</b></p>
    
        <label class="container">
   <input type="checkbox" name="svod_chapter[]" value="1">
   <span class="checkmark">МБ МЗ(МБ)</span>
   </label>  
                                 <label class="container">
   <input type="checkbox" name="svod_chapter[]" value="2">
   <span class="checkmark">МБ ИЦ</span>
   </label> 
                                 <label class="container">
   <input type="checkbox" name="svod_chapter[]" value="3">
   <span class="checkmark">РК МЗ (РК)</span>
   </label> 
                                 <label class="container">
   <input type="checkbox" name="svod_chapter[]" value="4">
   <span class="checkmark">РК ИЦ</span>
   </label> 
                                 <label class="container">
   <input type="checkbox" name="svod_chapter[]" value="5">
   <span class="checkmark">ПД</span>
   </label> 
                         
                                                  <?php 
                         if($_SESSION['id'] == '3' ){
                         $_SESSION['svod_title'] = ['КУМС'];
                         }
                           ?> 
                         
                         
                         <?php 
                         if($_SESSION['id'] == '1' || $_SESSION['id'] == '2'){
                           ?>  
                         
                         
                         </br><p><b>Выберите учреждение</b></p>
                         
                         <div class="size_block">
                         
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="СОШ1">
   <span class="checkmark">Школа №1</span>
   </label>  
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="СОШ2">
   <span class="checkmark">Школа №2</span>
   </label>  
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="СОШ3">
   <span class="checkmark">Школа №3</span>
   </label>  
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Гимназия">
   <span class="checkmark">Гимназия</span>
   </label>  
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Лицей">
   <span class="checkmark">Лицей</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ВСОШ">
   <span class="checkmark">ВСОШ</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ЦВР">
   <span class="checkmark">ЦВР</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ДХШ">
   <span class="checkmark">ДХШ</span>
   </label>               
                         
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ДМШ">
   <span class="checkmark">ДМШ</span>
   </label> 
                         
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ДЮСШ2">
   <span class="checkmark">ДЮСШ2</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="МАиЦБ">
   <span class="checkmark">МАиЦБ</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ЦКР">
   <span class="checkmark">ЦКР</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ЦРО">
   <span class="checkmark">ЦРО</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Ауринко">
   <span class="checkmark">Ауринко</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Солнышко">
   <span class="checkmark">Солнышко</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Гномик">
   <span class="checkmark">Гномик</span>
   </label> 
                          <label class="container">
   <input type="checkbox" name="svod_title[]" value="Сказка">
   <span class="checkmark">Сказка</span>
   </label> 
                          <label class="container">
   <input type="checkbox" name="svod_title[]" value="Кораблик">
   <span class="checkmark">Кораблик</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Золотой">
   <span class="checkmark">Золотой Ключик</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Березка">
   <span class="checkmark">Березка</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Администрация">
   <span class="checkmark">Администрация</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="Закупки">
   <span class="checkmark">Закупки</span>
   </label> 
                                                
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="КУМС">
   <span class="checkmark">КУМС</span>
   </label> 
                                             
                          <label class="container">
   <input type="checkbox" name="svod_title[]" value="Совет">
   <span class="checkmark">Совет</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="КСО">
   <span class="checkmark">КСО</span>
   </label> 
                         <label class="container">
   <input type="checkbox" name="svod_title[]" value="ЦБ">
   <span class="checkmark">Централизованная бухгалтерия</span>
   </label> 
                             
                         </div>
                         
     <body>
   <div class="div"><b>МБ МЗ(МБ)</b> = бюджетные и автономные учреждения - средства субсидии на муниципальное задание за счет местного бюджета 
казенные учреждения - все расходы за счет средств местного бюджета
</br>
<b>МБ ИЦ</b> = бюджетные и автономные учреждения - средства субсидии на иные цели (капитальные вложения) за счет местного бюджета
</br>
<b>РК МЗ (РК)</b> = бюджетные и автономные учреждения - средства субсидии на муниципальное задание за счет средств Республики Карелия (в т.ч. федеральных средств)
казенные учреждения - все расходы за счет средств Республики Карелия (в т.ч. федеральных средств)
</br>
<b>РК ИЦ</b> = бюджетные и автономные учреждения - средства субсидии на иные цели (капитальные вложения) за счет средств Республики Карелия (в т.ч. федеральных средств)
</br>
<b>ПД</b> = бюджетные и автономные учреждения - все расходы за счет собственных средств 
казенные учреждения за счет доходов от оказания платных услуг, безвозмездных целевых и нецелевых поступлений   
</div>
 </body>                      
                         
                         <?php
                         }
                         ?>
        
              <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="btn1" class="btn" value="Сформировать таблицу" /></p>           
                         
   </form> 
          
        <form action="/reporting/table/excel" method="post">       
            <button type="submit" style="width:250px;height:25px" class="btn">EXCEL</button>
            </form>
          
          
          <?php
          # Выбираем что выбранно
                if($_SESSION['rendering'] == "simple"){
                     
                     $info_mounth = ['Не выбран'];
                     $info_title = ['Не выбран'];
                     $info_chapter = ['Не выбран'];
                                       
                } else {
                    
                     $info_mounth = $pageData['info']['info']['mounth'];
                     $info_title = $pageData['info']['info']['title'];
                     $info_chapter = $pageData['info']['info']['chapter'];
                      
                }
          
          ?>
          
              <body>
                  <div class="div">
                      <b>Выбранный месяц:</b><?php foreach($info_mounth as $info_m){ echo "$info_m,"; } ?></br>
                      <b>Выбранный раздел:</b><?php foreach($info_chapter as $info_c){ echo "$info_c,"; } ?></br>
                      <b>Выбранное учреждение:</b><?php foreach($info_title as $info_t){ echo "$info_t,"; } ?></br>
                  </div>
              </body>
          
          
          
          <table class="freeze-table" width="700px">
              
              <thead>
        <tr>
            <th style="min-width: 200px; width: 200px;" class="col-id-no fixed-header">Наименование расходов</th>
            <th style="min-width: 70px; width: 70px;"></th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 200px; width: 200px;">Плановые назначения ЛБО</th>
            <th style="min-width: 200px; width: 200px;">Зачет авансов, выплаченных в прошлом году</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Кредиторская задолженность</br> на начало года</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Дебиторская задолженность</br> на начало года</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Факт</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Кассовые расходы</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Кредиторская задолженность на</br> конец отчетного периода</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Дебиторская задолженность на</br> конец отчетного периода</th>
            <th style="min-width: 200px; width: 200px;">Возвращено Дт прошлых лет в доход бюджета</th>
            <th style="min-width: 200px; width: 200px;">Контрольное соотношение</th>
            <th style="min-width: 200px; width: 200px;">Контрольное соотношение к плану ЛБО</th>
        </tr>
              </thead>

              <tbody>
               <tr>
                  <td class="col-id-no" scope="row">1</td><td>2</td><td>3</td><td>4</td>
                  <td>5</td><td>6</td><td>7</td><td>8</td>
                  <td>9</td><td>10</td><td>11</td><td>12</td>
                  <td>13</td><td>14</td><td>15</td><td>16</td>
                  <td>17</td><td>18</td><td>19</td><td>20</td>
              </tr>
              
              <tr>
                  <td class="col-id-no" scope="row"></td><td></td><td></td><td></td><td></td>
                  <td>Всего</td><td>Просроченная</td><td>Всего</td><td>Просроченная</td>
                  <td>Всего</td><td>Текущий месяц</td><td>Всего</td><td>Текущий месяц</td>
                  <td>Всего</td><td>Просроченная</td><td>Всего</td><td>Просроченная</td>
                  <td></td><td></td><td></td>
              </tr>
             
              
            <?php 
                        
            if($_SESSION['id'] == '1'){
                

            
            for ($j = 1 ; $j < 41 ; ++$j){
                            
            foreach ($pageData['info']['res'] as $key => $value) {
                                 
                   
                                   if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                echo "<tr>";
                echo "<td class='col-id-no' scope='row'><b>" . $value['name'] . "</td></b>";
                echo "<td></td>";
                echo "<td><b>" . $value['ekr'] . "</td></b>";
                echo "<td><b>" . $value['SUM(lbo)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(prepaid)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(credit_year_all)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(credit_year_term)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(debit_year_all)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(debit_year_term)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(fact_all)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(fact_mounth)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(kassa_all)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(kassa_mounth)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(credit_end_all)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(credit_end_term)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(debit_end_all)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(debit_end_term)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(return_old)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(total1)'] . "</td></b>";
                echo "<td><b>" . $value['SUM(total2)'] . "</td></b>";
                echo "</tr>";
                }
                
                if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                    
                    #Подсветка ячейки total1
                    if($value['status'] == '10'){
                        $color = "green";
                        $status = '10';
                    } 
                    
                    if($value['status'] == '2022'){
                        $color = "darkred";
                        $status = '2022';
                    } 
                    
                      if($value['status'] == '66'){
                        $color = "yellow";
                        $status = '66';
                    } 
                    
                echo "<tr>";
                echo "<td class='col-id-no' scope='row'>" . $value['name'] . "</td>";
                echo "<td></td>";
                echo "<td>" . $value['ekr'] . "</td>";
                echo "<td>" . $value['SUM(lbo)'] . "</td>";
                echo "<td>" . $value['SUM(prepaid)'] . "</td>";
                echo "<td>" . $value['SUM(credit_year_all)'] . "</td>";
                echo "<td>" . $value['SUM(credit_year_term)'] . "</td>";
                echo "<td>" . $value['SUM(debit_year_all)'] . "</td>";
                echo "<td>" . $value['SUM(debit_year_term)'] . "</td>";
                echo "<td>" . $value['SUM(fact_all)'] . "</td>";
                echo "<td>" . $value['SUM(fact_mounth)'] . "</td>";
                echo "<td>" . $value['SUM(kassa_all)'] . "</td>";
                echo "<td>" . $value['SUM(kassa_mounth)'] . "</td>";
                echo "<td>" . $value['SUM(credit_end_all)'] . "</td>";
                echo "<td>" . $value['SUM(credit_end_term)'] . "</td>";
                echo "<td>" . $value['SUM(debit_end_all)'] . "</td>";
                echo "<td>" . $value['SUM(debit_end_term)'] . "</td>";
                echo "<td>" . $value['SUM(return_old)'] . "</td>";
                echo "<td bgcolor=$color>" . $value['SUM(total1)'] . "</td>";
                echo "<td bgcolor=$color>" . $value['SUM(total2)'] . "</td>";
                echo "</tr>";
                }
                   
                    
               #}
                
            }
            
            }
            
            #Итоговая строка
            foreach ($pageData['total'] as $key => $value) {
                
                                echo "<tr>";
                echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td><b>" . $value['SUM(lbo)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(prepaid)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_year_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_year_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_year_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_year_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(fact_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(fact_mounth)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(kassa_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(kassa_mounth)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_end_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_end_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_end_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_end_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(return_old)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(total1)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(total2)'] . "</b></td>";
                echo "</tr>";
                
            }
            
                 # Рисуем кнопки
                 if($status == '10' || $status == '66'){
                echo "<input type='button' style='width:250px;height:25px' id='btn4' class='btn' value='Открыть редактирование'>";
                 }
            
            
            }
            
             if($_SESSION['id'] == '2' || $_SESSION['id'] == '3'){
                 
                 if($_SESSION['rendering'] == "simple"){
                     
                     echo "</br>Выберите значения для отрисовки таблицы";
                    
                 } else {
                     
                     $abc = $pageData['info']['info']['mounth'][0];
                     # Для отправки
                     $_SESSION['error1'] = "no";
                     $_SESSION['error2'] = "no";
                     
                     
                     
                     
                                for ($j = 1 ; $j < 41 ; ++$j){
            
            foreach ($pageData['info']['res'] as $key => $value) { 
                
                
                                if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                  
                echo "<tr>";
                echo "<td class='col-id-no' scope='row'><b>" . $value['name'] . "</td></b>";
                echo "<td></td>";
                echo "<td><b>" . $value['ekr'] . "</td></b>";
                echo "<td><b>" . $value['lbo'] . "</td></b>";
                echo "<td><b>" . $value['prepaid'] . "</td></b>";
                echo "<td><b>" . $value['credit_year_all'] . "</td></b>";
                echo "<td><b>" . $value['credit_year_term'] . "</td></b>";
                echo "<td><b>" . $value['debit_year_all'] . "</td></b>";
                echo "<td><b>" . $value['debit_year_term'] . "</td></b>";
                echo "<td><b>" . $value['fact_all'] . "</td></b>";
                echo "<td><b>" . $value['fact_mounth'] . "</td></b>";
                echo "<td><b>" . $value['kassa_all'] . "</td></b>";
                echo "<td><b>" . $value['kassa_mounth'] . "</td></b>";
                echo "<td><b>" . $value['credit_end_all'] . "</td></b>";
                echo "<td><b>" . $value['credit_end_term'] . "</td></b>";
                echo "<td><b>" . $value['debit_end_all'] . "</td></b>";
                echo "<td><b>" . $value['debit_end_term'] . "</td></b>";
                echo "<td><b>" . $value['return_old'] . "</td></b>";
                echo "<td><b>" . $value['total1'] . "</td></b>";
                echo "<td><b>" . $value['total2'] . "</td></b>";
                echo "</tr>";
                }
                
                if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                    
                #Подсветка ячейки total1
                    if($value['total1'] == 0){
                        $color = "green";
                    } else {
                        $color = "darkred";
                        $error1 = "yes";
                        $_SESSION['error1'] = $error1;
                    }
                    
                    #Подсветка ячейки total2
                    if($value['total2'] >= '0'){
                        $color2 = "green";
                    } else {
                        $color2 = "darkred";
                        $error2 = "yes";
                        $_SESSION['error2'] = $error2;
                    }
                    
                    
                    #Определяем возможность редактирования
                    if($value['status'] == '2022'){
        
                echo "<tr>";
                echo "<input type=hidden class='id_name' value=" . $value['id_name'] . ">";
                echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                echo "<input type=hidden class='marker_b' value=" . $j . ">";
                
                echo <<<HTML
                <td class="col-id-no" scope="row">$value[name]</td>
                        <td><input type=button id='reset' value='Сброс'</td>
                <td>$value[ekr]</td>   
                    <td><input type="text" id='user' class='lbo' value="$value[lbo]"></td>
                        <td><input type="text" id='user' class='prepaid' value="$value[prepaid]"></td>
                        
                    <td><input type="text" id='user' class='credit_year_all' value="$value[credit_year_all]"></td>
                    <td><input type="text" id='user' class='credit_year_term' value="$value[credit_year_term]"></td>
                      
                    <td><input type="text" id='user' class='debit_year_all' value="$value[debit_year_all]"></td>    
                    <td><input type="text" id='user' class='debit_year_term' value="$value[debit_year_term]"></td>

   
                         <input type=hidden class='fact_all' value="$value[fact_all]">
                    <td>$value[fact_all]</td>                        
                    <td><input type="text" id='user' class='fact_mounth' value="$value[fact_mounth]"></td>
                        
                         <input type=hidden class='kassa_all' value="$value[kassa_all]">
                    <td>$value[kassa_all]</td>                       
                    <td><input type="text" id='user' class='kassa_mounth' value="$value[kassa_mounth]"></td>
                     
                    <td><input type="text" id='user' class='credit_end_all' value="$value[credit_end_all]"></td>
                    <td><input type="text" id='user' class='credit_end_term' value="$value[credit_end_term]"></td>
                      
                    <td><input type="text" id='user' class='debit_end_all' value="$value[debit_end_all]"></td>
                    <td><input type="text" id='user' class='debit_end_term' value="$value[debit_end_term]"></td>
                        
                        <td><input type="text" id='user' class='return_old' value="$value[return_old]"></td>
                        
                        <td bgcolor=$color>$value[total1]</td>
                        <td bgcolor=$color2>$value[total2]</td>
                HTML;

                echo "</tr>";
                $status = '2022';
                    } else {
                        
                                        echo "<tr>";               
                echo <<<HTML
                <td class="col-id-no" scope="row">$value[name]</td>
                        <td></td>
                <td>$value[ekr]</td>   
                    <td>$value[lbo]</td>
                    <td>$value[prepaid]</td>
                    <td>$value[credit_year_all]</td>
                    <td>$value[credit_year_term]</td>
                    <td>$value[debit_year_all]</td>
                    <td>$value[debit_year_term]</td>
                    <td>$value[fact_all]</td>
                    <td>$value[fact_mounth]</td>
                    <td>$value[kassa_all]</td>
                    <td>$value[kassa_mounth]</td>
                    <td>$value[credit_end_all]</td>
                    <td>$value[credit_end_term]</td>
                    <td>$value[debit_end_all]</td>
                    <td>$value[debit_end_term]</td>
                    <td>$value[return_old]</td>
                        <td>$value[total1]</td>
                        <td>$value[total2]</td>
                HTML;

                echo "</tr>";
                $status = '10';        
                        
                    }
                
                }
                
                
            }
            
                                }
                     
            #Итоговая строка
            foreach ($pageData['total'] as $key => $value) {
                
                echo "<tr>";
                echo "<td class='col-id-no' scope='row'><b>ИТОГО</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td><b>" . $value['SUM(lbo)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(prepaid)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_year_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_year_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_year_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_year_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(fact_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(fact_mounth)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(kassa_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(kassa_mounth)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_end_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(credit_end_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_end_all)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(debit_end_term)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(return_old)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(total1)'] . "</b></td>";
                echo "<td><b>" . $value['SUM(total2)'] . "</b></td>";
                echo "</tr>";
                     
                 }

                 # Рисуем кнопки
                 if($status == '2022'){
                echo "</br><input type='button' style='width:250px;height:25px' id='btn2' class='btn' value='Отправить в ФУ'>";
                
                echo "</br><pre><input type='button' style='width:250px;height:25px' id='filling' class='btn' value='Наполнение данными прошлого периода'>";
                echo "<p><b><font color='red'>Процесс наполнения данными длится около 5-10 сек. !</font></b></p>";
                 }
       
                 if($status == '10' || $status == '66'){
                echo "</br><input type='button' style='width:250px;height:25px' id='btn3' class='btn' value='Запросить редактирование'>";
                 }

            }
                 
             }
              
              ?>
              
              </tbody>
          </table>
       
   


