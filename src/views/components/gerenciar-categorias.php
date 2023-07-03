<style>
     .gerenciar-categoria-container {
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

    .form-content input[type="file"] {
        display: none;
    }

    .add-label {
        border: 3px dashed #ccc;
        border-radius: 10px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    select {
        padding: 0.5rem;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .close-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 1.2rem;
        border: 0;
        cursor: pointer;
        background: 0;
    }
   /**/

    .gerenciar-container {
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

    .form-catego {
        width: 400px;
        height: 130px;
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

    .close-btn{
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 1.2rem;
        border: 0;
        cursor: pointer;
        background: 0;
    }

    #categoria-list{
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: center;
        width: 90%;
        height: 400px;
        overflow-y: auto;
    }

    .categoria-card{
        display: flex;
        width: 90%;
        border: 1px solid #ccc;
        gap: 0.5rem;
        padding: 0.5rem;
        justify-content: space-between;
        align-items: center;
        border-radius: 6px;
    }
    .btn-action{
        display: flex;
        gap:0.3rem;
    }

    .btn-action button{
        background-color: #1b61d1;
        border: 0;
        color: #fff;
        border-radius: 6px;
        width: 30px;
        height: 30px;
        cursor: pointer;
    }
    select{
        width: 250px;
        padding: 0.5rem;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
</style>
<div class="gerenciar-container" id="">
    <div class="form-catego">
        <button class="close-btn" id="close-gerenciar"> <i class='bx bx-x' ></i></button>
        <p>Gerenciar Categorias</p>
        <div id="categoria-list">
            <div class="categoria-card" id="gerenciador-cate">
            <select name="categoria" id="categoria-editar">
                <option value="">Nenhuma Categoria</option>
            </select>
                <div class="btn-action">
                    <button id="edit-btn-geren"><i class="bx bx-edit"></i></button>
                    <button id="removbe-bnt-geren"><i class="bx bx-trash"></i></button>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="gerenciar-categoria-container" id="gerenciar_categorias">
    <div class="form-content">
        <button class="close-btn" id="close-edit-gerenciar"> <i class='bx bx-x'></i></button>
        <p>Alterar Categoria</p>
        <form action="" id="form-edit-categoria">
            <input id="nome-novoC" type="text" name="edit-nome" placeholder="Digite o titulo da Categoria">
            <input type="submit" value="Salvar Categoria">
        </form>
    </div>
</div>


<script>
     $('.gerenciar-container').hide();

     $('#removbe-bnt-geren').click(function(){
        var bnt_edit = document.getElementById('categoria-editar');
        var _id = bnt_edit.value;
        if(_id != ""){
         window.location.href= "../backend/controllers/removerCategoria.php?id="+_id;
         $('.gerenciar-container').fadeOut('slow')
         }else{
            exibirMensagem('Selecione uma Categoria para Deletar!');
         }
        
       
     })

     $('#edit-btn-geren').click(function(){
        var bnt_edit = document.getElementById('categoria-editar');
        
        var id_categoria = bnt_edit.value;

         if(id_categoria != ""){
         $('.gerenciar-container').fadeOut('slow');
         $('.gerenciar-categoria-container').fadeIn('slow');
         
         var nome_categoria =document.getElementById('nome-novoC');
         nome_categoria.value = bnt_edit.options[bnt_edit.selectedIndex].text;
         
         document.getElementById('form-edit-categoria').addEventListener('submit', function(event) { 
         event.preventDefault(); 

         var nome_novo = nome_categoria.value;
        
         var dados = {
            _id: id_categoria,
            nome: nome_novo
        }   
        var dadosJson = JSON.stringify(dados);
    
     $.ajax({
        url: '../backend/controllers/updateCategorias.php',
        method: 'post',
        data: {
            data: dadosJson
        },
        dataType: 'json',
        success: function (response) { 
           
        }
    });
        getCategorias();
        $('.gerenciar-categoria-container').fadeOut('slow');
        exibirMensagem('Categoria alterada com Sucesso!');
          });

         }else{
            exibirMensagem('Selecione uma Categoria para Alterar!');
         }
        
     })

     $('#close-gerenciar').click(function(){
      $('.gerenciar-container').fadeOut('slow')
     })

     $('.gerenciar-categoria-container').hide();


    
$('#close-edit-gerenciar').click(function () {
    $('.gerenciar-categoria-container').fadeOut('slow');
})
</script>