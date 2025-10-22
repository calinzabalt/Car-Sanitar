<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>ASOCIAȚIA C.A.R. SANITAR RM. SĂRAT – Împrumuturi rapide și economii sigure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/assets/favicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo get_stylesheet_directory_uri();?>/assets/favicons/favicon.svg" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/favicons/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/assets/favicons/apple-touch-icon.png" />
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/assets/favicons/site.webmanifest" />
    <meta name="description" content="ASOCIAȚIA C.A.R. SANITAR RM. SĂRAT oferă împrumuturi rapide cu dobândă fixă, fără comisioane ascunse, și posibilitatea de a economisi lunar în fondul social propriu. Soluția ideală pentru finanțele tale!">
    <meta name="keywords" content="CAR Sanitar, împrumuturi rapide, economii sigure, fond social, dobândă fixă, fără comisioane, Râmnic Sărat, Buzău">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="container">
            <div class="flex align-center">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img alt="logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/logo.png"/>
                </a>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'container' => 'nav',
                    'container_class' => 'nav',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'fallback_cb' => false,
                ));
                ?>
                <div class="mobile-toggle" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="header-contact">
            <div class="container">
                <div class="contact-bar">
                    <div class="contact-link address">
                        <span class="icon">📍</span>
                        <span class="contact-text">Râmnicu Sărat, Str. Muncii nr. 18 (vis-a-vis Policlinica)</span>
                    </div>

                    <div class="contact-links">
                        <a href="https://www.facebook.com/profile.php?id=100057503535796" class="contact-link fb" target="_blank" rel="noopener">
                            <span class="icon">📘</span>
                            <span class="contact-text">Facebook</span>
                        </a>
                        <a href="https://wa.me/40762203886" class="contact-link wa" target="_blank" rel="noopener">
                            <span class="icon">💬</span>
                            <span class="contact-text">WhatsApp</span>
                        </a>
                        <a href="mailto:car.sanitar@yahoo.com" class="contact-link email">
                            <span class="icon">✉️</span>
                            <span class="contact-text">Email</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-overlay" onclick="closeMenu()"></div>