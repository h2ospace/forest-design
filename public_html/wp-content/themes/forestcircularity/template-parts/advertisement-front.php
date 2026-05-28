<?php
$ad = get_field('advertise', 'option');
if (isset($ad) && $ad['title'] !== ''):
?>

<div class="article">
    <a href="<?php echo $ad['link']; ?>" class="article--link"></a>
    <img loading="lazy" src="<?php echo $ad['banner']; ?>" alt="" width="800" height="800" />
    <div class="article--wrap">
        <h2><?php echo $ad['title']; ?></h2>
        <p class="article--desc"><?php echo $ad['description']; ?></p>
    </div>
</div>
<?php endif; ?>