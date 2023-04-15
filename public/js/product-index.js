$(() => {
    calculatePriceRange();
})

$('#priceRange').on('input', () => {
    calculatePriceRange();
})

$('#searchButton').on('click', (e) => {
    e.preventDefault();

    search();
})

function calculatePriceRange(){
    $('#priceMaxRange').text(`R$ ${$('#priceRange').val()},00`)
}

function search(page){
    const oldUrlParams = new URLSearchParams(window.location.search);
    const urlParams = new URLSearchParams();

    // Search for name
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

    // Per page
    if($('[name="per_page"] option:selected').attr('value'))
        urlParams.set('per_page', $('[name="per_page"] option:selected').attr('value'));

    // Page
    if(page)
        urlParams.set('page', page);

    window.location.href = `${location.pathname}?${urlParams.toString()}`
}

$('#next-page').on('click', (e) => {
    e.preventDefault();

    const oldUrlParams = new URLSearchParams(window.location.search);

    let page = oldUrlParams.get('page') ?? 1;

    page++

    search(page);
})

$('#previous-page').on('click', (e) => {
    e.preventDefault();

    const oldUrlParams = new URLSearchParams(window.location.search);

    let page = oldUrlParams.get('page') ?? 1;

    if(page >= 2){
        page -= 1;
    }

    search(page);
})

$('.page-link-button').each((i, element) => {
    $(element).on('click', (e) => {
        e.preventDefault();

        search($(element).attr('page_number'));
    })
})