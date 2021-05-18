
<?php
  require 'dbh.inc.php';


$mus=$_GET["mu"];
//if ($mus!="") {
  $res=mysqli_query($conn, "select * from viewexerc where idMuscles=$mus");

  echo "<select id='exercisedd' class='form-control'>";
  while ($row=mysqli_fetch_array($res)) {
    echo "<option value='$row[idExercise]'>"; echo $row["nameExercise"]; echo "</option>";
  }

  echo "</select>";

//}


?>
