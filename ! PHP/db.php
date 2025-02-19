<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // Standard für XAMPP ist kein Passwort
$dbname = 'login_system';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die('Verbindung fehlgeschlagen: ' . $conn->connect_error);
}
?>
