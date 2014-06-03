<?php
	require 'yhteys.php';
	
	function addIndivScore($score, $drink) {
		$connection = getConnection();
		$sql = "INSERT INTO indivscores (game, player, score, drink)
		VALUES ($game, $playerid, $score, $drink);"

	}

	function addGame($team1, $team2) {


	}
