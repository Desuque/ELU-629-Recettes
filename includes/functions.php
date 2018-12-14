<?php

function getRecettesMod() {
  include('setup.php');

  $user_check_query = "SELECT * FROM recette where statut = 0";
  $result = mysqli_query($db, $user_check_query);

  return $result;
}

function getUtilisateurs() {
  include('setup.php');

  $user_check_query = "SELECT * FROM person";
  $result = mysqli_query($db, $user_check_query);

  return $result;
}

?>