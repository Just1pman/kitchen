<?php

/*
Title: Широкий ассортимент
Mode: preview
*/

$headline     = get_field( 'headline' );
$assortiments = get_field( 'assortiments' );
?>

<?php if ( ! is_admin() ) : ?>
    <section class="assortiment">
        <div class="container">
            <div class="assortiment-wrapper-top">
                <h2><?= $headline ?? '' ?></h2>
				<?php if ( ! empty( $assortiments ) ) : ?>
                    <div class="wrapper-top-assortiments">
						<?php foreach ( $assortiments as $assortiment ) : ?>
                            <div class="wrapper-top-assortiment">
                                <p class="assortiment-text"><?= $assortiment['text'] ?? '' ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="5" height="5" viewBox="0 0 5 5" fill="none">
                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#ED1C24"/>
                                </svg>
                            </div>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
            </div>
            <div class="assortiment-wrapper-bottom">

            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Широкий ассортимент модуль</h2>
<?php endif; ?>