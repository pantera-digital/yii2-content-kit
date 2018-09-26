function initSlider(id, config) {
    let owlOptions = {
        loop: true,
        items: 1,
        dots: false,
        nav: true,
        autoplay: false,
        mouseDrag: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 8 12.969">' +
            '<path d="M127.255,252.782q3.093-2.772,6.185-5.544c0.848-.76,2.114.475,1.262,1.239q-2.' +
            '752,2.466-5.5,4.933,2.766,2.552,5.531,5.107a0.884,0.884,0,0,1-1.262,1.238l-6.212-5.734' +
            'A0.867,0.867,0,0,1,127.255,252.782Z" transform="translate(-127 -247)"></path></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 8.031 12.969">' +
            '<path d="M177.745,252.782q-3.093-2.772-6.185-5.544c-0.848-.76-2.114.475-1.262,1.239q2.752,' +
            '2.466,5.5,4.933-2.766,2.552-5.531,5.107a0.884,0.884,0,0,0,1.262,1.238l6.212-5.734A0.867,' +
            '0.867,0,0,0,177.745,252.782Z" transform="translate(-170 -247)"></path></svg>'
        ]
    };
    owlOptions = $.extend(owlOptions, config);
    $('#' + id + ' .owl-carousel').owlCarousel(owlOptions);
}