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

function getPermission() {
  return true;
  include('setup.php');

  if (isset($_SESSION['username'])) {

  }

  $user_check_query = "SELECT * FROM person where id = '$idUser'";
  $result = mysqli_query($db, $user_check_query);

  return $result->fetch_assoc();
}

?>