<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Inserir</title>
    <script src="pluguins/jquery-3.6.4.min.js"></script>
</head>
<body>

<script src="../backend/requests/setArquivos.js"></script>    

     <h1>Upload de Arquivo</h1>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo" required>
        <input type="text" name="categoria">
        <button type="submit">Enviar</button>
    </form>

</body>

