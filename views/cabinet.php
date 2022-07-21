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

              
            <?php
            
                        if($_SESSION['role'] == 'repair'){
              echo <<<HTML

                        <form action="/reporting/repairstr/table" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Таблица ремонты</button>
                        </form>
                HTML;
            }
            
            if($_SESSION['role'] == 'report' || $_SESSION['role'] == 'report_school' || $_SESSION['role'] == 'report_kultura' || $_SESSION['role'] == 'report_kinder'){
              echo <<<HTML
                
                        <form action="/reporting/table/ofs" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Отчет по финансовому состоянию</button>
                        </form>

                        <form action="/reporting/table/fot" method="post">
                        <button type="button" style="width:400px;height:25px" class="btn">Отчет по ФОТ</button>
                        </form>

                        <form action="/reporting/table/opz" method="post">
                        <button type="button" style="width:400px;height:25px" class="btn">Отчет по просроченной задолжнности</button>
                        </form>
                
                        <form action="/reporting/budgetuser/table" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Таблица смета</button>
                        </form>
                
                        <form action="/reporting/repaircb/table" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Таблица ремонты</button>
                        </form>
                HTML;
            }
            
            
            
            if($_SESSION['role'] == 'admin'){
                
                echo <<<HTML
                
                                                <form action="/reporting/table/ofs" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Отчет по финансовому состоянию</button>
                        </form>

                        <form action="/reporting/table/fot" method="post">
                        <button type="button" style="width:400px;height:25px" class="btn">Отчет по ФОТ</button>
                        </form>

                        <form action="/reporting/table/opz" method="post">
                        <button type="button" style="width:400px;height:25px" class="btn">Отчет по просроченной задолжнности</button>
                        </form>
                
                        <form action="/reporting/budget/table" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Таблица смета</button>
                        </form>
                
                        <form action="/reporting/prognoz/table" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Прогноз коммуналки</button>
                        </form>
                
                        <form action="/reporting/communal/com" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Коммунальные услуги</button>
                        </form>
                
                        <form action="/reporting/repairfu/table" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Таблица ремонты</button>
                        </form>
            
                        <form action="/reporting/editor/editor_ofs" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Редактор таблицы ОФС</button>
                        </form>
                
                        <form action="/reporting/editoruser/editor_user" method="post">
                        <button type="submit" style="width:400px;height:25px" class="btn">Редактор учетных записей</button>
                        </form>
                HTML;
                                
            }