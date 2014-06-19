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
	
	function allPoints($id) {
		$connection = getConnection();
		$sql = "SELECT SUM(score) FROM indivscores WHERE player = ?";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id))) {
			$result = $query->fetchColumn();
			return $result;
		}
		return 0;
	}

	function gamesWon($id) {
		$connection = getConnection();
		$sql = "SELECT COUNT(game) FROM indivscores WHERE player = ? AND win = '1'";
		$query = $connection->prepare($sql);
		$query->execute(array($id));
		$result = $query->fetchColumn();
		return $result;
	}

	function winLoseRate($id) {
		return gamesWon($id) / getTotalGames($id) * 100;
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
		$connection = getConnection();
		$sql = "SELECT drinkname FROM indivscores, drinks WHERE player = ? AND drink = drinkid GROUP BY drinkname ORDER BY COUNT(drinkname)";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id))) {
			return $query->fetchColumn();
		}
		return "ilmainen";
	}

	function moneySpent($id) {
		$connection = getConnection();
		$sql = "SELECT SUM(drinkprice) FROM indivscores, drinkprices, games WHERE player = ? AND drink = drinkid AND games.venue = drinkprices.venue AND game = gameid";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id))) {
			$result = $query->fetchColumn();
			return $result * 3;
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
