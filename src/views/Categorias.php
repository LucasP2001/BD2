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

<script src="../backend/requests/getCategorias.js"></script>    

     <h1>Upload de Arquivo</h1>

    <form method="POST" enctype="multipart/form-data" id="formsss">
        <select name="subject[]" id="categorias" style="width: 150px;">
        <option value="">Escolha a Categoria</option>
        </select>
        <button type="submit"id="bnte">Escolher</button>

    </form>

</body>

