<?php
  require "header.php";
 ?>



  <main id="main">

    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "zaloguj") {
        echo "<h2>Zaloguj się aby uzyskać dostęp do zawartości</h2>";
      }
    }
    else{
      echo '<div class"row"> <div class="col-sm-8"><h1>PLANER ĆWICZEN SIŁOWYCH</h1><h2>Projekt powstał z myślą o wszystkich tych, którzy zainteresowani są pracą nad rozwojem swojej muskulatury
i ogólnej sprawności fizycznej. Strona jedynie udostępnia narzędzia ułatwiające rozpisanie własnego planu treningowego. Za poprawność doboru ćwiczeń użytkownik odopowiada sam.</h2></div></div>';
    }
      ?>


  </main>


  <?php
    require "footer.php";
   ?>
