<?php get_header(); ?>
<?php while (have_posts()): the_post(); ?>
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
		?>

		<!-- Contents -->
		<div class="container--second">
			<h1 class="single"><?php the_title(); ?><span><?php echo sprintf('%03s', $number); ?></span></h1>
			<p class="midashi--en"><?php the_field('english_title'); ?></p>
			<p class="update--en">Updated by <?php echo get_the_author(); ?> on <?php echo $date; ?>, <?php echo get_the_time(); ?> JST</p>
			<!-- Contributer -->
			<div class="contributor--wrap">
				<p class="contributor--name"><a href="author.html">八十雅世</a></p>
				<p class="contributor--name-en">Masayo Yaso</p>
				<p class="contributor--title">情報技術開発株式会社</p>
				<p class="contributor--desc">日経BP社の全ての初期ウェブメディアのプロデュース業務・統括業務を経て、2004年にスタイル株式会社を設立。<a href="https://wirelesswire.jp/" target="_blank">WirelessWire News</a>、<a href="https://www.telegraphic.jp/" target="_blank">TeleGraphic</a>、<a href="https://www.localknowledge.jp/" target="_blank">localknowledge</a>などのウェブメディアの発行人兼プロデューサ。理工系大学や国立研究開発法人など、研究開発にフォーカスした団体のウエブサイトの開発・運営も得意とする。早稲田大学大学院国際情報通信研究科非常勤講師（1997-2003年）、情報処理推進機構（IPA）Ai社会実装推進委員、著書に<a href="https://book.impress.co.jp/books/1117101103" target="_blank">『会社をつくれば自由になれる』（インプレス、2018年）</a> など。</p>
			</div>

            <?php the_content(); ?>

			<!-- Tags -->
			<dl class="tags">
				<dt>Tags</dt>
				<dd>
					<ul>
						<li><a href="/category-tag.html">炭素循環と炭素固定</a></li>
						<li><a href="/category-tag.html">木質バイオマス</a></li>
						<li><a href="/category-tag.html">森林・林業関連基本法とその改訂</a></li>
						<li><a href="/category-tag.html">木造9F建て</a></li>
						<li><a href="/category-tag.html">森林・林業関連基本法とその改訂</a></li>
					</ul>
				</dd>
			</dl>
			<!-- Related Articles -->
			<div class="related--wrap">
				<h4>Related Articles</h4>
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