(() => {
	const body = document.body;
	const header = document.querySelector("header");
	const hamburgerBtn = document.getElementById("js_hamburger");
	const searchWrap = document.getElementById("search--wrap");
	const searchOpenBtn = document.querySelector(".open--btn");
	const searchText = document.getElementById("search--text");
	const pageTopBtn = document.getElementById("page_top");
	let scrollPosition = 0;
	let headerHeight = header ? header.offsetHeight : 0;
	let lastScrollPos = 0;

	// ユーティリティ関数
	const toggleClass = (element, className) => element.classList.toggle(className);
	const addClass = (element, className) => element.classList.add(className);
	const removeClass = (element, className) => element.classList.remove(className);
	const scrollToTop = () => window.scrollTo({ top: 0, behavior: "smooth" });

	// ハンバーガーメニューの開閉
	const toggleNavMenu = () => {
		if (body.classList.contains("nav_open")) {
			removeClass(body, "nav_open");
			window.scrollTo(0, scrollPosition);
		} else {
			scrollPosition = window.pageYOffset;
			addClass(body, "nav_open");
		}
	};

	// ヘッダーのスクロールによる非表示
	const handleHeaderScroll = () => {
		if (!header) return;
		const currentScrollPos = window.scrollY;
		header.style.top = currentScrollPos === 0 ? "0px" : currentScrollPos > lastScrollPos && currentScrollPos > headerHeight ? `-${headerHeight}px` : "0px";
		lastScrollPos = currentScrollPos;
	};

	// SP検索エリアの開閉
	const toggleSearchPanel = () => {
		toggleClass(searchOpenBtn, "search-btn-open");
		toggleClass(searchWrap, "search-panel-open");
		searchText.focus();
	};

	// SP検索エリアを閉じる
	const closeSearchPanel = () => {
		removeClass(searchWrap, "search-panel-open");
		removeClass(searchOpenBtn, "search-btn-open");
	};

	// トップへ戻るボタンの表示/非表示
	const handlePageTopBtnVisibility = () => {
		window.scrollY > 100 ? addClass(pageTopBtn, "pagetop-show") : removeClass(pageTopBtn, "pagetop-show");
	};

	// スクロールバーの幅調整
	const adjustScrollbarWidth = () => {
		const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
		document.documentElement.style.setProperty("--scrollbar", `${scrollbarWidth}px`);
	};

	// イベントリスナーの追加
	if (hamburgerBtn) {
		hamburgerBtn.addEventListener("click", toggleNavMenu);
	}

	if (header) {
		window.addEventListener("scroll", handleHeaderScroll);
		window.addEventListener("resize", () => {
			headerHeight = header.offsetHeight;
		});
	}

	if (searchWrap && searchOpenBtn && searchText) {
		removeClass(searchWrap, "search-panel-open");
		searchOpenBtn.addEventListener("click", toggleSearchPanel);
		document.addEventListener("click", (event) => {
			const target = event.target;
			if (!searchWrap.contains(target) && !searchOpenBtn.contains(target)) {
				closeSearchPanel();
			}
		});
	}

	if (pageTopBtn) {
		window.addEventListener("scroll", handlePageTopBtnVisibility);
		pageTopBtn.addEventListener("click", (event) => {
			event.preventDefault();
			scrollToTop();
		});
	}

	window.addEventListener("load", adjustScrollbarWidth);
	window.addEventListener("resize", adjustScrollbarWidth);
})();
