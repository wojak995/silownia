<?php

require 'dbh.inc.php';
$idPlanu=$_GET['idp'];
$seri=$_GET['ser'];
$powt=$_GET['pow'];
$idCwicz=$_GET['exe'];

/*
if (empty($idPlanu) || empty($seri) || empty($powt) || empty($idCwicz)) {
  header("Location: ../planer.php?error=emptyfields");
  exit();
}
else {
$sql = "INSERT INTO assign_exercise (idPlan, idExercise, serie, repeats) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
  header("Location: ../planer.php?error=sqlerror");
  exit();
}
else {

  mysqli_stmt_bind_param($stmt, "ssss", $idPlanu, $idCwicz, $seri, $powt);
  mysqli_stmt_execute($stmt);
  header("Location: ../planer.php?signup=success");
  exit();
}

}
mysqli_stmt_close($stmt);
mysqli_close($conn);*/

if (empty($idPlanu) || empty($seri) || empty($powt) || empty($idCwicz)) {
  header("Location: ../planer.php?error=emptyfields");
  exit();
}
else {
  $sql = "SELECT * FROM plan WHERE idPlan=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../planer.php?error=sqlerror");
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "s", $idPlanu);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck < 1) {
      header("Location: ../planer.php?error=planerror&mail");
      exit();
    }
    else {
      $sql = "INSERT INTO assign_exercise (idPlan, idExercise, serie, repeats) VALUES (?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../planer.php?error=sqlerror");
        exit();
      }
      else {

        mysqli_stmt_bind_param($stmt, "ssss", $idPlanu, $idCwicz, $seri, $powt);
        mysqli_stmt_execute($stmt);
        header("Location: ../planer.php?error=success");
        exit();
      }
    }
  }

}
mysqli_stmt_close($stmt);
mysqli_close($conn);



?>
