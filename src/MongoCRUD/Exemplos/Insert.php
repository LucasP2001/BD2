<?php
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Definir a coleção
$collection = 'Alunos';

function inserirDocumento($documento) {
    global $mongo, $collection;
    
    // Preparar a operação de inserção
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($documento);

    // Executar a operação de inserção
    $result = $mongo->executeBulkWrite('TrabalhoBD2.' . $collection, $bulk);

    // Verificar se a operação de inserção foi bem-sucedida
    if ($result->getInsertedCount() > 0) {
        echo "Documento inserido com sucesso.";
    } else {
        echo "Falha ao inserir o documento.";
    }
}

// Exemplo de uso da função para inserir um documento
$documento = [
    'nome' => 'Lucas',
    'idade' => 21,
    'email' => 'joao@example.com'
];

inserirDocumento($documento);
?>
