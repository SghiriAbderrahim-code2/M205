<?php

class CompteBancaire
{
    const DEVISE = "MAD";
    const PLAFOND_RETRAIT = 5000;

    private $numero;
    private $titulaire;
    private $solde;

    private static $nombreComptes = 0;

    public function __construct($numero, $titulaire, $soldeInitial = 0)
    {
        if ($soldeInitial < 0) {
            throw new Exception("Le solde initial ne peut pas etre negatif.");
        }

        if (!self::estNumeroValide($numero)) {
            throw new Exception("Le numero de compte $numero est invalide.");
        }

        $this->numero = $numero;
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;

        self::$nombreComptes = self::$nombreComptes + 1;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setTitulaire($titulaire)
    {
        $titulaire = trim($titulaire);
        if ($titulaire == "") {
            throw new Exception("Le titulaire ne peut pas etre vide.");
        }
        $this->titulaire = $titulaire;
    }

    public function deposer($montant)
    {
        if ($montant <= 0) {
            throw new Exception("Le montant a deposer doit etre superieur a 0.");
        }
        $this->solde = $this->solde + $montant;
    }

    public function retirer($montant)
    {
        if ($montant <= 0) {
            throw new Exception("Le montant a retirer doit etre superieur a 0.");
        }

        if ($montant > $this->solde) {
            throw new Exception("Solde insuffisant.");
        }

        if ($montant > self::PLAFOND_RETRAIT) {
            throw new Exception("Le montant depasse le plafond de retrait.");
        }

        $this->solde = $this->solde - $montant;
    }

    public function virerVers($destinataire, $montant)
    {
        $this->retirer($montant);
        $destinataire->deposer($montant);
    }

    public function __toString()
    {
        return $this->numero . " - " . $this->titulaire . " : " . $this->solde . " " . self::DEVISE;
    }

    public static function getNombreComptes()
    {
        return self::$nombreComptes;
    }

    public static function estNumeroValide($numero)
    {
        if (preg_match('/^CB\d{6}$/', $numero)) {
            return true;
        }
        return false;
    }
}
