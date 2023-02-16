<?php
    require("data/DB.inc.php");

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
        <header>
            <nav>
                <ul>
                    <li><a href=\"Home.php\">Home</a></li>
                    <li><a href=\"Formulaire.php\">Formulaire</a></li>
                    <li><a href=\"Connexion.php\">Connexion</a></li>
                    <li><a href=\"Transaction.php\">Transaction</a></li>
                </ul>
        </header>";
    }


    function pied() 
    {
        echo "\n\t\t</body>
        </html>";
    }
?>