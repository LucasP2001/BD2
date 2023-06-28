<?php
// Linha de conexão com o MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

function inserirArquivo($nomeArquivo, $caminhoArquivo) {
    global $mongo;

    // Ler o conteúdo do arquivo
    $conteudoArquivo = file_get_contents($caminhoArquivo);

    // Criar um documento para o arquivo
    $documento = [
        '_id' => new MongoDB\BSON\ObjectID(),
        'nome' => $nomeArquivo,
        'conteudo' => new MongoDB\BSON\Binary($conteudoArquivo, MongoDB\BSON\Binary::TYPE_GENERIC)
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

        inserirArquivo($nomeArquivo, $caminhoArquivo);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserir Arquivo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <h1>Inserir Arquivo</h1>

    <form method="post" enctype="multipart/form-data" id="formArquivo">
        <input type="file" name="arquivo" id="inputArquivo">
        <input type="submit" value="Enviar" id="btnEnviar">
    </form>

    <script>
        $(document).ready(function() {
            $('#formArquivo').submit(function(e) {
                e.preventDefault();

                // Verificar se um arquivo foi selecionado
                if ($('#inputArquivo').val() === '') {
                    alert('Selecione um arquivo.');
                    return;
                }

                // Obter o arquivo selecionado
                var arquivo = $('#inputArquivo')[0].files[0];
                var formData = new FormData();
                formData.append('arquivo', arquivo);

                // Enviar o arquivo para o PHP usando AJAX
                $.ajax({
                    url: window.location.href,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao enviar o arquivo.');
                    }
                });
            });
        });
    </script>
</body>
</html>
