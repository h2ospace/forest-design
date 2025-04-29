<?php
# キーワードを取得
$keyword = get_search_query();
# 検索件数
$search_count = $wp_query->found_posts;
?>

<?php get_header(); ?>

<div class="container--search">
    <?php if ($search_count > 0) : ?>
        <h2 class="search">「<?php echo esc_html($keyword); ?>」の検索結果</h2>
        <p class="border--botom pb-none mb-none">検索結果<?php echo esc_html($search_count); ?>件</p>
    <?php else : ?>
        <h2 class="search">キーワードに一致する記事は見つかりませんでした</h2>
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="search--result">
        <a href="<?php the_permalink(); ?>"></a>
        <h3><?php the_title(); ?></h3>
        <p><?php the_excerpt(); ?></p>
    </div>
    <?php endwhile; ?>

    <?php the_posts_pagination([
						'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
						'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
						'prev_text'     => __( '&lt;'), // 「前へ」リンクのテキスト
						'next_text'     => __( '&gt;'), // 「次へ」リンクのテキスト
						'type'          => 'list', // 戻り値の指定 (plain/list)
					]); ?>
</div>

<?php get_footer(); ?>
