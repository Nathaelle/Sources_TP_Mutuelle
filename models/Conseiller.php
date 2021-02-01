<?php

namespace Models;

class Conseiller extends DbConnect {

    private $id;
    private $nom;
    private $prenom;

    function getId(): ?int {
        return $this->id;
    }

    function getNom(): ?string {
        return $this->nom;
    }

    function getPrenom(): ?string {
        return $this->prenom;
    }

    function insert(){}
    function update(){}
    function delete(){}
    function select(){}
    function selectAll(){}

}