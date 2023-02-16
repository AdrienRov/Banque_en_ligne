<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    include("../model/fct.inc.php");

    entete("Transaction");

    pied();

    function contenu()
    {
        echo("<div><h1>Transaction</h1></div>");
    }
?>