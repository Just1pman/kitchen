<?php

/*
Title: Хлебные крошки
Mode: preview
*/

?>

<?php if (!is_admin()) : ?>
    <section class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-wrapper">
                <?= \helpers\Helpers::get_breadcrumb() ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Хлебные крошки модуль</h2>
<?php endif; ?>