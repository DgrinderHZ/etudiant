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
    password VARCHAR(255) NOT NULL,
    id_type Integer,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_type) REFERENCES type_user(id)
);


-- Reuete d'insertion
use etti_db;
INSERT INTO etudiant(cin,nom,prenom,date_naissance,email,passwword)
VALUES ('UC1566554','Hassan','Lai','2022-01-01','hass@zek.com','hdfghfgf');

