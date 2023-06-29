



//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function getCategorias() {

    var dados = {
        collection: 'Categorias',
        id_user: '649999dd075915e4c90fca77'
    }   

    var dadosJson = JSON.stringify(dados);
  
            
    $.ajax({
        url: '../backend/controllers/getCategorias.php',
        method: 'post',
        data: {
            data: dadosJson
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);


            var length = response.length;

           for (var i = 0; i < length; i++) {
                

                $('#categorias').append(''+
                '<option value="'+response[i].id+'">'+response[i].nome+'</option>'+
                '</div>');

           }


           document.getElementById("categorias").addEventListener("change", function() {
            // Obtendo o valor e o texto da opção selecionada
            var select = document.getElementById("categorias");
            var selectedOption = select.options[select.selectedIndex];
            var valorSelecionado = selectedOption.value;
            var textoSelecionado = selectedOption.text;
        
            // Exibindo os resultados no console
            console.log("Valor selecionado: " + valorSelecionado);
            console.log("Texto selecionado: " + textoSelecionado);
        });
        document.getElementById("bnte").addEventListener("click", function() {
            event.preventDefault();
            // Obtendo o valor e o texto da opção selecionada
            var select = document.getElementById("categorias");
            var selectedOption = select.options[select.selectedIndex];
            var valorSelecionado = selectedOption.value;
            var textoSelecionado = selectedOption.text;
        
            // Exibindo os resultados no console
            console.log("Valor selecionado: " + valorSelecionado);
            console.log("Texto selecionado: " + textoSelecionado);
            
            
        });
          

        }
    });

   

}




getCategorias()