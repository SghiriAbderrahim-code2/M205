<?php

include "CompteBancaire.php";

$compte1 = new CompteBancaire("CB123456", "Sara", 1000);
$compte2 = new CompteBancaire("CB654321", "Youssef", 500);

echo "Compte 1 : " . $compte1 . "<br>";
echo "Compte 2 : " . $compte2 . "<br>";
echo "Nombre de comptes : " . CompteBancaire::getNombreComptes() . "<br>";
echo "Numero valide CB123456 : " . var_export(CompteBancaire::estNumeroValide("CB123456"), true) . "<br>";
echo "Numero valide CB12345 : " . var_export(CompteBancaire::estNumeroValide("CB12345"), true) . "<br>";

try {
    $compte1->deposer(200);
    echo "Depot de 200 OK, nouveau solde : " . $compte1->getSolde() . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte1->retirer(300);
    echo "Retrait de 300 OK, nouveau solde : " . $compte1->getSolde() . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte1->retirer(50000);
    echo "Retrait de 50000 OK<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte1->deposer(10000);
    echo "Depot de 10000 OK, nouveau solde : " . $compte1->getSolde() . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte1->retirer(6000);
    echo "Retrait de 6000 OK<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte1->deposer(-50);
    echo "Depot de -50 OK<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte3 = new CompteBancaire("AB12345", "Imane", 100);
    echo "Compte cree : " . $compte3 . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte4 = new CompteBancaire("CB999999", "Omar", -100);
    echo "Compte cree : " . $compte4 . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

try {
    $compte1->setTitulaire("   ");
    echo "Titulaire change<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

echo "<br>";

echo "Avant virement : " . $compte1 . " | " . $compte2 . "<br>";
$compte1->virerVers($compte2, 400);
echo "Apres virement de 400 : " . $compte1 . " | " . $compte2 . "<br>";

try {
    $compte1->virerVers($compte2, 99999);
    echo "Virement impossible effectue<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

echo "<br>";

$compte1->setTitulaire("  Sara Alami  ");
echo "Nouveau titulaire : " . $compte1->getTitulaire() . "<br>";
echo "Devise : " . CompteBancaire::DEVISE . "<br>";
echo "Plafond de retrait : " . CompteBancaire::PLAFOND_RETRAIT . " " . CompteBancaire::DEVISE . "<br>";

try {
    echo "Solde prive : " . $compte1->solde . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
} catch (Error $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

echo "<br>";
echo "Nombre total de comptes : " . CompteBancaire::getNombreComptes() . "<br>";
