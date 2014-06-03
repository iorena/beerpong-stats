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

	function getTotalGames() {
		$connection = getConnection();
		$sql ="SELECT COUNT(gameid) FROM games";
		$query = $connection->prepare($sql);
		if ($query->execute()) {
			return $query->fetchColumn();
		}
		return 0;
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
		$connection = getConnection();
		$sql = "SELECT MAX(score) FROM indivscores WHERE player = ?";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id))) {
			$result = $query->fetchColumn();
			return $result;
		}
	}

	function worstPoints($id) {
		$connection = getConnection();
		$sql = "SELECT MIN(score) FROM indivscores WHERE player = ?";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id))) {
			$result = $query->fetchColumn();
			return $result;
		}
	}
	function favDrink($id) {
		return "ilmainen";
	}
	function moneySpent($id) {
		$connection = getConnection();
		$sql = "SELECT SUM(drinkprice) * 3 * COUNT(indivscores.game) FROM indivscores, games, drinkprices WHERE player = ? AND indivscores.game = games.gameid AND drinkprices.venue = games.venue";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id))) {
			$result = $query->fetchColumn();
			return $result;
		}
		return 0;
	}	

	function getTotalPoints() {
		$connection = getConnection();
		$sql = "SELECT SUM(score) as points FROM indivscores";
		$query = $connection->prepare($sql);
		if ($query->execute()) {
			return $query->fetchColumn();
		}
		return 0;

	}
