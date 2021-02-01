<?php
function showEspaceMembre() {
    
    return ["template" => "espacemembre.php"];
}/* ----------- Fin showEspaceMembre ------------------------------------- */

/* -------------------------------------------------------- */
function showEspaceConseiller() {
    
    return ["template" => "espaceconseiller.php"];
}/* ----------- Fin showEspaceConseiller ------------------------------------- */

/* -------------------------------------------------------- */
// function connect() {

//     //echo "Un utilisateur essaye de se connecter !";
//     require "models/DbConnect.php";
//     require "models/Utilisateur.php";

//     var_dump($_POST);

//     // 1. Je récupère les informations de connexion de l'utilisateur
//     // $_POST["email"] contient son email
//     // $_POST["passwd"] contient son mot de passe

//     // 2. Je vais voir s'il existe un utilisateur correspondant à l'adresse mail
//     $user = new Utilisateur();
//     $user->setEmail($_POST["email"]);
//     $retour = $user->selectByEmail(); //renvoie false ou un tableau
//     var_dump($retour);
    
//     // 3. Si oui, je vérifie que le mot de passe utilisé est correct
//     if($retour) {
//         /* $retour = [
//             "id_utilisateur" => 5,
//             "email" => "toto@gmail.com",
//             "mot_de_passe" => "$2y$10$3vQxau9FnuAMRxMDryiAueGIf.8UfGBQFy554v.uxH/.."
//         ] */
//         if(password_verify($_POST["passwd"], $retour["mot_de_passe"])) {

//             echo "L'utilisateur a le droit de se connecter ! ";
//             // 4. Je connecte l'utilisateur (en utilisant les sessions)

//             $_SESSION["id_utilisateur"] = $retour["id_utilisateur"];
//             $_SESSION["email"] = $retour["email"];

//             // CONNEXION OK : Je redirige vers ma page1 (utilisée en tant qu'espace membre)
//             header("Location:index.php?route=showpage1");
//             exit;
//         }
//     }

//     // CONNEXION FAILED : Je redirige vers le formulaire de connexion
//     header("Location:index.php?route=showform");
//     exit;
// }

// Fonction d'affichage : ont pour rôle de "choisir" la page à afficher
// Toujours la même structure de retour
function showHome() {

    // Divers traitements......

    return [
        "template" => "accueil.php"
    ];
}

function showConnexion() {
    
    return [
        "template" => "formconnexion.php"
    ];
}

function showMembre() {

    if(!isset($_SESSION["id_utilisateur"])) {
        header("Location:index.php?route=home");
    }
    
    return [
        "template" => "accueilmembre.php"
    ];
}

function showConseiller() {

    $formule = new Models\Formule();
    $formules = $formule->selectAll();

    return [
        "template" => "accueilconseiller.php",
        "formules" => $formules
    ];
}

// Fonctions redirigées
function connectUser() {

    //Il envoie ses email + mot de passe
    //reçues dans $_POST["email"] et $_POST["passwd"]

    //Il s'agit de :
    //1. Vérifier s'il existe un utilisateur enregistré correspondant à l'adresse mail
    $user = new Models\Utilisateur();
    $user->setEmail($_POST["email"]);
    $verif = $user->selectByEmail();
    
    //var_dump($verif);

    //2. Vérifier, si oui, si les mots de passe coïncident
    if($verif) {
        //3. Si tout est OK, on place l'utilisateur en session
        if(password_verify($_POST["passwd"], $verif["password"])) {

            // Je peux connecter mon utilisateur
            $_SESSION["id_utilisateur"] = $verif["id_utilisateur"];
            $_SESSION["email"] = $verif["email"];

            //4. On le renvoie sur son espace perso
            header("Location:index.php?route=espacemembre");
            exit;
            
        } else {
            // Le mot de passe est incorrect
        }
    }

    //4. On le renvoie sur son espace perso

    header("Location:index.php?route=connexion");
    exit;
}

function deconnectUser() {

    $_SESSION = [];
    session_destroy();

    header("Location:index.php?route=home");
    exit;
}

function insertUser() {

    //echo "Tentative d'insertion d'un utilisateur";

    //var_dump($_POST);

    $user = new Models\Utilisateur();
    $user->setEmail($_POST["email"]);
    $user->setMdp(password_hash($_POST["passwd"], PASSWORD_DEFAULT));
    $user->setRole($_POST["role"]);
    $user = $user->insert();

    if($_POST["role"] == "Assure" && $user) {
        echo "user ok";

        $assure = new Models\Assure();
        $assure->setNumSecu("789654789654789");
        $assure->setNom("Dupont");
        $assure->setPrenom("Jean");
        $assure->setAdresse("25, rue des Lilas 84000 Avignon");
        $assure->setIdFormule(1);
        $assure->setIdConseiller(1);
        $assure->setTelephone("0625452512");
        $assure->setIdUtilisateur($user->getId());
        $assure->insert();

        var_dump($assure);

    } if($_POST["role"] == "Conseiller") {

        $conseiller = new Models\Conseiller();
    }

    //connectUser();

    //header("Location:index.php?route=connexion");
    exit;
}

function insertFormule() {

    var_dump($_POST);
    var_dump($_FILES);

    $formule = new Models\Formule();
    $formule->setNom($_POST["nom"]);
    $formule->setTarif($_POST["tarif"]);

    $uploader = new Utils\UploadImage($_FILES['image'], 500, 300);
    $formule->setImage($uploader->set_image());

    var_dump($uploader);
    var_dump($formule);

    $formule->insert();
    header("Location:index.php?route=espaceconseiller");
    exit;
}

function suppFormule() {

    $formule = new Models\Formule();
    $formule->setIdFormule($_GET["id"]);
    $formule->delete();

    header("Location:index.php?route=espaceconseiller");
    exit;
}