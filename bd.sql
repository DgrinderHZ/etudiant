CREATE SCHEMA etti_db;

CREATE TABLE etudiant(
    cin varchar(10) NOT null PRIMARY KEY,
    nom varchar(30) not null,
    prenom varchar(30) not null,
    date_naissance DATE not null,
    email varchar(30) not null UNIQUE,
    passwword varchar(250) NOT null
);