/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

    $(document).on('click', '#mobile-nav-close', function() {
        $('.navbar-collapse').collapse('hide');
    });
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('#slides').superslides({
        animation: 'fade'
    });

    function equalCols() {
        if ($(window).width() > 479) {
            $('.case-image').height($('.case-description-col').height());
            $('.image-pagination').css('top', 0);
        } else {
            $('.case-image').height('auto');
            $('.image-pagination').css('top', $('.case-image img').height());
        }
    }

    equalCols();

    $(window).resize(function() {
        equalCols();
        $('.ngg-casestudy').height($('.case-study.active').height());
    });

    var caseStudy = $('.ngg-casestudy .case-study').first();
    var csHeight = $(caseStudy).height();
    $('.ngg-casestudy').height(csHeight);
    $(caseStudy).css('visibility', 'visible').addClass('active');

    $('.image-pagination a').on('click', function(e) {
        e.preventDefault();
        $('.image-pagination a').removeClass('active');
        $(this).addClass('active');

        var idx = parseInt($(this).text()) - 1;
        caseStudy = $('.ngg-casestudy .case-study')
            .removeClass('active')
            .css('visibility', 'hidden')
            .eq(idx);
        var csHeight = $(caseStudy).height();

        $('.ngg-casestudy').height(csHeight);
        $(caseStudy).css('visibility', 'visible')
            .addClass('active')
            .find('img')
            .imageScale('scale');
    });

    $("img.scale").imageScale({
        fadeInDuration: 1000,
        rescaleOnResize: true
    });

    // Investors Page
    $(".dropdown-menu li a").click(function(e) {
        e.preventDefault();
        $(this).parents('.dropdown').find('.dropdown-toggle').html(
            $(this).text() + '<span class="handle"></span>'
        );
        $(this).parents('.dropdown').find('input').val($(this).attr('href')).change();
    });

    $(document).on('change', '[data-filter-option]', function() {

        var params = [];

        if ($('[data-filter-option="category"]').val() !== '0') {
            params.push({
                'name': 'category',
                'value': $('[data-filter-option="category"]').val()
            });
        }

        if ($('[data-filter-option="year"]').val() !== '0') {
            params.push({
                'name': 'fileyear',
                'value': $('[data-filter-option="year"]').val()
            });
        }

        params.push({
            'name': 'perpage',
            'value': $('[data-filter-option="perpage"]').val()
        });

        var currentUrl = window.location.href;

        if(currentUrl.indexOf('?') != -1) {
            currentUrl = currentUrl.substr(0, currentUrl.indexOf('?'));
        }

        window.location.href = currentUrl + '?' + $.param(params);
    });

})(jQuery);
