<?php
$db = mysqli_connect('localhost', 'root', 'root123', 'recette');

if (!$db) {
    echo "Erreur: Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Erreur de débogage: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}

?>