<?php
$pageHeading = get_the_title();
$link = get_the_permalink();
?>
<div class="search__item">
    <a href="<?php echo $link; ?>" class="h6" ><?php echo $pageHeading; ?></a>
</div>

