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
	
	function getTeamID($game, $id) {
		$connection = getConnection();
		$sql = "SELECT teamid FROM teams, games WHERE teamid = team1 OR teamid = team2 AND gameid = ? AND ? != player1 AND ? != player2";
		$query = $connection->prepare($sql);
		$query->execute(array($game, $id, $id));
		return $query->fetchColumn();

	}

	function getTeamName($teamid) {
		$connection = getConnection();
		$sql = "SELECT teamname, player1, player2 FROM teams WHERE teamid = ?";
		$query = $connection->prepare($sql);
		$query->execute(array($teamid));
		$result = $query->fetch();
		if ($result["teamname"] != null) {
			return $result["teamname"];
		}
		$p1 = $result["player1"];
		$p2 = $result["player2"];
		return getTeammate($teamid, $p1).' + '.getTeammate($teamid, $p2);	
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

	
	function getTeam($p1, $p2) {
		$connection = getConnection();
		$sql = "SELECT teamid FROM teams WHERE (? = player1 AND ? = player2) OR (? = player2 and ? = player1)";				
		$query = $connection->prepare($sql);
		if ($query->execute(array($p1, $p2, $p1, $p2))) {
			$result = $query->fetchColumn();
			if ($result == null) {
				return addTeam($p1, $p2);
			}
			return $result;

		}
		return null;

	}

	function addTeam($p1, $p2) {
		$connection = getConnection();
		$sql = "INSERT INTO teams (teamid, player1, player2) VALUES ((SELECT MAX(teamid) FROM teams) + 1, ?, ?) RETURNING teamid;";
		$query = $connection->prepare($sql);
		if ($query->execute(array($p1, $p2))) {
			$result = $query->fetchColumn();
			return $result;
		}
	}
	
	function getTeamGames($teamid) {
		$connection = getConnection();
		$sql = "SELECT COUNT(gameid) FROM games WHERE ? = Team1 OR ? = Team2";
		$query = $connection->prepare($sql);
		if ($query->execute(array($teamid, $teamid))) {
			return $query->fetchColumn();
		}
	}

	function setTeamName($name, $id) {
		$connection = getConnection();
		$sql = "UPDATE teams
		SET teamname = ?
		WHERE teamid = ?;";
		$query = $connection->prepare($sql);
		$query->execute(array($name, $id));

	}

	function getTeamWinLose($id, $teamid) {
		$connection = getConnection();
		$sql = "SELECT COUNT(gameid) FROM games, indivscores WHERE (team1 = ? OR team2 = ?) AND game = gameid AND player = ? AND win = '1'";
		$query = $connection->prepare($sql);
		$query->execute(array($teamid, $teamid, $id));
		$wongames = $query->fetchColumn();
		return $wongames / getTeamGames($teamid) * 100;

	}

