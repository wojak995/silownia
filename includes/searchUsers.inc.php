<?php
require 'dbh.inc.php';



$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM users
	WHERE uidUsers LIKE '%".$search."%'
	OR emailUsers LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM users ORDER BY idUsers";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Login</th>
							<th>E=mail</th>
							<th>Typ</th>
							<th>Usuń</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["uidUsers"].'</td>
				<td>'.$row["emailUsers"].'</td>
				<td>'.$row["typeUsers"].'</td>
				<td><a href=includes/delete.php?id='.$row["idUsers"].'>Usuń</a></td>
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
