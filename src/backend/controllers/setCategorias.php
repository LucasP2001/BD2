<?php
session_start();
$userId = $_SESSION['user_id']; 
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

function inserirCategoria($nomeCategoria) {
    global $mongo, $userId;

    $documento = [
        '_id' => new MongoDB\BSON\ObjectID(),
        'nome' => $nomeCategoria,
        'usuario' => $userId
    ]; 

    // Definir a operação de inserção
    $insercao = new MongoDB\Driver\BulkWrite;
    $insercao->insert($documento);

    // Executar a operação de inserção
    $resultados = $mongo->executeBulkWrite('TrabalhoBD2.Categorias', $insercao);

    if ($resultados->getInsertedCount() > 0) {
        echo "Categoria inserida com sucesso.";
    } else {
        echo "Falha ao inserir o Categoria";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomeCategoria = $_POST['nome'];
        inserirCategoria($nomeCategoria);
    }

?>
