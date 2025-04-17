<?php get_header(); ?>

		<!-- Contents -->
		<div class="container">
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

		<?php get_footer(); ?>
