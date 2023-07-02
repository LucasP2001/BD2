<?php
session_start();
$userId = $_SESSION['user_id']; 
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

function inserirArquivo($nomeArquivo, $caminhoArquivo,$categoriaArquivo,$dataUpload) {
    global $mongo, $userId;

    // Ler o conteúdo do arquivo
    $conteudoArquivo = file_get_contents($caminhoArquivo);

    // Obter o tamanho do arquivo
    $tamanhoArquivo = filesize($caminhoArquivo);

    // Criar um documento para o arquivo
    $documento = [
        '_id' => new MongoDB\BSON\ObjectID(),
        'nome' => $nomeArquivo,
        'categoria' =>$categoriaArquivo,
        'tamanho' => $tamanhoArquivo,
        'data' => $dataUpload,
        'arquivo' => new MongoDB\BSON\Binary($conteudoArquivo, MongoDB\BSON\Binary::TYPE_GENERIC),
        'usuario' => $userId
    ]; 

    // Definir a operação de inserção
    $insercao = new MongoDB\Driver\BulkWrite;
    $insercao->insert($documento);

    // Executar a operação de inserção
    $resultados = $mongo->executeBulkWrite('TrabalhoBD2.Arquivos', $insercao);

    if ($resultados->getInsertedCount() > 0) {
        
    } else {
        
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $nomeArquivo = $_POST['nome'];
        $caminhoArquivo = $_FILES['arquivo']['tmp_name'];
        $categoriaArquivo = $_POST["categoria"];
        date_default_timezone_set('America/Manaus');
        $dataUpload = date('Y-m-d');
        inserirArquivo($nomeArquivo, $caminhoArquivo, $categoriaArquivo, $dataUpload);
    }
}
?>
