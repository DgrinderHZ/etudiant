CREATE SCHEMA etti_db;

CREATE TABLE etudiant(
    cin varchar(10) NOT null PRIMARY KEY,
    nom varchar(30) not null,
    prenom varchar(30) not null,
    date_naissance DATE not null,
    email varchar(30) not null UNIQUE,
    passwword varchar(250) NOT null
);

CREATE TABLE type_user(
    id Integer NOT null PRIMARY KEY,
    titre varchar(30) not null
);

CREATE TABLE user(
    id Integer NOT null PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    nom VARCHAR(25),
    prenom VARCHAR(25),
    tel VARCHAR(14),
    email VARCHAR(60),
    password VARCHAR(255) NOT NULL,
    id_type Integer,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_type) REFERENCES type_user(id)
);

CREATE TABLE formateurs(
    id Integer NOT null PRIMARY KEY,
    id_user Integer,
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE etudiants(
    id Integer NOT null PRIMARY KEY,
    id_user Integer,
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE formations(
    id Integer NOT null PRIMARY KEY,
    code VARCHAR(4) not null UNIQUE,
    titre varchar(150) not null,
    descrption varchar(500) not null
);

CREATE TABLE modules(
    id Integer NOT null PRIMARY KEY,
    code VARCHAR(4) not null UNIQUE,
    titre varchar(150) not null,
    descrption varchar(500) not null
);

CREATE TABLE examens(
    id Integer NOT null PRIMARY KEY,
    titre varchar(150) not null
);

CREATE TABLE enseigners(
    id_formateur Integer NOT null,
    id_module Integer NOT null,
    PRIMARY KEY (id_formateur, id_module),
    FOREIGN KEY (id_formateur) REFERENCES formateurs(id),
    FOREIGN KEY (id_module) REFERENCES modules(id)
);

CREATE TABLE contenirs(
    id_formation Integer NOT null,
    id_module Integer NOT null,
    PRIMARY KEY (id_formation, id_module),
    FOREIGN KEY (id_formation) REFERENCES formations(id),
    FOREIGN KEY (id_module) REFERENCES modules(id)
);

CREATE TABLE passers(
    id_etudiant Integer NOT null,
    id_module Integer NOT null,
    id_examen Integer not null,
    PRIMARY KEY (id_etudiant, id_module, id_examen),
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id),
    FOREIGN KEY (id_module) REFERENCES modules(id),
    FOREIGN KEY (id_examen) REFERENCES examens(id),
);
-- Reuete d'insertion
use etti_db;
INSERT INTO etudiant(cin,nom,prenom,date_naissance,email,passwword)
VALUES ('UC1566554','Hassan','Lai','2022-01-01','hass@zek.com','hdfghfgf');

