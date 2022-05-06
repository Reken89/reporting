
           <head>
             <meta charset="utf-8">
              <title>Таблица</title>
              </head>
              <body>

              <style>
               body { background: url(../images/bg.png); }
              </style>

              <link rel="stylesheet" href="../css/table.css">

                      <style>
          #user {
          width: 80px; /* Ширина заполняемого поля */
           } 
          </style>
          
          <table class='table_budget'>
              <thead>
                  <tr>
                      <th></th><th>Название</th><th>ЭКР</th><th></th>
                  </tr>
              </thead>
          
          <?php
          if($_SESSION['role'] == 'admin'){
              
                          for ($j = 1 ; $j < 41 ; ++$j){
            
            foreach ($pageData['info'] as $key => $value) {
                
                if ($value['marker_a'] == 10 && $value['marker_b'] == $j ) {
                    
                    echo "<tr>";
                    echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                    echo "<td><b>Пункт</b></td>";
                    echo <<<HTML
                    
                        <td><textarea rows='5' cols='45' type=text class='name'>$value[name]</textarea></td>
                        <td><input type=text class='ekr' value='$value[ekr]'></td>
                        <td><input type=button id='editor' value='Изменить'></td>
                            
                    HTML;
                    echo "</tr>";
                    
                }
                
                if ($value['marker_a'] == 5 && $value['marker_b'] == $j ) {
                    
                    echo "<tr>";
                    echo "<input type=hidden class='id' value=" . $value['id'] . ">";
                    echo "<td>Подпункт</td>";
                    echo <<<HTML
                    
                         <td><textarea rows='5' cols='45' type=text class='name'>$value[name]</textarea></td>
                         <td><input type=text class='ekr' value='$value[ekr]'></td>
                         <td><input type=button id='editor' value='Изменить'></td>
                            
                    HTML;
                    echo "</tr>";
                    
                }
                
                
            }
            }
              
              
          }
          
          ?>
          </table>

