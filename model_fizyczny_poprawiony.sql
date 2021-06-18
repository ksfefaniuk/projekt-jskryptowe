DROP TABLE IF EXISTS dzielo;
CREATE TABLE dzielo (
id_dzielo INT(10) NOT NULL AUTO_INCREMENT,
kategoria ENUM('horror', 'thriller', 'science fiction', 'kryminal', 'romans', 'nauka', 'psychologia', 'poezja', 'biografia', 'inna'),
tytul VARCHAR(100) NOT NULL,
autor VARCHAR(100) NOT NULL,
PRIMARY KEY (id_dzielo)
 ) ENGINE = INNODB DEFAULT CHARSET = UTF8;

INSERT INTO dzielo VALUES (1, 'psychologia','Jak nie dać sobą manipulować', 'Petitcollin Christel'), 
(2, 'horror', 'To', 'Stephen King'),
(3, 'poezja', 'Sonety krymskie', 'Adam Mickiewicz'),
(4, 'biografia', 'Egzekutor', 'Stefan Dąmbski'),
(5, 'science fiction', 'Ślepowidzenie', 'Peter Watts');

DROP TABLE IF EXISTS wydawnictwo;
CREATE TABLE wydawnictwo (
id_wyd INT(10) NOT NULL AUTO_INCREMENT,
nazwa_wyd VARCHAR(100) NOT NULL,
PRIMARY KEY (id_wyd)
 ) ENGINE = INNODB DEFAULT CHARSET = UTF8;

INSERT INTO wydawnictwo VALUES (1, 'Feeria'), 
(2, 'Mag'),
(3, 'Państwowe Wydawnictwo Naukowe'),
(4, 'Sonia Draga'),
(5, 'Hodder And Stoughton Ltd.');

DROP TABLE IF EXISTS egzemplarz;
CREATE TABLE egzemplarz (
id_egz INT(10) NOT NULL AUTO_INCREMENT,
dzielo_id INT(10) NOT NULL,
wyd_id INT(10) NOT NULL,
rok_wydania INT(10) DEFAULT NULL,
sygnatura VARCHAR(20) NOT NULL UNIQUE,
CONSTRAINT dzielo FOREIGN KEY (dzielo_id) REFERENCES dzielo(id_dzielo) ON UPDATE CASCADE,
CONSTRAINT wydawnictwo FOREIGN KEY (wyd_id) REFERENCES wydawnictwo(id_wyd) ON UPDATE CASCADE,
PRIMARY KEY (id_egz),
CONSTRAINT unEgz UNIQUE (dzielo_id, wyd_id)
 ) ENGINE = INNODB DEFAULT CHARSET = UTF8;

INSERT INTO egzemplarz VALUES (1,1,2, 2019, '514W81DGT3'), 
(2,5,3, 2017, '76SDH8720P'),
(3,4,1, 2006, '74H5J22HBP'),
(4,3,4, 1826, '22HG45HJ32'),
(5,2,5, 2010, 'HUE229U31Q');

DROP TABLE IF EXISTS studenci;
CREATE TABLE studenci (
id_student INT(10) NOT NULL AUTO_INCREMENT,
login VARCHAR(30) NOT NULL UNIQUE,
haslo VARCHAR(40) NOT NULL,
indeks INT(6) DEFAULT NULL,
imie VARCHAR(20) DEFAULT NULL,
nazwisko VARCHAR(30) DEFAULT NULL,
miasto VARCHAR(20) DEFAULT NULL,
ulica VARCHAR(30) DEFAULT NULL,
nr_domu VARCHAR(10) DEFAULT NULL,
nr_lokalu VARCHAR(10) DEFAULT NULL,
kod_pocztowy VARCHAR(10) DEFAULT NULL,
PRIMARY KEY (id_student)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

INSERT INTO studenci VALUES (1, 'jannowak123', MD5('haslohaslo123'), 123456 , 'Jan', 'Nowak', 'Wrocław', 'Świdnicka', '3', '26', '50-064'),
(2, 'patrycjakwiatek123', MD5('haslopatki123'), 824865, 'Patrycja', 'Kwiatek', 'Inowrocław', 'Kasztelańska', '8', '3', '88-110'),
(3, 'hubertmuszka', MD5('haslomuszki321'), 874412, 'Hubertus', 'Muszkus', 'Warszawa', 'Filtrowa', '9', '1', '00-001'),
(4, 'richardrichy', MD5('richhaslo'), 873152, 'Rich', 'Richard', 'Eindhoven', 'Willem Barentzstraat', '26', '-', '5612 KL'),
(5, 'grzesiupaszkiewicz', MD5('grzesiahaslo123'), 124775, 'Grzegorz', 'Paszkiewicz', 'Berlin', 'Ohmstraße', '12', '12', '10179');

DROP TABLE IF EXISTS rezerwacja;
CREATE TABLE rezerwacja (
id_rezerwacji INT(10) NOT NULL AUTO_INCREMENT,
student_id INT(10) NOT NULL,
egz_id INT(10) NOT NULL,
data_rezerwacji TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
data_odebrania TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
data_zwrocenia TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id_rezerwacji),
CONSTRAINT student FOREIGN KEY (student_id) REFERENCES studenci(id_student) ON UPDATE CASCADE,
CONSTRAINT ksiazka FOREIGN KEY (egz_id) REFERENCES egzemplarz(id_egz) ON UPDATE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

INSERT INTO rezerwacja VALUES (1, 5,2, '2020-02-01 12:25:44', NULL, NULL), (2, 3,3, '2020-03-21 16:35:04', '2020-03-23 16:35:24',NULL), 
(3, 2,1, '2019-12-30 09:11:11','2020-01-01 10:00:00',NULL), (4, 1,4, '2020-05-04 11:15:14',NULL,NULL), (5, 4,5, '2019-12-21 11:11:11', '2019-12-22 22:22:22','2019-12-28 13:31:13');

DROP TABLE IF EXISTS detal;
CREATE TABLE detal (
id_detal INT(10) NOT NULL AUTO_INCREMENT,
egz_id INT(10) NOT NULL,
rezerwacji_id INT(10) NOT NULL,
PRIMARY KEY(id_detal),
CONSTRAINT egzemplarz1 FOREIGN KEY (egz_id) REFERENCES egzemplarz(id_egz) ON UPDATE CASCADE,
CONSTRAINT rezerwacja1 FOREIGN KEY (rezerwacji_id) REFERENCES rezerwacja(id_rezerwacji) ON UPDATE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

INSERT INTO detal VALUES (1,2,1), (2,1,2), (3,3,4), (4,4,3), (5,4,5);