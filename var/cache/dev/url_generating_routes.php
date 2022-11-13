<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'app_admin' => [[], ['_controller' => 'App\\Controller\\Admin\\DashboardController::index'], [], [['text', '/admin']], [], [], []],
    'app_categorie_index' => [[], ['_controller' => 'App\\Controller\\CategorieController::index'], [], [['text', '/categorie/']], [], [], []],
    'app_categorie_new' => [[], ['_controller' => 'App\\Controller\\CategorieController::new'], [], [['text', '/categorie/new']], [], [], []],
    'app_categorie_show' => [['id'], ['_controller' => 'App\\Controller\\CategorieController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/categorie']], [], [], []],
    'app_categorie_edit' => [['id'], ['_controller' => 'App\\Controller\\CategorieController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/categorie']], [], [], []],
    'app_categorie_delete' => [['id'], ['_controller' => 'App\\Controller\\CategorieController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/categorie']], [], [], []],
    'app_create_event' => [[], ['_controller' => 'App\\Controller\\CreateEventController::index'], [], [['text', '/create/event']], [], [], []],
    'app_dashboard_orga' => [['id'], ['_controller' => 'App\\Controller\\DashboardOrgaController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/dashboard/orga']], [], [], []],
    'app_show_inscrit' => [['id'], ['_controller' => 'App\\Controller\\DashboardOrgaController::showReg'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/show/inscrit']], [], [], []],
    'app_edit_event_orga' => [['id'], ['_controller' => 'App\\Controller\\DashboardOrgaController::editEvent'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/edit']], [], [], []],
    'app_demande_organisateur_index' => [[], ['_controller' => 'App\\Controller\\DemandeOrganisateurController::index'], [], [['text', '/demande/organisateur/']], [], [], []],
    'app_demande_organisateur_new' => [[], ['_controller' => 'App\\Controller\\DemandeOrganisateurController::new'], [], [['text', '/demande/organisateur/new']], [], [], []],
    'app_demande_organisateur_show' => [['id'], ['_controller' => 'App\\Controller\\DemandeOrganisateurController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/demande/organisateur']], [], [], []],
    'app_demande_organisateur_edit' => [['id'], ['_controller' => 'App\\Controller\\DemandeOrganisateurController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/demande/organisateur']], [], [], []],
    'app_demande_organisateur_delete' => [['id'], ['_controller' => 'App\\Controller\\DemandeOrganisateurController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/demande/organisateur/delete']], [], [], []],
    'app_event_index' => [[], ['_controller' => 'App\\Controller\\EventController::index'], [], [['text', '/event/']], [], [], []],
    'app_event_new' => [[], ['_controller' => 'App\\Controller\\EventController::new'], [], [['text', '/event/new']], [], [], []],
    'app_event_show' => [['id'], ['_controller' => 'App\\Controller\\EventController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/event']], [], [], []],
    'app_event_edit' => [['id'], ['_controller' => 'App\\Controller\\EventController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/event']], [], [], []],
    'app_event_delete' => [['id'], ['_controller' => 'App\\Controller\\EventController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/event']], [], [], []],
    'app_image_user_index' => [[], ['_controller' => 'App\\Controller\\ImageUserController::index'], [], [['text', '/image/user/']], [], [], []],
    'app_image_user_new' => [[], ['_controller' => 'App\\Controller\\ImageUserController::new'], [], [['text', '/image/user/new']], [], [], []],
    'app_image_user_show' => [['id'], ['_controller' => 'App\\Controller\\ImageUserController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/image/user']], [], [], []],
    'app_image_user_edit' => [['id'], ['_controller' => 'App\\Controller\\ImageUserController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/image/user']], [], [], []],
    'app_image_user_delete' => [['id'], ['_controller' => 'App\\Controller\\ImageUserController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/image/user']], [], [], []],
    'app_index' => [[], ['_controller' => 'App\\Controller\\IndexController::index'], [], [['text', '/index']], [], [], []],
    'app_index_event_show' => [['id'], ['_controller' => 'App\\Controller\\IndexController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/evenement']], [], [], []],
    'app_registration_event' => [['id'], ['_controller' => 'App\\Controller\\IndexController::inscription'], [], [['text', '/'], ['variable', '/', '[^/]++', 'id', true], ['text', '/registration']], [], [], []],
    'app_unreg_event' => [['id'], ['_controller' => 'App\\Controller\\IndexController::desinscription'], [], [['text', '/'], ['variable', '/', '[^/]++', 'id', true], ['text', '/unreg']], [], [], []],
    'app_list_event' => [[], ['_controller' => 'App\\Controller\\ListEventController::index'], [], [['text', '/list/event']], [], [], []],
    'app_map_test' => [[], ['_controller' => 'App\\Controller\\MapController::index'], [], [['text', '/map/']], [], [], []],
    'app_organisateur_application' => [[], ['_controller' => 'App\\Controller\\OrganisateurApplicationController::index'], [], [['text', '/orga/application']], [], [], []],
    'app_profil_show' => [['id'], ['_controller' => 'App\\Controller\\ProfilController::index'], [], [['text', '/'], ['variable', '/', '[^/]++', 'id', true], ['text', '/profil']], [], [], []],
    'app_profil_modifie' => [['id'], ['_controller' => 'App\\Controller\\ProfilController::modifie'], [], [['text', '/modifie'], ['variable', '/', '[^/]++', 'id', true], ['text', '/profil']], [], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    'app_sous_categorie_index' => [[], ['_controller' => 'App\\Controller\\SousCategorieController::index'], [], [['text', '/sous/categorie/']], [], [], []],
    'app_sous_categorie_new' => [[], ['_controller' => 'App\\Controller\\SousCategorieController::new'], [], [['text', '/sous/categorie/new']], [], [], []],
    'app_sous_categorie_show' => [['id'], ['_controller' => 'App\\Controller\\SousCategorieController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/sous/categorie']], [], [], []],
    'app_sous_categorie_edit' => [['id'], ['_controller' => 'App\\Controller\\SousCategorieController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/sous/categorie']], [], [], []],
    'app_sous_categorie_delete' => [['id'], ['_controller' => 'App\\Controller\\SousCategorieController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/sous/categorie']], [], [], []],
    'app_verif_index' => [[], ['_controller' => 'App\\Controller\\VerificationController::index'], [], [['text', '/verif/']], [], [], []],
    'app_repondre' => [['id'], ['_controller' => 'App\\Controller\\VerificationController::reponse'], [], [['text', '/repondre'], ['variable', '/', '[^/]++', 'id', true], ['text', '/verif']], [], [], []],
];
