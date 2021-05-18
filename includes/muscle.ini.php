<?php

  require 'dbh.inc.php';
  if(isset($_POST["filter_muscle"]))
  {
  $search = mysqli_real_escape_string($conn, $_POST["filter_muscle"]);
  $query = "
	SELECT nameExercise, nameMuscles, idExercise, idMuscles FROM viewexerc
	WHERE nameMuscles LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM viewexerc ORDER BY idExercise";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Ćwiczenie</th>
							<th>Mięsień</th>
							<th>Dodaj</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["nameExercise"].'</td>
				<td>'.$row["nameMuscles"].'</td>
				<td><a href=includes/dodaj.inc.php?id='.$row["idExercise"].'>Dodaj</a></td>
			</tr>
		';
	}
	echo $output;

}
else {
  echo 'Data Not Found';
}
//echo $muscle;
