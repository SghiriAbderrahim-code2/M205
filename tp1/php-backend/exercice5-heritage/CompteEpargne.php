<?php

class CompteEpargne extends CompteBancaire
{
    const SOLDE_MINIMUM = 100;

    private $taux;

    public function __construct($numero, $titulaire, $soldeInitial, $taux)
    {
        parent::__construct($numero, $titulaire, $soldeInitial);

        if ($taux < 0 || $taux > 100) {
            throw new Exception("Le taux doit etre compris entre 0 et 100.");
        }

        $this->taux = $taux;
    }

    protected function soldeDisponible()
    {
        $disponible = $this->solde - self::SOLDE_MINIMUM;
        if ($disponible < 0) {
            $disponible = 0;
        }
        return $disponible;
    }

    public function getType()
    {
        return "Épargne";
    }

    public function ajouterInterets()
    {
        $interets = $this->solde * $this->taux / 100;
        if ($interets > 0) {
            $this->deposer($interets);
        }
    }

    public function getTaux()
    {
        return $this->taux;
    }
}
