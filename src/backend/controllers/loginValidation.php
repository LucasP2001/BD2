<?php    
    $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
     
    if(isset($_GET['type'])){
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
      
        $query = new MongoDB\Driver\Query(['email' => $email]);
        $cursor = $mongo->executeQuery('TrabalhoBD2.Usuarios', $query);
        $resultado = current($cursor->toArray());

        if ($resultado) {
            $cursor = $mongo->executeQuery('TrabalhoBD2.Usuarios', $query);
        }
        else{
            header('Location: ../../views/login.php?invalid=1');
        }

        foreach ($cursor as $document) {
    
            $numero_id = substr($document->_id, 0, 24);
        // Comparar a senha fornecida com a senha armazenada (você pode usar uma função de hash para armazenar as senhas com segurança)
        if ($document->senha == $senha) {
            session_start();
            $_SESSION['user_id'] = $numero_id;
            $_SESSION['user_name'] = $document->nome;
            $_SESSION['remove'] =0;

          
          header('Location: ../../views/workspace.php');
        } else {
          header('Location: ../../views/login.php?invalid=1');
        }
    
       
    }
    } 

    
    
    
?>