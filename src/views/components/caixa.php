<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="pluguins/jquery-3.6.4.min.js"></script>
</head>

<style>
  .popup{
    width: 300px;
    padding: 1rem;
    background: white;
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 4px );
    -webkit-backdrop-filter: blur( 4px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    position: fixed;
    bottom: 1rem;
    left: 1rem;
    z-index: 4000;
    font-family: 'Inter', sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    flex-direction: row;
    
    }

    .popup-message{
        font-size: 0.8rem;
        width: 80%;
        word-break: break-all;
        color: var(--gray-color);
    }
    .close-popup{
        border: 0;
        background: #e0e0e0;
        padding: 0.2rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        width: 30px;
        height: 30px;
        transition: all 0.5s ease-out;
       
    }

    .close-popup i{
        color: var(--dark-color);
    }
    .close-popup:hover{
        background-color:#bbbbbb;
    }
    .popup .bxs-note{
        color: var(--main-color);
    }
</style>

<div id="caixaMensagem" class="popup">
    <i class='bx bxs-note'></i>
    <p id="mensagemTexto" class="popup-message"></p>
    <button class="close-popup" onclick="fecharMensagem()"><i class='bx bx-x'></i></button>
</div>


<script src="../backend/requests/setCategorias.js"></script>    
<script src="../backend/requests/getArquivos.js"></script>    

<script>

    
function exibirMensagem(mensagem) {
  var mensagemTexto = document.getElementById('mensagemTexto');
  mensagemTexto.textContent = mensagem;

  var caixaMensagem = document.getElementById('caixaMensagem');
  caixaMensagem.style.display = 'flex';
  $('#pfdadd').fadeOut('slow');
}

function fecharMensagem() {
  var caixaMensagem = document.getElementById('caixaMensagem');
  caixaMensagem.style.display = 'none';
}

    
</script>
