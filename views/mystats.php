<?php
	$id = $_SESSION['user'];
	require './libs/models/stats.php';
	$games = gamesPlayed($id);
	$wl = winLoseRate($id);
	$average = averagePoints($id);
	$best = bestPoints($id);
	$worst = worstPoints($id);
	$drink = favDrink($id);
	$money = moneySpent($id);
	?>
<div class="container">
	<h1>Omat tilastot</h1>
	<table class="table">
	<thead>
	</thead>
	<tbody>
	 	<tr>
	 	<td>Pelejä pelattu:</td>
		<td><?php echo $games; ?></td>
	 </tr>
	 	<tr>
	 	<td>Voittoprosentti:</td>
		<td><?php echo $wl; ?></td>
	 </tr>
	 	<tr>
	 	<td>Upotuksia/peli:</td>
		<td><?php echo $average; ?></td>
	 </tr>
		<tr>
	 	<td>Paras pelitulos:</td>
		<td><?php echo $best; ?></td>
	 </tr>
	<tr>
	 	<td>Huonoin pelitulos:</td>
		<td><?php echo $worst; ?></td>
	 </tr>
	<tr>
	 	<td>Lempijuoma:</td>
		<td><?php echo $drink; ?></td>
	 </tr>
	<tr>
	 	<td>Rahaa käytetty:</td>
		<td><?php echo $money; ?></td>
	 </tr>

