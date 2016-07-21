<?php
  try {
    $con = new PDO("mysql:host=localhost;dbname=cadastro_escolar", "root", "senha123");
  }
  catch(PDOException $e) {
    echo "Error na conexão PDO: " . $e;
  }
