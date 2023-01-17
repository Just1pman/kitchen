<?php
    $catalogPaginationClass = $catalogPaginationClass ?? 'catalog-kitchen-pagination'
?>

<div class="<?= $classContainer ?? '' ?>">
    <?php include get_template_directory() . '/partials/product-cards.php' ?>
</div>

<?php if ($classContainer === 'catalog-filter-results' && count($entities) > 0) : ?>
    <div class="filter-pagination <?= $catalogPaginationClass ?? '' ?>">
        <?php if ($paged - 2 > 0) : ?>
            <div class="page-numbers paged"> 1</div>
        <?php endif; ?>

        <?php if ($paged - 3 <= $max_page && $paged > 3) : ?>
            <div class="dots"> ...</div>
        <?php endif; ?>

        <?php if ($paged - 1 <= $max_page && $paged != 1) : ?>
            <div class="page-numbers paged"> <?= $paged - 1 ?> </div>
        <?php endif; ?>

        <div class="page-numbers current"> <?= $paged ?> </div>

        <?php if ($paged + 1 < $max_page) : ?>
            <div class="page-numbers paged"> <?= $paged + 1 ?> </div>
        <?php endif; ?>

        <?php if ($paged + 3 <= $max_page) : ?>
            <div class="dots"> ...</div>
        <?php endif; ?>

        <?php if ($paged < $max_page) : ?>
            <div class="page-numbers paged"> <?= $max_page ?> </div>
        <?php endif; ?>
    </div>
<?php else : ?>
    Ничего не найдено
<?php endif; ?>