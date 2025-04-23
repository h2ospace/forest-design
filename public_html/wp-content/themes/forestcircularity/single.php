<?php get_header(); ?>
<?php while (have_posts()):
	the_post(); ?>
	<?php
	// 番号を取得
	$post_slug = $post->post_name;
	$number = str_replace('num-', '', $post_slug);

	// 月を英語に変換する配列
	$months_ja_en = array(
		'1月' => 'January',
		'2月' => 'February',
		'3月' => 'March',
		'4月' => 'April',
		'5月' => 'May',
		'6月' => 'June',
		'7月' => 'July',
		'8月' => 'August',
		'9月' => 'September',
		'10月' => 'October',
		'11月' => 'November',
		'12月' => 'December'
	);

	// 日本語の月を英語に変換
	$month_ja = get_the_date('n月');
	$date = $months_ja_en[$month_ja] . ' ' . get_the_date('d, Y');

	// 著者を取得
	$author_id = get_the_author_meta('ID');
	$author_name = get_the_author();
	$author_name_en = get_field('name_english', 'user_' . $author_id);
	$author_company = get_field('company', 'user_' . $author_id);
	$author_desc = get_field('description', 'user_' . $author_id);
	?>

	<!-- Contents -->
	<div class="container--second">
		<h1 class="single"><?php the_title(); ?><span><?php echo sprintf('%03s', $number); ?></span></h1>
		<p class="midashi--en"><?php the_field('english_title'); ?></p>
		<p class="update--en">Updated by <?php echo get_the_author(); ?> on <?php echo $date; ?>, <?php echo get_the_time(); ?> JST</p>
		<!-- Contributer -->
		<div class="contributor--wrap">
			<p class="contributor--name"><a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo $author_name; ?></a></p>
			<p class="contributor--name-en"><?php echo $author_name_en; ?></p>
			<p class="contributor--title"><?php echo $author_company; ?></p>
			<p class="contributor--desc"><?php echo $author_desc; ?></p>
		</div>

		<?php the_content(); ?>

		<!-- Tags -->
		<dl class="tags">
			<dt>Tags</dt>
			<dd>
				<ul>
					<?php
					$tags = get_the_tags();
					foreach ($tags as $tag) {
						echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
					}
					?>
				</ul>
			</dd>
		</dl>
		<!-- Related Articles -->
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
			if ($the_query->have_posts()):
				?>
				<ul>
					<?php
					while ($the_query->have_posts()):
						$the_query->the_post();
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
		<!-- Popular Articles -->
		<div class="related--wrap">
			<h4>Popular Articles</h4>
			<ul>
				<li>
					<a href="/single.html"></a>
					純木造3階建て 東京農業大学 学生寮で「木」の効果検証<br />
					<span class="number">003</span>
					<span>2025.04.05</span>
				</li>
				<li>
					<a href="/single.html"></a>
					2025年日本国際博覧会（大阪・関西万博） 「大屋根リング記念式典」を開催<br />
					<span class="number">045</span>
					<span>2025.04.05</span>
				</li>
				<li>
					<a href="/single.html"></a>
					世界屈指の厳格な法規制が支えるカナダの持続可能な森林管理<br />
					<span class="number">023</span>
					<span>2025.04.05</span>
				</li>
			</ul>
		</div>
		<!-- Social Share Button -->
		<ul class="sns--wrap">
			<li class="icon-fb">
				<a target="_blank" href="https://www.facebook.com/">
					<svg viewBox="0 0 32 32">
						<circle cx="16" cy="16" r="16" />
						<path d="m22.27 20.08.74-4.86h-4.66v-3.15c0-1.33.65-2.63 2.74-2.63h2.12v-4.14s-1.92-.33-3.76-.33c-3.84 0-6.35 2.33-6.35 6.54v3.7h-4.27v4.86h4.27v11.74c.86.13 1.73.2 2.63.2s1.77-.07 2.63-.2v-11.74h3.92z" fill="#fff" />
					</svg>
				</a>
			</li>
			<li class="icon-x">
				<a target="_blank" href="https://x.com/">
					<svg viewBox="0 0 32 32">
						<circle cx="16" cy="16" r="16" />
						<path d="m17.64 14.68 6.43-7.32h-1.52l-5.58 6.35-4.46-6.35h-5.14l6.74 9.61-6.74 7.67h1.52l5.89-6.71 4.71 6.71h5.14m-15.19-16.15h2.34l10.77 15.08h-2.34" fill="#fff" />
					</svg>
				</a>
			</li>
		</ul>
	</div>
	<!-- Newsletter Area -->
	<div class="newsletter--ad">
		<dl>
			<dt><img src="/asset/images/newsletter.svg" alt="森林循環経済 Newsletter" width="300" height="61" /></dt>
			<dd>ニューズレター（メルマガ）「森林循環経済」の購読はこちらから（無料）</dd>
		</dl>
		<a href="page-newsletter.html" class="column--link"></a>
	</div>

<?php endwhile; ?>
<?php get_footer(); ?>