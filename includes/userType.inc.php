<?php

function type(){
  //session_start();
  require 'dbh.inc.php';
  $username=$_SESSION['userUid'];
  $typeUsers="";


	$sql = "SELECT * FROM users WHERE uidUsers=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();
  }
  else{

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
       $typeUsers= $row['typeUsers'];
     }

   }
   return $typeUsers;
}

 ?>
