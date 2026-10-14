</main>
<footer class="site-footer">
    <div class="container">
        <!-- Plan du site -->
        <div class="footer-about">
            <h2>Ivan Caccioni</h2>
            <?php
            // Récupérer le contexte de la page
            $context = get_page_context(); // Assurez-vous que cette fonction est correctement définie

            // Afficher le contenu basé sur le contexte
            if ($context === 'photographer') {
                echo '<h3>Photographer</h3>';
                echo '<p>Capture your most beautiful moments with my lens.</p>';
            } else {
                echo '<h3>Creative Project Manager</h3>';
                echo '<p>Create an identity that truly represents you.</p>';
            }
            ?>
        </div>
        
        <nav class="footer-menu">
            <?php
            // Afficher le bon menu en fonction du contexte
            if ($context === 'photographer') {
                wp_nav_menu(array(
                    'theme_location' => 'footer-photographer-menu',
                    'menu_class'     => 'menu-footer-photographer menu__footer',
                    'fallback_cb'    => false, // Pas de menu de secours
                    'container'      => false
                ));
            } else {
                wp_nav_menu(array(
                    'theme_location' => 'footer-general-menu',
                    'menu_class'     => 'menu-footer-general menu__footer',
                    'fallback_cb'    => false,
                    'container'      => false
                ));
            }
            ?>
        </nav>
        
        <!-- Floating Back-to-Top Button -->
       <div class="back-to-top visible" id="backToTop">
    <a href="#top">↑ <span>Back to Top</span></a>
</div>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>
</html>
