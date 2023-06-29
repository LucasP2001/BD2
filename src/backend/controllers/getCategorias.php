

<?php
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");


$dadosJson = $_POST['data'];
$data = json_decode($dadosJson, true);

//coleção
$collection =  $data['collection'];
$id_user =  $data['id_user'];
//id do aluno que eu quero "aluno"=>"649999dd075915e4c90fca77"
$filtro = ['usuario'=> $id_user];


// Defina a consulta para obter os arquivos desejados

function pesquisarDocumentos($filtro) {
    global $mongo, $collection;

    $query = new MongoDB\Driver\Query($filtro);

// Execute a consulta
$resultSet = $mongo->executeQuery('TrabalhoBD2.' . $collection, $query);

// Crie um array para armazenar os dados dos arquivos
$files = [];

// Itere sobre o resultado e adicione os dados dos arquivos ao array
foreach ($resultSet as $document) {
    
    $numero_id = substr($document->_id, 0, 24);


    $file = [
        'id'=> $numero_id,
        'nome' => $document->nome,
    ];
    $files[] = $file;
}
$json = json_encode($files);

// Retorna a resposta JSON
header('Content-Type: application/json');

echo $json;
}


pesquisarDocumentos($filtro);
// Converte o array em formato JSON

?>
