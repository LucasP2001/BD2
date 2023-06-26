<?php
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Definir a coleção
$collection = 'Alunos';

function pesquisarDocumentos($filtro) {
    global $mongo, $collection;
    
    // Preparar a consulta
    $query = new MongoDB\Driver\Query($filtro);

    // Executar a consulta
    $result = $mongo->executeQuery('TrabalhoBD2.' . $collection, $query);

    // Loop pelos resultados
    foreach ($result as $document) {
        var_dump($document);
    }
}

// Exemplo de uso da função para pesquisar todos os documentos na coleção
$filtro = [];

pesquisarDocumentos($filtro);
?>
