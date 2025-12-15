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

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.header-contact').addClass("hide");
        } else {
            $('.header-contact').removeClass("hide");
        }
    });

    /* Calculator */
    const today = moment();

    $('#loan-form').on('submit', function(e) {
        e.preventDefault();
        const type = $('#loan-type').val();
        const amount = parseFloat($('#amount').val());
        const periods = parseInt($('#periods').val());
        const collectionDay = parseInt($('#collection-day').val()) || 20;

        let rate = 0;
        if (type === 'traditional') {
            if (amount <= 30000) rate = 0.13;
            else if (amount <= 60000) rate = 0.11;
            else rate = 0.10;
        } else {
            if (amount <= 30000) rate = 0.15;
            else rate = 0.13;
        }

        const principalPayment = amount / periods;
        let balance = amount;
        let totalPaid = 0;
        let totalInterest = 0;
        let startDate = today.clone().add(1, 'month').startOf('month');

        const tbody = $('#schedule-table tbody');
        tbody.empty();

        for (let month = 1; month <= periods; month++) {
            let paymentDate = startDate.clone();
            let daysInPeriod = 30;

            if (type === 'diversificat') {
                paymentDate.date(collectionDay);
                if (paymentDate.day() === 0) paymentDate.add(1, 'day');
                if (paymentDate.day() === 6) paymentDate.add(2, 'days');
                if (month > 1) {
                    daysInPeriod = paymentDate.diff(startDate, 'days', true);
                }
            } else {
                paymentDate.date(25);
            }

            const interest = balance * rate * (daysInPeriod / 360);
            const totalPayment = principalPayment + interest;
            totalPaid += totalPayment;
            totalInterest += interest;

            tbody.append(`
                <tr>
                    <td>${month}</td>
                    <td>${paymentDate.format('YYYY-MM-DD')}</td>
                    <td>${balance.toFixed(2)}</td>
                    <td>${principalPayment.toFixed(2)}</td>
                    <td>${interest.toFixed(2)}</td>
                    <td>${totalPayment.toFixed(2)}</td>
                </tr>
            `);

            balance -= principalPayment;
            startDate = paymentDate.clone().add(1, 'month');
        }

        $('#summary').html(`
            <p><strong>Total Plătit:</strong> ${totalPaid.toFixed(2)} lei</p>
            <p><strong>Total Dobândă:</strong> ${totalInterest.toFixed(2)} lei</p>
        `);

        $('#results').show();

        $('html, body').animate({
            scrollTop: $('#results').offset().top - 100
        }, 800);
    });

    $('#export-csv').on('click', function() {
        let csv = 'Luna,Data,Sold Imprumut,Rata Imprumut,Dobanda Lunara,Total de Plata/Luna\n';
        $('#schedule-table tbody tr').each(function() {
            const cols = $(this).find('td').map(function() { return $(this).text(); }).get();
            csv += cols.join(',') + '\n';
        });
        const blob = new Blob([csv], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'loan-schedule.csv'; a.click();
    });

});