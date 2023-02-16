<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
    include("model/fct.inc.php");
    session_start();
    entete("Mon Compte");
    contenu();
    pied();

    function contenu()
    {
     
        //recupere l'argent du client venant d'un array vers un string
        if( isset($_SESSION['id']) )
        {
            $db = DB::getInstance();
            $argent = $db->getClientArgent($_SESSION['mail']);
            $argent = implode($argent);
            $argent = explode(":",$argent);
            $argent = $argent[1];

            $nom    = $db->getClientNom($_SESSION['mail']);
            $nom    = implode($nom);
            $nom    = explode(":",$nom);
            $nom    = $nom[1];
            $nom   = explode(" ",$nom);
            $nom   = $nom[1];
            echo("<div class=\"block-compte-parent\">
                    <h1 class=\"h1-moncompte\">Mon Compte</h1>
                    <p class=\"bvn-mess\">Bienvenue $nom</p>
                </div>");
                echo"
                <div class=\"block-argent\">
                    <h2 class=\"argent\">$argent €</h2>
                </div>
                ";
        }
        else
        {
            echo("<div>
                <h1>Mon Compte</h1>
                <p>Vous n'êtes pas connecté</p>
            </div>");
        }
   
    }
?>