<?php
require 'dbh.inc.php';

if (isset($_GET['id'])) {
    $sql = "DELETE FROM users WHERE idUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../user.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
      mysqli_stmt_execute($stmt);
      header("Location: ../user.php?success=success");
    }
}
