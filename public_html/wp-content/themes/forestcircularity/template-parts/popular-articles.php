<div class="related--wrap">
			<h4>Popular Articles</h4>
			<?php
			# 過去1ヶ月分のページビューを取得
			$result = $wpdb->get_results('
			SELECT post_id
			FROM page_view
			WHERE date >= CURDATE() - INTERVAL 1 MONTH
			GROUP BY post_id
			ORDER BY count DESC');
			foreach ($result as $row) {
				$post_ids[] = $row->post_id;
			}

			# 先頭の3件で記事を取得
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => '3',
				'post__in' => $post_ids,
			);
			$the_query = new WP_Query($args);

			while ($the_query->have_posts()): $the_query->the_post();
				$popular_posts[$post->ID] = $post;
			endwhile;
			?>
			<ul>
				<?php
                $cnt = 0;
				foreach ($post_ids as $post_id):
                    if (!isset($popular_posts[$post_id])) {
                        continue;
                    }
					$post = $popular_posts[$post_id];
					setup_postdata($post);
					$number = str_replace('num-', '', $post->post_name);
					?>
					<li>
						<a href="<?php the_permalink(); ?>"></a>
						<?php the_title(); ?><br />
						<span class="number"><?php echo sprintf('%03s', $number); ?></span>
						<span><?php echo get_the_date('Y.m.d'); ?></span>
					</li>
				<?php
                if (++$cnt >= 3) {
                    break;
                }
                endforeach;
				wp_reset_postdata(); ?>
			</ul>
		</div>
