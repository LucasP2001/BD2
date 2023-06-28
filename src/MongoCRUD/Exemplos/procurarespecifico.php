<?php
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Definir a coleção
$collection = 'Alunos';

function buscarEmail($filtro) {
    global $mongo, $collection;
    
    // Preparar a consulta
    $query = new MongoDB\Driver\Query($filtro);

    // Executar a consulta
    $result = $mongo->executeQuery('TrabalhoBD2.' . $collection, $query);

    // Obter o primeiro documento encontrado
    $document = $result->toArray()[0];

    if ($document) {
        $email = $document->email;
        echo "O email é: " . $email;
    } else {
        echo "Nenhum documento encontrado.";
    }
}

// Exemplo de uso da função para buscar o email de um documento com nome "João"
$filtro = ['nome' => 'João'];

buscarEmail($filtro);
?>
