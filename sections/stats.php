<?php if( have_rows('stats') ): ?>
    <section class="stats-section">
        <div class="container">
            <div class="col-wrapper">
                <?php while( have_rows('stats') ): the_row(); ?>
                    <div class="stat-item col-30 small-desktop-col-50 mobile-col-100" data-target="<?php echo get_sub_field('number');?>">
                        <div class="stat-inner">
                            <div class="stat-number" id="counter1">0</div>
                            <div class="stat-label"><?php echo get_sub_field('label');?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif;?>

<script>
// Stats Counter Animation
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number');
    const statItems = document.querySelectorAll('.stat-item');

    counters.forEach((counter, index) => {
        const target = parseInt(counter.closest('.stat-item').dataset.target);
        const increment = target / 100;
        let current = 0;

        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.floor(current).toLocaleString();
                setTimeout(updateCounter, 20);
            } else {
                counter.textContent = target.toLocaleString();
                statItems[index].classList.add('animate');
            }
        };

        updateCounter();
    });
}

// Trigger animation when section is in view
const statsSection = document.querySelector('.stats-section');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

if (statsSection) {
    observer.observe(statsSection);
} else {
    // Fallback: run on load
    window.addEventListener('load', animateCounters);
}
</script>
