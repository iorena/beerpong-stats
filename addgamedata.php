<?php
	require_once './libs/functions.php';
	
	

	if (!unique(array($_POST["t1p1"], $_POST["t1p2"], $_POST["t2p1"], $_POST["t2p2"]))) {
		view("addgame", array('error' => "Valitse neljä eri pelaajaa"));		
	}
	
	if (!scoreOfTen($_POST["t1p1score"], $_POST["t1p2score"], $_POST["t2p1score"], $_POST["t2p2score"])) {
		view("addgame", array('error' => "Jommankumman joukkueen yhteispistemäärän pitäisi oll vähintään 10."));
	}

	$gameid = addGame();

	foreach ($players as $pl) {
		addIndivScore($_POST[$pl.'score'], $_POST[$pl.'drink']);

	}
