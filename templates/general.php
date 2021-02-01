<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/exemple.css">
    <title>MaMutuelle</title>
</head>
<body>
    <header id="head">
        <nav class="menu">
            <div class="logo"><img src="" alt=""></div>
            <h1>MaMutuelle</h1>
            <ul>
                <li><a href="index.php#formules?route=home">Nos offres et formules</a></li>
                <li><a href="#">Nous contacter</a></li>
                <li><a href="index.php?route=connexion">Mon espace</a></li>
            </ul>
        </nav>
        <div id="presentation">
            <div class="cover"></div>
            <div class="bg-img"></div>
        </div>
    </header>

    <!-- <nav>
        <ul>
            <li><a href="index.php?route=showhome">Accueil</a></li>
            <li><a href="index.php?route=showpage1">Page 1</a></li>
            <li><a href="index.php?route=showpage2">Page 2</a></li>
            <li><a href="index.php?route=showform">Formulaire</a></li>
        </ul>
    </nav> -->


    <!-- Affichage d'un template spécifique -->
    <?php 
        //var_dump($infos);
        require "templates/".$tab["template"]; 
        // require "templates/accueil.php";
        //require "templates/".$infos["template"];
        // require "templates/accueilmembre.php";
        // ....
    ?>


</body>
</html>
