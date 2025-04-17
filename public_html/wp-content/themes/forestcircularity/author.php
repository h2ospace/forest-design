<?php get_header(); ?>

<?php
$user_id = get_query_var('author');
?>

<div class="container">
    <div class="author--wrap">
        <div class="author--left">
            <?php
            # 名前を取得
            $name = get_the_author_meta('last_name', $user_id) . ' ' . get_the_author_meta('first_name', $user_id);

            # 写真を取得
            $picture = get_field('picture', 'user_' . $user_id);
            ?>
            <img src="<?php echo $picture['sizes']['medium']; ?>" alt="<?php echo esc_attr($name); ?>の写真" width="180" height="130" />
        </div>
        <div class="author--right">
            <p class="autor--name"><?php echo esc_html($name); ?></p>
            <p class="autor--name-en"><?php the_author_meta('nickname'); ?></p>
            <p class="autor--title"><?php the_field('company', 'user_' . $user_id); ?></p>
            <p class="autor--desc"><?php the_author_meta('description'); ?></p>
        </div>
    </div>
    <!-- Masonry Layout -->
    <div id="macy--wrap">
        <?php
        while (have_posts()): the_post();
            get_template_part('template-parts/content');
        endwhile;
        ?>
    </div>
    <?php the_posts_pagination([
						'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
						'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
						'prev_text'     => __( '&lt;'), // 「前へ」リンクのテキスト
						'next_text'     => __( '&gt;'), // 「次へ」リンクのテキスト
						'type'          => 'list', // 戻り値の指定 (plain/list)
					]); ?>
</div>

<?php get_footer(); ?>
