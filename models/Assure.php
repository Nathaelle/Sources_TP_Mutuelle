<?php

namespace Models;

class Assure extends DbConnect {

    private $numSecu;
    private $nom;
    private $prenom;
    private $adresse;
    private $telephone;

    private $idUtilisateur;
    private $idFormule;
    private $idConseiller;

    function getNumSecu(): ?string {
        return $this->numSecu;
    }

    function getNom(): ?string {
        return $this->nom;
    }

    function getPrenom(): ?string {
        return $this->prenom;
    }

    function getAdresse(): ?string {
        return $this->adresse;
    }

    function getTelephone(): ?string {
        return $this->telephone;
    }

    function getIdUtilisateur(): ?int {
        return $this->idUtilisateur;
    }

    function getIdConseiller(): ?int {
        return $this->idConseiller;
    }

    function getIdFormule(): ?int {
        return $this->idFormule;
    }

    function setNumSecu(string $num) {
        $this->numSecu = $num;
    }

    function setNom(string $nom) {
        $this->nom = $nom;
    }

    function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }

    function setAdresse(string $adresse) {
        $this->adresse = $adresse;
    }

    function setTelephone(string $tel) {
        $this->telephone = $tel;
    }

    function setIdUtilisateur(int $id) {
        $this->idUtilisateur = $id;
    }

    function setIdConseiller(int $id) {
        $this->idConseiller = $id;
    }

    function setIdFormule(int $id) {
        $this->idFormule = $id;
    }

    function insert(){

        $query = "INSERT INTO `assures`(`num_secu`, `nom`, `prenom`, `adresse`, `telephone`, `id_utilisateur`, `id_conseiller`, `id_formule`) VALUES (:num, :nom, :prenom, :adresse, :tel, :user, :conseil, :formule);";
        $this->connect();
        $result = $this->pdo->prepare($query);

        $result->bindValue("num", $this->numSecu, \PDO::PARAM_STR);
        $result->bindValue("nom", $this->nom, \PDO::PARAM_STR);
        $result->bindValue("prenom", $this->prenom, \PDO::PARAM_STR);
        $result->bindValue("adresse", $this->adresse, \PDO::PARAM_STR);
        $result->bindValue("tel", $this->telephone, \PDO::PARAM_STR);
        $result->bindValue("user", $this->idUtilisateur, \PDO::PARAM_INT);
        $result->bindValue("conseil", $this->idConseiller, \PDO::PARAM_INT);
        $result->bindValue("formule", $this->idFormule, \PDO::PARAM_INT);

        if(!$result->execute()) {
            var_dump($result->errorInfo());
        }

    }


    function update(){}
    function delete(){}
    function select(){}
    function selectAll(){}

}