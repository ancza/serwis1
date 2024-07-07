<?php
  session_start();

  if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
  {
    header('Location: konto.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="styles1.css" />
  </head>
  <body>

   <form action="zaloguj.php" method="post" autocomplete="off">
      <div class="loginPanel">
        <div class="loginPanel_header">
            <span class="ui-panel-title">Zaloguj się</span>
        </div>
        <div class="loginPanel_content">
            <div style="margin-bottom: 5px;">Wprowadź nazwę użytkownika i hasło</div>
        </div>
        <div class="form_input-container">
          <label for="user">Login:</label>
          <input type="text" name="login"/>
        </div>
        <div class="form_input-container">
          <label for="password">Hasło:</label>
          <input type="password" name="haslo"/>
          <br/><br/>

          <?php
          if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
          ?>

          <br/><br/>
          <a href="rejestracja.php">Rejestracja - załóż konto!</a>
          <br/><br/>
        </div>
      </div>
      <input type="submit" value="Zaloguj"/>
    </form>
    
  </body>
</html>
