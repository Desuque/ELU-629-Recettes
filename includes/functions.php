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

function isAdministrator() {
  include('setup.php');

  $idUser = $_SESSION['userid'];
  $user_check_query = "SELECT * FROM person where id = '$idUser'";
  $result = mysqli_query($db, $user_check_query);

  $user = $result->fetch_assoc();
  if ($user['type'] == 3) { // 3 -> Administrator
    return true;
  }

  return false;
}

function getRecette($idRecette) {
  include('setup.php');

  $user_check_query = "SELECT * FROM recette where id = '$idRecette'";
  $result = mysqli_query($db, $user_check_query);

  return $result->fetch_assoc();
}

function getUser($idUser) {
  include('setup.php');

  $user_check_query = "SELECT * FROM person where id = '$idUser'";
  $result = mysqli_query($db, $user_check_query);

  return $result->fetch_assoc();
}


function getLastsRecettes() {
  include('setup.php');

  $user_check_query = "SELECT * FROM recette ORDER BY id DESC LIMIT 10";
  $result = mysqli_query($db, $user_check_query);

  return $result;
}

?>