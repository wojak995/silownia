<?php
  require "header.php";
 ?>

  <main>
    <div id="container-log">
      <div class="container">
        <h2>Rejestracja</h2>
        <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
              echo '<p class="signuperror">Uzupełnij wszystkie pola!</p>';
            }
            else if ($_GET['error'] == "invalidmailuid") {
              echo '<p class="signuperror">Niepoprawny użytkownik i email</p>';
            }
            else if ($_GET['error'] == "invaliduid") {
              echo '<p class="signuperror">Niepoprawny użytkownik!</p>';
            }
            else if ($_GET['error'] == "invalidmail") {
              echo '<p class="signuperror">Niepoprawny email!</p>';
            }
            else if ($_GET['error'] == "passwordcheck") {
              echo '<p class="signuperror">Podaj takie same hasła!</p>';
            }
            else if ($_GET['error'] == "usertaken") {
              echo '<p class="signuperror">Zajęta nazwa użytkownika</p>';
            }

            // code...
          }
          else if (isset($_GET['signup'])) {
            if ($_GET['signup'] == "success") {
              echo '<p class="signupsucces">Rejestracja pomyślna!</p>';
            }

          }


         ?>

          <div class="row">
              <div class="col-sm-6">
          <form action="includes/signup.inc.php" method="post">
            <input type="text" class="form-control" placeholder="Podaj email" name="mail">
            <input type="text" class="form-control" placeholder="Podaj login" name="uid">
            <input type="password" class="form-control" placeholder="Podaj hasło" name="pwd">
            <input type="password" class="form-control" placeholder="Powtórz hasło" name="pwd-repeat">
            <button type="submit" name="signup-submit" class="btn btn-primary">Zatwierdź</button>
          </form>
            </div>
          </div>

        </div>
      </div>
  </main>


<?php
    require "footer.php";
 ?>
