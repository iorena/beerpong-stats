<?php
	require_once 'yhteys.php';
	
	function addIndivScore($game, $playerid, $score, $drink, $win) {
		$connection = getConnection();
		$sql = "INSERT INTO indivscores (game, player, score, drink, win)
		VALUES (?, ?, ?, ?, ?);";
		$query = $connection->prepare($sql);
		$query->execute(array($game, $playerid, $score, $drink, $win));
	}

	function addGame($team1, $team2, $date, $venue, $info) {

		$connection = getConnection();
		$sql = "INSERT INTO games (gameid, team1, team2, gamedate, venue, info)
		VALUES ((SELECT MAX(gameid) FROM games) + 1, ?, ?, ?, ?, ?) RETURNING gameid;";
		$query = $connection->prepare($sql);
		$query->execute(array($team1, $team2, $date, $venue, $info));
		return $query->fetchColumn();

	}


	function getGameScore($game, $id) {
		$connection = getConnection();
		$sqlopponent = "SELECT SUM(score) FROM indivscores WHERE game = ? AND player != ? AND player NOT IN (SELECT player1 FROM teams, games WHERE gameid = ? AND teamid = team1 OR teamid = team2 AND player2 = ?) AND player NOT IN (SELECT player2 FROM teams, games WHERE gameid = ? and teamid = team1 OR teamid = team2 AND player1 = ?)";
		$query = $connection->prepare($sqlopponent);
		$query->execute(array($game, $id, $game, $id, $game, $id));
		$opponentscore = $query->fetchColumn();
		$sql = "SELECT SUM(score) FROM indivscores WHERE game = ? AND (player = ? OR player IN (SELECT player1 FROM teams, games WHERE gameid = ? AND (teamid = team1 OR teamid = team2) AND player2 = ?) OR player IN (SELECT player2 FROM teams, games WHERE gameid = ? AND (teamid = team1 OR teamid = team2) AND player1 = ?))";
		$connection = getConnection();
		$query = $connection->prepare($sql);
		$query->execute(array($game, $id, $game, $id, $game, $id));
		$score = $query->fetchColumn();
		return $score.'-'.$opponentscore;
	
	}
 

	function getGames($id, $number) {
		$connection = getConnection();
		$sql = "SELECT gameid, team1, team2, gamedate, venue, info FROM games WHERE ? IN (SELECT player1 FROM teams, games WHERE team1 = teamid OR team2 = teamid) OR ? IN (SELECT player2 FROM teams, games WHERE team1 = teamid OR team2 = teamid) ORDER BY gamedate";
		$query = $connection->prepare($sql);
		if ($query->execute(array($id, $id))) {
			$games = array_slice($query->fetchAll(), 0, $number);
			$gameobjs = array();
			for ($i = 0; $i < count($games); $i++) {
				$gameobjs[$i] = new Game($games[$i]["gameid"], $games[$i]["team1"], $games[$i]["team2"], $games[$i]["gamedate"], $games[$i]["venue"], $games[$i]["info"]);
			}
			return $gameobjs;
		}
		return null;

	}

	function getGame($id) {
		$connection = getConnection();
		$sql = "SELECT gameid, team1, team2, gamedate, venue, info FROM games WHERE gameid = ?";
		$query = $connection->prepare($sql);
		$query->execute(array($id));
		$game = $query->fetch();
		$gameobj = new Game($game["gameid"], $game["team1"], $game["team2"], $game["gamedate"], $game["venue"], $game["info"]);
		return $gameobj;	
	}

	function deleteGame($gameid) {
		$connection = getConnection();
		$sql = "DELETE FROM games WHERE gameid = ?;";
		$query = $connection->prepare($sql);
		$query->execute(array($gameid));
		$sql = "DELETE FROM indivscores WHERE game = ?;";
		$query = $connection->prepare($sql);
		$query->execute(array($gameid));

	}


	function changeVenue($gameid, $venue) {
		$connection = getConnection();
		$sql = "UPDATE games SET venue = ? WHERE gameid = ?;";
		$query = $connection->prepare($sql);
		$query->execute(array($venue, $gameid));
	}
