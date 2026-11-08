<?php

function additionner($a, $b)
{
    return $a + $b;
}

function soustraire($a, $b)
{
    return $a - $b;
}

function multiplier($a, $b)
{
    return $a * $b;
}

function diviser($a, $b)
{
    if ($b == 0) {
        throw new Exception("Division par zero impossible");
    }
    return $a / $b;
}

function estPair($n)
{
    if ($n % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function estPositif($n)
{
    if ($n > 0) {
        return true;
    } else {
        return false;
    }
}

function maximum($a, $b, $c)
{
    $max = $a;
    if ($b > $max) {
        $max = $b;
    }
    if ($c > $max) {
        $max = $c;
    }
    return $max;
}

function estPremier($n)
{
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function calculerTTC($ht, $tva = 20)
{
    $total = $ht + ($ht * $tva / 100);
    return $total;
}

function calculerRemise($prix, $pourcentage)
{
    $remise = $prix * $pourcentage / 100;
    $prixFinal = $prix - $remise;
    return $prixFinal;
}

function calculerFacture($prixUnitaire, $quantite, $remise = 0, $tva = 20)
{
    $prixTotal = $prixUnitaire * $quantite;
    $prixApresRemise = calculerRemise($prixTotal, $remise);
    $prixTTC = calculerTTC($prixApresRemise, $tva);
    return $prixTTC;
}

function moyenne($notes)
{
    $somme = 0;
    $compteur = 0;
    foreach ($notes as $note) {
        $somme = $somme + $note;
        $compteur = $compteur + 1;
    }
    if ($compteur == 0) {
        return 0;
    }
    return $somme / $compteur;
}

function aireCercle($rayon)
{
    $aire = 3.14159 * $rayon * $rayon;
    return $aire;
}

function perimetreCercle($rayon)
{
    $perimetre = 2 * 3.14159 * $rayon;
    return $perimetre;
}

function factorielle($n)
{
    if ($n < 0) {
        throw new Exception("Impossible de calculer la factorielle de $n");
    }
    $resultat = 1;
    for ($i = 1; $i <= $n; $i++) {
        $resultat = $resultat * $i;
    }
    return $resultat;
}

function fibonacci($n)
{
    $suite = array();
    if ($n >= 1) {
        $suite[] = 0;
    }
    if ($n >= 2) {
        $suite[] = 1;
    }
    for ($i = 2; $i < $n; $i++) {
        $prochain = $suite[$i - 1] + $suite[$i - 2];
        $suite[] = $prochain;
    }
    return $suite;
}
