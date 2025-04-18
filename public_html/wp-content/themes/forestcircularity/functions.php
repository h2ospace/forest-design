<?php
/**
 * スタイルシートの追加読み込み
 */
function add_stylesheet()
{
    wp_enqueue_style('commoncss', '/asset/css/common.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'add_stylesheet');

/**
 * エディタースタイルの追加読み込み
 */
function mytheme_block_editor_styles() {
    wp_enqueue_style(
        'mytheme-editor-style',
        get_template_directory_uri() . '/editor-style.css',
        false,
        '1.0',
        'all'
    );
}
add_action('enqueue_block_editor_assets', 'mytheme_block_editor_styles');

/**
 * テーマのサポート
 */
function add_theme_support_title_tag()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-fields');
}
add_action('after_setup_theme', 'add_theme_support_title_tag');

/**
 * タグをチェックボックスに
 */
function change_post_tag_to_checkbox()
{
    $args = get_taxonomy('post_tag');
    $args->hierarchical = true;
    //$args -> meta_box_cb = 'post_categories_meta_box';
    register_taxonomy('post_tag', 'post', $args);
}
add_action('init', 'change_post_tag_to_checkbox', 1);

/**
 * 投稿保存時に連番を設定
 */
// スラッグ名が日本語だったら自動的にnum＋id付与へ変更（スラッグを設定した場合は適用しない）
function auto_post_slug( $slug, $post_ID, $post_status ) {
    // 投稿以外, 公開されている投稿以外、slugが num- で始まる場合は何もしない
    if ( $post_status !== 'publish' || get_post_type( $post_ID ) !== 'post' || strpos( $slug, 'num-' ) === 0 ) {
        return $slug;
    } else {
        // 投稿の数を取得
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'orderby' => 'post_name',
            'order' => 'DESC'
        );
        $posts = get_posts( $args );
        $last_number = 0;
        if (!empty($posts)) {
            $last_post = $posts[0];
            $last_slug = $last_post->post_name;
            // num-を除去して整数に変換
            $last_number = intval(str_replace('num-', '', $last_slug));
        }
        // スラッグを生成
        $slug = 'num-' . ($last_number + 1);
    }

    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 3  );
