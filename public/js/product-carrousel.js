let multipleCardCarousel = document.querySelector("#product-carrousel");

if (window.matchMedia("(min-width: 768px)").matches) {
    let carousel = new bootstrap.Carousel(multipleCardCarousel, { interval: false });
    let carouselWidth = $(".carousel-inner")[0].scrollWidth;
    let cardWidth = $(".carousel-item").width();
    let scrollPosition = 0;

    $("#product-carrousel .carousel-control-next").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 5) {
            scrollPosition += cardWidth;
            $("#product-carrousel .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });

    $("#product-carrousel .carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $("#product-carrousel .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });
} else {
    $(multipleCardCarousel).addClass("slide");
}