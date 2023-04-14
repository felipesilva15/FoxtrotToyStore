$(() => {
    calculatePriceRange();
})

$('#priceRange').on('input', () => {
    calculatePriceRange();
})

$('#searchButton').on('click', (e) => {
    e.preventDefault();

    const oldUrlParams = new URLSearchParams(window.location.search);
    const urlParams = new URLSearchParams();

    // Busca por nome
    if(oldUrlParams.get('search'))
        urlParams.set('search', oldUrlParams.get('search'));

    // Categories
    $('[name="categories[]"]').each((i, element) => {
        if($(element).is(':checked'))
            urlParams.append('categories[]', $(element).val());
    });

    // Price
    if($('[name="price"]'))
        urlParams.set('price', $('[name="price"]').val());
    
    // Sort
    if($('[name="sort"] option:selected').attr('value'))
        urlParams.set('sort', $('[name="sort"] option:selected').attr('value'));

    window.location.href = `${location.pathname}?${urlParams.toString()}`
})

function calculatePriceRange(){
    $('#priceMaxRange').text(`R$ ${$('#priceRange').val()},00`)
}