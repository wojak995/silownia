<?php
require 'dbh.inc.php';

session_start();
 $us=$_SESSION['userId'];
 $nam=$_GET["namep"];


$output = '';
if(isset($_GET["namep"]))
{
 $search = mysqli_real_escape_string($conn, $_GET["namep"]);
 $query = "
 SELECT * FROM viewplan
 WHERE idUsers=$us
 AND namePlan LIKE '%".$search."%'
 ";
}
else
{
 $query = "
 SELECT namePlan, nameExercise, serie, repeats, idUsers FROM viewplan WHERE idUsers=$us";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '<div class="table-responsive">
         <table class="table table bordered">
           <tr>
             <th>Plan name</th>
             <th>Exercise name</th>
             <th>Series</th>
             <th>Repeats</th>
           </tr>';
 while($row = mysqli_fetch_array($result))
 {
   $output .= '
     <tr>
       <td>'.$row["namePlan"].'</td>
       <td>'.$row["nameExercise"].'</td>
       <td>'.$row["serie"].'</td>
       <td>'.$row["repeats"].'</td>
     </tr>
   ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
