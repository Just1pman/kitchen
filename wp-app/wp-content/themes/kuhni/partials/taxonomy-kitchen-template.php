<?php
get_header();
include get_template_directory() . '/modules/breadcrumb/' . 'breadcrumb.php'
?>

<?php
$materials = get_terms([
    'taxonomy' => 'kitchen-material',
    'hide_empty' => false,
]);
?>

    <section>

    </section>

<?php
get_footer();
?>