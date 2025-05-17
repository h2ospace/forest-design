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
