<?php

require '../model/client.inc.php';


class DB 
{
      private static $instance = null; //mémorisation de l'instance de DB pour appliquer le pattern Singleton
      private $connect=null; //connexion PDO à la base

      private function __construct() {
      	      // Connexion à la base de données
	      $connStr = 'pgsql:host=localhost port=5432 dbname=postgres'; // A MODIFIER ! 
	      try {
		  // Connexion à la base
	      	  $this->connect = new PDO($connStr, 'postgres', '20022002'); //A MODIFIER !
		  // Configuration facultative de la connexion
		  $this->connect->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); 
		  $this->connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 
	      }
	      catch (PDOException $e) {
      	      	    echo "probleme de connexion :".$e->getMessage();
		    return null;    
	      }
      }

      public static function getInstance() {
      	     if (is_null(self::$instance)) {
 	     	try { 
		      self::$instance = new DB(); 
 		} 
		catch (PDOException $e) {
			echo $e;
 		}
            } //fin IF
 	    $obj = self::$instance;

	    if (($obj->connect) == null) {
	       self::$instance=null;
	    }
	    return self::$instance;
      } //fin getInstance	 

      /************************************************************************/
      //	Methode permettant de fermer la connexion a la base de données
      /************************************************************************/
      public function close() {
      	     $this->connect = null;
      }

      
      private function execQuery($requete,$tparam,$nomClasse) {
      	     //on prépare la requête
	     $stmt = $this->connect->prepare($requete);
	     //on indique que l'on va récupére les tuples sous forme d'objets instance de Client
	     $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $nomClasse); 
	     //on exécute la requête
	     if ($tparam != null) {
	     	$stmt->execute($tparam);
	     }
	     else {
	     	$stmt->execute();
	     }
	     //récupération du résultat de la requête sous forme d'un tableau d'objets
	     $tab = array();
	     $tuple = $stmt->fetch(); //on récupère le premier tuple sous forme d'objet
	     if ($tuple) {
	     	//au moins un tuple a été renvoyé
     	      	 while ($tuple != false) {
		       $tab[]=$tuple; //on ajoute l'objet en fin de tableau
      	    	       $tuple = $stmt->fetch(); //on récupère un tuple sous la forme
						//d'un objet instance de la classe $nomClasse	       
    		 } //fin du while	           	     
             }
	     return $tab;    
      }
  
      private function execMaj($ordreSQL,$tparam) {
      	     $stmt = $this->connect->prepare($ordreSQL);
	     $res = $stmt->execute($tparam); //execution de l'ordre SQL      	     
	     return $stmt->rowCount();
      }
      
      public function getClients() {
      	    $requete = 'select * from client2';
	    return $this->execQuery($requete,null,'Client');
      }   
		  
      //Methodes pour achat
      public function getClientsAdr($adr) {
      	     $requete = 'select * from client2 where ville = ?';
	     return $this->execQuery($requete,array($adr),'Client');
      }

      public function getClientNom($mail)
      {
        $requete = 'select nom from client2 where mail = ?';
        $tparam = array($mail);
        return $this->execQuery($requete,$tparam,'Client');
      }

      public function getClient($idcli) {
      	     $requete = 'select * from client2 where ncli = ?';
	     return $this->execQuery($requete,array($idcli),'Client');
      }

      public function getClientArgent($mail) {
        $requete = 'select argent from client2 where mail = ?';
        $tparam = array($mail);
        return $this->execQuery($requete,$tparam,'Client');
        
      }

      public function insertClient($nom,$prenom,$numero,$mail,$mdp) {
      	     $requete = 'insert into client2 (nom,prenom,numero,mail,mdp) values (?,?,?,?,?)'; 
	     $tparam = array($nom,$prenom,$numero,$mail,$mdp);
	     return $this->execMaj($requete,$tparam);
      }

      public function verifClient($mail,$mdp) {
      	     $requete = 'select * from client2 where mail = ? and mdp = ?'; 
        $tparam = array($mail,$mdp);
        return $this->execQuery($requete,$tparam,'Client');
      }
      
      public function getIdClient($mail) {
      	     $requete = 'select idf from client2 where mail = ?'; 
        $tparam = array($mail);
        return $this->execQuery($requete,$tparam,'Client');
      }

      public function updateAdrClient($idcli,$adr) {
      	     $requete = 'update client2 set ville = ? where ncli = ?';
	     $tparam = array($adr,$idcli);
	     return $this->execMaj($requete,$tparam);
      }

      public function updateArgentClient($idcli,$arg) {
        $requete = 'update client2 set argent = ? where ncli = ?';
        $tparam = array($arg,$idcli);
        return $this->execMaj($requete,$tparam);
      }
      
      public function deleteClient($idcli) {
      	     $requete = 'delete from client2 where ncli = ?';
	     $tparam = array($idcli);
	     return $this->execMaj($requete,$tparam);
      }

      
        
      
        

} //fin classe DB

?>