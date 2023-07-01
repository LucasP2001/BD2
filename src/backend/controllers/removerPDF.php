<?php
use MongoDB\BSON\ObjectId;
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");


function removerDocumento($filtro) {
    global $mongo;
    
    // Preparar a operação de remoção
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete($filtro);

    // Executar a operação de remoção
    $result = $mongo->executeBulkWrite('TrabalhoBD2.Arquivos', $bulk);

    // Verificar se a operação de remoção foi bem-sucedida
    if ($result->getDeletedCount() > 0) {
        echo "Documento removido com sucesso.";
    } else {
        echo "Nenhum documento foi removido.";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $idArquivo = new ObjectId($_GET['id']);
        $filtro = ['_id' => $idArquivo];
        echo $idArquivo;
        removerDocumento($filtro);
        
    }
}

?>
