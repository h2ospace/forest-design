<?php
// todo 個別ページの著者情報(Apr 22)
// todo タグ一覧(Apr 22)
// todo カテゴリ一覧(Apr 22)
// todo グローバルナビ(Apr 22)
// todo 執筆者一覧(Apr 22)
// todo サイト内検索(Apr 22)
?>
<?php get_header(); ?>

		<!-- Contents -->
		<div class="container">
			<!-- Masonry Layout -->
			<div id="macy--wrap">
				<?php while (have_posts()): the_post(); ?>
				<div class="macy--content">
					<div class="date"><?php the_time('n.j'); ?><span><?php echo esc_html(get_post_time('D')); ?> <?php the_time('Y'); ?></span></div>
					<h2><?php the_title(); ?></h2>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>"></a>
					<ul>
						<?php foreach (get_the_category() as $category): ?>
							<li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endwhile; ?>
			</div>

			<?php wp_pagenavi(); ?>
			<!-- Pagenation
			============================================= -->
			<nav class="pagination" role="navigation">
				<ul class="page-numbers">
					<li>
						<a class="prev page-numbers" href="#">&lt;</a>
					</li>
					<li><a class="page-numbers" href="#">1</a></li>
					<li><span aria-current="page" class="page-numbers current">2</span></li>
					<li><a class="page-numbers" href="#">3</a></li>
					<li><span class="page-numbers dots">…</span></li>
					<li><a class="page-numbers" href="#">6</a></li>
					<li>
						<a class="next page-numbers" href="#">&gt;</a>
					</li>
				</ul>
			</nav>
		</div>

		<?php get_footer(); ?>
