<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$userId = $_SESSION['user_id'];  
$userName = $_SESSION['user_name'];
$Letra = substr($userName, 0, 1);
$remove = $_SESSION['remove'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/workspace.css">
    <script src="pluguins/jquery-3.6.4.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Workspace</title>
</head>

<body>
    

    <?php include "components/caixa.php" ?>
    <?php include "components/confirm.php" ?>
    <?php include "components/form-add-pdf.php" ?>
    <?php include "components/form-add-categoria.php" ?>
    <?php include "components/form-edit-pdf.php" ?>

    <div class="container">
        <div class="menu-lateral">
            <div class="user-info">
                <p class="user-perfil"><?php echo $Letra; ?></p>
                
                <p>Bem Vindo, <?php echo $userName; ?></p>
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
                <div class="cat-label" id="categorias-label">
                    <label for=""class="active">Todos</label>
                </div>
            </div>
            <div class="pdf-content">
                <p class="title">Lista de PDF</p>
                <div class="busca">
                    <input id="pesquisa-arquivo" type="text" placeholder="Digite um titulo para buscar">
                    <button onclick=" pesquisar()"><i class='bx bx-search'></i></button>
                </div>
                <div class="pdf-list" id="list-pdf">
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
                        <div id="pdfaction">
                            <button onclick="window.location.href='login.php'"><i class="bx bx-book-open"></i></button>
                            <button onclick=""><i class="bx bxs-edit"></i></button>
                            <button><i class="bx bxs-trash-alt"></i></button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="../backend/requests/getArquivo.js"></script>
    <script src="../backend/requests/getCategorias.js"></script>

    <script>
        function pesquisar(){
            var nome = document.getElementById('pesquisa-arquivo').value;
            arquivoPesquisar(nome);
        }
        $('#add-categoria').click(function () {
            $('.categoria-container').fadeIn('slow');
        })

        $('#add-pdf').click(function () {
            $('.pdf-container').fadeIn('slow');
        })
    </script>
</body>

<?php if($remove ==1){
        echo " <script>  exibirMensagem('Arquivo Removido com Sucesso!'); </script>";
        session_start();
        $_SESSION['remove']=0;
        $remove = 0;
    }
    ?>

</html>