<?php

/*
Title: Контакты модуль
Mode: preview
*/

$full_address = get_field('full_address');
$requisites = get_field('requisites');
$file = get_field('file');
$phone_image = get_field('phone_image');
$feedback_phone = get_field('feedback_phone');
$feedback_phone_numbers = $feedback_phone ? preg_replace('/[^0-9]/', "", $feedback_phone) : '';

$logo = get_field('logo', 'option');
$workingMode = get_field('workingMode', 'option');
$phones = get_field('phones', 'option');
$emailInfo = get_field('emailInfo', 'option');
?>


<?php if (!is_admin()) : ?>
    <section class="contacts">
        <div class="container">
            <div class="contacts-wrapper-top">
                <div class="wrapper-top-left">
                    <h1><?= get_the_title() ?></h1>
                    <div class="wrapper-top-left-logo">
                        <picture>
                            <img loading="lazy" src=<?= $logo['url'] ?>"" alt="<?= $logo['title'] ?>">
                        </picture>
                    </div>
                    <div class="wrapper-top-left-item">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38"
                                 fill="none">
                                <circle cx="19" cy="19" r="19" fill="#E3E3E3"/>
                                <g clip-path="url(#clip0_143_3811)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M18.5021 9.99207C14.9209 9.99207 12.0078 12.916 12.0078 16.5102C12.0078 20.9705 17.8193 27.5188 18.0669 27.7957C18.2993 28.0551 18.7049 28.0551 18.9373 27.7957C19.1843 27.5188 24.9959 20.9705 24.9959 16.5102C24.9959 12.916 22.0828 9.99207 18.5021 9.99207ZM18.5021 19.7899C16.7003 19.7899 15.2344 18.3187 15.2344 16.5102C15.2344 14.7017 16.7003 13.231 18.5021 13.231C20.3034 13.231 21.7693 14.7022 21.7693 16.5102C21.7693 18.3187 20.3034 19.7899 18.5021 19.7899Z"
                                          fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_143_3811">
                                        <rect width="13" height="18" fill="white" transform="translate(12 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="wrapper-top-left-item-info">
                            <p class="info-title">Адрес</p>
                            <p class="info-text"><?= $full_address ?? '' ?></p>
                        </div>
                    </div>
                    <div class="wrapper-top-left-item phone">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38"
                                 fill="none">
                                <circle cx="19" cy="19" r="19" fill="#E3E3E3"/>
                                <g clip-path="url(#clip0_143_3819)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M26.9916 22.8423C27.0238 23.0861 26.9497 23.2983 26.7697 23.4783L24.6572 25.5766C24.5616 25.6824 24.4374 25.7729 24.2839 25.847C24.1301 25.9211 23.9792 25.9687 23.8309 25.9897C23.8207 25.9897 23.7885 25.9927 23.7358 25.9979C23.6826 26.003 23.6141 26.006 23.5292 26.006C23.3278 26.006 23.0025 25.9713 22.5525 25.9023C22.1025 25.8337 21.5518 25.664 20.9004 25.394C20.2494 25.1236 19.5109 24.7181 18.6851 24.1777C17.8588 23.6373 16.9798 22.8954 16.0481 21.9521C15.3071 21.221 14.6925 20.5216 14.2056 19.8539C13.7184 19.1861 13.3266 18.569 13.0301 18.002C12.7339 17.435 12.5115 16.9211 12.3632 16.46C12.2149 15.9989 12.1142 15.6016 12.0615 15.2677C12.0084 14.9339 11.9874 14.6716 11.9976 14.4809C12.0084 14.2901 12.0135 14.1843 12.0135 14.1629C12.0349 14.0146 12.0825 13.8637 12.1566 13.7099C12.2308 13.5564 12.3208 13.4317 12.4266 13.3366L14.5391 11.222C14.6874 11.0737 14.8566 10.9996 15.0474 10.9996C15.1849 10.9996 15.3071 11.0394 15.4129 11.1187C15.5188 11.1984 15.6088 11.2961 15.6829 11.4131L17.3822 14.6399C17.4778 14.8096 17.5039 14.9947 17.4619 15.1961C17.4195 15.3976 17.3295 15.5673 17.1919 15.7049L16.4132 16.484C16.3922 16.505 16.3738 16.5393 16.3579 16.5873C16.3421 16.6349 16.3339 16.6747 16.3339 16.7064C16.3764 16.9289 16.4715 17.1834 16.6198 17.4693C16.7471 17.7239 16.9429 18.0337 17.2078 18.3993C17.4722 18.7649 17.8481 19.1861 18.3354 19.6631C18.8119 20.1504 19.2354 20.5297 19.6061 20.7997C19.9768 21.0701 20.2862 21.2686 20.5352 21.3959C20.7842 21.5231 20.9745 21.5999 21.1069 21.6264L21.3054 21.6663C21.3268 21.6663 21.3611 21.6581 21.4086 21.6423C21.4566 21.6264 21.4909 21.608 21.5119 21.5866L22.4175 20.6647C22.6082 20.495 22.8302 20.4101 23.0844 20.4101C23.2648 20.4101 23.4075 20.4419 23.5134 20.5057H23.5292L26.5948 22.3177C26.8172 22.4557 26.9496 22.6306 26.9916 22.8423Z"
                                          fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_143_3819">
                                        <rect width="15" height="15" fill="white" transform="translate(12 11)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="wrapper-top-left-item-info">
                            <p class="info-title">Телефон</p>
                            <a href="tel:+<?= $phones[0]['phone'] ?? '' ?>" class="info-text"> <?= $phones[0]['phone'] ?? '' ?> </a>
                        </div>
                    </div>
                    <div class="wrapper-top-left-item email">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38"
                                 fill="none">
                                <circle cx="19" cy="19" r="19" fill="#E3E3E3"/>
                                <g clip-path="url(#clip0_143_3827)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M21.1673 19.087L26 14.4386V23.6273L21.1673 19.087ZM12.3179 13.7734C12.4981 13.5862 12.7402 13.4714 13.0066 13.4714H24.9934C25.2616 13.4714 25.5041 13.5852 25.6839 13.771L19 20.1055L12.3179 13.7734ZM12 23.6273V14.442L16.8332 19.087L12 23.6273ZM19 21.211L20.7324 19.5348L25.6816 24.2278C25.5019 24.4135 25.2598 24.5278 24.9934 24.5278H13.0066C12.7388 24.5278 12.4963 24.4135 12.3161 24.2278L17.2681 19.5348L19 21.211Z"
                                          fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_143_3827">
                                        <rect width="14" height="12" fill="white" transform="translate(12 13)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="wrapper-top-left-item-info">
                            <p class="info-title">E-mail</p>
                            <a href="mailto:<?= $emailInfo['email'] ?? '' ?>" class="info-text"> <?= $emailInfo['email'] ?? '' ?> </a>
                        </div>
                    </div>
                    <div class="wrapper-top-left-item work-time">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38"
                                 fill="none">
                                <circle cx="19" cy="19" r="19" fill="#E3E3E3"/>
                                <g clip-path="url(#clip0_143_3837)">
                                    <path d="M14.9044 19.4881L14.9009 18.3868L13.2776 18.392C13.5471 15.8299 15.5868 13.7956 18.1504 13.5366L18.1557 15.1894L19.2564 15.1859L19.2511 13.5358C21.8377 13.7929 23.8931 15.8568 24.1387 18.4484L22.4419 18.4528L22.4455 19.554L24.1326 19.5497C23.8605 22.1326 21.7893 24.1786 19.196 24.4099L19.1907 22.7514L18.0901 22.7549L18.0953 24.398C15.5392 24.1135 13.5162 22.063 13.2722 19.4934L14.9044 19.4881ZM15.9479 19.5277H17.8758C18.0524 19.7896 18.3515 19.9618 18.6907 19.9618C19.2334 19.9618 19.6734 19.5209 19.6734 18.9771C19.6734 18.6376 19.5019 18.3382 19.241 18.1612V16.2254H18.1403V18.1611C18.0362 18.2318 17.9462 18.3219 17.8758 18.4264H15.9479V19.5277H15.9479Z"
                                          fill="black"/>
                                    <path d="M15.1943 25.6792L14.6419 26.7217C14.2121 26.4937 13.7981 26.2272 13.4115 25.9298L14.1304 24.9944C14.4648 25.2517 14.8228 25.4821 15.1943 25.6792Z"
                                          fill="black"/>
                                    <path d="M17.5879 26.4683L17.4127 27.6352C16.9303 27.5627 16.4512 27.4486 15.9888 27.2961L16.3579 26.1755C16.7574 26.3072 17.1712 26.4057 17.5879 26.4683Z"
                                          fill="black"/>
                                    <path d="M11.8105 22.0321L10.7304 22.5056C10.5348 22.059 10.3759 21.5926 10.2582 21.1197L11.4025 20.8345C11.5043 21.2432 11.6415 21.6461 11.8105 22.0321Z"
                                          fill="black"/>
                                    <path d="M20.3271 27.583C19.85 27.6724 19.3603 27.7222 18.8716 27.7307L18.8508 26.551C19.2739 26.5435 19.6976 26.5006 20.1101 26.4233L20.3271 27.583Z"
                                          fill="black"/>
                                    <path d="M13.1953 24.1414L12.331 24.9442C11.9995 24.5868 11.6959 24.1993 11.4288 23.7923L12.4146 23.1447C12.6457 23.4968 12.9084 23.8322 13.1953 24.1414Z"
                                          fill="black"/>
                                    <path d="M22.3643 26.9321C22.1608 27.0262 21.9511 27.1134 21.7411 27.1913L21.3312 26.0849C21.5125 26.0176 21.6936 25.9423 21.8693 25.861L22.3643 26.9321Z"
                                          fill="black"/>
                                    <path d="M12.5524 12.8269C14.1985 11.1776 16.3872 10.2692 18.7154 10.2692C23.4732 10.2692 27.4055 13.9328 27.4308 19.0007C27.436 20.0464 27.2434 21.0806 26.8827 22.0515L27.6158 21.7988L28 22.9143L25.9457 23.6226C25.5868 23.7384 25.303 23.517 25.2092 23.2915L24.3831 21.3057L25.4719 20.8523L25.7876 21.6111C26.0926 20.7798 26.2515 19.8954 26.2515 19.0007C26.2515 14.8368 22.8708 11.4491 18.7154 11.4491C14.56 11.4491 11.1794 14.8368 11.1794 19.0007C11.1794 19.1951 11.1868 19.3916 11.2016 19.5845L10.0256 19.6743C10.0087 19.4515 10 19.2249 10 19.0007C10 16.6686 10.9065 14.476 12.5524 12.8269Z"
                                          fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_143_3837">
                                        <rect width="18" height="18" fill="white" transform="matrix(-1 0 0 1 28 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="wrapper-top-left-item-info">
                            <p class="info-title">Режим работы</p>
                            <p class="info-text"><?= $workingMode['workingTime'] ?? '' ?> <span>По будням</span></p>
                        </div>
                    </div>
                </div>

                <div class="wrapper-top-right">
                    <div style="position:relative;overflow:hidden; height: 100%; width: 100%"><a
                                href="https://yandex.by/maps/213/moscow/?utm_medium=mapframe&utm_source=maps"
                                style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a><a
                                href="https://yandex.by/maps/213/moscow/house/presnenskaya_naberezhnaya_10s2/Z04YcwRlSUIGQFtvfXt1dnphZg==/?indoorLevel=1&ll=37.535071%2C55.747622&utm_medium=mapframe&utm_source=maps&z=17.05"
                                style="color:#eee;font-size:12px;position:absolute;top:14px;">Пресненская набережная,
                            10с2 — ЯндексКарты</a>
                        <iframe src="https://yandex.by/map-widget/v1/?indoorLevel=1&ll=37.535071%2C55.747622&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgozMTA3Njg4NTkxEk7QoNC%2B0YHRgdC40Y8sINCc0L7RgdC60LLQsCwg0J%2FRgNC10YHQvdC10L3RgdC60LDRjyDQvdCw0LHQtdGA0LXQttC90LDRjywgMTDRgTIiCg3pIxZCFZH9XkI%3D&z=17.05"
                                width="100%" height="100%" frameborder="1" allowfullscreen="true"
                                style="position:relative;"></iframe>
                    </div>
                </div>
            </div>
            <div class="contacts-wrapper-bottom">
                <div class="contacts-wrapper-bottom-left">
                    <div class="contacts-wrapper-bottom-right-title">
                        <h2>Реквизиты</h2>
                        <a href="<?= $file['url'] ?>" target="_blank">
                            скачать реквизиты
                            <svg xmlns="http://www.w3.org/2000/svg" width="190" height="1" viewBox="0 0 190 1"
                                 fill="none">
                                <line y1="0.5" x2="190" y2="0.5" stroke="#ED1C24"/>
                            </svg>
                        </a>
                        <svg class="contacts-icon-btn" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <path d="M12.0002 0.59259C9.74401 0.59259 7.53851 1.26162 5.66257 2.51508C3.78663 3.76855 2.32452 5.55014 1.46112 7.63457C0.597716 9.719 0.371811 12.0127 0.811969 14.2255C1.25213 16.4383 2.33858 18.4709 3.93393 20.0663C5.52929 21.6616 7.56189 22.7481 9.77471 23.1882C11.9875 23.6284 14.2812 23.4025 16.3656 22.5391C18.45 21.6757 20.2316 20.2136 21.4851 18.3376C22.7386 16.4617 23.4076 14.2562 23.4076 12C23.4076 10.502 23.1125 9.01858 22.5393 7.63457C21.966 6.25056 21.1257 4.99302 20.0664 3.93374C19.0072 2.87447 17.7496 2.0342 16.3656 1.46093C14.9816 0.887652 13.4982 0.59259 12.0002 0.59259ZM9.55796 11.6319C9.60617 11.5833 9.66352 11.5447 9.7267 11.5183C9.78989 11.492 9.85766 11.4785 9.92611 11.4785C9.99456 11.4785 10.0623 11.492 10.1255 11.5183C10.1887 11.5447 10.2461 11.5833 10.2943 11.6319L11.4817 12.8244V6.29629C11.4817 6.15877 11.5363 6.02689 11.6335 5.92965C11.7308 5.83241 11.8627 5.77778 12.0002 5.77778C12.1377 5.77778 12.2696 5.83241 12.3668 5.92965C12.4641 6.02689 12.5187 6.15877 12.5187 6.29629V12.8244L13.7061 11.6319C13.8038 11.5342 13.9362 11.4794 14.0743 11.4794C14.2123 11.4794 14.3448 11.5342 14.4424 11.6319C14.54 11.7295 14.5949 11.8619 14.5949 12C14.5949 12.1381 14.54 12.2705 14.4424 12.3681L12.3683 14.4422C12.3201 14.4908 12.2628 14.5294 12.1996 14.5557C12.1364 14.582 12.0686 14.5956 12.0002 14.5956C11.9317 14.5956 11.864 14.582 11.8008 14.5557C11.7376 14.5294 11.6802 14.4908 11.632 14.4422L9.55796 12.3681C9.50936 12.3199 9.47079 12.2626 9.44446 12.1994C9.41814 12.1362 9.40459 12.0684 9.40459 12C9.40459 11.9315 9.41814 11.8638 9.44446 11.8006C9.47079 11.7374 9.50936 11.6801 9.55796 11.6319ZM17.1854 16.6667C17.1854 16.8042 17.1307 16.9361 17.0335 17.0333C16.9363 17.1306 16.8044 17.1852 16.6669 17.1852H7.33352C7.196 17.1852 7.06411 17.1306 6.96687 17.0333C6.86963 16.9361 6.815 16.8042 6.815 16.6667V14.0741C6.815 13.9366 6.86963 13.8047 6.96687 13.7074C7.06411 13.6102 7.196 13.5556 7.33352 13.5556C7.47104 13.5556 7.60293 13.6102 7.70017 13.7074C7.79741 13.8047 7.85204 13.9366 7.85204 14.0741V16.1481H16.1483V14.0741C16.1483 13.9366 16.203 13.8047 16.3002 13.7074C16.3974 13.6102 16.5293 13.5556 16.6669 13.5556C16.8044 13.5556 16.9363 13.6102 17.0335 13.7074C17.1307 13.8047 17.1854 13.9366 17.1854 14.0741V16.6667Z"
                                  fill="#ED1C24"/>
                        </svg>
                    </div>
                    <div class="contacts-wrapper-bottom-right-text">
                        <?= $requisites ?? '' ?>
                    </div>
                </div>
                <div class="contacts-wrapper-bottom-right">
                    <h2>Обратная связь</h2>
                    <p>
                        <strong>Если у Вас возникли вопросы,</strong> <br/>
                        звоните по телефону <a
                                href="tel:+<?= $feedback_phone_numbers ?>"><?= $feedback_phone ?></a><br/>
                        или задайте вопрос <a href="javascript:;" data-fancybox data-src="#back-call">в форме обратной
                            связи.</a>
                    </p>

                    <div class="contacts-wrapper-bottom-right-image">
                        <picture>
                            <img loading="lazy" src="<?= $phone_image['url'] ?>" alt="<?= $phone_image['title'] ?>">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Контакты модуль</h2>
<?php endif; ?>