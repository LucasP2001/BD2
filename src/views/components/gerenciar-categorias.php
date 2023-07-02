<style>
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
</style>
<div class="gerenciar-container" id="add_categorias">
    <div class="form-content">
        <button class="close-btn" id="close-gerenciar"> <i class='bx bx-x' ></i></button>
        <p>Gerenciar Categorias</p>
        <div id="categoria-list">
            <div class="categoria-card">
                <p>Categoria X</p>
                <div class="btn-action">
                    <button><i class="bx bx-edit"></i></button>
                    <button><i class="bx bx-trash"></i></button>
                </div>
                
            </div>
        </div>
    </div>
</div>


<script>
     $('.gerenciar-container').hide();

  

   $('#close-gerenciar').click(function(){
    $('.gerenciar-container').fadeOut('slow')
   })
</script>