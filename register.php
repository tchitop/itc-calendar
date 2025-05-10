<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sicherheitsmaßnahmen wie Hashing des Passworts
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Generiere einen Bestätigungscode
    $confirmation_code = rand(100000, 999999);

    // Sende den Code an die E-Mail-Adresse
    $subject = 'Bestätigungscode für FreshCalendar';
    $message = "Ihr Bestätigungscode lautet: $confirmation_code";
    $headers = 'From: no-reply@freshcalendar.com' . "\r\n" .
               'Reply-To: no-reply@freshcalendar.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // E-Mail senden
    if (mail($email, $subject, $message, $headers)) {
        // Erfolgreiche E-Mail
        // Speichern der E-Mail und des Codes in einer Datenbank (optional)
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Senden der E-Mail.']);
    }
}
?>
