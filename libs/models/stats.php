<?php
	require_once 'yhteys.php';
		

	function getPlayerName($id) {
		$connection = getConnection();
		$sql = "SELECT firstname, lastname FROM players WHERE playerid = ?";
		$query = $connection->prepare($sql);
		$query->execute(array($id));
		$result = $query->fetchObject();
		return $result->firstname.' '.$result->lastname;
	}

	function gamesPlayed($id) {
		$connection = getConnection();
		$sql = "SELECT COUNT(gameid) AS gamecount FROM games WHERE Team1 IN (SELECT teamid FROM teams WHERE ? IN (teams.player1, teams.player2)) OR Team2 IN (SELECT teamid FROM teams WHERE ? IN (teams.player1, teams.player2))";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id, $id))) {
			$result = $query->fetchColumn();	
		}
		if ($result == null) {
			return 0;
		}
		return $result;
	}
	
	function averagePoints($id) {
		$connection = getConnection();
		$sql = "SELECT SUM(score) FROM indivscores WHERE player = ?";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id))) {
			$result = $query->fetchColumn();
			return gamesPlayed($id) / $result;
		}
		return 0;
	}

	function winLoseRate($id) {
		return 0;
	}
	function bestPoints($id) {
		return 0;
	}
	function worstPoints($id) {
		return 0;
	}
	function favDrink($id) {
		return "ilmainen";
	}
	function moneySpent($id) {
		$connection = getConnection();
		return 0;
	}	
