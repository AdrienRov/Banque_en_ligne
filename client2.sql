drop table client2;

CREATE TABLE client2
       (idf 	 SERIAL  PRIMARY KEY,
        nom 	varchar(10),
        mdp text NOT NULL,
        argent FLOAT(10) 
       );
