<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
<div class="container--second">
    <div class="archive--title">
        <h1><?php the_title(); ?><span><?php the_field('english_title'); ?></span></h1>
    </div>

    <?php the_content(); ?>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
