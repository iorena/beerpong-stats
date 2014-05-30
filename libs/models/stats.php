<?php
	require_once 'yhteys.php';
		

	function gamesPlayed($id) {
		$connection = getConnection();
		$sql = "SELECT COUNT(gameid) AS gamecount FROM games WHERE Team1 IN (SELECT teamid FROM teams WHERE $id IN (teams.player1, teams.player2)) OR Team2 IN (SELECT teamid FROM teams WHERE $id IN (teams.player1, teams.player2))";
		$query = $connection->prepare($sql);
		if ($query->execute()) {
			$result = $query->fetchColumn();	
		}
		if ($result == null) {
			return 0;
		}
		return $result;
	}
	
	function averagePoints($id) {
		$connection = getConnection();
		$sql = "SELECT SUM(score) FROM indivscores WHERE player = $id";
		$query = $connection->prepare($sql);
		if ($query->execute()) {
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
