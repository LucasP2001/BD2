<?php
use MongoDB\BSON\ObjectId;
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");


$dadosJson = $_POST['data'];
$data = json_decode($dadosJson, true);

//coleção
$_id =  new ObjectId($data['_id']);
$nome =  $data['nome'];
$categoria = $data['categoria'];


function atualizarDocumento($filtro, $atualizacao) {
    global $mongo;
    
    // Preparar a operação de atualização
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update($filtro, $atualizacao);
   
    // Executar a operação de atualização
    $result = $mongo->executeBulkWrite('TrabalhoBD2.Arquivos', $bulk);

    // Verificar se a operação de atualização foi bem-sucedida
    if ($result->getModifiedCount() > 0) {
        session_start();
        $_SESSION['updateA']=1;  
    } else {
        echo "Nenhum documento foi atualizado.";
    }
   
}

// Exemplo de uso da função para atualizar o documento com nome "João"

$filtro = ['_id' => $_id];
$atualizacao = ['$set' => ['nome' => $nome, 'categoria' => $categoria]];

atualizarDocumento($filtro, $atualizacao);

?>
