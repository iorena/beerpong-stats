<div class="container">
	<h1>Kirjaudu sisään</h1>
		<form class="form-horizontal" action="loginhandler.php" role="form" method="POST">
		<div class="form-group">
			<label for="inputUsername" class="col-md-2 control-label">Tunnus:</label>
		<div class="col-md-2">
			<input type="text" class="form-control" id="inputUsername" name="username" value="<?php 
	if (isset($data["user"])) {
		 echo $data["user"];
	 } ?>" placeholder="Käyttäjätunnus">
		</div>
		</div>
		<div class="form-group">
		 <label for="inputPassword" class="col-md-2 control-label">Salasana:</label>
		<div class="col-md-2">
		 	<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Salasana">
		</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-1">
			<button type="submit" class="btn btn-default">Sisään</button>
		</div>
		</div>
		</form>
		</div>
		</body>
