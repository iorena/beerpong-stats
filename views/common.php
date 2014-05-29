<!DOCTYPE html>
<html>
	<head>
		<title>Beer pong stats</title>
		<link href="http://www.essalmen.users.cs.helsinki.fi/beerpong-stats/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="col-md-offset-10 col-md-2">
		<div class="panel panel-default">
		 <a href="index.php">Etusivu</a>
		 <a href="login.php">Kirjaudu</a>
		 <a href="register.php">Luo tili</a>
		 <a href="stats.php">Tilastot</a>
		</div>
		</div>
	<footer> 
	<?php require 'views/' . $page . '.php';
	if (isset($data["error"])) { ?>
	<p><?php echo $data["error"]; ?></p>
	<?php } ?>
	</footer>

</html>
