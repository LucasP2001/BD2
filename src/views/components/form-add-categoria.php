<style>
    .categoria-container {
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
<div class="categoria-container" id="add_categorias">
    <div class="form-content">
        <button class="close-btn" id="close-categoria"> <i class='bx bx-x' ></i></button>
        <p>Adicionar Categoria</p>
        <form action="" id="form-add-categoria"> 
            <input type="text" name="nome" placeholder="Digite o titulo da Categoria">
            <input type="submit" value="Salvar Categoria">
        </form>
    </div>
</div>


<script>
     $('#add_categorias').hide();
    $('#close-categoria').click(function(){
        $('#add_categorias').fadeOut('slow');
    })
</script>