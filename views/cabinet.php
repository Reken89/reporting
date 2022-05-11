<?php

?>

           <head>
             <meta charset="utf-8">
              <title>Личный кабинет</title>
              </head>
              <body>

              <style>
               body { background: url(images/bg.png); }
              </style>

            <link rel="stylesheet" href="css/styles.css">


            <p style="background: #C0C0C0; border:3px #808080  ridge; width: 250px; padding: 10px 0 10px 15px;  margin:20px; float: right;" ><strong>Личный кабинет:</strong><br />Учреждение: <u><?php echo $_SESSION['user']; ?></u></p>

            <p style="background: #C0C0C0; border:3px #808080  ridge; width: 300px; padding: 10px 0 10px 15px;  margin:20px;" ><strong>Главная страница портала</strong></p>

              
                    <form action="/reporting/table/ofs" method="post">
            <input type='hidden' name='year' value='2019'>
        <input type='hidden' name='info' value='2'>
            <button type="submit" style="width:400px;height:25px" class="btn">Отчет по финансовому состоянию</button>
            </form>
        
            <form action="/reporting/table/fot" method="post">
            <input type='hidden' name='year' value='2020'>
        <input type='hidden' name='info' value='2'>
            <button type="button" style="width:400px;height:25px" class="btn">Отчет по ФОТ</button>
            </form>
        
            <form action="/reporting/table/opz" method="post">
            <input type='hidden' name='year' value='2021'>
        <input type='hidden' name='info' value='2'>
            <button type="button" style="width:400px;height:25px" class="btn">Отчет по просроченной задолжнности</button>
            </form>
            
            <?php
            if($_SESSION['role'] == 'admin'){
                
                echo <<<HTML
                
                        <form action="/reporting/communal/com" method="post">
                        <input type='hidden' name='year' value='2021'>
                        <input type='hidden' name='info' value='2'>
                        <button type="submit" style="width:400px;height:25px" class="btn">Коммунальные услуги</button>
                        </form>
            
                        <form action="/reporting/editor/editor_ofs" method="post">
                        <input type='hidden' name='year' value='2021'>
                        <input type='hidden' name='info' value='2'>
                        <button type="submit" style="width:400px;height:25px" class="btn">Редактор таблицы</button>
                        </form>
                
                        <form action="/reporting/editoruser/editor_user" method="post">
                        <input type='hidden' name='year' value='2021'>
                        <input type='hidden' name='info' value='2'>
                        <button type="submit" style="width:400px;height:25px" class="btn">Редактор учетных записей</button>
                        </form>
                HTML;
                                
            }