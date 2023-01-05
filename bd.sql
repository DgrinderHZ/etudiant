CREATE SCHEMA etti_db;

CREATE TABLE etudiant(
    cin varchar(10) NOT null PRIMARY KEY,
    nom varchar(30) not null,
    prenom varchar(30) not null,
    date_naissance DATE not null,
    email varchar(30) not null UNIQUE,
    passwword varchar(250) NOT null
);


-- Reuete d'insertion
use etti_db;
INSERT INTO etudiant(cin,nom,prenom,date_naissance,email,passwword)
VALUES ('UC1566554','Hassan','Lai','2022-01-01','hass@zek.com','hdfghfgf');

$sql = "UPDATE etudiant 
                SET nom='$nom', prenom='$prenom', 
                    date_naissance='$date_naissance', email='$email'
                WHERE cin='$cin'";