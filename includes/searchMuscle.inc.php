<?php
  require 'dbh.inc.php';

  $p=$_GET["party"];

  if ($p!="") {
    $res=mysqli_query($conn, "select * from muscles where idParty=$p");

    echo "<select id='muscledd' onChange='change_muscle()' class='form-control'>";
    while ($row=mysqli_fetch_array($res)) {
      echo "<option value='$row[idMuscles]'>"; echo $row["nameMuscles"]; echo "</option>";
    }

    echo "</select>";

  }

 ?>
