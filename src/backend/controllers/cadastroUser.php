<?php
use Symfony\Component\Console\Output\ConsoleOutput;
    session_name('user');
    session_start();
    header("Access-Control-Allow-Origin: *");
    
    $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
     
    if(isset($_GET['type'])){
        $username =$_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

    

    $documento = [
        'nome' => $username,
        'email' => $email,
        'senha' => $senha
    ];
}

    // Preparar a operação de inserção
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($documento);

    // Executar a operação de inserção
    $result = $mongo->executeBulkWrite('TrabalhoBD2.Usuarios', $bulk);

    // Verificar se a operação de inserção foi bem-sucedida
    if ($result->getInsertedCount() > 0) {
         header('Location: ../../views/login.php?user=1');
    } else {
       
    }


// Exemplo de uso da função para inserir um documento

?>
