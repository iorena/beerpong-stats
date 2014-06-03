<?php require "./libs/models/teams.php";
$userid = $_SESSION['user'];
$teams = getTeams($userid); ?>

<div class="container">

	<h1>Joukkueet</h1>

	<table class="table">
	<thead></thead>	
	<tbody>
	<?php foreach ($teams as &$team) { ?>
	<tr><td>Kaveri: <?php echo getTeammate($team["teamid"], $userid); ?></td>
		<td>Pelejä pelattu: <?php echo getTeamGames($team["teamid"]); ?></td>
		<td>Voittoprosentti: </td>
		<td><?php echo $team["teamname"]; ?></td>
		<td><button type="button">Nimeä</button></td>
	</tr>
	<?php } ?>		
	</tbody>
	</table>
	</div>
