



//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function getInfoArquivos() {

    var dados = {
        collection: 'Arquivos'
    }   

    var dadosJson = JSON.stringify(dados);

    $.ajax({
        url: 'find.php',
        method: 'post',
        data: {
            data: dadosJson
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);


            var length = response.length;

           for (var i = 0; i < length; i++) {
                

                $('#ind').append(''+
                '<p>Nome do PDF: '+response[i].nome+'</p>' +
                '</div>');
           }


        }
    });

}
getInfoArquivos()