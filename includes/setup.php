<?php
$db = mysqli_connect('localhost', 'root', 'sqlroot', 'recette');

if (!$db) {
    echo "Erreur: Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Erreur de débogage: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}

?>