<section class="documents-section">
    <div class="container">
        <div class="section-header align-center">
            <h2 class="section-title"><?php echo get_sub_field('section_title');?></h2>
            <p class="section-description"><?php echo get_sub_field('section_description');?></p>
        </div>

        <?php if( have_rows('documents_list') ): ?>
            <div class="col-wrapper"> 
                <?php while( have_rows('documents_list') ): the_row(); ?>
                    <div class="doc col-30 small-desktop-col-50 mobile-col-100">
                        <?php 
                            $file = get_sub_field('file');
                        ?>
                        <a href="<?php echo $file['url'];?>" target="_blank"><?php echo $file['title'];?></a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;?>
    </div>
</section>