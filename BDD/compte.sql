--
-- Compte d'accès aux BDD et aux Tables
--

-- Creations des comptes de la base de données
CREATE USER 'Admin'@'localhost' IDENTIFIED BY 'adminpassword';
GRANT SELECT, DELETE, INSERT, UPDATE ON saisies.* TO 'Admin'@'localhost';

CREATE USER 'User'@'localhost' IDENTIFIED BY 'userpassword';
GRANT SELECT, INSERT ON compte.* TO 'User'@'localhost';
GRANT SELECT, INSERT ON infos.* TO 'User'@'localhost';