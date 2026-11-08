<?php

$stagiaire = ['nom' => 'Alami', 'prenom' => 'Sara', 'age' => 21, 'notes' => ['php' => 16, 'js' => 14, 'sql' => 15]];

echo "Nom : " . $stagiaire['nom'] . "<br>";
echo "Prenom : " . $stagiaire['prenom'] . "<br>";
echo "Age : " . $stagiaire['age'] . "<br>";

foreach ($stagiaire['notes'] as $matiere => $note) {
    echo $matiere . " : " . $note . "<br>";
}

$stagiaire['ville'] = 'Casablanca';
echo "Ville : " . $stagiaire['ville'] . "<br>";

$stagiaire['age'] = 22;
echo "Nouvel age : " . $stagiaire['age'] . "<br>";

echo "Email : " . ($stagiaire['email'] ?? "non fourni") . "<br>";

$stagiaire['telephone'] = null;

if (isset($stagiaire['telephone'])) {
    echo "isset : telephone existe<br>";
} else {
    echo "isset : telephone est null ou absent<br>";
}

if (array_key_exists('telephone', $stagiaire)) {
    echo "array_key_exists : la cle telephone existe<br>";
} else {
    echo "array_key_exists : la cle telephone n'existe pas<br>";
}

unset($stagiaire['ville']);
echo "Apres unset, ville existe ? " . var_export(isset($stagiaire['ville']), true) . "<br>";

$somme = 0;
foreach ($stagiaire['notes'] as $note) {
    $somme = $somme + $note;
}
$moyenne = $somme / count($stagiaire['notes']);
echo "Moyenne des notes : " . $moyenne . "<br>";

echo "<br>";

$panier = ['Clavier' => 250, 'Souris' => 90, 'Ecran' => 1400, 'Casque' => 320];

$total = 0;
foreach ($panier as $prix) {
    $total = $total + $prix;
}
echo "Total : " . $total . " MAD<br>";

$plusCher = 0;
$moinsCher = 0;
$premier = true;
foreach ($panier as $article => $prix) {
    if ($premier) {
        $plusCher = $prix;
        $moinsCher = $prix;
        $premier = false;
    }
    if ($prix > $plusCher) {
        $plusCher = $prix;
    }
    if ($prix < $moinsCher) {
        $moinsCher = $prix;
    }
}
echo "Le plus cher : " . $plusCher . " MAD<br>";
echo "Le moins cher : " . $moinsCher . " MAD<br>";

foreach ($panier as $article => $prix) {
    $panier[$article] = $prix - ($prix * 10 / 100);
}
echo "Apres remise de 10% :<br>";
foreach ($panier as $article => $prix) {
    echo $article . " = " . $prix . " MAD<br>";
}

$cher = [];
foreach ($panier as $article => $prix) {
    if ($prix > 200) {
        $cher[$article] = $prix;
    }
}
echo "Articles plus de 200 MAD :<br>";
foreach ($cher as $article => $prix) {
    echo $article . " = " . $prix . " MAD<br>";
}

$panier2 = ['Clavier' => 250, 'Souris' => 90, 'Ecran' => 1400, 'Casque' => 320];

ksort($panier2);
echo "ksort : ";
foreach ($panier2 as $article => $prix) {
    echo $article . " ";
}
echo "<br>";

asort($panier2);
echo "asort : ";
foreach ($panier2 as $article => $prix) {
    echo $article . " ";
}
echo "<br>";

arsort($panier2);
echo "arsort : ";
foreach ($panier2 as $article => $prix) {
    echo $article . " ";
}
echo "<br>";

echo "<br>";

$stagiaires = [
    ['nom' => 'Alami', 'prenom' => 'Sara', 'notes' => [16, 14, 15]],
    ['nom' => 'Bennani', 'prenom' => 'Youssef', 'notes' => [8, 12, 9]],
    ['nom' => 'Chraibi', 'prenom' => 'Imane', 'notes' => [13, 11, 14]],
    ['nom' => 'Daoudi', 'prenom' => 'Omar', 'notes' => [17, 16, 18]],
];

foreach ($stagiaires as $index => $stagiaire2) {
    $somme = 0;
    foreach ($stagiaire2['notes'] as $note) {
        $somme = $somme + $note;
    }
    $stagiaires[$index]['moyenne'] = $somme / count($stagiaire2['notes']);
}

foreach ($stagiaires as $stagiaire2) {
    echo $stagiaire2['prenom'] . " " . $stagiaire2['nom'] . " : " . $stagiaire2['moyenne'] . "<br>";
}

usort($stagiaires, function ($a, $b) {
    return $b['moyenne'] - $a['moyenne'];
});

echo "Classement :<br>";
$rang = 1;
foreach ($stagiaires as $stagiaire2) {
    echo $rang . ". " . $stagiaire2['prenom'] . " " . $stagiaire2['nom'] . " : " . $stagiaire2['moyenne'] . "<br>";
    $rang = $rang + 1;
}

echo "Admis :<br>";
foreach ($stagiaires as $stagiaire2) {
    if ($stagiaire2['moyenne'] >= 10) {
        echo $stagiaire2['prenom'] . " " . $stagiaire2['nom'] . "<br>";
    }
}

echo "<br>";

$stock = [
    'P001' => ['designation' => 'Clavier', 'prix' => 250, 'qte' => 10],
    'P002' => ['designation' => 'Souris', 'prix' => 90, 'qte' => 25],
    'P003' => ['designation' => 'Ecran', 'prix' => 1400, 'qte' => 5],
];

function ajouterProduit(&$stock, $ref, $designation, $prix, $qte)
{
    if (isset($stock[$ref])) {
        return false;
    }
    $stock[$ref] = ['designation' => $designation, 'prix' => $prix, 'qte' => $qte];
    return true;
}

function retirerStock(&$stock, $ref, $qte)
{
    if (!isset($stock[$ref])) {
        return false;
    }
    if ($stock[$ref]['qte'] < $qte) {
        return false;
    }
    $stock[$ref]['qte'] = $stock[$ref]['qte'] - $qte;
    return true;
}

function valeurTotale($stock)
{
    $total = 0;
    foreach ($stock as $produit) {
        $total = $total + ($produit['prix'] * $produit['qte']);
    }
    return $total;
}

function afficherStock($stock)
{
    foreach ($stock as $ref => $produit) {
        echo $ref . " | " . $produit['designation'] . " | " . $produit['prix'] . " MAD | " . $produit['qte'] . " pcs<br>";
    }
}

echo "Stock initial :<br>";
afficherStock($stock);

$ajout = ajouterProduit($stock, 'P004', 'Casque', 320, 8);
if ($ajout) {
    echo "Produit ajoute<br>";
} else {
    echo "Produit deja existant<br>";
}

$ajout2 = ajouterProduit($stock, 'P001', 'Clavier mec', 300, 5);
if ($ajout2) {
    echo "Produit ajoute<br>";
} else {
    echo "Produit deja existant<br>";
}

$retirage = retirerStock($stock, 'P001', 3);
if ($retirage) {
    echo "3 pieces retirees de P001<br>";
} else {
    echo "Retrait impossible<br>";
}

$retirage2 = retirerStock($stock, 'P003', 100);
if ($retirage2) {
    echo "100 pieces retirees de P003<br>";
} else {
    echo "Retrait impossible : quantite insuffisante<br>";
}

$retirage3 = retirerStock($stock, 'P999', 1);
if ($retirage3) {
    echo "Retrait effectue<br>";
} else {
    echo "Retrait impossible : reference inconnue<br>";
}

echo "<br>";
echo "Stock apres operations :<br>";
afficherStock($stock);
echo "Valeur totale du stock : " . valeurTotale($stock) . " MAD<br>";
