<?php
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Definir a coleção
$collection = 'Alunos';

function removerDocumento($filtro) {
    global $mongo, $collection;
    
    // Preparar a operação de remoção
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete($filtro);

    // Executar a operação de remoção
    $result = $mongo->executeBulkWrite('TrabalhoBD2.' . $collection, $bulk);

    // Verificar se a operação de remoção foi bem-sucedida
    if ($result->getDeletedCount() > 0) {
        echo "Documento removido com sucesso.";
    } else {
        echo "Nenhum documento foi removido.";
    }
}

// Exemplo de uso da função para remover o documento com nome "João"
$filtro = ['nome' => 'João'];

removerDocumento($filtro);
?>
