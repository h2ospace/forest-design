<?php get_header(); ?>

<div class="container">
    <div class="archive--title">
        <h1>執筆者一覧<span>Contributors</span></h1>
    </div>
    <p class="contributors--order">ABC順</p>
    <?php
    # ユーザー一覧を取得
    $args = array(
        'meta_key' => 'head_chara',
        'orderby' => 'meta_value',
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
            $nickname = $user->nickname;

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
            <p class="contributors--desc"><?php echo mb_substr($user_desc, 0, 80); ?>...</p>
            <a href="<?php echo esc_url(get_author_posts_url($user_id)); ?>"></a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>
