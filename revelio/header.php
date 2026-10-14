<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <header class="global">
        <nav class="navbar">
            <!-- Logo -->
            <a href="/home">
                <img id="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-black.png" alt="Logo">
            </a>
            <div class="navbar-container">
                <!-- Menu des réseaux sociaux -->
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'social-menu',
                    'menu_class'     => 'social-menu',
                    'link_before'    => '<i class="fa-brands ',
                    'link_after'     => '"></i>',
                    'container'      => false
                ));
                ?>

                <!-- Menus contextuels -->
                <div class="desktop-menus">
                    <?php
                    $context = get_page_context();
                    if ($context === 'photographer') {
                        wp_nav_menu(array(
                            'theme_location' => 'photographer-menu',
                            'menu_class'     => 'photographer-menu',
                            'container'      => false

                        ));
                    } else {
                        wp_nav_menu(array(
                            'theme_location' => 'general-menu',
                            'menu_class'     => 'general-menu',
                            'container'      => false

                        ));
                    }
                    ?>
                </div>

                <!-- Menu Burger -->
                <button id="burger-toggle" class="burger">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </button>
                <div id="burger-menu" class="burger-menu">
                    <?php
                    // Utiliser wp_nav_menu pour afficher les menus dans le menu burger
                    if ($context === 'photographer') {
                        wp_nav_menu(array(
                            'theme_location' => 'photographer-menu',
                            'menu_class'     => 'burger-menu-items',
                        ));
                    } else {
                        wp_nav_menu(array(
                            'theme_location' => 'general-menu',
                            'menu_class'     => 'burger-menu-items',
                        ));
                    }
                    ?>
                </div>
        </nav>
    </header>