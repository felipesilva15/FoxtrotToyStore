const inputCep = $('#cep')
const inputLogradouro = $('#logradouro');
const inputCidade = $('#cidade');
const inputEstado = $('#estado');

function consultarCep(cep) {
    cep = cep.replace('-', '').trim(); // Remove o traço do CEP

    // Cria config padrão do modal
    cfgModal = modal.config();
    cfgModal.type = 'info'
    cfgModal.title = 'Atenção'

    if (!cep) {
        limparCamposEndereco();

        cfgModal.body = 'Digite um CEP para realizar a busca.'
        modal.show(cfgModal);

        return;
    }

    api.request(`https://viacep.com.br/ws/${cep}/json/`, 'GET', null, true)
        .then((res) => {
            // Verifica se há dados no retorno
            if(!res || res.erro){
                limparCamposEndereco();

                cfgModal.body = 'Não foi possível encontrar o endereço para o CEP informado.'
                modal.show(cfgModal);
                
                return;
            }

            inputLogradouro.val(res.logradouro.trim());
            inputCidade.val(res.localidade.trim());
            inputEstado.val(res.uf.trim().toUpperCase());
        })
        .catch(() => {
            limparCamposEndereco();

            cfgModal.body = 'O CEP informado está incompleto.'
            modal.show(cfgModal);
        });
}

function limparCamposEndereco() {
    inputLogradouro.val('');
    inputCidade.val('');
    inputEstado.val('');
}

$('#btn-busca-cep').on('click', () => {
    consultarCep(inputCep.val());
});

$( "#tipo-endereco" ).autocomplete({
    source: ['Casa', 'Apartamento', 'Trabalho']
});

$('#address-form').on('submit', (e) => {
    $('#cep').val($('#cep').val().replace('-', '').trim());
})

$('#user-form').on('submit', (e) => {
    $('#cpf').val($('#cpf').val().replace(/[^0-9]/g, ''));
})