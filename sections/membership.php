<section class="membership-section">
    <div class="container">
        <div class="section-header align-center">
            <h2 class="section-title"><?php echo get_sub_field('section_title');?></h2>
            <p class="section-description"><?php echo get_sub_field('section_description');?></p>
        </div>

        <?php if( have_rows('steps') ): ?>
            <div class="col-wrapper"> 
                <?php while( have_rows('steps') ): the_row(); ?>
                    <div class="step col-30 small-desktop-col-50 mobile-col-100">
                        <div class="step-inner">
                            <div class="step-icon"><?php echo get_sub_field('icon');?></div>
                            <h3 class="step-title"><?php echo get_sub_field('step_title');?></h3>
                            <div class="step-description"><?php echo get_sub_field('step_content');?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;?>

        <?php 
            $member = get_sub_field('member_button');
        ?>
        <div class="cta-wrapper">
            <a href="<?php echo $member['url'];?>" class="cta-button"><?php echo $member['title'];?></a>
        </div>

    </div>
</section>