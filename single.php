<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post simple-content'); ?>>
    <div class="container">
        <!-- BREADCRUMB -->
        <div class="breadcrumb-wrapper" style="margin-bottom: 2rem; padding: 1rem 0; border-bottom: 1px solid #e9ecef;">
            <div class="breadcrumbs" style="font-size: 0.95rem; color: var(--secondary-color);">
                <a href="<?php echo home_url(); ?>" style="color: var(--main-color); text-decoration: none;">Acasă</a>
                <span style="margin: 0 0.5rem;">/</span>

                <?php
                $category = get_the_category();
                if (!empty($category)) {
                    $cat = $category[0];
                    echo '<a href="' . get_category_link($cat->term_id) . '" style="color: var(--main-color); text-decoration: none;">' . esc_html($cat->name) . '</a>';
                    echo '<span style="margin: 0 0.5rem;">/</span>';
                }
                ?>
                <span style="color: var(--accent-color);"><?php the_title(); ?></span>
            </div>
        </div>

        <div class="col-wrapper">
            <div class="col-60 small-desktop-col-100 mobile-col-100">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="single-post-image">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                <?php endif; ?>
                
                <h1 class="single-post-title"><?php the_title(); ?></h1>
                
                <div class="single-post-content">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="col-40 small-desktop-col-100 mobile-col-100">
                <h2 class="section-title" style="font-size: 1.8rem; margin-top: 0; text-transform: capitalize;">Articole recente</h2>
                <div class="cards-container col-wrapper">
                    <?php
                    $current_id = get_the_ID();
                    $latest_posts = new WP_Query( array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                        'post__not_in'   => array( $current_id ),
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ) );

                    if ( $latest_posts->have_posts() ) :
                        while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
                            <div class="card col-100">
                                <div class="card-inner">
                                    <div class="card-content">
                                        <h3 class="card-title" style="font-size: 1.3rem; margin-bottom: 0.75rem;">
                                            <a href="<?php the_permalink(); ?>" style="color: var(--accent-color); text-decoration: none;">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <div class="card-list">
                                            <p style="margin-bottom: 0.75rem; color: var(--secondary-color); font-size: 0.95rem;">
                                                <?php echo wp_trim_words( get_the_excerpt(), 16, '...' ); ?>
                                            </p>
                                            <a href="<?php the_permalink(); ?>" class="read-more" style="color: var(--main-color); font-weight: 500;">
                                                Citește mai mult →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>