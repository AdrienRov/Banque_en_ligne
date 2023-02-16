<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    include("../model/fct.inc.php");

    entete("Formulaire");
    if(isset($_POST['nom']) && isset($_POST['mdp']) && isset($_POST['prenom']) && isset($_POST['numero']) && isset($_POST['mail']))
    {
        insertClient($_POST['nom'],$_POST['prenom'],$_POST['numero'],$_POST['mail'],$_POST['mdp']);
        header("Location: ListeDesClients.php");
    }
    else
    {
        contenu();
    }
    
    pied();

    //fonction qui insert un client dans la base de données
    function insertClient($nom,$prenom,$numero,$mail,$mdp)
    {
        $db = DB::getInstance();
        if ($db == null) {
        echo "Impossible de se connecter &agrave; la base de donn&eacute;es !";
        }
        else {
            try {
                $db->insertClient($nom,$prenom,$numero,$mail,$mdp);
            } //fin try
            catch (Exception $e) {
                    echo $e->getMessage();
            }  
            $db->close();
        } //fin du else connexion reussie
    }
    function contenu()
    {
        //formulaire pour ajouter un client
        echo"<img class=\"img-logo\" src=\"../images/BNF-Logo.png\" alt=\"Logo BNF\">";

        echo "<div class=\"form\">";
        echo "<form action=\"Formulaire.php\" method=\"post\">";
        echo "<table>";
        echo "<tr><td>Nom</td><td><input type=\"text\" name=\"nom\" required /></td></tr>";
        echo "<tr><td>Prénom</td><td><input type=\"text\" name=\"prenom\" required /></td></tr>";
        echo "<tr><td>Numéro de téléphone</td><td><input type=\"text\" name=\"numero\" required /></td></tr>";
        echo "<tr><td>Adresse mail</td><td><input type=\"text\" name=\"mail\" required /></td></tr>";
        echo "<tr><td>Mot de passe</td><td><input type=\"password\" name=\"mdp\" required /></td></tr>";
        echo "<tr><td></td><td><input type=\"submit\" value=\"Valider\" /></td></tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";

    }
?>