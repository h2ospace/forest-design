<?php
header("Content-Type: application/xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/"

     xmlns:georss="http://www.georss.org/georss"
     xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#"
>

    <channel>
        <title><?php bloginfo('name'); ?></title>
        <atom:link href="<?php echo home_url('/rssall/'); ?>" rel="self" type="application/rss+xml" />
        <link><?php echo home_url('/'); ?></link>
        <description><?php bloginfo('description'); ?></description>
        <lastBuildDate><?php echo gmdate("M d Y H:i:s"); ?> +0000</lastBuildDate>
        <language>ja</language>
        <sy:updatePeriod>
            hourly
        </sy:updatePeriod>
        <sy:updateFrequency>
            1
        </sy:updateFrequency>
        <generator>https://wordpress.org/</generator>
        <site xmlns="com-wordpress:feed-additions:1">88258903</site>
        <?php $articles = new WP_Query([
                'post_type' => 'post',
            'posts_per_page' => 10,
            'ignore_sticky_posts' => true,
        ]); ?>
        <?php while ( $articles->have_posts() ): $articles->the_post(); ?>
            <item>
                <title><?php echo strip_tags(get_the_title()); ?></title>
                <link><?php the_permalink(); ?></link>

                <dc:creator><![CDATA[<?php the_author(); ?>]]></dc:creator>
                <pubDate><?php echo get_post_time("M d Y H:i:s", true); ?> +0000</pubDate>
                <?php $cats = get_the_category(); ?>
                <?php foreach ($cats as $cat): ?>
                    <category><![CDATA[<?php echo $cat->name; ?>]]></category>
                <?php endforeach; ?>
                <guid isPermaLink="false"><?php echo home_url('/'); ?>?p=<?php the_ID(); ?></guid>

                <description><![CDATA[<?php echo get_the_content(); ?>]]></description>

                <post-id xmlns="com-wordpress:feed-additions:1"><?php the_ID(); ?></post-id>
            </item>
        <?php endwhile; ?>
    </channel>
</rss>
