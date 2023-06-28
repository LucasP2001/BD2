<?php
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");


$dadosJson = $_POST['data'];
$data = json_decode($dadosJson, true);

//coleção
$collection =  $data['collection'];
// Definir a coleção
$collection = 'Alunos';

function atualizarDocumento($filtro, $atualizacao) {
    global $mongo, $collection;
    
    // Preparar a operação de atualização
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update($filtro, $atualizacao);

    // Executar a operação de atualização
    $result = $mongo->executeBulkWrite('TrabalhoBD2.' . $collection, $bulk);

    // Verificar se a operação de atualização foi bem-sucedida
    if ($result->getModifiedCount() > 0) {
        echo "Documento atualizado com sucesso.";
    } else {
        echo "Nenhum documento foi atualizado.";
    }
}

// Exemplo de uso da função para atualizar o documento com nome "João"
$filtro = ['nome' => 'João'];
$atualizacao = ['$set' => ['nome' => 'Lucas']];

atualizarDocumento($filtro, $atualizacao);
?>
