<?php 
    //PARA OCULTAR
    require __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
    $dotenv->safeLoad();


function conectarDB() : mysqli {
    
    $nombre_servidor = $_ENV['DB_HOST']; // Cambia si usas un servidor remoto
    $usuario = $_ENV['DB_USER'];              // Usuario de tu base de datos
    $contrasena = $_ENV['DB_PASS'];               // Contraseña de tu base de datos
    $nombre_bd = $_ENV['DB_NAME'];            // Nombre de la base de datos

    // $db = mysqli_connect($nombre_servidor, $usuario, $contrasena, $nombre_bd);
    $db = mysqli_connect($nombre_servidor, $usuario, $contrasena, $nombre_bd);

    // Establece el conjunto de caracteres en utf8mb4
    if (!$db->set_charset("utf8mb4")) {
        // die("Error al configurar el conjunto de caracteres: " . $db->error);
    }

    if(!$db) {
        // echo "<div style='text-align: center; margin-top: 50px;'>
        //         <h1>Error de conexión</h1>
        //         <p>No se pudo conectar a la base de datos. Por favor, intenta más tarde.</p>
        //       </div>";
        exit;
    } 

    return $db;
    
}