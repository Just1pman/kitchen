<?php

$needPagination = $needPagination ?? true;

?>
<div class="wrapper">
    <?php
foreach($articles as $article) : ?>
    <?php
        include get_template_directory() . '/partials/single-article-card.php'
    ?>
<?php endforeach; ?>
</div>
<?php if ($needPagination && $max_page > 1) : ?>
<div class="filter-pagination">
    <?php if ($paged - 2 > 0) : ?>
        <div class="page-numbers paged"> 1</div>
    <?php endif; ?>

    <?php if ($paged - 3 <= $max_page && $paged > 3) : ?>
        <div class="page-numbers dots"> ...</div>
    <?php endif; ?>

    <?php if ($paged - 1 <= $max_page && $paged != 1) : ?>
        <div class="page-numbers paged"> <?= $paged - 1 ?> </div>
    <?php endif; ?>

    <div class="page-numbers current"> <?= $paged ?> </div>

    <?php if ($paged + 1 < $max_page) : ?>
        <div class="page-numbers paged"> <?= $paged + 1 ?> </div>
    <?php endif; ?>

    <?php if ($paged + 3 <= $max_page) : ?>
        <div class="page-numbers dots"> ...</div>
    <?php endif; ?>

    <?php if ($paged < $max_page) : ?>
        <div class="page-numbers paged"> <?= $max_page ?> </div>
    <?php endif; ?>
</div>
<?php endif; ?>