if ($('.muve-form').is(':visible')) {
    $(function () {
        var topPos = $('.header-form').offset().top;
        $(window).scroll(function () {
            var top = $(document).scrollTop();
            if (top > topPos) $('.header-form').addClass('fixed-form');
            else $('.header-form').removeClass('fixed-form');
        });
    });
}