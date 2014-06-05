<?php
	$id = $_SESSION['user'];
	require_once './libs/models/teams.php';
	require_once './libs/models/games.php';
	require_once './libs/models/stats.php';
	if (isset($_POST["number"])) {
		$games = getGames($id, $_POST["number"]);
	} else {
		$games = null;
	}	

	?>
<div class="container">
	<h1>Omat tilastot</h1>
	<form class="form-horizontal" action="mygames.php" role="form" method="POST">
		<label for="number" class="col-md-2 control-label">Listaa pelejä: </label>
		<div class="col-md-1">
		<select class="form-control" name="number">
		<?php for ($i = 2; $i<11; $i = $i + 2) { ?>
	<option value=<?php echo $i; ?>><?php echo $i; ?>
		</option>
		<?php } ?>
		</select>
		</div>
	<button type="submit">Ok</button>
	</form>
	<table class="table">
	<thead>
		<th>Joukkue</th>
		<th>Päiväys</th>
		<th>Tulos</th>
		<th></th>
	</thead>
	<tbody>
		<?php foreach ($games as $game) { ?>
			<tr>
			<td><?php echo getTeamName($game["gameid"], $id); ?></td>
			<td><?php echo $game["gamedate"]; ?></td>
			<td><?php echo getGameScore($game["gameid"], $id); ?></td>
			<td><form class="form-vertical" action="mygames.php" method="POST" role="form">
			<input type="hidden" name="gameid" value=<?php echo $game["gameid"]; ?>><button type="submit">Lisätietoja</button>
			</form></td>
			</tr>
		<?php } ?>
	</tbody>
	</table>
	<?php if (isset($_POST["gameid"])) { 
		$gameid = $_POST["gameid"]; ?>
		<table class="table">
		<thead>
		</thead>
		<tbody>
			<tr>
			<td>Paikka: </td>
			<td><?php echo getVenue($gameid); ?></td>
			<td><button type="button">Tallenna</button></td>
			</tr>
			<tr>
			<td>Aika: </td>
			<td><?php echo getDate($gameid);



	}
