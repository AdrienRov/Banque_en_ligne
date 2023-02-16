<?php

    include("model/fct.inc.php");
    entete("Home");
    contenu();
    pied();
    
    function contenu()
    {
        echo"\n\t\t\t<div class=\"block-home\">
        \t\t<img class=\"img-logo-home\" src=\"./images/BNF-Logo.png\" alt=\"Logo BNF\">
        \t\t<h1 class=\"titre-home\">Bienvenue chez BNF</h1>     
        \t</div>   ";
    }
?>