<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/workspace.css">
    <script src="pluguins/jquery-3.6.4.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Workspace</title>
</head>

<body>
    <?php include "components/form-add-pdf.php" ?>
    <?php include "components/form-add-categoria.php" ?>
    <div class="container">
        <div class="menu-lateral">
            <div class="user-info">
                <p class="user-perfil">D</p>
                <p>Bem Vindo, Djhérondhy</p>
            </div>
            <div class="button">
                <button id="add-categoria">
                    <i class='bx bx-add-to-queue'></i>Adicionar Categoria
                </button>
                <button id="add-pdf">
                    <i class='bx bx-folder-plus'></i>Adicionar PDF
                </button>
            </div>
        </div>
        <div class="content">
            <div class="categoria-header">
                <p class="title">Categorias</p>
                <div class="cat-label">
                    <label for="" class="active">Todos</label>
                    <label for="">Exemplo 1</label>
                    <label for="">Exemplo 2</label>
                </div>
            </div>
            <div class="pdf-content">
                <p class="title">Lista de PDF</p>
                <div class="pdf-list">
                    <div class="pdf-card">
                        <i class="bx bxs-file-pdf pdf-icon"></i>
                        <p class="pdf_title">Banco de Dados PDF</p>
                        <p class="data"><i class="bx bx-calendar"></i>2023-06-30</p>
                    </div>
                    <div class="pdf-card">
                        <i class="bx bxs-file-pdf pdf-icon"></i>
                        <p class="pdf_title">Mongo DB</p>
                        <p class="data"><i class="bx bx-calendar"></i>2023-06-30</p>
                    </div>
                    <div class="pdf-card">
                        <i class="bx bxs-file-pdf pdf-icon"></i>
                        <p class="pdf_title">Senhor dos Anéis</p>
                        <p class="data"><i class="bx bx-calendar"></i>2023-06-30</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        $('#add-categoria').click(function () {
            $('.categoria-container').fadeIn('slow');
        })

        $('#add-pdf').click(function () {
            $('.pdf-container').fadeIn('slow');
        })
    </script>
</body>

</html>