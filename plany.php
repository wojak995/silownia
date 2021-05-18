
<?php
  require "header.php";
 ?>
 <?php
 if(!(isset($_SESSION['userId']))){
   header("Location: index.php?error=zaloguj");
 }
 else {
   if (isset($_GET['name'])) {
  $ser=$_GET['name'];
   require 'includes/dbh.inc.php';
   $miesien = '';
   $sql = "SELECT DISTINCT nameMuscles FROM muscles, party WHERE muscles.idParty=party.idParty AND partyName='$ser'";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("Location: index.php?error=sqlerror");
     exit();
   }
   else {
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
     foreach ($result as $row) {
       $miesien .= '<option value="'.$row['nameMuscles'].'">'.$row['nameMuscles'].'</option>';
     }
   }
 }
 }
   ?>

  <main>
    <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
          echo '<p class="signuperror">Uzupełnij wszystkie pola!</p>';
        }
        else if ($_GET['error'] == "nametaken") {
          echo '<p class="signuperror">Już zajmujesz tą nazwę</p>';
        }

        // code...
      }
      else if (isset($_GET['create'])) {
        if ($_GET['create'] == "success") {
          echo '<p class="signupsucces">Operacja zakończona pomyślnie!</p>';
        }

      }


     ?>

    <h2 style="color:black;">Tworzenie nowych planów oraz wyświetlanie już istniejących</h2>

    <div class="row">
          <form action="includes/create.inc.php" method="post">
            <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Podaj nazwę planu" name="planName">
            </div>
            <div class="col-sm-2">
            <button type="submit" name="create-submit" class="btn btn-primary">Stwórz plan</button></div>
          </form>
    </div>
    <br></br>
    <h4 style="color:black;">Wybierz plan</h4>
    <div class="row">
      <div class="col-sm-4">
        <table>
          <tr>
            <td>
              <div id="moj_plan">
              <select class="form-control">
                <option>Wybierz modyfikowany plan</option>
              </select></div>
            </td>
          </tr>
        </table>
    </div>
    <div class="col-sm-2">
    <button type="submit" name="but" id="but" onclick="displayPlan()" class="btn btn-primary">Wyświetl plan</button></div>
    </div>
<br></br>

<div class="row">
  <div class="col-sm-8">

    <div style="border:1px solid black;" id="resultPlan"></div>
    <div style="clear:both"></div>
  </div></div>
  </main>

<script>
$(document).ready(function(){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "includes/loadPlanT.inc.php", false);
    xmlhttp.send(null);
    document.getElementById("moj_plan").innerHTML=xmlhttp.responseText;
});

function displayPlan(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET", "includes/displayPlan.inc.php?&namep="+document.getElementById("pland").value, false);
  xmlhttp.send(null);
  $('#resultPlan').html(xmlhttp.responseText);
  //document.getElementById('#resultPlan').innerHTML=xmlhttp.responseText;
}
/*
$(document).ready(function(){
 load_data();
 function load_data(query)
 {
   $.ajax({
     url:"includes/displayPlan.inc.php",
     method:"post",
     data:{query:query},
     success:function(data)
     {
       $('#result').html(data);
     }
   });
 }

 $('#but').onclick(function(){
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
}*/

 </script>


  <?php
    require "footer.php";
   ?>
