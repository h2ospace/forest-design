<?php get_header(); ?>

<div class="container">
    <div class="archive--title">
        <h1>執筆者一覧<span>Contributors</span></h1>
    </div>
    <p class="contributors--order">ABC順</p>
    <?php
    # ユーザー一覧を取得
    $args = array(
        'orderby' => 'display_name',
        'order' => 'ASC',
        'number' => -1,
    );
    $users = get_users($args);
    ?>
    <div class="contributors--wrap">
        <?php
        foreach ($users as $user):
            $user_id = $user->ID;
            $user_meta = get_user_meta($user_id);
            $user_name = $user_meta['last_name'][0] . ' ' . $user_meta['first_name'][0];
            $user_desc = $user_meta['description'][0];
            $nickname = $user->display_name;

            $user_data = get_field("user_field");

            ## プロフィールが空なら表示しない
            if (empty($user_desc)) {
                continue;
            }
            ?>
        <div class="contributors--child">
            <h2><?php echo esc_html($user_name); ?></h2>
            <p class="contributors--name-en"><?php echo esc_html($nickname); ?></p>
            <p class="contributors--title"><?php the_field('company', 'user_' . $user_id); ?></p>
            <p class="contributors--desc"><?php echo esc_html($user_desc); ?></p>
            <a href="<?php echo esc_url(get_author_posts_url($user_id)); ?>"></a>
        </div>
        <?php endforeach; ?>
        <div class="contributors--child">
            <h2>住友林業</h2>
            <p class="contributors--name-en">Sumitomo Forestry Co., Ltd.</p>
            <p class="contributors--title">木材建材事業</p>
            <p class="contributors--desc"></pclass>林業・木材建材・住宅事業・不動産事業などが事業の中核である。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>八十雅世</h2>
            <p class="contributors--name-en">Masayo Yaso</p>
            <p class="contributors--title">情報技術開発株式会社</p>
            <p class="contributors--desc">早稲田大学第一文学部美術史学専修卒、早稲田大学大学院経営管理研究科にてMBA取得。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>住友林業</h2>
            <p class="contributors--name-en">Sumitomo Forestry Co., Ltd.</p>
            <p class="contributors--title">木材建材事業</p>
            <p class="contributors--desc"></pclass>林業・木材建材・住宅事業・不動産事業などが事業の中核である。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>八十雅世</h2>
            <p class="contributors--name-en">Masayo Yaso</p>
            <p class="contributors--title">情報技術開発株式会社</p>
            <p class="contributors--desc">早稲田大学第一文学部美術史学専修卒、早稲田大学大学院経営管理研究科にてMBA取得。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>住友林業</h2>
            <p class="contributors--name-en">Sumitomo Forestry Co., Ltd.</p>
            <p class="contributors--title">木材建材事業</p>
            <p class="contributors--desc"></pclass>林業・木材建材・住宅事業・不動産事業などが事業の中核である。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>八十雅世</h2>
            <p class="contributors--name-en">Masayo Yaso</p>
            <p class="contributors--title">情報技術開発株式会社</p>
            <p class="contributors--desc">早稲田大学第一文学部美術史学専修卒、早稲田大学大学院経営管理研究科にてMBA取得。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>住友林業</h2>
            <p class="contributors--name-en">Sumitomo Forestry Co., Ltd.</p>
            <p class="contributors--title">木材建材事業</p>
            <p class="contributors--desc"></pclass>林業・木材建材・住宅事業・不動産事業などが事業の中核である。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>八十雅世</h2>
            <p class="contributors--name-en">Masayo Yaso</p>
            <p class="contributors--title">情報技術開発株式会社</p>
            <p class="contributors--desc">早稲田大学第一文学部美術史学専修卒、早稲田大学大学院経営管理研究科にてMBA取得。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>住友林業</h2>
            <p class="contributors--name-en">Sumitomo Forestry Co., Ltd.</p>
            <p class="contributors--title">木材建材事業</p>
            <p class="contributors--desc"></pclass>林業・木材建材・住宅事業・不動産事業などが事業の中核である。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>八十雅世</h2>
            <p class="contributors--name-en">Masayo Yaso</p>
            <p class="contributors--title">情報技術開発株式会社</p>
            <p class="contributors--desc">早稲田大学第一文学部美術史学専修卒、早稲田大学大学院経営管理研究科にてMBA取得。</p>
            <a href="/author.html"></a>
        </div>
        <div class="contributors--child">
            <h2>住友林業</h2>
            <p class="contributors--name-en">Sumitomo Forestry Co., Ltd.</p>
            <p class="contributors--title">木材建材事業</p>
            <p class="contributors--desc"></pclass>林業・木材建材・住宅事業・不動産事業などが事業の中核である。</p>
            <a href="/author.html"></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
