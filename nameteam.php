<?php
	require_once './libs/strings.php';
	require_once './libs/functions.php';
	require_once './libs/models/teams.php';

	$teamname = $_POST["teamname"];

	if (strlen($teamname) > 20) {
		view("teams", array('error' => "Nimi voi olla korkeintaan 20 merkkiä pitkä"));
	

	}

	if (illegalChars($teamname)) {
		view("teams", array('error' => "Nimessä voi olla vain kirjaimia ja numeroita"));
	}

	setTeamName($teamname, $_POST["teamid"]);
	view("teams", array('error' => "Nimi muutettu"));
