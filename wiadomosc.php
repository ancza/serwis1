<?php
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ehurt";


$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_error) {
    die("Connection failed: " . $polaczenie->connect_error);
}

    //if($polaczenie->connect_errno!=0)
    //{
    //    echo "Error:".$polaczenie->connect_errno ;
    // }


// Pobieranie danych z POST
$imie = $_POST['imie'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$wiadomosc = $_POST['wiadomosc'];

// Zapytanie SQL z bezpośrednim wstawieniem danych z formularza - podatne na iniekcję SQL
$sql = "INSERT INTO wiadomosci (imie, email, telefon, wiadomosc) VALUES ('$imie', '$email','$telefon', '$wiadomosc')";

if ($polaczenie->query($sql) === TRUE) {
    echo "Twoja wiadomość została wysłana! <br>";
    echo "Witaj, " . $_POST['imie'] . "! Treść twojej wiadomości: " . $_POST['wiadomosc'];

    echo "<br><br>";
    echo '<a href="index_v1.html">Wróć do poprzedniej strony</a>';


} else {
    echo "Error: " . $sql . "<br>" . $polaczenie->error;
}

$polaczenie->close();
?>
