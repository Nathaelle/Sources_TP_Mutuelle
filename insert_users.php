<?php

require "models/Utilisateur.php";

$user = new Models\Utilisateur();

$user->setEmail("toto@gmail.com");
$user->setRole("Conseiller");
$user->setMdp(password_hash("test", PASSWORD_DEFAULT));
$user->insert();

$user->setEmail("tata@gmail.com");
$user->setRole("Conseiller");
$user->setMdp(password_hash("test", PASSWORD_DEFAULT));
$user->insert();

$user->setEmail("tutu@gmail.com");
$user->setRole("Assure");
$user->setMdp(password_hash("test", PASSWORD_DEFAULT));
$user->insert();

$user->setEmail("titi@gmail.com");
$user->setRole("Assure");
$user->setMdp(password_hash("test", PASSWORD_DEFAULT));
$user->insert();