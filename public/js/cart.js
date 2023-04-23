$('.form-qty').each((i, element) => {
    const form = $(element);

    form.on('submit', (e) => {
        //e.preventDefault()
    });
});

$('.remove-qty-item').each((i, element) => {
    $(element).on('click', (e) => {
        modifyQuantityInput(element, -1);
    });
});

$('.add-qty-item').each((i, element) => {
    $(element).on('click', (e) => {
        modifyQuantityInput(element, 1);
    });
});

function modifyQuantityInput(element, qty){
    const form = $(element).parent('form');
    const qtyInput = $(form).children('input[name="qtyItem"]');

    $(qtyInput).val(parseInt($(qtyInput).val()) + qty);
}