<?php
  session_start();

  if (isset($_POST['email']))
  {
    //udana walidacja? tak
    $wszystko_ok=true;

    //sprawdzenie poprawności nazwy uzytk
    $nick=$_POST['nick'];
    
    //sprawdzenie długości nick
    if((strlen($nick)<3) || (strlen($nick)>20))
    {
      $wszystko_ok=false;
      $_SESSION['e_nick']="Nazwa użytkownika musi posiadać od 3 do 20 znaków!";
    }

    if(ctype_alnum($nick)==false)
    {
      $wszystko_ok=false;
      $_SESSION['e_nick']="Nazwa użytkownika może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    //sprawdzenie poprawności emaila
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    {
      $wszystko_ok=false;
      $_SESSION['e_email'] = "Podaj poprawny adres email!";
    }
    
    //sprawdzenie poprawności hasła 
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
    {
      $wszystko_ok=false;
      $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków!";
    }

    if ($haslo1!=$haslo2)
    {
      $wszystko_ok=false;
      $_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
    }
    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
    echo $haslo_hash; exit();

    if ($wszystko_ok==true)
    {
      // wszystkie testy zaliczone
      echo "Udana walidacja!"; exit();
    }

  }
 
?>

<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Załóż konto!</title>
    <link rel="stylesheet" href="styles1.css" />
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
    <style>
      .error 
      {
        color:red;
        margin-top: 10px;
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <form method="post">
      Nazwa użytkownika: <br/> <input type="text" name="nick"/><br/>

      <?php
        if(isset($_SESSION['e_nick']))
        {
          echo'<div class="error">'.$_SESSION['e_nick'].'</div>';
          unset($_SESSION['e_nick']);
        }
      ?>

      E-mail: <br/> <input type="text" name="email"><br/>

      <?php
        if(isset($_SESSION['e_email']))
        {
          echo'<div class="error">'.$_SESSION['e_email'].'</div>';
          unset($_SESSION['e_email']);
        }
      ?>

      Hasło: <br/> <input type="password" name="haslo1"><br/>

      <?php
        if(isset($_SESSION['e_haslo']))
        {
          echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
          unset($_SESSION['e_haslo']);
        }
      ?>

      Powtórz hasło: <br/> <input type="password" name="haslo2"><br/>
      <label>
        <input type="checkbox" name="regulamin"/> Akceptuję regulamin 
      </label>

      <div class="g-recaptcha" data-sitekey="6LcCaogpAAAAAJ9UsAm52WKu2TcpOdoEO5fs5JoR" data-action="LOGIN"></div>
      <br/>
      <input type="submit" value="Zarejestruj się">
    </form>

   
  </body>
</html>
