<?php

class Banque
{
    private $comptes = [];

    public function ajouterCompte($compte)
    {
        $this->comptes[$compte->getNumero()] = $compte;
    }

    public function afficherComptes()
    {
        foreach ($this->comptes as $compte) {
            echo $compte . "<br>";
        }
    }

    public function getComptes()
    {
        return $this->comptes;
    }
}
