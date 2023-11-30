<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\SystemServices\MonologFactory;
use App\Persistence\ConnectionFactory;

$logger = MonologFactory::getInstance()->info("Teste logger");

try {
     $conn = ConnectionFactory::getConnection();

     $stmt = $conn->query("SELECT * FROM tabelateste");

 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['id'] . ", Nome: " . $row['nome'] .  "<br>";
    }

} catch (PDOException $e) {
    $logger = MonologFactory::getInstance()->info("Erro na consulta ao banco de dados: " . $e->getMessage());
}

echo "Salve!";
