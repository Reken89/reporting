<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	
	
	<link rel="stylesheet" href="css/styles.css">
        
        <title><?php echo $pageData['title']; ?></title>

  <style>
   .fig {
    text-align: center; 
   }
  </style>


<body>

	<div id="container">
		

<form method="POST">
    <?php if(!empty($pageData['error'])) :?>
    <p><?php echo $pageData['error']; ?></p>
    
    <?php endif; ?>

			<label for="name">Учетная запись:</label>
			<input type="name" name="name">
			<label for="username">Пароль:</label>
			
			<input type="password" name="password">
			<div id="lower">

			
				<input type="submit" a href="#" class="butt" value="Войти">
			</div>
		</form>
            
            
	</div>

</body>
</html>