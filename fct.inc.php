<?php
    require ("DB.inc.php");

    function entete($titre) 
    {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
        <title>$titre</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"site.css\">
        </head>
        <body>
        <img class=\"img-logo\" src=\"./images/BNF-Logo.png\" alt=\"Logo BNF\">"
        ;
    }


    function pied() 
    {
        echo "</body>
        </html>";
    }
?>