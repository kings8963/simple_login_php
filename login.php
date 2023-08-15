<?php
try{
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=prueba','root','');
    //echo "Conexion establecida...";
}catch(PDOException $e){
    echo"Error de conexion:";
}
// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para verificar
$sql = "SELECT * FROM usuarios WHERE nombre = :username AND pass = :password";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Inicio de sesión exitoso
    echo "Inicio de sesión exitoso. ¡Bienvenido!";
} else {
    // Inicio de sesión fallido
    echo "Nombre de usuario o contraseña incorrectos.";
}

// Cerrar la conexión
$conn = null;
?>
