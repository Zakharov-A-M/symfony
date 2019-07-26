<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/route/auto' => [[['_route' => 'app_auto_getlistnewrouting', '_controller' => 'App\\Controller\\AutoController::getListNewRouting', '_locale' => 'en'], null, null, null, false, false, null]],
        '/nl/route/auto' => [[['_route' => 'app_auto_getlistnewrouting', '_controller' => 'App\\Controller\\AutoController::getListNewRouting', '_locale' => 'nl'], null, null, null, false, false, null]],
        '/cars' => [[['_route' => 'cars_list', '_controller' => 'App\\Controller\\AutoController::list', '_locale' => 'en'], null, null, null, false, false, null]],
        '/nl/cars' => [[['_route' => 'cars_list', '_controller' => 'App\\Controller\\AutoController::list', '_locale' => 'nl'], null, null, null, false, false, null]],
        '/auto' => [[['_route' => 'app_auto_get_list_car', '_controller' => 'App\\Controller\\AutoController::getListCar'], null, null, null, false, false, null]],
        '/over-car' => [[['_route' => 'about_car', '_controller' => 'App\\Controller\\AutoController::about', '_locale' => 'nl'], null, null, null, false, false, null]],
        '/about-car' => [[['_route' => 'about_car', '_controller' => 'App\\Controller\\AutoController::about', '_locale' => 'en'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/cars(?'
                    .'|/([^/]++)(*:186)'
                    .'|(?:/(\\d+))?(*:205)'
                .')'
                .'|/nl/cars(?'
                    .'|/([^/]++)(*:234)'
                    .'|(?:/(\\d+))?(*:253)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        186 => [[['_route' => 'cars_show', '_controller' => 'App\\Controller\\AutoController::show', '_locale' => 'en'], ['slug'], null, null, false, true, null]],
        205 => [[['_route' => 'cars_about', 'id' => '220', '_controller' => 'App\\Controller\\AutoController::aboutCar', '_locale' => 'en'], ['id'], null, null, false, true, null]],
        234 => [[['_route' => 'cars_show', '_controller' => 'App\\Controller\\AutoController::show', '_locale' => 'nl'], ['slug'], null, null, false, true, null]],
        253 => [
            [['_route' => 'cars_about', 'id' => '220', '_controller' => 'App\\Controller\\AutoController::aboutCar', '_locale' => 'nl'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
