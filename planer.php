
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

  <main id="container">
      <div id="main">


        <h2 style="color:black;">Poniższe formularze pozwalają na edycję planu treningowego</h2>
        <div class="form-group">
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


          <h3 style="color:black;">Wyszukaj ćwiczenia, które chcesz dodaj do planu</h3>
          <form name="partyForm" action="" method="post">
          <table>
            <tr>


          <td><select id="partydd" onChange="change_party()" class="form-control" required>
            <option>Wybierz partię mieśniową</option>
            <?php
            require 'includes/dbh.inc.php';
              $res=mysqli_query($conn, "select * from party");
              while ($row=mysqli_fetch_array($res)) {
            ?>
                <option value="<?php echo $row["idParty"]; ?>"><?php echo $row["partyName"]; ?></option>
            <?php
              }
            ?>
          </select></td>


          <td>
            <div id="musc">
            <select class="form-control">
              <option>Wybierz konkretny mieśnień</option>
            </select>
          </div>

          </td>

          <td>
            <div id="exerc">
            <select class="form-control">
              <option>Wybierz konkretne ćwiczenie</option>
            </select>
          </div>

          </td>
          </tr>
          <td>
            <div id="serie">
            <select id="seri" class="form-control">
              <option>Ile serii do wykonania??</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          </td>

          <td>
            <div id="powtorzenia">
              <input id="powt" class="form-control" type="text" name="powt" value="12/10/8"></option>
          </div>
          </td>

          <td>
            <div>
          <button class="btn btn-primary" onclick="dodajDoPlanu()">Dodaj do planu</button>
        </div>
        </td>
        </tr>
      </table></form>
</div></div>

<div id="ress"></div>
  </main>

  <script type="text/javascript">
    function change_party()
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.open("GET", "includes/searchMuscle.inc.php?party="+document.getElementById("partydd").value, false);
      xmlhttp.send(null);
      document.getElementById("musc").innerHTML=xmlhttp.responseText;
    }

    function change_muscle()
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.open("GET", "includes/searchMuscleT.inc.php?mu="+document.getElementById("muscledd").value, false);
      xmlhttp.send(null);
      document.getElementById("exerc").innerHTML=xmlhttp.responseText;
    }

    function dodajDoPlanu()
    {
         var temp1 = $('#plandd').val();
         var temp2 = $('#seri').val();
         var temp3 = $('#powt').val();
         var xmlhttp=new XMLHttpRequest();
         xmlhttp.open("GET", "includes/addToPlan.inc.php?&idp="+document.getElementById("plandd").value+"&ser="+document.getElementById("seri").value+"&pow="+document.getElementById("powt").value+"&exe="+document.getElementById("exercisedd").value, false);
         xmlhttp.send(null);
         //document.getElementById("exerc").innerHTML=xmlhttp.responseText;
         //alert(xmlhttp.responseText);
    }


    $(document).ready(function(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET", "includes/loadPlan.inc.php", false);
        xmlhttp.send(null);
        document.getElementById("moj_plan").innerHTML=xmlhttp.responseText;
    });




  </script>






        <script>
           $('#filter2').click(function(){
             var filter_muscle = $('#filter_muscle').val();
              $.ajax({
                url:"includes/muscle.inc.php",
                method:"post",
                data:{filter_muscle:filter_muscle},
                success:function(data)
                {
                  //$('#result2').html(data);
                  document.getElementById("ress").innerHTML = data;
                }
              });
            }
           });
         </script>

      <script>
     $('#filter').click(function(){
         var filter_party = $('#filter_party').val();
          window.location.href = "planer.php?name=" + filter_party;
       });
      </script>


    <!-- <script>
      $("#filter2").click(function() {
          var filter_muscle = $('#filter_muscle').val();
          $.ajax({
              type: "POST",
              url: "includes/muscle.ini.php",
              data: {
                  filter_muscle: filter_muscle},
              success: function(data) {
                document.getElementById("ress").innerHTML = data;
              });
          return false;
      });
    });
  </script>-->




  <?php
    require "footer.php";
   ?>
