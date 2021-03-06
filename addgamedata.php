<?php
	require_once './libs/functions.php';
	require_once './libs/models/games.php';
	require_once './libs/models/teams.php';
	
	$players = array($_POST["t1p1"], $_POST["t1p2"], $_POST["t2p1"], $_POST["t2p2"]);

	if (!unique($players)) {
		view("addgame", array('venue' => $_POST["venue"], 'error' => "Valitse neljä eri pelaajaa"));		
	}
	
	if (!scoreOfTen($_POST["t1p1score"], $_POST["t1p2score"], $_POST["t2p1score"], $_POST["t2p2score"])) {
		view("addgame", array('venue' => $_POST["venue"], 't1p1' => $_POST["t1p1"], 't1p2' => $_POST["t1p2"], 't2p1' => $_POST["t2p1"], 't2p2' => $_POST["t2p2"], 'error' => "Jommankumman joukkueen yhteispistemäärän pitäisi olla vähintään 10."));
	}
	
	if (strlen($_POST["info"]) > 500) {
		view("addgame", array('venue' => $_POST["venue"], 'error' => "Lisätietoja-kentän maksimipituus on 500 merkkiä"));	
	}

	$team1 = getTeam($_POST["t1p1"], $_POST["t1p2"]);
	$team2 = getTeam($_POST["t2p1"], $_POST["t2p2"]);

	$gameid = addGame($team1, $team2, $_POST["date"], $_POST["venue"], $_POST["info"]);
	$players = array("t1p1", "t1p2", "t2p1", "t2p2");
	if ($_POST["t1p1score"] + $_POST["t1p2score"] > 9) {
		$win = array("t1p1" => '1', "t1p2" => '1', "t2p1" => '0', "t2p2" => '0');
	} else {
		$win = array("t1p1" => '0', "t1p2" => '0', "t2p1" => '1', "t2p2" => '1');
	}

	foreach ($players as $pl) {
		addIndivScore($gameid, $_POST[$pl], $_POST[$pl.'score'], $_POST[$pl.'drink'], $win[$pl]);

	}
	view("addgame", array('error' => "Peli lisätty"));
