<section class="banner">
    <img src="<?php echo get_sub_field('banner_image');?>" alt="Banner Image" class="banner-image">
    <div class="banner-overlay"></div>
    <div class="banner-content">
        <div class="banner-text">
            <h1><?php echo get_sub_field('banner_title');?></h1>
            <p class="banner-subtitle"><?php echo get_sub_field('banner_description');?></p>

            <?php if( have_rows('banner_features') ): ?>
                <ul class="banner-features">
                    <?php while( have_rows('banner_features') ): the_row(); ?>
                        <li><?php echo get_sub_field('feature'); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            
            <?php 
                $member = get_sub_field('member_button');
                $contact = get_sub_field('contact_button');
            ?>
            <?php if(!empty($member) && !empty($contact)):?>
                <div class="cta-buttons"> 
                    <a href="<?php echo $contact['url'];?>" class="cta-button"><?php echo $contact['title'];?></a>
                    <a href="<?php echo $member['url'];?>" class="cta-button call"><?php echo $member['title'];?></a>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>