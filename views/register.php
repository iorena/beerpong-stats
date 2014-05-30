<div class="container">
	<h1>Luo käyttäjätunnus</h1>	
	<form class="form-horizontal" action="registeruser.php" role="form" method="POST">
		<div class="form-group">
			<label for="username" class="col-md-2 control-label">Tunnus:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" id="inputUsername" name="username"> 
		</div>
		</div>
		<div class="form-group">
			<label for="firstname" class="col-md-2 control-label">Etunimi:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" id="firstname" name="firstname" value="<?php 
	if (isset($data['firstname'])) { echo $data['firstname']; } ?>">
		</div>
		</div>
		<div class="form-group">
			<label for="lastname" class="col-md-2 control-label">Sukunimi:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" id="lastname" name="lastname" value="<?php 
	if (isset($data['firstname'])) { echo $data['firstname']; } ?>">
		</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-md-2 control-label">Salasana:</label>
		<div class="col-md-2">
			<input type="password" class="form-control" id="password" name="password">
		</div>
		</div>
		<div class="form-group">
			<label for="password2" class="col-md-2 control-label">Uudestaan:</label>
		<div class="col-md-2">
			<input type="password" class="form-control" id="password" name="password">
		</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-1">
			<button type="submit" class="btn btn-default">Valmis</button>
		</div>
		</div>
		</form>
		</div>	
