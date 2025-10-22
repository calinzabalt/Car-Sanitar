jQuery(document).ready(function($) {
    let menuOpen = false;

    // Toggle menu
    window.toggleMenu = function() {
        const $nav = $('.nav');
        const $toggle = $('.mobile-toggle');
        const $overlay = $('.mobile-overlay');
        menuOpen = !menuOpen;
        $nav.find('.menu').toggleClass('active');
        $toggle.toggleClass('active');
        $overlay.toggleClass('active');

        if (menuOpen) {
            $nav.find('.menu .menu-item').each(function(index) {
                $(this).css('transition-delay', (index * 0.1) + 's');
            });
        } else {
            $nav.find('.menu .menu-item').each(function() {
                $(this).css('transition-delay', '0s');
            });
        }
    };

    // Close menu
    window.closeMenu = function() {
        if (menuOpen) {
            toggleMenu();
            $('.nav .menu-item-has-children').removeClass('active-dropdown');
        }
    };

    // Toggle dropdown
    $(document).on('click', '.nav .menu-item-has-children > a', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const $li = $(this).parent();
        $('.nav .menu-item-has-children').not($li).removeClass('active-dropdown');
        $li.toggleClass('active-dropdown');

        if ($li.hasClass('active-dropdown')) {
            $li.find('.sub-menu .menu-item').each(function(index) {
                $(this).css('transition-delay', (index * 0.1 + 0.15) + 's');
            });
        } else {
            $li.find('.sub-menu .menu-item').each(function() {
                $(this).css('transition-delay', '0s');
            });
        }
    });

    $(window).on('resize', function() {
        if (window.innerWidth > 1024 && menuOpen) {
            closeMenu();
        }
    });

    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && menuOpen) {
            closeMenu();
        }
    });
});