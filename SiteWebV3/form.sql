CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site`;
CREATE TABLE utilisateurs(
   id INT AUTO_INCREMENT,
   nom VARCHAR(100) NOT NULL,
   prenom VARCHAR(100) NOT NULL,
   email VARCHAR(100) NOT NULL,
   password TEXT NOT NULL,
   ip VARCHAR(20) NOT NULL,
   token TEXT NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE formulaire(
   id_sedia INT AUTO_INCREMENT,
   nom_sedia VARCHAR(42),
   prenom_sedia VARCHAR(42),
   mail_sedia VARCHAR(42),
   phone_sedia INT,
   dateNaissance_sedia DATE,
   lieuNaissance_sedia VARCHAR(42),
   objetSocial_sedia VARCHAR(42),
   prenomParents_sedia VARCHAR(42),
   nomParents_sedia VARCHAR(42),
   id INT ,
   PRIMARY KEY(id_sedia),
   FOREIGN KEY(id) REFERENCES utilisateurs(id)
);
