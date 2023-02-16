<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    include("model/fct.inc.php");
    
    entete("Liste des clients");
    contenu();
    pied();

    function contenu()
    {
        $db = DB::getInstance();
        if ($db == null) {
        echo "Impossible de se connecter &agrave; la base de donn&eacute;es !";
        }
        else {
            try {
            
            //afficher un tableau avec les produits
            $t = $db->getClients();
            echo "<table border=1>";
            echo "<tr><th>id</th><th>nom</th><th>Prénom</th><th>Numéro</th><th>Mail</th><th>mdp</th><th>argent</th></tr>";
            foreach ($t as $p) {
                echo "<tr>";
                echo "<td>".$p->getIdf()."</td>";
                echo "<td>".$p->getNom()."</td>";
                echo "<td>".$p->getPrenom()."</td>";
                echo "<td>".$p->getNumero()."</td>";
                echo "<td>".$p->getMail()."</td>";
                echo "<td>".$p->getMdp()."</td>";
                echo "<td>".$p->getArgent()."</td>";
                echo "</tr>";
            }
            echo "</table>";

        } //fin try
        catch (Exception $e) {
                echo $e->getMessage();
        }  
        $db->close();
        } //fin du else connexion reussie
    }
    
?>
