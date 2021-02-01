<?php

namespace Models;

class Utilisateur extends DbConnect {

    private $id;
    private $email;
    private $mdp;
    private $role;

    function getId(): ?int {
        return $this->id;
    }

    function getEmail(): ?string {
        return $this->email;
    }

    function getMdp(): ?string {
        return $this->mdp;
    }

    function getRole(): ?string {
        return $this->role;
    }

    function setId(int $id) {
        $this->id = $id;
    }

    function setEmail(string $email) {
        $this->email = $email;
    }

    function setMdp(string $mdp) {
        $this->mdp = $mdp;
    }

    function setRole(string $role) {
        $this->role = $role;
    }

    function insert() {

        $query = "INSERT INTO utilisateurs (email, mot_de_passe, role) VALUES(:email, :mdp, :role);";
        $this->connect();
        $result = $this->pdo->prepare($query);

        $result->bindValue("email", $this->email, \PDO::PARAM_STR);
        $result->bindValue("mdp", $this->mdp, \PDO::PARAM_STR);
        $result->bindValue("role", $this->role, \PDO::PARAM_STR);

        if(!$result->execute()) {
            var_dump($result->errorInfo());
            $_SESSION["errors"]["bdd"] = $result->errorInfo()[2];
            return false;
        }

        $this->id = $this->pdo->lastInsertId();
        return $this;
    }

    function selectByEmail() {

        $query = "SELECT id_utilisateur, email, password FROM utilisateurs WHERE email = :email;";
        $this->connect();
        $result = $this->pdo->prepare($query);

        $result->bindValue("email", $this->email, \PDO::PARAM_STR);
        if(!$result->execute()) {
            var_dump($result->errorInfo());
            return false;
        }
        
        return $result->fetch();
    }

    function update() {}

    function delete() {}

    function select() {}

    function selectAll() {}

}