 
<head>
             <meta charset="utf-8">
              <title>Таблица</title>
              </head>
              <body>

              <style>
               body { background: url(../images/bg.png); }
              </style>

              <link rel="stylesheet" href="../css/table2.css">

              <p>Таблица учетных записей</p>
          <table class="freeze-table" width="700px">
              
              <thead>
        <tr>
            <th style="min-width: 200px; width: 150px;" class="col-id-no fixed-header">Логин</th>
            <th style="min-width: 200px; width: 150px;">Роль</th>
            <th style="min-width: 200px; width: 150px;"></th>
        </tr>
              </thead>
              
              <tbody>
                  
                              <?php 
                        
            if($_SESSION['role'] == 'admin'){
                
                foreach ($pageData['info'] as $key => $value) {
                    
                    echo <<<HTML
                    
                    <tr>
                        <input type=hidden class='id' value='$value[id]'>
                        <td><input type=text class='login' value='$value[login]'></td>
                        <td><input type=text class='role' value='$value[role]'></td>
                        <td><input type=button id='editor_user' value='Изменить'></td>
                            </tr>
                            
                    HTML;
                    
                }
                
            }
            
            ?>
                  
              </tbody>
          </table>
              
 
              <p>Добавить пользователя</p>             
<table class="freeze-table" width="700px">
    
                  <thead>
        <tr>
            <th style="min-width: 200px; width: 150px;" class="col-id-no fixed-header">Логин</th>
            <th style="min-width: 200px; width: 150px;">Пароль</th>
            <th style="min-width: 200px; width: 150px;">Роль</th>
            <th style="min-width: 200px; width: 150px;"></th>
        </tr>
              </thead>
              
              <tbody>
              
                                  <tr>
                        <td><input type=text class='login'></td>
                        <td><input type=password class='password'></td>
                        <td><input type=text class='role'></td>
                        <td><input type=button id='user_add' value='Добавить'></td>
                            </tr>
                            
              </tbody>
</table>
              