<?php get_header(); ?>

<?php
$category = get_queried_object();
$category_name = $category->name;
$category_english_title = get_field('english_title', 'category_' . $category->term_id);
?>

<div class="container">
	<?php if (have_posts()): ?>
		<div class="archive--title">
			<h1><?php echo esc_html($category_name); ?><span><?php echo esc_html($category_english_title); ?></span></h1>
		</div>
		<p class="archive--desc"><?php echo $category->description; ?></p>
	<?php else: ?>
		<div class="archive--title">
			<h1><?php echo esc_html($category_name); ?></h1>
		</div>
		<p class="archive--desc">記事がありません</p>
	<?php endif; ?>

	<!-- Masonry Layout -->
	<div id="macy--wrap">
		<?php while (have_posts()):
			the_post(); ?>
			<?php get_template_part('template-parts/content'); ?>
		<?php endwhile; ?>
	</div>

	<?php the_posts_pagination([
		'mid_size' => 2, // 現在ページの左右に表示するページ番号の数
		'prev_next' => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
		'prev_text' => __('&lt;'), // 「前へ」リンクのテキスト
		'next_text' => __('&gt;'), // 「次へ」リンクのテキスト
		'type' => 'list', // 戻り値の指定 (plain/list)
	]); ?>
</div>

<?php

get_footer();

?>