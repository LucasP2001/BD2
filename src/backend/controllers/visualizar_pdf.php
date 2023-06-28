<?php

use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Exception\Exception as MongoDBException;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

function abrirArquivoPDF($idArquivo) {
    try {
        $manager = new Manager("mongodb://localhost:27017");
        $query = new Query(['_id' => new ObjectId($idArquivo)]);

        $cursor = $manager->executeQuery('TrabalhoBD2.Arquivos', $query);
        $documento = current($cursor->toArray());

        if ($documento !== null && isset($documento->arquivo)) {
            $arquivoBinario = $documento->arquivo->getData();

            // Configurar os cabeçalhos para o navegador reconhecer o conteúdo como um PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="arquivo.pdf"');

            // Exibir o conteúdo do arquivo PDF
            echo $arquivoBinario;
            exit;
        } else {
            echo "Arquivo não encontrado.";
        }
    } catch (MongoDBException $e) {
        echo "Ocorreu um erro: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $idArquivo = $_GET['id'];
        abrirArquivoPDF($idArquivo);
    }
}
?>
