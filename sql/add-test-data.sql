INSERT INTO players (LoginName, FirstName, LastName, AdminStatus, Password)
VALUES ('iorena','Essi', 'Salmenkivi', 'a', 'tolutolu'),
('tyyppi','Kalle','Kallela','b', 'bisse'),
('kari', 'Kari', 'Grandi', 'b', 'mehu'),
('aku', 'Aku', 'Ankka', 'b', '313');

INSERT INTO drinks
VALUES (1, 'coca-cola'),
(2, 'vesi'),
(3, 'kalja');

INSERT INTO venues
VALUES(1, 'paikka1'),
(2, 'klusteri');

INSERT INTO teams (TeamID, Player1, Player2)
VALUES (1, (SELECT PlayerID FROM players
WHERE LoginName='iorena'), (SELECT PlayerID FROM players WHERE LoginName='tyyppi')),
(2, (SELECT PlayerID FROM players WHERE LoginName='aku'), (SELECT PlayerID FROM players WHERE LoginName='kari'));

INSERT INTO games(GameID, Team1, Team2, GameDate, Venue)
VALUES (1, 1, 2, '2014-05-01 00:31:00', 1),
(2, 2, 1, '2014-05-01 01:46:01', 1);

INSERT INTO drinkprices (DrinkID, Venue, DrinkPrice)
VALUES ((SELECT DrinkID FROM drinks WHERE DrinkName='kalja'), (SELECT VenueID FROM venues WHERE VenueName='klusteri'), 1.0),
((SELECT DrinkID FROM drinks WHERE DrinkName='vesi'), (SELECT VenueID FROM venues WHERE VenueName='klusteri'), 0.0),
((SELECT DrinkID FROM drinks WHERE DrinkName='coca-cola'), (SELECT VenueID FROM venues WHERE VenueName='klusteri'), 1.0);
