<style>
    .edit-container {
         backdrop-filter: blur(1px);
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
        position: fixed;
        z-index: 2000;
    }

    .form-content {
        width: 400px;
        padding: 2.5rem 1rem;
        background-color: #fff;
        border-radius: 30px;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .form-content form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 80%;
    }

    .form-content form input {
        padding: 0.5rem;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .form-content form input[type="submit"] {
        background: rgb(66, 135, 245);
        color: #fff;
        border: 0;
        cursor: pointer;
    }
    .form-content input[type="file"]{
        display: none;
    }

    .add-label{
        border: 3px dashed #ccc;
        border-radius: 10px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content:center;
        cursor: pointer;
    }
    select{
        padding: 0.5rem;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .close-btn{
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 1.2rem;
        border: 0;
        cursor: pointer;
        background: 0;
    }
</style>



<div class="edit-container">
    <div class="form-content">
        <button class="close-btn" id="close-edit"> <i class='bx bx-x' ></i></button>
        <p>Editar PDF</p>
        
        
        <form method="POST" id="form-edit-pdf" enctype="multipart/form-data"> 
           <input type="text" name="nome" value="" id="nome-pdff"placeholder="Digite o titulo do PDF">
            <label for="">Categoria</label>
            <select name="categoria" id="pdf-categoria-editar">
                <option value="">Nenhuma Categoria</option>
            </select>
            <input type="submit" value="Salvar PDF" id="salvaredit">
        </form>
    </div>
</div>


<script>

    $('.edit-container').hide();
    $('#close-edit').click(function(){
        $('.edit-container').fadeOut('slow');
        getInfoArquivos();
        getCategorias();
    })
</script>