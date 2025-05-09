DROP TABLE IF EXISTS USERS;
DROP TABLE IF EXISTS CLICS;


CREATE TABLE USERS (
  idUsr INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  ip varchar(50) NOT NULL
);


-- Création de la table Clics
CREATE TABLE CLICS (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_clics INT DEFAULT 0,
    ip varchar(45) NOT NULL,
    psdo varchar(15) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(idUse) ON DELETE CASCADE
);



