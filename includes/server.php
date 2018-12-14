<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', 'root123', 'recette');

if (isset($_POST['update_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $iduser = $_SESSION['userid'];

  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
   array_push($errors, "The two passwords do not match");
 }

 if (count($errors) == 0) {
   $password = md5($password_1);
   $query = "UPDATE person SET email = '$email', password = '$password' WHERE id = '$iduser'";
   mysqli_query($db, $query);
 }
}

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
   array_push($errors, "The two passwords do not match");
 }

 $user_check_query = "SELECT * FROM person WHERE username='$username' OR email='$email' LIMIT 1";
 $result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result);

 if ($user) {
  if ($user['username'] === $username) {
    array_push($errors, "Username already exists");
  }

  if ($user['email'] === $email) {
    array_push($errors, "email already exists");
  }
}

if (count($errors) == 0) {
 $password = md5($password_1);

 $query = "INSERT INTO person (username, email, password) 
 VALUES('$username', '$email', '$password')";
 mysqli_query($db, $query);
 $_SESSION['username'] = $username;
 header('location: index.php');
}
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM person WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      while($row = mysqli_fetch_assoc($results)) {
        $_SESSION['userid'] = $row['id'];
      }
      $_SESSION['username'] = $username;
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if(isset($_GET["accepterRecette"]))
{
  $idRecette = htmlspecialchars($_GET["accepterRecette"]);
  $query = "UPDATE recette SET statut = 1 where id = '$idRecette'" ;
  mysqli_query($db, $query);
}

if(isset($_GET["eliminerRecette"]))
{
  $idRecette = htmlspecialchars($_GET["eliminerRecette"]);
  $query = "UPDATE recette SET statut = 2 where id = '$idRecette'" ;
  mysqli_query($db, $query);
}

if(isset($_GET["unlockUser"]))
{
  $idUser = htmlspecialchars($_GET["unlockUser"]);
  $query = "UPDATE person SET type = 0 where id = '$idUser'" ;
  mysqli_query($db, $query);
}

if(isset($_GET["lockUser"]))
{
  $idUser = htmlspecialchars($_GET["lockUser"]);
  $query = "UPDATE person SET type = 1 where id = '$idUser'" ;
  mysqli_query($db, $query);
}

if(isset($_GET["eliminerUser"]))
{
  $idUser = htmlspecialchars($_GET["eliminerUser"]);
  $query = "UPDATE person SET type = 2 where id = '$idUser'" ;
  mysqli_query($db, $query);
}

if(isset($_GET["setModerator"]))
{
  $idUser = htmlspecialchars($_GET["setModerator"]);
  $query = "UPDATE person SET type = 3 where id = '$idUser'" ;
  mysqli_query($db, $query);
}

?>