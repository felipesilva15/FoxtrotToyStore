// Autocomplete products
$(() => {
    api.request('/products', 'get')
        .then((res) => {
            $( "#search-input" ).autocomplete({
                source: res
            });
        })
        .catch((err) => {
            console.log(err);
        });
});
