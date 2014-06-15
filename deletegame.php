<?php
	require_once './libs/models/games.php';
	require_once './libs/functions.php';	

	$id = $_POST["gameid"];
	deleteGame($id);

	view("mygames", array('error' => "Peli poistettu"));
