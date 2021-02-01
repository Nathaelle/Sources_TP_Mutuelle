<?php

namespace Models;

class Formule extends DbConnect {

    private $idFormule;
    private $nom;
    private $tarif;
    private $image;

    function getIdFormule(): ?int {
        return $this->idFormule;
    }

    function getNom(): ?string {
        return $this->nom;
    }

    function getTarif(): ?float {
        return $this->tarif;
    }

    function getImage(): ?string {
        return $this->image;
    }

    function setIdFormule(int $id) {
        $this->idFormule = $id;
    }

    function setNom(string $nom) {
        $this->nom = $nom;
    }

    function setTarif(float $tarif) {
        $this->tarif = $tarif;
    }

    function setImage(string $img) {
        $this->image = $img;
    }

    function insert(){

        $query = "INSERT INTO formules (nom, tarif_base, image) VALUES(:nom, :tarif, :img);";
        $this->connect();
        $result = $this->pdo->prepare($query);

        $result->bindValue("nom", $this->nom, \PDO::PARAM_STR);
        $result->bindValue("tarif", $this->tarif, \PDO::PARAM_STR);
        $result->bindValue("img", $this->image, \PDO::PARAM_STR);

        if(!$result->execute())
            var_dump($result->errorInfo());
    }

    function update(){}

    function delete(){

        $query = "DELETE FROM formules WHERE id_formule = :id;";
        $this->connect();
        $result = $this->pdo->prepare($query);

        $result->bindValue("id", $this->idFormule, \PDO::PARAM_INT);

        $result->execute();
    }

    function select(){}

    function selectAll(){

        $query = "SELECT id_formule, nom, tarif_base, image FROM formules;";
        $this->connect();
        $result = $this->pdo->prepare($query);

        $result->execute();

        return $result->fetchAll();

    }
}