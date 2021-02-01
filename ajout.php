<?php

require "models/DbConnect.php";
require "models/Utilisateur.php";

// 1. Je crée un utilisateur "concret"
// $user = new Models\Utilisateur();

// // 2. On lui donne un email et un mot de passe
// $user->setEmail("hahaha@gmail.com");
// $user->setMotDePasse(password_hash("test", PASSWORD_DEFAULT));

// // 3. On utilise sa méthode insert pour l'enregistrer
// $user->insert();