<?php
  session_start();
  require "includes/userType.inc.php";
 ?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>PMAKS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body background='test2.jpg'>

    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Planer</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="planer.php">Edytuj plan</a></li>
              <li><a href="plany.php">Moje plany</a></li>
            </ul>
            <div>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <ul>
                    <?php

                      if (isset($_SESSION['userUid'])) {
                        $name = $_SESSION['userUid'];
                      }else {
                        $name="Zaloguj";
                      }
                    ?>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name; ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php

                    if(isset($_SESSION['userId'])){
                      echo ' <form action="includes/logout.inc.php" method="post">
                          <button style="margin: auto; width: 100%; padding: 10px; border: 2px solid black;"
                          type="submit" class="btn btn-secondary" name="logout-submit">Wyloguj się</button>
                        </form> ';
                        if(type()=="Admin"){
                          echo '  <form action="user.php">
                                  <button style="margin: auto; width: 100%; padding: 10px; border: 2px solid black;"
                                  type="submit" class="btn btn-secondary" name="panel-submit">Panel użytkonika</button>
                                  </form>';
                        }
                    }
                    else{
                      echo '<form action="includes/login.inc.php" method="post">
                        <input type="text" class="form-control" name="mailuid" placeholder="Nazwa użytkownika...">
                        <input type="password" class="form-control" name="pwd" placeholder="Hasło...">
                        <button style="margin: auto; width: 100%; padding: 10px; border: 2px solid black;"
                        type="submit" class="btn btn-secondary" name="login-submit">Zaloguj</button>
                      </form>
                      <a style="font-size: 10px; color: black; letter-spacing: 2px;" href="signup.php">lub</a>
                      </a>
                      <a style="font-size: 16px; color: #008CBA; letter-spacing: 2px;" href="signup.php">Zarejestruj się</a>';

                    }

                    ?>


                </ul>
                </li>

              </ul>
            </div>

          </div>
        </div>
      </nav>
    </header>
