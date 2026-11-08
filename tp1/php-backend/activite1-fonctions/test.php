<?php

include "fonctions.php";

echo "12 + 8 = " . additionner(12, 8) . "<br>";
echo "12 - 8 = " . soustraire(12, 8) . "<br>";
echo "12 * 8 = " . multiplier(12, 8) . "<br>";

echo "12 / 4 = " . diviser(12, 4) . "<br>";

try {
    $resultat = diviser(10, 0);
    echo "10 / 0 = " . $resultat . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

echo "estPair(4) = " . var_export(estPair(4), true) . "<br>";
echo "estPair(7) = " . var_export(estPair(7), true) . "<br>";
echo "estPositif(5) = " . var_export(estPositif(5), true) . "<br>";
echo "estPositif(-5) = " . var_export(estPositif(-5), true) . "<br>";
echo "maximum(4, 9, 1) = " . maximum(4, 9, 1) . "<br>";
echo "estPremier(13) = " . var_export(estPremier(13), true) . "<br>";
echo "estPremier(15) = " . var_export(estPremier(15), true) . "<br>";

echo "TTC de 100 = " . calculerTTC(100) . "<br>";
echo "TTC de 100 avec TVA 10 = " . calculerTTC(100, 10) . "<br>";
echo "Remise de 20% sur 200 = " . calculerRemise(200, 20) . "<br>";
echo "Facture 4 articles a 25 avec remise 10 et TVA 20 = " . calculerFacture(25, 4, 10, 20) . "<br>";

echo "moyenne(12, 15, 18) = " . moyenne(array(12, 15, 18)) . "<br>";
echo "moyenne() = " . moyenne(array()) . "<br>";
echo "aire du cercle de rayon 5 = " . aireCercle(5) . "<br>";
echo "perimetre du cercle de rayon 5 = " . perimetreCercle(5) . "<br>";

echo "factorielle(5) = " . factorielle(5) . "<br>";

try {
    echo "factorielle(-3) = " . factorielle(-3) . "<br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

echo "fibonacci(8) = " . implode(", ", fibonacci(8)) . "<br>";
