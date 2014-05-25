CREATE TABLE players
(
PlayerID SERIAL PRIMARY KEY,
LoginName VARCHAR(15),
FirstName VARCHAR(15),
LastName VARCHAR(20),
AdminStatus VARCHAR(1) 
);

CREATE TABLE teams 
(
TeamID SERIAL PRIMARY KEY,
Player1 INTEGER REFERENCES players(PlayerID) ON DELETE CASCADE,
Player2 INTEGER REFERENCES players(PlayerID) ON DELETE CASCADE,
TeamName VARCHAR(20)
);

CREATE TABLE games 
(
GameID SERIAL PRIMARY KEY,
Team1 INTEGER REFERENCES teams(TeamID) ON DELETE CASCADE,
Team2 INTEGER REFERENCES teams(TeamID) ON DELETE CASCADE,
GameDate TIMESTAMP

);

CREATE TABLE drinks
(
DrinkID SERIAL PRIMARY KEY,
DrinkName VARCHAR(20)
);



CREATE TABLE venues
(
VenueID SERIAL PRIMARY KEY,
VenueName VARCHAR(30)
);

CREATE TABLE indivscores
(
ScoreID SERIAL PRIMARY KEY,
Game INTEGER REFERENCES games(GameID) ON DELETE CASCADE,
Player INTEGER REFERENCES players(PlayerID) ON DELETE CASCADE,
Score INTEGER,
Drink INTEGER REFERENCES drinks(DrinkID) ON DELETE CASCADE
);

CREATE TABLE drinkprices
(
DrinkID INTEGER REFERENCES drinks(DrinkID) ON DELETE CASCADE,
Venue INTEGER REFERENCES venues(VenueID) ON DELETE CASCADE,
DrinkPrice DECIMAL(2,1)
);