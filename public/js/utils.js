function loadInputMasks(){
    // CPF
    if($('.cpfMask').length){
        new Cleave('.cpfMask', {
            delimiters: ['.', '.', '-'],
            blocks: [3, 3, 3, 2],
            numericOnly: true
        });
    }

    // CEP
    if($('.cepMask').length){
        new Cleave('.cepMask', {
            delimiters: ['-'],
            blocks: [5, 3],
            numericOnly: true
        });
    }
}

function loadTextMasks(){
    // CPF
    if($('.cpfTextMask').length){
        $('.cpfTextMask').each((i, element) => {
            element.textContent = element.textContent.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');            
        });
    }
}

loadInputMasks();
loadTextMasks();