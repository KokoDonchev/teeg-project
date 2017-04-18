$(document).ready(function() {
    $('.login-options .login__option').click(function() {
        var option_id = $(this).data('login-option');
        console.log(option_id);

        $('.login-options .login__option').removeClass('active');
        $(this).addClass('active');

        $('.login-box form').addClass('hide');
        $('form[data-login-form="' + option_id + '"]').removeClass('hide');
    });

    $('.module-items').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        arrows: true
    });
});