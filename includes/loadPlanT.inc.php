<?php
  require 'dbh.inc.php';
 session_start();
  $us=$_SESSION['userId'];

  if ($us!="") {
    $res=mysqli_query($conn, "select * from plan where idUsers=$us");

    echo "<select id='pland' class='form-control'>";
    while ($row=mysqli_fetch_array($res)) {
      echo "<option value='$row[namePlan]'>"; echo $row["namePlan"]; echo "</option>";
    }

    echo "</select>";

  }

 ?>
