CREATE VIEW IF NOT EXISTS showReviews AS
SELECT g.id as gericht_id, b2.name AS user,
           b.description AS description, b.stern AS stern
FROM gericht g JOIN bewertung b on g.id = b.gericht_id
    JOIN benutzer b2 on b2.id = b.benutzer_id
WHERE hervorgehoben = true ;

CREATE VIEW IF NOT EXISTS ownReviews AS
SELECT b.benutzer_id AS benutzerID,b.bewertung_id AS bewertung_id,
       b2.name AS user, g.name AS gerichtname, b.description AS description,
           b.stern AS stern
FROM gericht g JOIN bewertung b on g.id = b.gericht_id
    JOIN benutzer b2 on b.benutzer_id = b2.id
ORDER BY bewertung_id DESC;

CREATE VIEW IF NOT EXISTS showLast30 AS
SELECT b2.name AS user, g.name AS gerichtname,
       b.description AS description, b.stern AS stern,
       b.gericht_id AS gerichtID, b.bewertung_id AS bewertung_id,
       b.hervorgehoben AS hervorgehoben
FROM gericht g JOIN bewertung b on g.id = b.gericht_id
    JOIN benutzer b2 on b2.id = b.benutzer_id;
