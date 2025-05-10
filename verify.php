<?php
// Hier prüfst du, ob der Code korrekt ist (z. B. aus der DB)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];

    // Hier verifizieren wir den Code (DB-Prüfung oder einfache Variable)
    $valid_code = '123456'; // Beispielcode

    if ($code === $valid_code) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ungültiger Code.']);
    }
}
?>
