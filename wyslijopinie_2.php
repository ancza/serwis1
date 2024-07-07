<?php
// Pobierz dane z formularza
$imie = $_POST['imie'];
$ocena = $_POST['ocena'];
$opinia = $_POST['opinia'];

// Zapytanie SQL z bezpośrednim wstawieniem danych z formularza - podatne na iniekcję SQL
$sql = "INSERT INTO opinie (imie, ocena, opinia) VALUES ('$imie', '$ocena','$opinia')";

if ($polaczenie->query($sql) === TRUE) {
    echo "Opinia została zapisana!";
    echo "<br><br>";
    echo '<a href="napiszopinie1.html">Wróć do poprzedniej strony</a>';

} else {
    echo "Error: " . $sql . "<br>" . $polaczenie->error;
}

$polaczenie->close();

// Zapisz opinię do pliku
//$file = fopen("opinie.txt", "a");
//fwrite($file, "Imię: $imie, Ocena: $ocena, Opinia: $opinia\n");
//fclose($file);

//echo "Opinia została zapisana!";

//echo "<br><br>";
//echo '<a href="napiszopinie.html">Wróć do poprzedniej strony</a>';
?>