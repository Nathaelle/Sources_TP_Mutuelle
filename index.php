<?php
session_start();

//var_dump($_SESSION);
require "utils/autoload.php";

// Front Controller (contrôlleur frontal)
//1. Fonctions de contrôle (contrôlleurs)
require "controlers.php";


//2. Router
// Paramètre "route", c'est-à-dire que j'attends TOUJOURS une route $_GET["route"]
$route = (isset($_GET["route"]))? $_GET["route"] : "espaceconseiller";
switch ($route) {

    case "home" : $tab = showHome();
    break;
    case "connexion" : $tab = showConnexion();
    break;
    case "espacemembre" : $tab = showMembre();
    break;
    case "espaceconseiller" : $tab = showConseiller();
    break;
    // on ajoutera les routes au fur et à mesure qu'on ajoutera des fonctionnalités
    case "connect" : connectUser();
    break;
    case "deconnect" : deconnectUser();
    break;
    case "insertuser" : insertUser();
    break;
    case "insertformule" : insertFormule();
    break;
    case "suppformule" : suppFormule();
    break;
    case "showespacemembre" : $tab = showEspaceMembre();
    break;
    case "showespaceconseiller" : $tab = showEspaceConseiller();
    break;
    default: $tab = showHome();
}



//3. Affichage template général
require "templates/general.php";