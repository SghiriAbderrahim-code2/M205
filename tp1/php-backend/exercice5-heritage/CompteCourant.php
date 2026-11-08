<?php

class CompteCourant extends CompteBancaire
{
    private $decouvertAutorise;

    public function __construct($numero, $titulaire, $soldeInitial, $decouvertAutorise)
    {
        parent::__construct($numero, $titulaire, $soldeInitial);

        if ($decouvertAutorise < 0) {
            throw new Exception("Le decouvert autorise ne peut pas etre negatif.");
        }

        $this->decouvertAutorise = $decouvertAutorise;
    }

    protected function soldeDisponible()
    {
        return $this->solde + $this->decouvertAutorise;
    }

    public function getType()
    {
        return "Courant";
    }

    public function getDecouvertAutorise()
    {
        return $this->decouvertAutorise;
    }
}
