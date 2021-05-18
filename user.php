<?php
  require "header.php";
 ?>

<main>
<div class="row">
  <div class="col-sm-8">
<h2 style="text-align: center;">Panel administrowania kontami użytkowników</h2>


<input type="text" name="search_text" id="search_text" placeholder="Szukaj użytkownika po loginie" class="form-control" />

<div style="border:1px solid grey;" id="result"></div>

<div style="clear:both"></div>
</div>
</div>
  <?php
/*

  if(isset($_SESSION['userId'])){
     echo "jejej";
  }
  else{
    header("Location: ../index.php");
  }*/
  ?>
</main>

<?php
    require "footer.php";

 ?>


 <script>
 $(document).ready(function(){
 	load_data();
 	function load_data(query)
 	{
 		$.ajax({
 			url:"includes/searchUsers.inc.php",
 			method:"post",
 			data:{query:query},
 			success:function(data)
 			{
 				$('#result').html(data);
 			}
 		});
 	}

 	$('#search_text').keyup(function(){
 		var search = $(this).val();
 		if(search != '')
 		{
 			load_data(search);
 		}
 		else
 		{
 			load_data();
 		}
 	});
 });
 </script>
