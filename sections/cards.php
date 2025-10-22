<?php if( have_rows('boxes') ): ?>
    <section class="cards-section">
        <div class="container">
            <div class="cards-container col-wrapper">
                <?php while( have_rows('boxes') ): the_row(); ?>
                    <div class="card col-30 small-desktop-col-50 mobile-col-100">
                        <div class="card-inner">
                            <img src="<?php echo get_sub_field('box_image');?>" alt="locatii" class="card-image">
                            <div class="card-content">
                                <h3 class="card-title"><?php echo get_sub_field('box_title');?></h3>
                                <div class="card-list">
                                    <?php echo get_sub_field('box_content');?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>