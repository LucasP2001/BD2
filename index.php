<?php



$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");


$query = new MongoDB\Driver\Query([]);

//Executa a consulta

$collection = 'Alunos';
$ind=1;
// Documento a ser inserido
if($ind==2){

$document = [
    'nome' => 'João',
    'idade' => 25,
    'email' => 'joao@example.com'
];

// Preparar a operação de inserção
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert($document);

// Executar a operação de inserção
$result = $mongo->executeBulkWrite('TrabalhoBD2.' . $collection, $bulk);

// Verificar se a operação de inserção foi bem-sucedida
if ($result->getInsertedCount() > 0) {
    echo "Documento inserido com sucesso.";
} else {
    echo "Falha ao inserir o documento.";
}
}

$result = $mongo->executeQuery('TrabalhoBD2.Alunos', $query);

 //Loop pelos resultados
foreach ($result as $document) {
    var_dump($document);
    echo"<br>";
}


?>