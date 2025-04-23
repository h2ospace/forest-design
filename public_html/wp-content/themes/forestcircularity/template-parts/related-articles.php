<div class="related--wrap">
			<h4>Related Articles</h4>
			<?php
			$catkwds = array();

			if (has_category()) {

				$cats = get_the_category();

				foreach ($cats as $cat) {
					$catkwds[] = $cat->term_id;
				}

			}
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => '3',
				'post__not_in' => array($post->ID),
				'category__in' => $catkwds,
				'orderby' => 'rand'
			);
			$the_query = new WP_Query($args);

			## 1件もなければ、ランダムで取得
			if (!$the_query->have_posts()) {
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '3',
					'orderby' => 'rand'
				);
				$the_query = new WP_Query($args);
			}

			if ($the_query->have_posts()):
				?>
				<ul>
					<?php
					while ($the_query->have_posts()):
						$the_query->the_post();
						$number = str_replace('num-', '', $post->post_name);
						?>
						<li>
							<a href="<?php the_permalink(); ?>"></a>
							<?php the_title(); ?><br />
							<span class="number"><?php echo sprintf('%03s', $number); ?></span>
							<span><?php echo get_the_date('Y.m.d'); ?></span>
						</li>
					<?php endwhile;
			endif;
			wp_reset_postdata();
			?>
			</ul>
		</div>
