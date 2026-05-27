<div class="article">
	<a href="<?php the_permalink(); ?>" class="article--link"></a>
	<?php if (has_post_thumbnail()): ?>
		<img loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="800" height="800" />
	<?php endif; ?>
	<div class="article--wrap">
		<p class="article--date"><?php the_time('n.j'); ?><span><?php echo esc_html(get_post_time('D')); ?> <?php the_time('Y'); ?></span></p>
		<h2><?php the_title(); ?></h2>
		<p class="article--desc"><?php the_excerpt(); ?></p>
		<ul class="article--tag">
			<?php foreach (get_the_category() as $category): ?>
				<li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
