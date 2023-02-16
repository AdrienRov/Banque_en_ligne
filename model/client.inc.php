<?php

/*classe permettant de representer les tuples de la table client */
class Client {
      /*avec PDO, il faut que les idfs attributs soient les mêmes que ceux de la table*/
      private $idf;
      private $nom;
      private $prenom;
      private $numero;
      private $mail;
      private $mdp;
      private $argent;

      /* Les méthodes qui commencent par __ sont des methodes magiques */
      /* Elles sont appelées automatiquement par php suite à certains événements. */
      /* Ici c'est l'appel à new sur la classe qui déclenche l'exécution de la méthode */
      /* des valeurs par défaut doivent être spécifiées pour les paramètres du constructeur sinon
      	 il y aura une erreur lorsqu'il sera appelé automatiquement par PDO 
       */    
      
      public function __construct($i=1,$nom="",$prenom="",$num="",$mail="",$mdp="", $arg=0.00) 
      {
      	      $this->idf = $i;
                  $this->nom = $nom;
                  $this->prenom = $prenom;
                  $this->numero = $num;
                  $this->mail = $mail;
			$this->mdp = $mdp;
            $this->argent = $arg;
      }

      public function getIdf()      { return $this->idf;}
      public function getNom()      { return $this->nom; }
      public function getPrenom()   { return $this->prenom; }
      public function getNumero()   { return $this->numero; }
      public function getMail()     { return $this->mail; }
      public function getMdp()      { return $this->mdp; }
      public function getArgent()   { return $this->argent; }

      public function __toString() {
            return "Client : ".$this->nom." ".$this->prenom." ".$this->numero." ".$this->mail." ".$this->mdp." ".$this->argent;
	     
      }
}

//test
//$unclient = new Client(5,'Dupont','Le Havre');
//echo $unclient;
?>
