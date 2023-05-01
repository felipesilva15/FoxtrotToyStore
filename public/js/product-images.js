const multipleCardImageCarousel = document.querySelector("#product-images");
const productImageACtive = $('#product-image-active');

if (window.matchMedia("(min-width: 768px)").matches) {
    let carousel = new bootstrap.Carousel(multipleCardImageCarousel, { interval: false });
    let carouselWidth = $("#product-images .carousel-inner")[0].scrollWidth;
    let cardWidth = $("#product-images .carousel-item").width();
    let scrollPosition = 0;

    $("#product-images .carousel-control-next").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 5) {
            scrollPosition += cardWidth;
            $("#product-images .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });

    $("#product-images .carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $("#product-images .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });
} else {
    $(multipleCardImageCarousel).addClass("slide");
}

$('#product-images .carousel-item').on('click', (e) => {
    $(productImageACtive).attr('src', $(e.target).attr('src'));
})