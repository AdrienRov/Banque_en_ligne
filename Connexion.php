<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
    include("model/fct.inc.php");

    entete("Connexion");

    if( isset($_POST['mdp']) && isset($_POST['mail']) )
    {
        if(verifClient($_POST['mail'],$_POST['mdp']))
        {
            $db = DB::getInstance();
            session_start();
            $_SESSION['mail'] = $_POST['mail'];
            header("Location: ./MonCompte.php");
            exit();
        }
        else
        {
            echo "Erreur de connexion";
            contenu();
        }
        
    }
    else
    {
        contenu();
    }
    pied();

    function verifClient($mail,$mdp)
    {
        //renvoi true si le client existe dans la base de données
        $db = DB::getInstance();
        if ($db == null) {
        echo "Impossible de se connecter &agrave; la base de donn&eacute;es !";
        }
        else {
            try {
                $db->verifClient($mail,$mdp);
                return true;
            } //fin try
            catch (Exception $e) {
                    echo $e->getMessage();
                    
            }  
            $db->close();
            return false;
        } //fin du else connexion reussie
    }

    function contenu()
    {
        echo"\t<img class=\"img-logo\" src=\"./images/BNF-Logo.png\" alt=\"Logo BNF\">";
        echo "<div class=\"conn\">";
        echo "<form action=\"Connexion.php\" method=\"post\">";
        echo "<table>";
        echo "<tr><td>Adresse mail</td><td><input type=\"text\" name=\"mail\" required /></td></tr>";
        echo "<tr><td>Mot de passe</td><td><input type=\"password\" name=\"mdp\" required /></td></tr>";
        echo "<tr><td></td><td><input type=\"submit\" value=\"Valider\" /></td></tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";
    }
?>