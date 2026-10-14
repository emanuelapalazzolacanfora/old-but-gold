<?php
/**
 * Diviser le menu du footer en groupes
 */

function split_footer_menu($items, $args) {
    // Vérifie si le menu actuel est celui du footer
    if (isset($args->menu_class) && strpos($args->menu_class, 'menu-footer') !== false) {
        // Divise les items du menu par balise `</li>`
        $menu_items = explode('</li>', $items);
        $menu_items = array_filter($menu_items); // Supprime les éléments vides

        $grouped_items = [];
        foreach ($menu_items as $index => $menu_item) {
            // Ajoute l'élément courant au groupe
            $grouped_items[] = $menu_item . '</li>';
            // Ajoute un nouveau conteneur `<ul>` après chaque quatrième élément
            if (($index + 1) % 4 === 0 && $index !== count($menu_items) - 1) {
                $grouped_items[] = '</ul><ul class="menu-footer">';
            }
        }

        // Assemble les éléments en une seule chaîne
        return implode('', $grouped_items);
    }

    // Retourne les items inchangés pour les autres menus
    return $items;
}
add_filter('wp_nav_menu_items', 'split_footer_menu', 10, 2);