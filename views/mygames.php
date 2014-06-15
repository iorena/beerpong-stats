<?php
	$id = $_SESSION['user'];
	require_once './libs/models/gameclass.php';
	require_once './libs/models/teams.php';
	require_once './libs/models/games.php';
	require_once './libs/models/stats.php';
	if (isset($_POST["number"])) {
		$games = getGames($id, $_POST["number"]);
	} else {
		$games = null;
	}	

	if (isset($_POST["venue"])) {
		changeVenue($_POST["gameid"], $_POST["venue"]);		
		unset($_POST["venue"], $_POST["gameid"]);
	
	}

	?>
<div class="container">
	<h1>Omat tilastot</h1>
	<form class="form-horizontal" action="mygames.php" role="form" method="POST">
		<label for="number" class="col-md-2 control-label">Listaa pelejä: </label>
		<div class="col-md-1">
		<select class="form-control" name="number">
		<?php for ($i = 5; $i<16; $i = $i + 5) { ?>
	<option value=<?php echo $i; ?>><?php echo $i; ?>
		</option>
		<?php } ?>
		<option value=100>Kaikki</option>
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
			<td><?php echo $game->getTeamName($id); ?></td>
			<td><?php echo $game->getDate(); ?></td>
			<td><?php echo $game->getScore($id); ?></td>
			<td><form class="form-vertical" action="mygames.php" method="POST" role="form">
			<input type="hidden" name="game" value=<?php echo $game->getId(); ?>><button type="submit">Lisätietoja</button>
			</form></td>
			<td><form class="form-vertical" action="deletegame.php" method="POST" role="form">
			<input type="hidden" name="gameid" value=<?php echo $game->getId(); ?>>
			<button type="submit">Poista</button>
			</form></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	
	<?php if (isset($_POST["game"])) { 
		require_once './libs/models/venues.php';
		$gameid = $_POST["game"];
		$game = getGame($gameid); ?>

		<h2>Pelin tiedot</h2>
		<table class="table">
		<thead>
		</thead>
		<tbody>
			<tr>
			<td><?php echo getTeamName($game->getTeam1()); ?></td>
			<td>vs</td>
			<td><?php echo getTeamName($game->getTeam2()); ?></td>
			<td></td>
			</tr>
			<tr>
			<td>Paikka: </td>
			<td>
			<form class="form-vertical" action="mygames.php" method="POST" role="form">
			<input type="hidden" name="gameid" value=<?php echo $game->getID(); ?>>
			<select class="form-control" name="venue">
		<?php $venues = getVenues();
			foreach ($venues as &$venue) { ?>
			<option value=<?php echo $venue["venueid"]; 
			if ($venue["venueid"] == $game->getVenue()) { ?>
				selected="selected"
			<?php } ?>><?php echo $venue["venuename"]; ?>
			</option>
		<?php } ?>
		</select></td>
			<td><button type="submit">Tallenna</button></td></form>
			</tr>
			<tr>
			<td>Aika: </td>
			<td><?php echo $game->getDate(); ?></td>
			</tr>
			<tr>
			<td>Lisätiedot: <td>
			<td><?php echo $game->getInfo(); ?></td>
			</tr>
		</tbody>
		</table>
	<?php } else { ?>
		<div class="col-md-offset-4 col-md-2">
		<form action="addgame.php">
			<button type="submit">Lisää peli</button>
		</form>
		</div>
	<?php } ?>
