/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });

    wp.customize('username', function (value) {
        value.bind(function (to) {
            $('.top_descr .top_text h1').text(to);
        });
    });

    wp.customize('userskills', function (value) {
        value.bind(function (to) {
            $('.top_descr .top_text p').text(to);
        });
    });

    wp.customize('photo', function (value) {
        value.bind(function (to) {
            $('.person img').attr({
                src: to
            });
            $('.person a').attr({
                href: to
            });
        });
    });

    wp.customize('logo', function (value) {
        value.bind(function (to) {
            $('.logo_container img').attr({
                src: to
            });
        });
    });

    wp.customize('telephone', function (value) {
        value.bind(function (to) {
            $('.telephone').text(to);
        });
    });

    wp.customize('address', function (value) {
        value.bind(function (to) {
            $('.address').html(to.replace(/\n+/g,"<br>"));
        });
    });

    wp.customize('email', function (value) {
        value.bind(function (to) {
            $('.email a').attr({
                href: 'mailto:' + to
            }).text(to);
        });
    });

    wp.customize('birthday', function (value) {
        value.bind(function (to) {
            $('.birthday').text(to);
        });
    });

    wp.customize('site', function (value) {
        value.bind(function (to) {
            $('.site a').attr({
                href: '//' + to
            }).text(to);
        });
    });

    wp.customize('prof_description', function (value) {
        value.bind(function (to) {
            $('.prof_description').html(to.replace(/\n+/g,"<br>"));
        });
    });

    // Header text color.
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            if ('blank' === to) {
                console.log(1);
                $('.top_wrapper .top_descr .top_centered *').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                console.log(2);

                $('.top_wrapper .top_descr .top_centered *').css({
                    'color': to,
                    'border-color': to
                });
            }
        });
    });
})(jQuery);
