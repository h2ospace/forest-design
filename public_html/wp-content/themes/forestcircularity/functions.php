<?php
function add_stylesheet()
{
    wp_enqueue_style('commoncss', '/asset/css/common.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'add_stylesheet');

function add_theme_support_title_tag()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'add_theme_support_title_tag');
//投稿のタグをチェックボックスで選択できるようにする
function change_post_tag_to_checkbox()
{
    $args = get_taxonomy('post_tag');
    $args->hierarchical = true;
    //$args -> meta_box_cb = 'post_categories_meta_box';
    register_taxonomy('post_tag', 'post', $args);
}
add_action('init', 'change_post_tag_to_checkbox', 1);

/* WP-pagenavi */
add_filter('wp_pagenavi_class_previouspostslink', 'theme_pagination_class');
add_filter('wp_pagenavi_class_nextpostslink', 'theme_pagination_class');
add_filter('wp_pagenavi_class_page', 'theme_pagination_class');

function theme_pagination_class($class_name)
{
    switch ($class_name) {
        case 'previouspostslink':
            $class_name = 'pagination__control-link pagination__control-link--previous';
            break;
        case 'nextpostslink':
            $class_name = 'pagination__control-link pagination__control-link--next';
            break;
        case 'page':
            $class_name = 'pagination__current';
            break;
    }
    return $class_name;
}