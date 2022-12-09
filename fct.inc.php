<?php
    require ("DB.inc.php");

    function entete($titre) 
    {
        echo "<html>
        <head>
        <title>$titre</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"site.css\">
        </head>
        <body>";
    }


    function pied() 
    {
        echo "</body>
        </html>";
    }
?>