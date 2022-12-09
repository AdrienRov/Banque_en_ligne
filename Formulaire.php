<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    include("fct.inc.php");

    entete("Liste des clients");
    if(isset($_POST['nom']) && isset($_POST['mdp']))
    {
        insertClient($_POST['nom'],$_POST['mdp']);
        header("Location: ListeDesClients.php");
    }
    else
    {
        contenu();
    }
    
    pied();

    //fonction qui insert un client dans la base de données
    function insertClient($nom,$mdp)
    {
        $db = DB::getInstance();
        if ($db == null) {
        echo "Impossible de se connecter &agrave; la base de donn&eacute;es !";
        }
        else {
            try {
                $db->insertClient($nom,$mdp);
            } //fin try
            catch (Exception $e) {
                    echo $e->getMessage();
            }  
            $db->close();
        } //fin du else connexion reussie
    }
    function contenu()
    {
        //faire un formulaire pour ajouter un client
        echo "<form action=\"Formulaire.php\" method=\"post\">";
        echo "<table>";
        echo "<tr><td>nom</td><td><input type=\"text\" name=\"nom\" required /></td></tr>";
        echo "<tr><td>mdp</td><td><input type=\"password\" name=\"mdp\" required /></td></tr>";
        echo "<tr><td><input type=\"submit\" value=\"Ajouter\" /></td></tr>";
        echo "</table>";
        echo "</form>";

    }
?>