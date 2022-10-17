<head>
    <meta charset="utf-8">
    <title>Таблица</title>
</head>
<style>
    body { background: url(../images/bg.png); }
</style>
<link rel="stylesheet" href="../css/table2.css">

<form id="my-form" method="post">                 
<p><b>Выберите год </b></p>                 
    <div class="size_block">                  
        <label class="container">
            <input type="checkbox" name="svod_year[]" value="2018">
            <span class="checkmark">2018</span>
        </label>                 
        <label class="container">
            <input type="checkbox" name="svod_year[]" value="2019">
            <span class="checkmark">2019</span>
        </label>                  
        <label class="container">
            <input type="checkbox" name="svod_year[]" value="2020">
            <span class="checkmark">2020</span>
        </label>                  
        <label class="container">
            <input type="checkbox" name="svod_year[]" value="2021">
            <span class="checkmark">2021</span>
        </label>                 
        <label class="container">
            <input type="checkbox" name="svod_year[]" value="2022">
            <span class="checkmark">2022</span>
        </label>                  
    </div>
                         
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
                         
<p><input type="button" style="width:250px;height:25px" name="formSubmit" id="communal" class="btn" value="Сформировать таблицу" /></p>                     
</form>
    <p><input type="button" style="width:250px;height:25px" name="formSubmit" id="email" class="btn" value="Отправить напоминания" /></p>
    
            <form action="/reporting/communal/excel" method="post">
            <button type="submit" style="width:250px;height:25px" class="btn">Выгрузка в EXCEL</button>
            </form>

                          <body>
                  <div class="div">
                      <b>Выбранный месяц:</b><?php foreach($pageData['communal_mounth'] as $communal_mounth){ echo "$communal_mounth,"; } ?></br>
                      <b>Выбранный год:</b><?php foreach($pageData['communal_year'] as $communal_year){ echo "$communal_year,"; } ?></br>
                  </div>
              </body>  
              
          <table class="freeze-table" width="700px">
              
              <thead>
        <tr>
            <th style="min-width: 200px; width: 200px;" rowspan="2">Учреждение</th>
            <th style="min-width: 100px; width: 100px;" rowspan="2">Статус</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Теплоснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Водоотведение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Негативка</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Водоснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Электроснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Вывоз мусора</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Утилизация ТБО</th>
            <th style="min-width: 200px; width: 200px;" rowspan="2">ИТОГ</th>
        </tr>
              </thead>
              
              <tbody>
                  <tr>
                      <td></td><td></td>
                      <td>Объем</td><td>Сумма</td>
                      <td>Объем</td><td>Сумма</td>
                      <td>Объем</td><td>Сумма</td>
                      <td>Объем</td><td>Сумма</td>
                      <td>Объем</td><td>Сумма</td>
                      <td>Объем</td><td>Сумма</td>
                      <td>Объем</td><td>Сумма</td>
                      <td></td>
                  </tr>
                  
                  <?php
                  
                      foreach ($pageData['info'] as $key => $value) {
        
     
        
        if ($value['status'] == 1) {
            $color = "green";
            
                echo "<tr>";
                echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                echo "<td bgcolor=$color>" . $value['full_name'] . "</td>";
                echo "<td></td>";
                echo "<td>" . $value['volume1'] . "</td>";
                echo "<td>" . $value['sum1'] . "</td>";
                echo "<td>" . $value['volume2'] . "</td>";
                echo "<td>" . $value['sum2'] . "</td>";
                echo "<td>" . $value['volume3'] . "</td>";
                echo "<td>" . $value['sum3'] . "</td>";
                echo "<td>" . $value['volume4'] . "</td>";
                echo "<td>" . $value['sum4'] . "</td>";
                echo "<td>" . $value['volume5'] . "</td>";
                echo "<td>" . $value['sum5'] . "</td>";
                echo "<td>" . $value['volume6'] . "</td>";
                echo "<td>" . $value['sum6'] . "</td>";
                echo "<td>" . $value['volume7'] . "</td>";
                echo "<td>" . $value['sum7'] . "</td>";
                echo "<td>" . $value['total'] . "</td>";
                echo "</tr>";
                
            
        }
        
                if ($value['status'] == 2) {
                $color = "darkred";
                    
                echo "<tr>";
                echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                echo "<td bgcolor=$color>" . $value['full_name'] . "</td>";
                echo "<td></td>";
                echo "<td>" . $value['volume1'] . "</td>";
                echo "<td>" . $value['sum1'] . "</td>";
                echo "<td>" . $value['volume2'] . "</td>";
                echo "<td>" . $value['sum2'] . "</td>";
                echo "<td>" . $value['volume3'] . "</td>";
                echo "<td>" . $value['sum3'] . "</td>";
                echo "<td>" . $value['volume4'] . "</td>";
                echo "<td>" . $value['sum4'] . "</td>";
                echo "<td>" . $value['volume5'] . "</td>";
                echo "<td>" . $value['sum5'] . "</td>";
                echo "<td>" . $value['volume6'] . "</td>";
                echo "<td>" . $value['sum6'] . "</td>";
                echo "<td>" . $value['volume7'] . "</td>";
                echo "<td>" . $value['sum7'] . "</td>";
                echo "<td>" . $value['total'] . "</td>";
                echo "</tr>";
            
        }
        
        
                        if ($value['status'] == 3) {
                            $color = "yellow";
            
                echo "<tr>";
                echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                echo "<td bgcolor=$color>" . $value['full_name'] . "</td>";
                echo "<td><input type=button id='update_status' value='Доработка'></td>";
                echo "<td>" . $value['volume1'] . "</td>";
                echo "<td>" . $value['sum1'] . "</td>";
                echo "<td>" . $value['volume2'] . "</td>";
                echo "<td>" . $value['sum2'] . "</td>";
                echo "<td>" . $value['volume3'] . "</td>";
                echo "<td>" . $value['sum3'] . "</td>";
                echo "<td>" . $value['volume4'] . "</td>";
                echo "<td>" . $value['sum4'] . "</td>";
                echo "<td>" . $value['volume5'] . "</td>";
                echo "<td>" . $value['sum5'] . "</td>";
                echo "<td>" . $value['volume6'] . "</td>";
                echo "<td>" . $value['sum6'] . "</td>";
                echo "<td>" . $value['volume7'] . "</td>";
                echo "<td>" . $value['sum7'] . "</td>";
                echo "<td>" . $value['total'] . "</td>";
                echo "</tr>";
            
        }
        
        
                                if ($value['status'] == 10) {
            
                echo "<tr>";
                echo "<td>" . $value['full_name'] . "</td>";
                echo "<td></td>";
                echo "<td>" . $value['SUM(volume1)'] . "</td>";
                echo "<td>" . $value['SUM(sum1)'] . "</td>";
                echo "<td>" . $value['SUM(volume2)'] . "</td>";
                echo "<td>" . $value['SUM(sum2)'] . "</td>";
                echo "<td>" . $value['SUM(volume3)'] . "</td>";
                echo "<td>" . $value['SUM(sum3)'] . "</td>";
                echo "<td>" . $value['SUM(volume4)'] . "</td>";
                echo "<td>" . $value['SUM(sum4)'] . "</td>";
                echo "<td>" . $value['SUM(volume5)'] . "</td>";
                echo "<td>" . $value['SUM(sum5)'] . "</td>";
                echo "<td>" . $value['SUM(volume6)'] . "</td>";
                echo "<td>" . $value['SUM(sum6)'] . "</td>";
                echo "<td>" . $value['SUM(volume7)'] . "</td>";
                echo "<td>" . $value['SUM(sum7)'] . "</td>";
                echo "<td>" . $value['SUM(total)'] . "</td>";
                echo "</tr>";
            
        }
                
    }
    
        foreach ($pageData['total'] as $key => $total_v) {
        
        echo "<tr>";
        echo "<td>ИТОГ</td>";
        echo "<td></td>";
        echo "<td>" . $total_v['SUM(volume1)'] . "</td>";
                echo "<td>" . $total_v['SUM(sum1)'] . "</td>";
                echo "<td>" . $total_v['SUM(volume2)'] . "</td>";
                echo "<td>" . $total_v['SUM(sum2)'] . "</td>";
                echo "<td>" . $total_v['SUM(volume3)'] . "</td>";
                echo "<td>" . $total_v['SUM(sum3)'] . "</td>";
                echo "<td>" . $total_v['SUM(volume4)'] . "</td>";
                echo "<td>" . $total_v['SUM(sum4)'] . "</td>";
                echo "<td>" . $total_v['SUM(volume5)'] . "</td>";
                echo "<td>" . $total_v['SUM(sum5)'] . "</td>";
                echo "<td>" . $total_v['SUM(volume6)'] . "</td>";
                echo "<td>" . $total_v['SUM(sum6)'] . "</td>";
                echo "<td>" . $total_v['SUM(volume7)'] . "</td>";
                echo "<td>" . $total_v['SUM(sum7)'] . "</td>";
                echo "<td>" . $total_v['SUM(total)'] . "</td>";
        
    }
                  
                  ?>
                  
              </tbody>
              
          </table>
