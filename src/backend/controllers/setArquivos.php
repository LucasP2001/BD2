<?php
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

function inserirArquivo($nomeArquivo, $caminhoArquivo,$categoriaArquivo) {
    global $mongo;

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
        'arquivo' => new MongoDB\BSON\Binary($conteudoArquivo, MongoDB\BSON\Binary::TYPE_GENERIC)
    ];

    // Definir a operação de inserção
    $insercao = new MongoDB\Driver\BulkWrite;
    $insercao->insert($documento);

    // Executar a operação de inserção
    $resultados = $mongo->executeBulkWrite('TrabalhoBD2.Arquivos', $insercao);

    if ($resultados->getInsertedCount() > 0) {
        echo "Arquivo inserido com sucesso.";
    } else {
        echo "Falha ao inserir o arquivo.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $nomeArquivo = $_FILES['arquivo']['name'];
        $caminhoArquivo = $_FILES['arquivo']['tmp_name'];
        $categoriaArquivo = $_POST["categoria"];

        inserirArquivo($nomeArquivo, $caminhoArquivo,$categoriaArquivo);
    }
}
?>
