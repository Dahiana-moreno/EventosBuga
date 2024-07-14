<?php
use Dotenv\Dotenv;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$googleCredential = $_ENV['GOOGLE_APPLICATION_CREDENTIALS'];
$idProject = $_ENV['ID_PROJECT'];
$storageBucket = $_ENV['STORAGE_BUCKET'];
return [
  'projectId' => $idProject,
  'storageBucket' => $storageBucket,
  'credentials' => __DIR__.$googleCredential
];

