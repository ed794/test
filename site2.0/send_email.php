<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    $to = "contact@firma-constructii.ro"; // Change this to your actual email
    $subject = "Mesaj nou de la $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $fullMessage = "Nume: $name\n";
    $fullMessage .= "Email: $email\n\n";
    $fullMessage .= "Mesaj:\n$message\n";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Mesaj trimis cu succes!";
    } else {
        echo "Eroare la trimiterea mesajului.";
    }
} else {
    echo "Acces neautorizat!";
}
?>