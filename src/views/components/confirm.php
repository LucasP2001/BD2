<?php ?>
<style>
   .caixa-confirmacao {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border-radius: 15px;
  text-align: center;
  display: none;
  transform: translate(-50%, -50%);
  z-index: 100;
}
.caixa-confirmacao p{
    color: #000080  ;
}
.caixa-confirmacao button{
  margin-top: 7px;
    width: 70px;
    color: white  ;
    background-color: rgb(66, 135, 245);
    border-radius: 5px;
    border-color:rgb(66, 135, 245);
}

#sim:hover{
      color: #006400;
      background-color: #e3fbe3;
      border-color: green;
}

#nao:hover{
      color: #cc0000;
      background-color: #ff9e81;
      border-color: red;
}


.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 99; 
  backdrop-filter: blur(1px);
  display: none;
}


</style>

<!-- Caixa de confirmação -->
<div id="caixaConfirmacao" class="caixa-confirmacao">
  <p>Você deseja remover?</p>
  <p id="men"></p>
  <button id="sim">Sim</button>
  <button id= "nao"onclick="fecharConfirmacao()">Cancelar</button>
</div>
<div id="overlay" class="overlay"></div>

<script>
  function exibirConfirmacaoRemocao(_id, nome) {
  
  var caixaConfirmacao = document.getElementById('caixaConfirmacao');
  var caixaNome = document.getElementById('men');
  caixaNome.textContent = nome;
  caixaConfirmacao.style.display = 'block';
  var overlay = document.getElementById('overlay');
  overlay.style.display = 'block';
  document.getElementById('sim').addEventListener('click', minhaFuncao);

  function minhaFuncao() {
    exibirMensagem('Arquivo Removido com Sucesso!');
    window.location.href= "../backend/controllers/removerPDF.php?id="+_id;
}

}

function fecharConfirmacao() {
  var caixaConfirmacao = document.getElementById('caixaConfirmacao');
  caixaConfirmacao.style.display = 'none';
  var overlay = document.getElementById('overlay'); 
  overlay.style.display = 'none';
}




</script>
<?php ?>