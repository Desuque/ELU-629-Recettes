<?php

function getRecettesMod() {
  include('setup.php');

  $user_check_query = "SELECT * FROM recette where statut = 0";
  $result = mysqli_query($db, $user_check_query);

  return $result;
}

function getCommentaires($idRecette) {
  include('setup.php');

  $user_check_query = "SELECT * FROM commentaire where idrecette = '$idRecette'";
  $result = mysqli_query($db, $user_check_query);

  return $result;
}

function getNomUser($idUser) {
  include('setup.php');

  $user_check_query = "SELECT username FROM person where id = '$idUser'";
  $result = mysqli_query($db, $user_check_query);

  return $result->fetch_assoc();
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

function isOwer($idRecette) {
  include('setup.php');

  $idUser = $_SESSION['userid'];
  $user_check_query = "SELECT * FROM recette where id = '$idRecette'";
  $result = mysqli_query($db, $user_check_query);

  $recette = $result->fetch_assoc();
  if ($recette['iduser'] == $idUser) {
    return true;
  }

  return false;
}

function isPublic($idRecette) {
  include('setup.php');

  $user_check_query = "SELECT * FROM recette where id = '$idRecette'";
  $result = mysqli_query($db, $user_check_query);

  $recette = $result->fetch_assoc();
  if ($recette['statut'] == 1) {
    return true;
  }

  return false;
}

function canReadRecette($idRecette) {
  include('setup.php');

  if(isAdministrator() || isOwer($idRecette) || isPublic($idRecette)) {
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

function getInformation($idRecette) {
  include('setup.php');

  $user_check_query = "SELECT * FROM information where idrecette = '$idRecette'";
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

  $user_check_query = "SELECT * FROM recette WHERE statut = 1 ORDER BY id DESC LIMIT 10";
  $result = mysqli_query($db, $user_check_query);

  return $result;
}

?>