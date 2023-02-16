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

           echo("<div>
                <h1>Mon Compte</h1>
                <p>Vous êtes connecté</p>
                <p>Vous avez ".$argent." euros</p>
            </div>");
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