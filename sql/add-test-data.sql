INSERT INTO players (LoginName, FirstName, LastName, AdminStatus)
VALUES ('iorena','Essi', 'Salmenkivi', 'a'),
('tyyppi','Kalle','Kallela','b');

INSERT INTO drinks
VALUES (1, 'coca-cola'),
(2, 'vesi'),
(3, 'kalja');

INSERT INTO venues
VALUES(1, 'paikka1'),
(2, 'klusteri');

INSERT INTO teams (TeamID, Player1, Player2)
VALUES (1, (SELECT PlayerID FROM players
WHERE LoginName='iorena'), (SELECT PlayerID FROM players WHERE LoginName='tyyppi'));

INSERT INTO drinkprices (DrinkID, Venue, DrinkPrice)
VALUES ((SELECT DrinkID FROM drinks WHERE DrinkName='kalja'), (SELECT VenueID FROM venues WHERE VenueName='klusteri'), 1.0),
((SELECT DrinkID FROM drinks WHERE DrinkName='vesi'), (SELECT VenueID FROM venues WHERE VenueName='klusteri'), 0.0);
