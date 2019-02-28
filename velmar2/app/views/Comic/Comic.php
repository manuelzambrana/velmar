<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <style>
  
    .descripcion{
    position: relative;
    top: -305px;
    left: 225px;
    text-align: justify;
    width: 745px;
    height: 30px;
    font-size: 17px;
    font-family: 'Gentium Book Basic', serif;
    }



  </style>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="../../">VelmarComics</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $email ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/velmar2/main/logout">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </nav>

  <div class="container">
  <?php
  $imagen= $producto['imagen'];
  $idProducto=$producto['idProducto'];
  

        
        ?>
  <div class="col s12 m7 tarjeta">
<h2 class="header" style="color:saddlebrown"><?php echo $producto['nomPro'];  ?></h2>
<div class="card horizontal">
	<div class="card-image">
  <?php echo "<img src=$imagen>";  ?>
	</div>
	<div class="card-stacked">
		<div class="card-content">	
        <p class="descripcion"><?php echo $producto['Descripcion'];  ?></p>
       
  
     
		</div>
        <?php
    if (is_array($comentario) || is_object($comentario)):
    foreach($comentario as $key):
        
        
		
					
					
        
        ?>

        <p><?php echo ($key['Comentario']); ?> </p>
        <?php echo ($key['nombre']); ?> 
       
        
        <?php endforeach ?>
      <?php endif ?>
        <form action="<?= FOLDER_PATH . '/comic/comentario/'. $producto['idProducto']; ?>" name="confirmationForm" method="post">
   				    <textarea id="confirmationText" class="text" cols="60" rows ="4" name="confirmationText"></textarea>
   					<input type="submit" value="Enviar" class="submitButton">
   					<input type="number" id="idProducto" value="<?php echo htmlspecialchars($idProducto); ?>" hidden="hidden" name="id">
					</form> 
	</div>
</div>
</div>
  </div>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>