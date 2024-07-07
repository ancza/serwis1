<?php
    session_start();

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: strona_logowania.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles2.css" />
    <title>Konto klienta</title>
</head>
<body>
<?php
    echo "<p>Witaj ".$_SESSION['imie'].'! [<a href="logout.php">Wyloguj</a>] </p>';
    echo "<p>Login: ".$_SESSION['user']."</p>";
    echo "<p>Email: ".$_SESSION['email']."</p>";
?>
  <div class="message">
        <a href="napiszopinie1.html">Napisz opinię</a>
        <br>
        <a href="pokazopinie1.php">Pokaż opinie innych użytkowników</a>
      </div>

    <header>
      <h1 class="header-title">
        <span>E-HURT | Sklep internetowy</span>
      </h1>
      <div class="search-bar">
        <input
          type="text"
          class="search-bar-input"
          placeholder="Szukaj..."
          autocomplete="off"
        />
        <div class="search-bar-icon">
          <img src="./ikony/lupa.svg" alt="search-icon" />
        </div>
      </div>
      <div class="header-basket">
        <img src="./ikony/shopping_cart.svg" alt="shopping-cart-icon" />
        <p class="basket-amount">Koszyk</p>
        <button class="basket-clear-btn">x</button>
      </div>
    </header>
    <main class="container">
      <aside class="categories">
        <h1 class="categories-title">Kategorie</h1>
        <section class="categories-items"></section>
      </aside>
      <section class="products"></section>
      <p class="empty-state">Nie znaleziono żadnego produktu...</p>
    </main>
    <script src="products.js"></script>
    <script src="main.js"></script>

</body>
</html>