<section class="benefits-section">
    <div class="container">
        <div class="section-header align-center">
            <h2 class="section-title"><?php echo get_sub_field('section_title');?></h2>
            <p class="section-description"><?php echo get_sub_field('section_description');?></p>
        </div>

        <div class="col-wrapper">
            <div class="col-50 small-desktop-col-100">
                <div class="benefits-slider">
                    <div class="slider-track" id="sliderTrack">
                        <?php while( have_rows('slider') ): the_row(); ?>
                            <div class="slide" style="background-image: url('<?php echo get_sub_field('image');?>');"></div>
                        <?php endwhile; ?>
                    </div>
                    <div class="slider-dots" id="sliderDots">
                        <span class="dot active" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
            </div>
            
            <div class="col-50 small-desktop-col-100">
                <div class="benefits-content">
                    <h3 class="benefits-title"><?php echo get_sub_field('box_title');?></h3>
                    <p class="benefits-subtitle"><?php echo get_sub_field('bot_subtitle');?></p>

                    <?php if( have_rows('box_list') ): ?>
                        <ul class="benefits-list">
                            <?php while( have_rows('box_list') ): the_row(); ?>
                                <li><?php echo get_sub_field('benefit');?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="cta-buttons">
                        <?php 
                            $call = get_sub_field('box_call_button');
                            $contact = get_sub_field('box_contact_button');
                        ?>
                        <a href="<?php echo $contact['url'];?>" class="cta-button"><?php echo $contact['title'];?></a>
                        <a href="<?php echo $call['url'];?>" class="cta-button call"><?php echo $call['title'];?></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    let slideIndex = 1;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const track = document.getElementById('sliderTrack');

    function showSlides(n) {
        if (n > slides.length) { slideIndex = 1; }
        if (n < 1) { slideIndex = slides.length; }
        track.style.transform = `translateX(-${(slideIndex - 1) * 100}%)`;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[slideIndex - 1].classList.add('active');
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    setInterval(() => {
        slideIndex++;
        showSlides(slideIndex);
    }, 4000); // Auto-advance every 4 seconds

    // Initialize
    showSlides(slideIndex);
</script>