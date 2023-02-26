USE emensaredesigned;

CREATE TABLE IF NOT EXISTS gericht (
  id INT(8) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  description VARCHAR(800) NOT NULL,
  price DOUBLE NOT NULL,
  image VARCHAR(100) NOT NULL
);

CREATE TABLE  IF NOT EXISTS  benutzer(
     id INT(8) AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(200) NOT NULL,
     email VARCHAR(100) NOT NULL UNIQUE,
     passwort VARCHAR(200) NOT NULL,
     admin BOOLEAN NOT NULL DEFAULT false,
     anzahlfehler INT NOT NULL DEFAULT 0,
     anzahlanmeldungen INT NOT NULL DEFAULT 0,
     letzteanmeldung DATETIME,
     letzterfehler DATETIME
);

CREATE TABLE IF NOT EXISTS bewertung(
    bewertung_id INT(8) AUTO_INCREMENT PRIMARY KEY ,
    benutzer_id INT(8),
    gericht_id INT(8),
    description VARCHAR(800),
    stern VARCHAR(800),
    datum DATETIME,
    hervorgehoben BOOLEAN DEFAULT false,
    FOREIGN KEY (benutzer_id) REFERENCES benutzer(id) ON DELETE CASCADE ,
    FOREIGN KEY (gericht_id) REFERENCES  gericht(id) ON DELETE  CASCADE
);

CREATE TABLE IF NOT EXISTS newsletter(
    id INT(8) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) DEFAULT 'anonym',
    email VARCHAR(200) NOT NULL,
    phone INT(8) NULL
);

CREATE TABLE IF NOT EXISTS besucher (
    id INT(8) AUTO_INCREMENT PRIMARY KEY ,
    zahl INT(8) DEFAULT 0
);

CREATE TABLE IF NOT EXISTS members_feedback (
    id INT(8) AUTO_INCREMENT PRIMARY KEY,
    benutzer_id INT(8) REFERENCES newsletter(id),
    feedback VARCHAR(200) NOT NULL
);
