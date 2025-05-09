		<!-- Footer -->
		<footer>
			<div class="foot--wrap">
				<div class="foot--menu">
					<div class="logo">
						<a href="/"><img src="/asset/images/logo.svg?0402" alt="森林循環経済 FOREST CIRCULARITY" width="240" height="54" /></a>
					</div>
					<ul>
						<li>
							<a target="_blank" href="https://www.facebook.com/forestcircularity/">
								<svg viewBox="0 0 32 32">
									<circle cx="16" cy="16" r="16" />
									<path d="m22.27 20.08.74-4.86h-4.66v-3.15c0-1.33.65-2.63 2.74-2.63h2.12v-4.14s-1.92-.33-3.76-.33c-3.84 0-6.35 2.33-6.35 6.54v3.7h-4.27v4.86h4.27v11.74c.86.13 1.73.2 2.63.2s1.77-.07 2.63-.2v-11.74h3.92z" fill="#fff" />
								</svg>
							</a>
						</li>
						<li>
							<a target="_blank" href="https://x.com/shinrinjyunkan">
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
						<li>
							<a target="_blank" href="/mailmagazine/">
								<svg viewBox="0 0 32 32">
									<circle cx="16" cy="16" r="16" />
									<path d="m25.5 11.13c0 .56-.17 1.09-.52 1.6s-.78.94-1.29 1.3c-2.66 1.84-4.31 2.99-4.96 3.45-.07.05-.22.16-.45.32-.23.17-.42.3-.57.4s-.34.22-.55.34c-.22.13-.42.22-.61.29-.19.06-.37.1-.53.1h-.02c-.16 0-.34-.03-.53-.1-.19-.06-.39-.16-.61-.29s-.4-.24-.55-.34-.34-.24-.57-.4c-.23-.17-.38-.27-.45-.32-.64-.45-1.57-1.1-2.78-1.94s-1.93-1.34-2.17-1.51c-.44-.3-.85-.71-1.24-1.22s-.58-1-.58-1.45c0-.55.15-1.01.44-1.38s.71-.55 1.26-.55h15.61c.46 0 .86.17 1.19.5.34.33.5.73.5 1.2zm0 3.12v8.42c0 .47-.17.87-.5 1.2s-.73.5-1.2.5h-15.61c-.47 0-.87-.17-1.2-.5s-.5-.73-.5-1.2v-8.42c.31.35.67.65 1.07.92 2.56 1.74 4.32 2.96 5.27 3.66.4.3.73.53.98.69.25.17.58.34 1 .51s.81.26 1.17.26h.02c.36 0 .75-.09 1.17-.26s.75-.34 1-.51.58-.4.98-.69c1.2-.87 2.96-2.09 5.28-3.66.4-.28.76-.58 1.06-.92z" fill="#fff" />
								</svg>
							</a>
						</li>
					</ul>
				</div>
                <?php $footernav = get_field('footer_nav', 'option'); ?>
				<div class="foot--nav">
					<ul>
                        <?php foreach ($footernav as $item): ?>
                            <li><a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['label']); ?></a></li>
                        <?php endforeach; ?>
					</ul>
				</div>
				<div class="foot--bottom">
					<div class="copyright">&#169; 2025 forestcircularity All rights reserved.</div>
				</div>
			</div>
		</footer>
		<!-- Go page top
				============================================= -->
		<div id="page_top">
			<a href="#">
				<svg viewBox="0 0 60.25 50.88">
					<g fill="#fff">
						<path d="m56.71 50.88-26.59-26.59-26.58 26.59-3.54-3.53 30.12-30.13 30.13 30.13z" />
						<path d="m.66 0h58.92v5.1h-58.92z" />
					</g>
				</svg>
			</a>
		</div>
		<script src="/asset/js/function.min.js"></script>

        <?php if (!is_single() && !is_page()): ?>
		<script src="/asset/js/macy.min.js"></script>
		<script>
			var masonry = new Macy({
				container: "#macy--wrap",
				trueOrder: true,
				waitForImages: false,
				refresh: true,
				mobileFirst: true,
				columns: 1,
				margin: {
					y: 20,
					x: 20,
				},
				breakAt: {
					1280: 4,
					992: 3,
					640: 2,
					375: 1,
				},
			});

            // ウィンドウサイズ変更時に高さを再計算
            window.addEventListener("resize", function () {
                masonry.recalculate(true);
            });
		</script>
        <?php endif; ?>

		<?php if (is_single()): ?>
			<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.1/dist/simpleParallax.min.js"></script>
			<script>
			const image = document.getElementsByClassName("parallax");
			new simpleParallax(image, {
				scale: 1.2,
			});
			</script>
		<?php endif; ?>

        <?php wp_footer(); ?>
	</body>
</html>
