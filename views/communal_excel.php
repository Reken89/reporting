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
 
 





?>

                <table>
        <tr><td rowspan="2">Учреждение</td><td rowspan="2">Статус</td><td colspan="2">Теплоснабжение</td><td colspan="2">Водоотведение</td><td colspan="2">Негативка</td><td colspan="2">Водоснабжение</td><td colspan="2">Электроснабжение</td><td colspan="2">Вывоз мусора</td><td colspan="2">Утилизация ТБО</td><td  rowspan="2">ИТОГ (руб.)</td></tr>

        <tr><td>Объем</td><td>Сумма (руб.)</td><td>Объем</td><td>Сумма (руб.)</td><td>Объем</td><td>Сумма (руб.)</td><td>Объем</td><td>Сумма (руб.)</td><td>Объем</td><td>Сумма (руб.)</td><td>Объем</td><td>Сумма (руб.)</td><td>Объем</td><td>Сумма (руб.)</td></tr>
               
    <?php
    
    foreach ($_SESSION['for_excel'] as $key => $value) {
        
        if ($value['status'] !== 10) {
            
                echo "<tr>";
                echo "<td>" . $value['full_name'] . "</td>";
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
    
        foreach ($_SESSION['for_excel_total'] as $key => $total_v) {
        
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
                echo "</tr>";
        
    }
    ?>
                </table>

