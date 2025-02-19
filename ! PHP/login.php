<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $first_password = $_POST['password']; 
    $password = $_POST['password_confirm']; 

    $stmt = $conn->prepare("INSERT INTO users (email, first_password_attempt, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $first_password, $password);
    
    if ($stmt->execute()) {
        echo 'Registrierung erfolgreich!';
    } else {
        echo 'Fehler: ' . $stmt->error;
    }
}
?>
