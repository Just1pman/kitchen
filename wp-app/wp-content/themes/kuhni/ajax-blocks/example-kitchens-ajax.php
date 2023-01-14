<?php
$classContainer = 'swiper-wrapper';
?>
<?php if (!empty($entities)) : ?>
    <div class="swiper swiper-kitchen">
        <?php  include get_template_directory() . '/ajax-blocks/filter-card-ajax.php' ?>
        <div class="swiper-button-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 20 10" fill="none">
                <path d="M1.08672 4.07431H16.7981L14.1955 1.48427C13.9051 1.19523 13.9039 0.725515 14.193 0.435107C14.482 0.144662 14.9518 0.143587 15.2422 0.432585L19.1186 4.29035C19.1189 4.29057 19.1191 4.29083 19.1193 4.29105C19.409 4.58009 19.4099 5.05133 19.1194 5.34133C19.1191 5.34155 19.1189 5.34181 19.1187 5.34203L15.2423 9.19979C14.9519 9.48876 14.4821 9.48775 14.1931 9.19727C13.904 8.90686 13.9051 8.43714 14.1955 8.14811L16.7981 5.55807H1.08672C0.676983 5.55807 0.344845 5.22593 0.344845 4.81619C0.344845 4.40645 0.676983 4.07431 1.08672 4.07431Z" fill="white"/>
            </svg>
        </div>
        <div class="swiper-button-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 20 10" fill="none">
                <path d="M1.08672 4.07431H16.7981L14.1955 1.48427C13.9051 1.19523 13.9039 0.725515 14.193 0.435107C14.482 0.144662 14.9518 0.143587 15.2422 0.432585L19.1186 4.29035C19.1189 4.29057 19.1191 4.29083 19.1193 4.29105C19.409 4.58009 19.4099 5.05133 19.1194 5.34133C19.1191 5.34155 19.1189 5.34181 19.1187 5.34203L15.2423 9.19979C14.9519 9.48876 14.4821 9.48775 14.1931 9.19727C13.904 8.90686 13.9051 8.43714 14.1955 8.14811L16.7981 5.55807H1.08672C0.676983 5.55807 0.344845 5.22593 0.344845 4.81619C0.344845 4.40645 0.676983 4.07431 1.08672 4.07431Z" fill="white"/>
            </svg>
        </div>
    </div>
<?php endif; ?>