<?php
use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Exception\Exception as MongoDBException;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

// Conectar-se ao MongoDB e recuperar o arquivo DOCX armazenado
$manager = new Manager("mongodb://localhost:27017");
$databaseName = 'TrabalhoBD2';
$collectionName = 'Arquivos';
$documentId = '6499eb0d075915e4c90fca85'; // ID do documento no MongoDB

$query = new Query(['_id' => new ObjectId($documentId)]);
$cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

if (!$cursor->isDead()) {
    $documento = current($cursor->toArray());
    $docxConteudo = $documento->conteudo->getData();

    // Salvar o conteúdo do arquivo DOCX como um arquivo temporário
    $tempFilePath = 'caminho/para/arquivo_temporario.docx';
    file_put_contents($tempFilePath, $docxConteudo);

    // Redirecionar o usuário para o arquivo DOCX para que seja aberto no Word
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="arquivo_temporario.docx"');
    header('Content-Length: ' . filesize($tempFilePath));

    readfile($tempFilePath);
} else {
    die("Documento não encontrado.");
}
