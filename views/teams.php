<?php require_once "./libs/models/teams.php";
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
		<form type="form-vertical" action="nameteam.php" role="form" method="POST">
		<input type="hidden" value=<?php echo $team["teamid"]; ?> name="teamid">
		<td><input type="text" class="form-control" id="teamname" name="teamname" <?php if (!empty($team["teamname"])) { ?> value=<?php echo $team["teamname"]; } ?>></td>
		<td><button type="submit">Nimeä</button></td>
		</form>
	</tr>
	<?php } ?>		
	</tbody>
	</table>
	</div>
