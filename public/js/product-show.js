const qtyMax = parseInt($('#qtyItem').attr('maxLength'));

$('.qty-button').on('click', (e) => {
    qtyAction(e);
})

$('#qtyItem').on('input', (e) => {
    qtyAction(e);
})

function qtyAction(e) {
    let newItemValue = parseInt($('#qtyItem').val() ? $('#qtyItem').val() : 0) + parseInt($(e.target).attr('qty-value') ?? 0);

    $('#qtyItem').val(newItemValue);

    if (newItemValue <= 1) {
        $('#remove-qty-item').addClass('disabled');
        $('#qtyItem').val(1);
    } else {
        $('#remove-qty-item').removeClass('disabled');
    }

    if (newItemValue >= qtyMax) {
        $('#add-qty-item').addClass('disabled');
        $('#qtyItem').val(qtyMax);
    } else {
        $('#add-qty-item').removeClass('disabled');
    }
}