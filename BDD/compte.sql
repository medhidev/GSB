-- Creations des comptes de la base de données
CREATE USER 'AdminGSB'@'localhost' IDENTIFIED BY 'adminpassword';
CREATE USER 'UserGSB'@'localhost' IDENTIFIED BY 'gsbpassword';

-- droit utilsateur BDD
GRANT SELECT, DELETE, INSERT, UPDATE ON gsb.* TO 'AdminGSB'@'localhost';
GRANT SELECT, DELETE, INSERT, UPDATE ON gsb.visiteur TO 'UserGSB'@'localhost';