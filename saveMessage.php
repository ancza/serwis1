<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $name = strip_tags(trim($_POST["name"]));
    $message = strip_tags(trim($_POST["message"]));

    // Walidacja danych (prosta walidacja)
    if (empty($name) || empty($message)) {
        // Tu można dodać obsługę błędu, np. przekierowanie z powrotem do formularza z komunikatem
        echo "Wypełnij wszystkie pola!";
        exit;
    }

    // Formatuj dane do zapisu
    $data = sprintf("Imię: %s, Wiadomość: %s\n", $name, $message);

    // Zapisz dane do pliku
    file_put_contents("messages.txt", $data, FILE_APPEND);

    // Przekierowanie lub wyświetlenie komunikatu po zapisie
    echo "Wiadomość została zapisana!";
    // Możesz tutaj również dodać przekierowanie do innego miejsca, np.:
    // header('Location: konto.php');
   
}
?>
