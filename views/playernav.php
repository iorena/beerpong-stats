<!DOCTYPE html>
<html>
	<head>
		<title>Beer pong stats</title>
		<link href="./css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="col-md-4">
		<div class="panel panel-default">
		 <a href="mystats.php">Omat tiedot</a>
		 <a href="addgame.php">Lisää peli</a>
		 <a href="teams.php">Joukkueet</a>
		 <a href="logout.php">Kirjaudu ulos</a>
		</div>
		</div>
	<footer> 
	<?php require 'views/' . $page . '.php';
	if (isset($data["error"])) { ?>
	<p><?php echo $data["error"]; ?></p>
	<?php } ?>
	</footer>
</html>
