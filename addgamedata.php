<?php
	require_once './libs/functions.php';
	require_once './libs/models/games.php';
	require_once './libs/models/teams.php';
	
	$players = array($_POST["t1p1"], $_POST["t1p2"], $_POST["t2p1"], $_POST["t2p2"]);

	if (!unique($players)) {
		view("addgame", array('error' => "Valitse neljä eri pelaajaa"));		
	}
	
	if (!scoreOfTen($_POST["t1p1score"], $_POST["t1p2score"], $_POST["t2p1score"], $_POST["t2p2score"])) {
		view("addgame", array('error' => "Jommankumman joukkueen yhteispistemäärän pitäisi oll vähintään 10."));
	}
	
	$team1 = getTeam($_POST["t1p1"], $_POST["t1p2"]);
	$team2 = getTeam($_POST["t2p1"], $_POST["t2p2"]);

	$gameid = addGame($team1, $team2, $_POST["date"], $_POST["venue"]);
	$players = array("t1p1", "t1p2", "t2p1", "t2p2");
	foreach ($players as $pl) {
		addIndivScore($gameid, $_POST[$pl], $_POST[$pl.'score'], $_POST[$pl.'drink']);

	}
	view("addgame", array('error' => "Peli lisätty"));
