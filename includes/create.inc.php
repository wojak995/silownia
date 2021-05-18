<?php
session_start();
if (isset($_POST['create-submit'])) {

  require 'dbh.inc.php';

  $name=$_POST['planName'];
  $id=$_SESSION['userId'];


  if (empty($name)) {
    header("Location: ../plany.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT namePlan FROM plan WHERE idUsers=? AND namePlan=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../plany.php?error=sqlerror1".$id);
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $id, $name);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../plany.php?error=nametaken");
        exit();
      }
      else {
        $sql = "INSERT INTO plan (idUsers, namePlan) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../plany.php?error=sqlerror2");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "ss", $_SESSION['userId'], $name);
          mysqli_stmt_execute($stmt);
          header("Location: ../plany.php?create=success");
          exit();
        }
      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
  header("Location: ../plany.php");
  exit();
}

?>
