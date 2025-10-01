<?php
$ad = get_field('advertise', 'option');
if (isset($ad) && $ad['title'] !== ''):
?>
<div class="macy--content" style="width: calc(25% - 15px); position: absolute; top: 0px; left: calc(75% + 15px);" data-macy-complete="1">
    <h3 class="mb-xs"><?php echo $ad['title']; ?></h3>
    <div class="eye-catch--container">
        <img src="<?php echo $ad['banner']; ?>" alt="" width="294" height="137">
    </div>
    <p class="mt-xs mb-none"><?php echo $ad['description']; ?></p>
    <a href="<?php echo $ad['link']; ?>"></a>
</div>
<?php endif; ?>