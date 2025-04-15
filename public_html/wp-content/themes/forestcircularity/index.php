<?php get_header(); ?>

		<!-- Contents -->
		<div class="container">
			<!-- Masonry Layout -->
			<div id="macy--wrap">
				<?php while (have_posts()): the_post(); ?>
				<?php get_template_part('template-parts/content'); ?>
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
