<?php 

// Register taxonomy for Creative Projects - Project Type
function sfaccettatura_register_tax_project_type()
{
    register_taxonomy(
        'project_type',
        'creative_showcase',
        array(
            'labels' => array(
                'name'              => __('Project Types', 'sfaccettatura'),
                'singular_name'     => __('Project Type', 'sfaccettatura'),
                'search_items'      => __('Search Project Types', 'sfaccettatura'),
                'all_items'         => __('All Project Types', 'sfaccettatura'),
                'edit_item'         => __('Edit Project Type', 'sfaccettatura'),
                'update_item'       => __('Update Project Type', 'sfaccettatura'),
                'add_new_item'      => __('Add New Project Type', 'sfaccettatura'),
                'new_item_name'     => __('New Project Type Name', 'sfaccettatura'),
                'menu_name'         => __('Project Types', 'sfaccettatura'),
            ),
            'show_ui'           => true,
            'show_in_rest'      => true,
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'project-types'),
        )
    );
}
add_action('init', 'sfaccettatura_register_tax_project_type');

// Register taxonomy for Creative Projects - Project Industry
function sfaccettatura_register_tax_project_industry()
{
    register_taxonomy(
        'project_industry', // Taxonomy slug
        'creative_showcase', // Post type to associate with
        array(
            'labels' => array(
                'name'              => __('Project Industries', 'sfaccettatura'),
                'singular_name'     => __('Project Industry', 'sfaccettatura'),
                'search_items'      => __('Search Project Industries', 'sfaccettatura'),
                'all_items'         => __('All Project Industries', 'sfaccettatura'),
                'edit_item'         => __('Edit Project Industry', 'sfaccettatura'),
                'update_item'       => __('Update Project Industry', 'sfaccettatura'),
                'add_new_item'      => __('Add New Project Industry', 'sfaccettatura'),
                'new_item_name'     => __('New Project Industry Name', 'sfaccettatura'),
                'menu_name'         => __('Project Industries', 'sfaccettatura'),
            ),
            'show_ui'           => true, // Show in the WordPress admin UI
            'show_in_rest'      => true, // Enable REST API support
            'public'            => true, // Publicly queryable
            'hierarchical'      => true, // Hierarchical (like categories)
            'show_admin_column' => true, // Show in the admin columns
            'rewrite'           => array('slug' => 'project-industries'), // Custom URL slug
        )
    );
}
add_action('init', 'sfaccettatura_register_tax_project_industry');

function sfaccettatura_register_tax_creative_project_services()
{
    register_taxonomy(
        'creative_project_services',
        'services',
        array(
            'labels' => array(
                'name'                       => __('Creative Project Services', 'sfaccettatura'),
                'singular_name'              => __('Creative Project  Service', 'sfaccettatura'),
                'search_items'               => __('Search Creative Project  Services', 'sfaccettatura'),
                'popular_items'              => __('Popular Creative Project  Services', 'sfaccettatura'),
                'all_items'                  => __('All Creative Project  Services', 'sfaccettatura'),
                'parent_item'                => __('Parent Creative Project  Service', 'sfaccettatura'),
                'parent_item_colon'          => __('Parent Creative Project  Service:', 'sfaccettatura'),
                'edit_item'                  => __('Edit Creative Project  Service', 'sfaccettatura'),
                'update_item'                => __('Update Creative Project  Service', 'sfaccettatura'),
                'add_new_item'               => __('Add New Creative Project  Service', 'sfaccettatura'),
                'new_item_name'              => __('New Creative Project  Service Name', 'sfaccettatura'),
                'separate_items_with_commas' => __('Separate Creative Project  Services with commas', 'sfaccettatura'),
                'add_or_remove_items'        => __('Add or remove Creative Project  Services', 'sfaccettatura'),
                'choose_from_most_used'      => __('Choose from the most used Creative Project  Services', 'sfaccettatura'),
                'not_found'                  => __('No Creative Project  Services found', 'sfaccettatura'),
                'items_list_navigation'      => __('Creative Project  Services list navigation', 'sfaccettatura'),
                'items_list'                 => __('Creative Project  Services list', 'sfaccettatura'),
                'filter_items_list'          => __('Filter Creative Project  Services list', 'sfaccettatura'),
            ),
            'show_ui'           => true,
            'show_in_rest'      => true,
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'creative-project-services'),
        )
    );
}
add_action('init', 'sfaccettatura_register_tax_creative_project_services');

function sfaccettatura_register_tax_about_types()
{
    register_taxonomy(
        'about_types',
        'about_sections',
        array(
            'labels' => array(
            'name'                       => __('About Types', 'sfaccettatura'),
            'singular_name'              => __('About Type', 'sfaccettatura'),
            'search_items'               => __('Search About Types', 'sfaccettatura'),
            'all_items'                  => __('All About Types', 'sfaccettatura'),
            'edit_item'                  => __('Edit About Type', 'sfaccettatura'),
            'update_item'                => __('Update About Type', 'sfaccettatura'),
            'add_new_item'               => __('Add New About Type', 'sfaccettatura'),
            'new_item_name'              => __('New About Type Name', 'sfaccettatura'),
            'menu_name'                  => __('About Types', 'sfaccettatura'),
        ),
        'show_ui'           => true,
        'show_in_rest'      => true,
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'about-type'),
        )
    );
}
add_action('init', 'sfaccettatura_register_tax_about_types');
