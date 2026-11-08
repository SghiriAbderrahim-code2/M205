<?php

include "CompteBancaire.php";
include "CompteEpargne.php";
include "CompteCourant.php";
include "Banque.php";

$c1 = new CompteEpargne("CB123456", "Sara", 1000, 3);
$c2 = new CompteCourant("CB654321", "Youssef", 500, 200);

$comptes = [$c1, $c2];

foreach ($comptes as $compte) {
    echo $compte . "<br>";
}

echo "<br>";

function tenterRetrait($compte, $montant)
{
    try {
        $compte->retirer($montant);
        echo "Retrait de " . $montant . " OK sur " . $compte->getType() . ", nouveau solde : " . $compte->getSolde() . "<br>";
    } catch (Exception $e) {
        echo "Erreur sur " . $compte->getType() . " : " . $e->getMessage() . "<br>";
    }
}

tenterRetrait($c1, 300);
tenterRetrait($c1, 2000);
tenterRetrait($c2, 600);
tenterRetrait($c2, 1000);
tenterRetrait($c1, 8000);

echo "<br>";

foreach ($comptes as $compte) {
    if ($compte instanceof CompteEpargne) {
        $avant = $compte->getSolde();
        $compte->ajouterInterets();
        echo "Interets ajoutes : " . $avant . " -> " . $compte->getSolde() . "<br>";
    }
}

echo "<br>";

foreach ($comptes as $compte) {
    echo $compte . "<br>";
}

echo "<br>";

$banque = new Banque();
$banque->ajouterCompte($c1);
$banque->ajouterCompte($c2);
$banque->afficherComptes();

echo "<br>";

try {
    $mauvais = new CompteEpargne("CB111222", "Imane", 500, 150);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $mauvais = new CompteCourant("CB333444", "Omar", 500, -100);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

echo "<br>";
echo "Nombre de comptes : " . CompteBancaire::getNombreComptes() . "<br>";
