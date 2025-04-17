<?php
# カテゴリーの取得
$categories = get_categories([
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'hide_empty' => false,
]);

# タグの取得
$tags = get_tags([
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'hide_empty' => false,
]);
## カテゴリーごとに振り分け
$tags_by_category = [];
foreach ($tags as $tag) {
	$tags_by_category[get_field('parent_category', $tag)][] = $tag;
}
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="icon" href="/favicon.ico" />
		<link rel="icon" href="/icon.svg" type="image/svg+xml" />
		<link rel="/apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="manifest" href="/manifest.webmanifest" crossorigin="use-credentials" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;600;700&family=Noto+Sans+JP:wght@400;600;700&display=swap" rel="stylesheet" />

        <?php wp_head(); ?>
	</head>
	<body>
		<!-- Header -->
		<header class="js-header">
			<div class="header--wrap">
				<div class="header--left">
					<form action="" method="get">
						<input type="text" name="s" placeholder="サイト内検索" value="<?php echo (get_search_query() ? get_search_query() : ''); ?>" />
						<button type="submit"><img src="/asset/images/icon-search.svg" alt="" width="20" height="20" /></button>
					</form>
				</div>
				<div class="header--logo">
					<a href="<?php echo home_url(); ?>"><img src="/asset/images/logo.svg?0403" alt="森林循環経済 FOREST CIRCULARITY" width="240" height="54" /></a>
				</div>
				<div class="header--right">
					<ul>
						<li>
							執筆者一覧<span>Contributors</span>
							<a href="<?php echo home_url('/contributors'); ?>"></a>
						</li>
						<li>
							メルマガ登録<span>Newsletter</span>
							<a href="<?php echo home_url('/mailmagazine'); ?>"></a>
						</li>
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
                        <li class="icon-rss">
                            <a target="_blank" href="https://www.youtube.com/@TV-zp6dk">
                                <svg viewBox="0 0 32 32">
                                    <circle cx="16" cy="16" r="16" />
                                    <path d="m25.1 11.3c-.2-1-1-1.7-2-1.9-1.5-.3-4.2-.5-7.2-.5s-5.8.2-7.2.5c-1 .2-1.8.9-2 1.9-.2 1.1-.4 2.7-.4 4.7s.2 3.6.4 4.7c.2 1 1 1.7 2 1.9 1.6.3 4.3.5 7.2.5s5.7-.2 7.2-.5c1-.2 1.8-.9 2-1.9.2-1.1.4-2.7.4-4.7s-.3-3.6-.5-4.7zm-11.6 7.8v-6.3l5.5 3.1-5.5 3.1z" fill="#fff" />
                                </svg>
                            </a>
                        </li>
						<li class="icon-contact">
							<a target="_blank" href="/contact/">
								<svg viewBox="0 0 32 32">
									<circle cx="16" cy="16" r="16" />
									<path d="m25.5 11.13c0 .56-.17 1.09-.52 1.6s-.78.94-1.29 1.3c-2.66 1.84-4.31 2.99-4.96 3.45-.07.05-.22.16-.45.32-.23.17-.42.3-.57.4s-.34.22-.55.34c-.22.13-.42.22-.61.29-.19.06-.37.1-.53.1h-.02c-.16 0-.34-.03-.53-.1-.19-.06-.39-.16-.61-.29s-.4-.24-.55-.34-.34-.24-.57-.4c-.23-.17-.38-.27-.45-.32-.64-.45-1.57-1.1-2.78-1.94s-1.93-1.34-2.17-1.51c-.44-.3-.85-.71-1.24-1.22s-.58-1-.58-1.45c0-.55.15-1.01.44-1.38s.71-.55 1.26-.55h15.61c.46 0 .86.17 1.19.5.34.33.5.73.5 1.2zm0 3.12v8.42c0 .47-.17.87-.5 1.2s-.73.5-1.2.5h-15.61c-.47 0-.87-.17-1.2-.5s-.5-.73-.5-1.2v-8.42c.31.35.67.65 1.07.92 2.56 1.74 4.32 2.96 5.27 3.66.4.3.73.53.98.69.25.17.58.34 1 .51s.81.26 1.17.26h.02c.36 0 .75-.09 1.17-.26s.75-.34 1-.51.58-.4.98-.69c1.2-.87 2.96-2.09 5.28-3.66.4-.28.76-.58 1.06-.92z" fill="#fff" />
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<?php
			# カテゴリーの取得
			$categories = get_categories([
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'hide_empty' => false,
			]);
			?>
			<div class="header--nav">
				<ul>
					<?php foreach ($categories as $category) : ?>
					<li>
						<?php echo esc_html($category->name); ?><span><?php echo esc_html(get_field('english_title', 'category_' . $category->term_id)); ?></span>
						<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<!-- SP Menu -->
			<div class="open--btn">
				<img class="on" src="/asset/images/icon-search.svg" alt="" width="20" height="20" />
				<img class="off" src="/asset/images/icon-close.svg" alt="" width="20" height="20" />
			</div>
			<div id="search--wrap" class="panelactive">
				<form role="search" id="searchform" action="/" method="get">
					<input type="text" name="s" id="search--text" placeholder="サイト内検索" />
					<button type="submit"><img src="/asset/images/icon-search.svg" alt="" width="20" height="20" /></button>
				</form>
			</div>
			<div class="hamburger" id="js_hamburger">
				<span class="hamburger-linetop"></span>
				<span class="hamburger-linecenter"></span>
				<span class="hamburger-linebottom"></span>
			</div>
			<!-- More Menu -->
			<div class="more--menu">
				<div class="more--wrap-base">
					<div class="more--wrap">
						<?php foreach ($categories as $category) : ?>
						<div class="more--child">
							<div class="more--midahshi">
								<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?><span><?php echo esc_html(get_field('english_title', 'category_' . $category->term_id)); ?></span></a>
							</div>
							<ul>
								<?php foreach ($tags_by_category[$category->term_id] as $tag) : ?>
								<li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="spacer"></div>
			</div>
		</header>
