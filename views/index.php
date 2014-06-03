<?php require "./libs/models/stats.php";
$points = getTotalPoints();
$games = getTotalGames(); ?>
<div class="container">	
		<h1>Beer pong-tilastot</h1>
		<br><br>
		<div class="col-md-3">
		Pelejä pelattu: <?php echo $games; ?> 
		</div>
		<br>
		<div class="col-md-3">
		Palloja heitetty kuppiin: <?php echo $points["points"]; ?>
		</div>
		<br><br><br>
		<img src="pongi.jpg" align="middle" alt="Kuva: Jere Toivonen (cs.helsinki.fi/u/jeto/p/)">
		</div>
	</body>
