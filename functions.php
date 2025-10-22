<?php
// Enqueue styles and scripts
function car_sanitar_enqueue_scripts() {
    // Google Fonts for Inter
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);
    
    wp_enqueue_style('car-sanitar-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_script('car-sanitar-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'car_sanitar_enqueue_scripts');

// Add theme support
function car_sanitar_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'car-sanitar'),
    ));
}
add_action('after_setup_theme', 'car_sanitar_setup');

// Disable comments by default
add_action('admin_init', function () {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
add_action('init', function () {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
});

/* Contact Form Submission */
add_action('init', 'handle_contact_submission');
function handle_contact_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['full_name'])) {
        // Sanitize and validate input
        $full_name = sanitize_text_field($_POST['full_name'] ?? '');
        $email = sanitize_email($_POST['email'] ?? '');
        $phone = sanitize_text_field($_POST['phone'] ?? '');
        $message = sanitize_textarea_field($_POST['message'] ?? '');

        // Basic validation
        $has_error = false;
        if (empty($full_name)) {
            $has_error = true;
        }
        if (empty($email) || !is_email($email)) {
            $has_error = true;
        }
        if (empty($phone)) {
            $has_error = true;
        }

        if ($has_error) {
            // Redirect to current page with error
            $redirect_url = add_query_arg('contact_error', '1', get_permalink());
            wp_safe_redirect($redirect_url);
            exit;
        }

        // Compose email
        $to = 'andreimihaela1991@yahoo.com';
        $subject = 'Formular de contact - CAR Sanitar';
        $body = "Nume complet: " . $full_name . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Telefon: " . $phone . "\n";
        $body .= "Mesaj: " . ($message ?: 'N/A') . "\n";

        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . $full_name . ' <' . $email . '>'
        );

        // Send email using wp_mail
        $sent = wp_mail($to, $subject, $body, $headers);

        if ($sent) {
            // Redirect to current page with success
            $redirect_url = add_query_arg('contact_success', '1', get_permalink());
            wp_safe_redirect($redirect_url);
        } else {
            // Redirect to current page with error (email not sent)
            $redirect_url = add_query_arg('contact_error', '2', get_permalink());
            wp_safe_redirect($redirect_url);
        }
        exit;
    }
}


?>