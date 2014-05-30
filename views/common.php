<!DOCTYPE html>
<html>
	<head>
		<title>Beer pong stats</title>
		<link href="./css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="col-md-3">
		<div class="panel panel-default">
		 <a href="index.php">Etusivu</a>
		 <a href="login.php">Kirjaudu</a>
		 <a href="register.php">Luo tili</a>
		 <a href="stats.php">Tilastot</a>
		</div>
		</div>
	<br>
	<?php require 'views/' . $page . '.php'; ?>
	<div class="col-md-offset-2 col-md-5">
	<footer> 
	<?php if (isset($data["error"])) { ?>
	<p><?php echo $data["error"]; ?></p>
	<?php } ?>
	</footer>
	</div>

</html>
