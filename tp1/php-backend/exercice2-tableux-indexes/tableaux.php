<?php

$notes = [12, 15, 8, 17, 9, 14, 11];
$prenoms = ['Sara', 'Youssef', 'Imane', 'Omar', 'Khadija'];

echo "Premiere note : " . $notes[0] . "<br>";
echo "Derniere note : " . $notes[count($notes) - 1] . "<br>";
echo "Nombre de notes : " . count($notes) . "<br>";

echo "<br>";

for ($i = 0; $i < count($notes); $i++) {
    echo "Note n°" . ($i + 1) . " : " . $notes[$i] . "<br>";
}

echo "<br>";

$n = 1;
foreach ($prenoms as $prenom) {
    echo $n . ". " . $prenom . "<br>";
    $n = $n + 1;
}

echo "<br>";

$notes[] = 16;
echo "Apres avoir ajoute 16 : " . implode(", ", $notes) . "<br>";

array_unshift($notes, 10);
echo "Apres avoir ajoute 10 au debut : " . implode(", ", $notes) . "<br>";

array_pop($notes);
echo "Apres avoir retire le dernier : " . implode(", ", $notes) . "<br>";

array_shift($notes);
echo "Apres avoir retire le premier : " . implode(", ", $notes) . "<br>";

array_splice($notes, 2, 0, [13]);
echo "Apres avoir insere 13 a l'index 2 : " . implode(", ", $notes) . "<br>";

unset($notes[1]);
echo "Apres unset de l'index 1 : " . implode(", ", $notes) . "<br>";

$notes = array_values($notes);
echo "Apres array_values : " . implode(", ", $notes) . "<br>";

echo "<br>";

if (in_array(17, $notes)) {
    echo "17 existe dans le tableau<br>";
} else {
    echo "17 n'existe pas dans le tableau<br>";
}

echo "L'index de 9 est : " . array_search(9, $notes) . "<br>";

if (in_array("Omar", $prenoms)) {
    echo "Omar existe dans le tableau<br>";
} else {
    echo "Omar n'existe pas dans le tableau<br>";
}

echo "<br>";

$somme = 0;
foreach ($notes as $note) {
    $somme = $somme + $note;
}
echo "Somme : " . $somme . "<br>";
echo "Moyenne : " . $somme / count($notes) . "<br>";

$min = $notes[0];
$max = $notes[0];
foreach ($notes as $note) {
    if ($note < $min) {
        $min = $note;
    }
    if ($note > $max) {
        $max = $note;
    }
}
echo "Minimum : " . $min . "<br>";
echo "Maximum : " . $max . "<br>";

$compteur = 0;
foreach ($notes as $note) {
    if ($note >= 10) {
        $compteur = $compteur + 1;
    }
}
echo "Nombre de notes superieures ou egales a 10 : " . $compteur . "<br>";

echo "<br>";

$copie = $notes;
sort($copie);
echo "Copie triee : " . implode(", ", $copie) . "<br>";

rsort($copie);
echo "Copie triee en sens inverse : " . implode(", ", $copie) . "<br>";

$top3 = array_slice($copie, 0, 3);
echo "Top 3 : " . implode(", ", $top3) . "<br>";

$copiePrenoms = $prenoms;
sort($copiePrenoms);
$copiePrenoms = array_reverse($copiePrenoms);
echo "Prenoms tries puis inverses : " . implode(", ", $copiePrenoms) . "<br>";

echo "<br>";

$points = array_map(function ($note) {
    $nouveau = $note + 1;
    if ($nouveau > 20) {
        $nouveau = 20;
    }
    return $nouveau;
}, $notes);
echo "Notes + 1 point : " . implode(", ", $points) . "<br>";

$admis = array_filter($notes, function ($note) {
    return $note >= 10;
});
$admis = array_values($admis);
echo "Notes superieures ou egales a 10 : " . implode(", ", $admis) . "<br>";

$total = array_reduce($notes, function ($carry, $note) {
    return $carry + $note;
}, 0);
echo "Somme avec array_reduce : " . $total . "<br>";

echo "<br>";

echo "Prenoms separes par un tiret : " . implode(" - ", $prenoms) . "<br>";

$texte = "php, js, sql, php, html, js";
$langages = explode(", ", $texte);
echo "Langages : " . implode(", ", $langages) . "<br>";

$langagesUniques = array_unique($langages);
echo "Langages sans doubles : " . implode(", ", $langagesUniques) . "<br>";

echo "<br>";

$fruits = ["pomme", "banane"];
$legumes = ["carotte", "poireau"];
$ensemble = array_merge($fruits, $legumes);
echo "Merge : " . implode(", ", $ensemble) . "<br>";

$commun = array_intersect($notes, [9, 14, 30]);
echo "Intersect : " . implode(", ", $commun) . "<br>";

$difference = array_diff($notes, [9, 14]);
echo "Diff : " . implode(", ", $difference) . "<br>";

$groupes = array_chunk(range(1, 10), 3);
foreach ($groupes as $groupe) {
    echo "Groupe : " . implode(", ", $groupe) . "<br>";
}

echo "<br>";

function afficherMoyenne($notes)
{
    if (count($notes) == 0) {
        echo "Moyenne : 0<br>";
        return;
    }
    $somme = 0;
    foreach ($notes as $note) {
        $somme = $somme + $note;
    }
    echo "Moyenne : " . $somme / count($notes) . "<br>";
}

afficherMoyenne($notes);
afficherMoyenne([]);
