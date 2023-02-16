drop table client2;

CREATE TABLE client2
       (idf 	 SERIAL  PRIMARY KEY,
        nom 	varchar(10),
        prenom varchar(10),
        numero varchar(10),
        mail 	varchar(255),
        mdp text NOT NULL,
        argent FLOAT(10) NOT NULL DEFAULT 0.00
       );