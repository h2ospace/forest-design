<?php get_header(); ?>

<?php
$tag = get_queried_object();
$tag_name = $tag->name;
$tag_english_title = get_field('english_title', $tag);
?>

<div class="container">
			<div class="archive--title">
				<h1><?php echo esc_html($tag_name); ?><span><?php echo esc_html($tag_english_title); ?></span></h1>
			</div>
			<p class="archive--desc"><?php echo $tag->description; ?></p>
			<!-- Masonry Layout -->
			<div id="macy--wrap">
				<?php while (have_posts()): the_post(); ?>
				<?php get_template_part('template-parts/content'); ?>
				<?php endwhile; ?>
			</div>

			<?php the_posts_pagination([
						'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
						'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
						'prev_text'     => __( '&lt;'), // 「前へ」リンクのテキスト
						'next_text'     => __( '&gt;'), // 「次へ」リンクのテキスト
						'type'          => 'list', // 戻り値の指定 (plain/list)
					]); ?>
		</div>

<?php

get_footer();

?>