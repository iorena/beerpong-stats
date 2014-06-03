<?php require './libs/models/users.php';
$top5 = getTopFive(); ?>
<div class="container">
	<h1>Top 5 pelaajat</h1>
	<table class="table"> 			
	<thead></thead>
	<tbody>
		<?php foreach ($top5->name as $name): ?>
		<tr>
		<td></td>
		</tr>
		<?php endforeach; ?>	
