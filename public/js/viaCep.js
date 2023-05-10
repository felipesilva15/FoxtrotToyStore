// document.getElementById('cep').addEventListener('keydown', function(event) {
//     if (event.key === 13) { // verifica se a tecla Enter foi pressionada
//         event.preventDefault(); // evita o envio do formulário

//         let cep = event.target.value.replace('-', ''); // remove o traço do CEP

//         // faz uma solicitação AJAX para a API ViaCEP
//         let request = new XMLHttpRequest();
//         request.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/');
//         request.onload = function() {
//             if (request.status === 200) {
//                 let endereco = JSON.parse(request.responseText);

//                 // atualiza os campos do formulário com as informações do endereço
//                 document.getElementById('logradouro').value = endereco.logradouro;
//                 document.getElementById('numero').value = '';
//                 document.getElementById('cidade').value = endereco.localidade;
//                 document.getElementById('estado').value = endereco.uf;
//                 // atualize os demais campos do formulário com os dados do endereço retornado
//             } else {
//                 alert('Não foi possível encontrar o endereço para o CEP informado.');
//             }
//         };
//         request.send();
//     }
// });

function consultaCep(cep) {
    cep = cep.replace('-', ''); // remove o traço do CEP

    // faz uma solicitação AJAX para a API ViaCEP
    let request = new XMLHttpRequest();
    request.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/');
    request.onload = function() {
        if (request.status === 200) {
            let endereco = JSON.parse(request.responseText);

            // atualiza os campos do formulário com as informações do endereço
            document.getElementById('logradouro').value = endereco.logradouro;
            document.getElementById('numero').value = '';
            document.getElementById('cidade').value = endereco.localidade;
            document.getElementById('estado').value = endereco.uf;
            // atualize os demais campos do formulário com os dados do endereço retornado
        } else {
            alert('Não foi possível encontrar o endereço para o CEP informado.');
        }
    };
    request.send();
}

let ENDERECO_CEP = document.getElementById("cep");
ENDERECO_CEP.addEventListener("input", validarNumeros);

function validarNumeros() {
    let input = event.target;
    let valor = input.value;
    let novoValor = valor.replace(/[^0-9]/g, '');
    input.value = novoValor;
  }
