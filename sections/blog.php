<?php
// Query the latest 3 blog posts
$recent_posts = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

if ( $recent_posts->have_posts() ) :
?>
    <section class="blog-section cards-section">
        <div class="container">
            <div class="section-header align-center">
                <h2 class="section-title"><?php echo get_sub_field('section_title');?></h2>
                <p class="section-description"><?php echo get_sub_field('section_description');?></p>
            </div>
            <div class="cards-container col-wrapper">
                <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                    <div class="card col-30 small-desktop-col-50 mobile-col-100">
                        <div class="card-inner">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title_attribute(); ?>" class="card-image">
                            <?php endif; ?>
                            <div class="card-content">
                                <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="card-list">
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Citește mai mult -></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>