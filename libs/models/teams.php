<?php
	require_once 'yhteys.php';
	
	function getTeams($id) {
		$connection = getConnection();
		$sql = "SELECT teamid, teamname FROM teams WHERE ? = Player1 OR ? = Player2";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id, $id))) {
			$result = $query->fetchAll();
			return $result;
		}
		return null;

	}

	function getTeammate($teamid, $id) {
		$connection = getConnection();
		$sql = "SELECT (firstname || ' ' || lastname) FROM players WHERE playerid IN (SELECT player2 FROM teams WHERE ? = teamid AND ? = player1) OR playerid IN (SELECT player1 FROM teams WHERE ? = teamid AND ? = player2)";
		$query = $connection->prepare($sql);
		if ($query->execute(array($teamid, $id, $teamid, $id))) {
			$result = $query->fetchColumn();
			return $result;	
		}
		return null;
	}
	
	function getTeamGames($teamid) {
		$connection = getConnection();
		$sql = "SELECT COUNT(gameid) FROM games WHERE ? = Team1 OR ? = Team2";
		$query = $connection->prepare($sql);
		if ($query->execute(array($teamid, $teamid))) {
			return $query->fetchColumn();
		}
	}
