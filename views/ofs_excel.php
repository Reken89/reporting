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

          <table class='table_budget'>
              
              <thead>
              <tr>
                  <th>Наименование расходов</th><th>ЭКР</th><th>Плановые назначения ЛБО</th>
                  <th>Зачет авансов, выплаченных в прошлом году</th>
                  <th colspan="2">кредиторская задолженность на начало года</th>
                  <th colspan="2">дебиторская задолженность на начало года</th>
                  <th colspan="2">Факт</th><th colspan="2">Кассовые расходы</th>
                  <th colspan="2">кредиторская задолженность на конец отчетного периода</th>
                  <th colspan="2">дебиторская задолженность на конец отчетного периода</th>
                  <th>Возвращено Дт прошлых лет в доход бюджета</th>
                  <th>Контрольное соотношение</th><th>Контрольное соотношение к плану ЛБО</th>
              </tr>
              </thead>

              <tr>
                  <td></td><td></td><td></td><td></td>
                  <td>Всего</td><td>Просроченна</td><td>Всего</td><td>Просроченна</td>
                  <td>Всего</td><td>Текущий месяц</td><td>Всего</td><td>Текущий месяц</td>
                  <td>Всего</td><td>Просроченна</td><td>Всего</td><td>Просроченна</td>
                  <td></td><td></td><td></td>
              </tr>
              
<?php

# Таблица Финуправления
if($_SESSION['role'] == 'admin'){
    
                for ($j = 1 ; $j < 41 ; ++$j){
            
            foreach ($_SESSION['for_excel'] as $key => $value) {
                
          if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
              
                echo "<tr>";
                echo "<td><b>" . $value['name'] . "</td></b>";
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
                    
                                    echo "<tr>";
                echo "<td>" . $value['name'] . "</td>";
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
                echo "<td>" . $value['SUM(total1)'] . "</td>";
                echo "<td>" . $value['SUM(total2)'] . "</td>";
                echo "</tr>";
                    
                }
                
                      }
            
                }
                
                #Итоговая строка
                foreach ($_SESSION['for_excel_total'] as $key => $value) {
                
                                echo "<tr>";
                echo "<td><b>ИТОГО</td>";
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
    
    
    
}

# Таблица ЦБ и КУМС
if($_SESSION['role'] == 'report_school' || $_SESSION['role'] == 'report_kultura' || $_SESSION['role'] == 'report_kinder' || $_SESSION['role'] == 'report'){
    
                                    for ($j = 1 ; $j < 41 ; ++$j){
            
            foreach ($_SESSION['for_excel'] as $key => $value) { 
                
                
                
                if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                  
                echo "<tr>";
                echo "<td><b>" . $value['name'] . "</td></b>";
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
                    
                                    echo "<tr>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td>" . $value['ekr'] . "</td>";
                echo "<td>" . $value['lbo'] . "</td>";
                echo "<td>" . $value['prepaid'] . "</td>";
                echo "<td>" . $value['credit_year_all'] . "</td>";
                echo "<td>" . $value['credit_year_term'] . "</td>";
                echo "<td>" . $value['debit_year_all'] . "</td>";
                echo "<td>" . $value['debit_year_term'] . "</td>";
                echo "<td>" . $value['fact_all'] . "</td>";
                echo "<td>" . $value['fact_mounth'] . "</td>";
                echo "<td>" . $value['kassa_all'] . "</td>";
                echo "<td>" . $value['kassa_mounth'] . "</td>";
                echo "<td>" . $value['credit_end_all'] . "</td>";
                echo "<td>" . $value['credit_end_term'] . "</td>";
                echo "<td>" . $value['debit_end_all'] . "</td>";
                echo "<td>" . $value['debit_end_term'] . "</td>";
                echo "<td>" . $value['return_old'] . "</td>";
                echo "<td>" . $value['total1'] . "</td>";
                echo "<td>" . $value['total2'] . "</td>";
                echo "</tr>";
                    
                }
                
                                         }
            
                                    }
                                    
            #Итоговая строка
            foreach ($_SESSION['for_excel_total'] as $key => $value) {
                
                echo "<tr>";
                echo "<td><b>ИТОГО</td>";
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
    
}

?>
              
</table>

