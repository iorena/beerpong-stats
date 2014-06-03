<?php require_once './libs/models/drinks.php';
require_once './libs/models/venues.php';
require_once './libs/models/users.php'; 
$venues = getVenues();
$players = getPlayers();  ?>
<div class="container">
	<h1>Lisää peli</h1>
	<div class="form-group">
	<form class="form-horizontal" action="addgamedata.php" method="POST" role="form">
			<label for="venue" class="col-md-2 control-label">Pelipaikka:</label>
		<div class="col-md-2">
		<select class="form-control" name="venue">
		<?php foreach ($venues as &$venue) { ?>
	<option value=<?php echo $venue["venueid"]; ?>><?php echo $venue["venuename"]; ?>
		</option>
		<?php } ?>
		</select>
		<button type="button">Lisää paikka</button>
		</div>
		</div>

	<div class="col-md-offset-8 col-md-3" id="jouk1"><span>Joukkue 1</span></div>
		<div class="col-md-offset-1 col-md-3" id="jouk2"> 
		<span>Joukkue 2</span> 
		</div>
		
		 <table class="table">
		 <thead>
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
			<option value=<?php echo findUserID($name["loginname"]); ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
		</select>
			</td>
			<td><select name ="t1p1drink">
			<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t1p1score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option><?php echo $i; ?></option>
			<?php } ?>
			</select></td><td>
			<select name="t2p1">
			<?php foreach ($players as &$name) { ?>
			<option value=<?php echo findUserID($name["loginname"]); ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
</select>
			</td>
			<td><select name="t2p1drink">
				<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t2p1score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option><?php echo $i; ?></option>
			<?php } ?>
			</select></td>
		</tr>
		<tr>
			<td>
			<select name="t1p2">
			<?php foreach ($players as &$name) { ?>
			<option value=<?php echo findUserID($name["loginname"]); ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
</select>
			</td>
			<td><select name="t1p2drink">
				<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t1p2score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option><?php echo $i; ?></option>
			<?php } ?>
			</select></td>
			
			<td>
			<select name="t2p2">
			<?php foreach ($players as &$name) { ?>
			<option value=<?php echo findUserID($name["loginname"]); ?>><?php echo $name["firstname"].' '.$name["lastname"]; ?></option>
			<?php } ?>
</select>
			</td>
			<td><select name="t2p2drink">
				<?php 
				$drinks = getDrinks(2);	
				foreach ($drinks as &$drink) { ?>
				<option><?php echo $drink["drinkname"]; ?></option>
			<?php } ?>
			</select></td>
			<td><select name="t2p2score">
			<?php for ($i = 0; $i<11; $i++) { ?>
			<option><?php echo $i; ?></option>
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
		<textarea rows="5" cols="30">
		</textarea>
	<div class="form-group"><div class="col-md-offset-5 col-md-2">
		<button type="submit" class="btn btn-default">Valmis</button>
	</div>
	</form>
	</div>
