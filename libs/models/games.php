<?php
	require_once 'yhteys.php';
	
	function addIndivScore($game, $playerid, $score, $drink) {
		$connection = getConnection();
		$sql = "INSERT INTO indivscores (game, player, score, drink)
		VALUES (?, ?, ?, ?);";
		$query = $connection->prepare($sql);
		$query->execute(array($game, $playerid, $score, $drink));
	}

	function addGame($team1, $team2, $date, $venue) {

		$connection = getConnection();
		$sql = "INSERT INTO games (team1, team2, gamedate, venue)
		VALUES (?, ?, ?, ?) RETURNING gameid;";
		$query = $connection->prepare($sql);
		$query->execute(array($team1, $team2, $date, $venue));
		return $query->fetchColumn();

	}


	function getGameScore($game, $id) {
		$connection = getConnection();
		$sqlopponent = "SELECT SUM(score) FROM games, indivscores WHERE games.gameid = indivscores.gameid AND games.gameid = ? AND ? IN (SELECT player1, player2 FROM teams WHERE teamid = team1 OR teamid = team2)";
		$query = $connection->prepare($sql);
		$opponentscore = $query->execute(array($game, $id));
		$sql = "SELECT SUM(score) FROM games, indivscores WHERE games.gameid = indivscores.gameid AND games.gameid = ? AND ? NOT IN (SELECT player1, player2 FROM teams WHERE teamid = team1 OR teamid = team2)";
		$query = $connection->prepare($sql);
		$score = $query->execute(array($game, $id));
		$max = max($opponentscore, $score);
		$min = min($opponentscore, $score);
		return $max.'-'.$min;
	
	}
 

	function getGames($id, $number) {
		$connection = getConnection();
		$sql = "SELECT gameid, date FROM games, teams WHERE 

	}
