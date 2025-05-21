<?php
$host = 'localhost';
$db   = 'Travelway';
$user = 'postgres';     // HE PUESTO MI BASE DE DATOS PARA QUE SE CONECTE A MI SERVIDOR
$pass = '1234567'; 
$port = '5433';          

try {
  $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>
