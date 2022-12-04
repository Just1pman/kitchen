<?php

/*
Title: Баннер модуль
Mode: preview
*/

$test = get_field('test');
?>


<?php if (!is_admin()) : ?>
    <section class="banner">
        <div class="container">
<!--            test-->
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Баннер модуль</h2>
<?php endif; ?>
