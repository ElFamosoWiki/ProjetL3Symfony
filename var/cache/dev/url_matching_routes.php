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
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/categorie' => [[['_route' => 'app_categorie_index', '_controller' => 'App\\Controller\\CategorieController::index'], null, ['GET' => 0], null, true, false, null]],
        '/categorie/new' => [[['_route' => 'app_categorie_new', '_controller' => 'App\\Controller\\CategorieController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/create/event' => [[['_route' => 'app_create_event', '_controller' => 'App\\Controller\\CreateEventController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/demande/organisateur' => [[['_route' => 'app_demande_organisateur_index', '_controller' => 'App\\Controller\\DemandeOrganisateurController::index'], null, ['GET' => 0], null, true, false, null]],
        '/demande/organisateur/new' => [[['_route' => 'app_demande_organisateur_new', '_controller' => 'App\\Controller\\DemandeOrganisateurController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/event' => [[['_route' => 'app_event_index', '_controller' => 'App\\Controller\\EventController::index'], null, ['GET' => 0], null, true, false, null]],
        '/event/new' => [[['_route' => 'app_event_new', '_controller' => 'App\\Controller\\EventController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/image/user' => [[['_route' => 'app_image_user_index', '_controller' => 'App\\Controller\\ImageUserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/image/user/new' => [[['_route' => 'app_image_user_new', '_controller' => 'App\\Controller\\ImageUserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/index' => [[['_route' => 'app_index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/list/event' => [[['_route' => 'app_list_event', '_controller' => 'App\\Controller\\ListEventController::index'], null, ['GET' => 0], null, false, false, null]],
        '/map' => [[['_route' => 'app_map_test', '_controller' => 'App\\Controller\\MapController::index'], null, ['GET' => 0], null, true, false, null]],
        '/orga/application' => [[['_route' => 'app_organisateur_application', '_controller' => 'App\\Controller\\OrganisateurApplicationController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/sous/categorie' => [[['_route' => 'app_sous_categorie_index', '_controller' => 'App\\Controller\\SousCategorieController::index'], null, ['GET' => 0], null, true, false, null]],
        '/sous/categorie/new' => [[['_route' => 'app_sous_categorie_new', '_controller' => 'App\\Controller\\SousCategorieController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/verif' => [[['_route' => 'app_verif_index', '_controller' => 'App\\Controller\\VerificationController::index'], null, ['GET' => 0], null, true, false, null]],
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
                .'|/categorie/([^/]++)(?'
                    .'|(*:191)'
                    .'|/edit(*:204)'
                    .'|(*:212)'
                .')'
                .'|/d(?'
                    .'|ashboard/orga/([^/]++)(*:248)'
                    .'|emande/organisateur/(?'
                        .'|([^/]++)(?'
                            .'|(*:290)'
                            .'|/edit(*:303)'
                        .')'
                        .'|delete/([^/]++)(*:327)'
                    .')'
                .')'
                .'|/s(?'
                    .'|how/inscrit/([^/]++)(*:362)'
                    .'|ous/categorie/([^/]++)(?'
                        .'|(*:395)'
                        .'|/edit(*:408)'
                        .'|(*:416)'
                    .')'
                .')'
                .'|/e(?'
                    .'|dit/([^/]++)(*:443)'
                    .'|ven(?'
                        .'|t/([^/]++)(?'
                            .'|(*:470)'
                            .'|/edit(*:483)'
                            .'|(*:491)'
                        .')'
                        .'|ement/([^/]++)(*:514)'
                    .')'
                .')'
                .'|/image/user/([^/]++)(?'
                    .'|(*:547)'
                    .'|/edit(*:560)'
                    .'|(*:568)'
                .')'
                .'|/registration/([^/]++)(*:599)'
                .'|/unreg/([^/]++)(*:622)'
                .'|/profil/([^/]++)(?'
                    .'|(*:649)'
                    .'|/modifie(*:665)'
                .')'
                .'|/verif/([^/]++)/repondre(*:698)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        191 => [[['_route' => 'app_categorie_show', '_controller' => 'App\\Controller\\CategorieController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        204 => [[['_route' => 'app_categorie_edit', '_controller' => 'App\\Controller\\CategorieController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        212 => [[['_route' => 'app_categorie_delete', '_controller' => 'App\\Controller\\CategorieController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        248 => [[['_route' => 'app_dashboard_orga', '_controller' => 'App\\Controller\\DashboardOrgaController::index'], ['id'], null, null, false, true, null]],
        290 => [[['_route' => 'app_demande_organisateur_show', '_controller' => 'App\\Controller\\DemandeOrganisateurController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        303 => [[['_route' => 'app_demande_organisateur_edit', '_controller' => 'App\\Controller\\DemandeOrganisateurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        327 => [[['_route' => 'app_demande_organisateur_delete', '_controller' => 'App\\Controller\\DemandeOrganisateurController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        362 => [[['_route' => 'app_show_inscrit', '_controller' => 'App\\Controller\\DashboardOrgaController::showReg'], ['id'], ['GET' => 0], null, false, true, null]],
        395 => [[['_route' => 'app_sous_categorie_show', '_controller' => 'App\\Controller\\SousCategorieController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        408 => [[['_route' => 'app_sous_categorie_edit', '_controller' => 'App\\Controller\\SousCategorieController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        416 => [[['_route' => 'app_sous_categorie_delete', '_controller' => 'App\\Controller\\SousCategorieController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        443 => [[['_route' => 'app_edit_event_orga', '_controller' => 'App\\Controller\\DashboardOrgaController::editEvent'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        470 => [[['_route' => 'app_event_show', '_controller' => 'App\\Controller\\EventController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        483 => [[['_route' => 'app_event_edit', '_controller' => 'App\\Controller\\EventController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        491 => [[['_route' => 'app_event_delete', '_controller' => 'App\\Controller\\EventController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        514 => [[['_route' => 'app_index_event_show', '_controller' => 'App\\Controller\\IndexController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        547 => [[['_route' => 'app_image_user_show', '_controller' => 'App\\Controller\\ImageUserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        560 => [[['_route' => 'app_image_user_edit', '_controller' => 'App\\Controller\\ImageUserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        568 => [[['_route' => 'app_image_user_delete', '_controller' => 'App\\Controller\\ImageUserController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        599 => [[['_route' => 'app_registration_event', '_controller' => 'App\\Controller\\IndexController::inscription'], ['id'], ['GET' => 0], null, true, true, null]],
        622 => [[['_route' => 'app_unreg_event', '_controller' => 'App\\Controller\\IndexController::desinscription'], ['id'], ['GET' => 0], null, true, true, null]],
        649 => [[['_route' => 'app_profil_show', '_controller' => 'App\\Controller\\ProfilController::index'], ['id'], ['GET' => 0], null, true, true, null]],
        665 => [[['_route' => 'app_profil_modifie', '_controller' => 'App\\Controller\\ProfilController::modifie'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        698 => [
            [['_route' => 'app_repondre', '_controller' => 'App\\Controller\\VerificationController::reponse'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
