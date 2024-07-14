<?php
require __DIR__ . '/../vendor/autoload.php'; // Asegúrate de que la ruta es correcta

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();
use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;

$firebaseConfig = require __DIR__ . '../../firebase/firebase_config.php';
$factory = (new Factory)->withServiceAccount($firebaseConfig['credentials']);
$storage = $factory->createStorage();

$dbHost = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME'];
$dbUser = $_ENV['DB_USER'];
$dbPass = $_ENV['DB_PASSWORD'];
    $conexion = mysqli_connect($dbHost, $dbUser,$dbPass, $dbName);
    $tildes = $conexion->query("SET NAMES 'utf8'");
    if(mysqli_connect_error()){
        die('No se puede conectar a la base de datos'.mysqli_connect_error());
    }
