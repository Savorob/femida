$('.menu-btn').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass('menu-btn_active');
    $('.menu__side').toggleClass('menu__side-active');
});
$('.menu__side-link').on('click', function(e) {
    $('.menu__side').removeClass('menu__side-active');
    $('.menu-btn').removeClass('menu-btn_active');
});
