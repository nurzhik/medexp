<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Центр судебных экспертиз</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="img/favicon.png" />
        <link rel="stylesheet" href="/css/style.css?v=1.17" />
        <link rel="stylesheet" href="/css/slick.css" />
        <link rel="stylesheet" href="/css/jquery.fancybox.css" />
    </head>
    <body class="{{app()->getLocale()}}">
        <header>
            <div class="header_fixed">
                <div class="container">
                    <div class="header_top">
                        <a class="logo" href="/{{app()->getLocale()}}"></a>
                        <form class="search_block" action="">
                            <input class="search_input" type="text" placeholder="{{ __('lang.Поиск по сайту')}}...">
                            <button class="search_btn" type="submit"></button>
                        </form>
                        <div class="head_right">
                            <a class="search_show" href="javascript:;"></a>
                            <div class="spec_block">
                                <a class="eye_btn" href="javascript:;">{{__('lang.Версия для слабовидящих')}}</a>
                                <div class="spec_block_list">
                                    <div class="size_block">
                                        <div class="size_text">{{__('lang.Размер шрифта')}}:</div>
                                        <div class="size_list">
                                            <div class="size_list_item size_small">A</div>
                                            <div class="size_list_item size_middle active">A</div>
                                            <div class="size_list_item size_big">A</div>
                                        </div>
                                    </div>
                                    <div class="size_block">
                                        <div class="size_text">{{__('lang.Изображения')}}:</div>
                                        <div class="image_check">X</div>
                                    </div>
                                    <a class="normal_view" href="javascript:;">{{__('lang.Обычная версия сайта')}}</a>
                                </div>
                            </div>
                            <div class="lang_block">
                                <div class="lang_choice">
                                    @if(app()->getLocale() == 'kk') 
                                       KZ
                                    @else
                                    {{app()->getLocale()}}
                                    @endif
                                </div>
                                <div class="other_lang">
                                    <a class="lang @if(app()->getLocale() == 'kk') active @endif" href="/setlocale/kk">kz</a>
                                    <a class="lang @if(app()->getLocale() == 'ru') active @endif" href="/setlocale/ru">ru</a>
                                    <a class="lang @if(app()->getLocale() == 'en') active @endif" href="/setlocale/en">en</a>
                                </div>
                            </div>
                            <div class="mob_menu">
                           <span class="menu_btn">
                              <span class="menu_btn_span menu1"></span>
                              <span class="menu_btn_span menu2"></span>
                              <span class="menu_btn_span menu3"></span>
                           </span>
                        </div>
                        <div class="under_nav"></div>
                        </div>
                    </div>
                    <div class="header_bottom">
                        <ul class="menu">
                            <li><a class="menu_link active" href="/{{app()->getLocale()}}">{{__('lang.Главная')}}</a></li>
                            <li class="sub_menu_link">
                                <a class="menu_link" href="javascript:;">{{__('lang.О нас')}}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_list">
                                        <a class="sub_link" href="/staticpage/centr-sudebnyh-ekspertiz/{{app()->getLocale()}}">{{__('lang.История центра')}}</a>
                                        <a class="sub_link" href="/staticpage/ustav/{{app()->getLocale()}}">{{__('lang.Устав')}}</a>
                                        <a class="sub_link" href="/staticpage/struktura/{{app()->getLocale()}}">{{__('lang.Структура')}}</a>
                                    </div>
                                </div>
                            </li>
                            <li class="sub_menu_link">
                                <a class="menu_link" href="javascript:;">{{__('lang.Деятельность')}}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_list">
                                        <a class="sub_link" href="/expertise_type/{{app()->getLocale()}}">{{__('lang.Виды проводимых экспертиз')}}</a>
                                        <a class="sub_link" href="/work_plan/{{app()->getLocale()}}">{{__('lang.План работы')}}</a>
                                        <a class="sub_link" href="/npa_base/{{app()->getLocale()}}">{{__('lang.База НПА')}}</a>
                                        <a class="sub_link" href="/npa_project/{{app()->getLocale()}}">{{__('lang.Проекты НПА')}}</a>
                                        <a class="sub_link" href="/science_activity/{{app()->getLocale()}}">{{__('lang.Научная деятельность')}}</a>
                                        <a class="sub_link" href="/staticpage/akkreditaciya-institutov/{{app()->getLocale()}}">{{__('lang.Аккредитация институтов')}}</a>
                                        <a class="sub_link" href="/statistic/{{app()->getLocale()}}">{{__('lang.Аналитика и статистика')}}</a>
                                        <a class="sub_link" href="/goszakup/{{app()->getLocale()}}">{{__('lang.Государственные закупки')}}</a>
                                        <a class="sub_link" href="/vacancy/{{app()->getLocale()}}">{{__('lang.Вакансии')}}</a>
                                    </div>
                                </div>
                            </li>
                            <li class="sub_menu_link">
                                <a class="menu_link" href="javascript:;">{{__('lang.Гражданам')}}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_list">
                                        <a class="sub_link" href="/staticpage/grafik-priem-grazhdan-fizicheskih-i-yuridicheskih-lic-rukovodstvom-centra-sudebnyh-ekspertiz-ministerstva-yusticii-rk/{{app()->getLocale()}}">{{__('lang.График приема граждан')}}</a>
                                        <a class="sub_link" href="/staticpage/prejskurant-cen-platnyh-uslug-centra-sudebnyh-ekspertiz/{{app()->getLocale()}}">{{__('lang.Платные услуги')}}</a>
                                        <a class="sub_link" href="/gos_services/{{app()->getLocale()}}">{{__('lang.Государственные услуги')}}</a>
                                        <a class="sub_link"  href="/faqs/{{app()->getLocale()}}">{{__('lang.Часто задаваемые вопросы')}}</a>
                                    </div>
                                </div>
                            </li>
                            <li><a class="menu_link" href="/staticpage/proekt-vsemirnogo-banka/{{app()->getLocale()}}">{{__('lang.Проект Всемирного Банка')}}</a></li>
                            <li><a class="menu_link" href="/staticpage/mezhdunarodnoe-sotrudnichestvo/{{app()->getLocale()}}">{{__('lang.Международное сотрудничество')}}</a></li>
                            <li><a class="menu_link" href="/news-all/{{app()->getLocale()}}">{{__('lang.Новости')}}</a></li>
                            <li><a class="menu_link" href="/staticpage/kontakty/{{app()->getLocale()}}">{{__('lang.Контакты')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="popup" id="alert_popup">
            <div class="alert ">
                <div class="container">
                    <div class="my-alert__close"></div>
                </div>
            </div>
        </div>
        @yield('content')
        <footer>
            <div class="container">
                <div class="footer_top">
                    <a class="foot_logo" href="javascript:;">
                        <div class="logo"></div>
                    </a>
                    <div class="share_block">
                        <div class="share_text">{{__('lang.Поделиться в соц. сетях')}}:</div>
                        <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,whatsapp,telegram"></div>
                    </div>
                </div>
                <div class="foot_menu">
                    <ul class="menu">
                            <li><a class="menu_link active" href="/{{app()->getLocale()}}">{{__('lang.Главная')}}</a></li>
                            <li class="sub_menu_link">
                                <a class="menu_link" href="javascript:;">{{__('lang.О нас')}}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_list">
                                        <a class="sub_link" href="/staticpage/centr-sudebnyh-ekspertiz/{{app()->getLocale()}}">{{__('lang.История центра')}}</a>
                                        <a class="sub_link" href="/staticpage/ustav/{{app()->getLocale()}}">{{__('lang.Устав')}}</a>
                                        <a class="sub_link" href="/staticpage/struktura/{{app()->getLocale()}}">{{__('lang.Структура')}}</a>
                                    </div>
                                </div>
                            </li>
                            <li class="sub_menu_link">
                                <a class="menu_link" href="javascript:;">{{__('lang.Деятельность')}}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_list">
                                        <a class="sub_link" href="/expertise_type/{{app()->getLocale()}}">{{__('lang.Виды проводимых экспертиз')}}</a>
                                        <a class="sub_link" href="/work_plan/{{app()->getLocale()}}">{{__('lang.План работы')}}</a>
                                        <a class="sub_link" href="/npa_base/{{app()->getLocale()}}">{{__('lang.База НПА')}}</a>
                                        <a class="sub_link" href="/npa_project/{{app()->getLocale()}}">{{__('lang.Проекты НПА')}}</a>
                                        <a class="sub_link" href="/science_activity/{{app()->getLocale()}}">{{__('lang.Научная деятельность')}}</a>
                                        <a class="sub_link" href="/staticpage/akkreditaciya-institutov/{{app()->getLocale()}}">{{__('lang.Аккредитация институтов')}}</a>
                                        <a class="sub_link" href="/statistic/{{app()->getLocale()}}">{{__('lang.Аналитика и статистика')}}</a>
                                        <a class="sub_link" href="/goszakup/{{app()->getLocale()}}">{{__('lang.Государственные закупки')}}</a>
                                        <a class="sub_link" href="/vacancy/{{app()->getLocale()}}">{{__('lang.Вакансии')}}</a>
                                    </div>
                                </div>
                            </li>
                            <li class="sub_menu_link">
                                <a class="menu_link" href="javascript:;">{{__('lang.Гражданам')}}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_list">
                                        <a class="sub_link" href="/staticpage/grafik-priem-grazhdan-fizicheskih-i-yuridicheskih-lic-rukovodstvom-centra-sudebnyh-ekspertiz-ministerstva-yusticii-rk/{{app()->getLocale()}}">{{__('lang.График приема граждан')}}</a>
                                        <a class="sub_link" href="/staticpage/prejskurant-cen-platnyh-uslug-centra-sudebnyh-ekspertiz/{{app()->getLocale()}}">{{__('lang.Платные услуги')}}</a>
                                        <a class="sub_link" href="gos_services/{{app()->getLocale()}}">{{__('lang.Государственные услуги')}}</a>
                                        <a class="sub_link"  href="/faqs/{{app()->getLocale()}}">{{__('lang.Часто задаваемые вопросы')}}</a>
                                    </div>
                                </div>
                            </li>
                            <li><a class="menu_link" href="/staticpage/proekt-vsemirnogo-banka/{{app()->getLocale()}}">{{__('lang.Проект Всемирного Банка')}}</a></li>
                            <li><a class="menu_link" href="/staticpage/mezhdunarodnoe-sotrudnichestvo/{{app()->getLocale()}}">{{__('lang.Международное сотрудничество')}}</a></li>
                            <li><a class="menu_link" href="/news-all/{{app()->getLocale()}}">{{__('lang.Новости')}}</a></li>
                            <li><a class="menu_link" href="/staticpage/kontakty/{{app()->getLocale()}}">{{__('lang.Контакты')}}</a></li>
                        </ul>
                </div>
                <div class="foot_bottom">
                    <div class="copyright">© 2020 {{__('lang.Центр судебных экспертиз')}}</div>
                    <div class="created">{{__('lang.Разработка сайта')}}<a href="https://astanacreative.kz/" target="_blank"> AstanaCreative</a></div>
                </div>
            </div>
        </footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/js/jquery-3.0.0.min.js"></script>
        <script src="/js/slick.min.js"></script>
        <script src="/js/script.js?v=1.14"></script>
        <script src="/js/jquery.fancybox.min.js"></script>
        <!--[if lt IE 9]>
        <script src="/libs/html5shiv/es5-shim.min.js"></script>
        <script src="/libs/html5shiv/html5shiv.min.js"></script>
        <script src="/libs/html5shiv/html5shiv-printshiv.min.js"></script>
        <script src="/libs/respond/respond.min.js"></script>
        <![endif]-->
    </body>
</html>
