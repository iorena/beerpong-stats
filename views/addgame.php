<?php require_once './libs/models/drinks.php';
require_once './libs/models/venues.php';
require_once './libs/models/users.php'; 
$venues = getVenues();
$players = getPlayers();  ?>
<div class="container">
	<h1>Lisää peli</h1>
	<div class="form-group">
	<form class="form-horizontal" action="addgamedata.php" method="POST" role="form">
	<input type="hidden" class="form-control" name="date" value="2014-06-04 00:00:00"<?php echo date('Y-m-d'); ?>>
			<label for="venue" class="col-md-2 control-label">Pelipaikka:</label>
		<div class="col-md-2">
		<select class="form-control" name="venue">
		<?php foreach ($venues as &$venue) { ?>
	<option value=<?php echo $venue["venueid"]; if ($_POST["venue"] == $venue["venueid"])
	{ ?> selected="selected" <?php } ?>><?php echo $venue["venuename"]; ?>
		</option>
		<?php } ?>
		</select>
		<button type="button">Lisää paikka</button>
		</div>
		</div>

		 <table class="table">
		 <thead>
		<tr>
			<th></th>
			<th>Joukkue 1</th>
			<th></th>
			<th></th>
			<th>Joukkue 2</th>
		</tr>
		 <tr>
		 	<th>Nimi</th>
			<th>Juoma</th>
			<th>Pisteet</th>
			<th>Nimi</th>
			<th>Juoma</th>
			<th>Pisteet</th>
		</tr>
		</thead>
		<tbody>
		<tr>
				<td>
			<select name="t1p1">
				<?php foreach ($players as &$name) { ?>
			<option value=<?php $id = findUserID($name["loginname"]); echo $id; if ($data["t1p1"] == $id) { ?> selected="selected" <?php } ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
		</select>
			</td>
			<td><select name ="t1p1drink">
			<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option value=<?php $drink = $drink["drinkid"]; echo $drink; if ($data["t1p1drink"] == $drink { ?> selected="selected" <?php } ?>><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t1p1score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option value=<?php echo $i; ?>><?php echo $i; ?></option>
			<?php } ?>
			</select></td><td>
			<select name="t2p1">
			<?php foreach ($players as &$name) { ?>
			<option value=<?php $id = findUserID($name["loginname"]); echo $id; if ($data["t2p1"] == $id) { ?> selected="selected" <?php } ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
</select>
			</td>
			<td><select name="t2p1drink">
				<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option value=<?php $drink = $drink["drinkid"]; echo $drink; if ($data["t2p1drink"] == $drink { ?> selected="selected" <?php } ?>><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t2p1score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option value=<?php echo $i; ?>><?php echo $i; ?></option>
			<?php } ?>
			</select></td>
		</tr>
		<tr>
			<td>
			<select name="t1p2">
			<?php foreach ($players as &$name) { ?>
			<option value=<?php $id = findUserID($name["loginname"]); echo $id; if ($data["t1p2"] == $id) { ?> selected="selected" <?php } ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
</select>
			</td>
			<td><select name="t1p2drink">
				<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option value=<?php $drink = $drink["drinkid"]; echo $drink; if ($data["t1p2drink"] == $drink { ?> selected="selected" <?php } ?>><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t1p2score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option value=<?php echo $i; ?>><?php echo $i; ?></option>
			<?php } ?>
			</select></td>
			
			<td>
			<select name="t2p2">
			<?php foreach ($players as &$name) { ?>
			<option value=<?php $id = findUserID($name["loginname"]); echo $id; if ($data["t2p2"] == $id) { ?> selected="selected" <?php } ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
</select>
			</td>
			<td><select name="t2p2drink">
				<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option value=<?php $drink = $drink["drinkid"]; echo $drink; if ($data["t2p2drink"] == $drink { ?> selected="selected" <?php } ?>><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t2p2score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option value=<?php echo $i; ?>><?php echo $i; ?></option>
			<?php } ?>
			</select></td>
		</tr>
		</tbody>
	</table>
	<div class="form-group">
	<button type="button">Lisää juoma</button>
	<br>
	<div class="form-group">
		<div class="col-md-2">Lisähuomioita:</div>
		<textarea rows="5" cols="30" name="info">
		</textarea>
	<div class="form-group"><div class="col-md-offset-5 col-md-2">
		<button type="submit" class="btn btn-default">Valmis</button>
	</div>
	</form>
	</div>
