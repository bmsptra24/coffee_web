<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->post('contact', 'Home::contact');
$routes->post('reviews/submit', 'Admin\Reviews::submit');

$routes->get('admin/auth', 'Admin\Auth::login', ['as' => 'admin_login']);
$routes->post('admin/auth/attemptLogin', 'Admin\Auth::attemptLogin');
$routes->get('admin/auth/logout', 'Admin\Auth::logout', ['as' => 'admin_logout']);

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index', ['as' => 'admin_dashboard']);

    $routes->get('menus', 'Admin\Menus::index', ['as' => 'admin_menus']);
    $routes->get('menus/create', 'Admin\Menus::create', ['as' => 'admin_menus_create']);
    $routes->post('menus/store', 'Admin\Menus::store');
    $routes->get('menus/edit/(:num)', 'Admin\Menus::edit/$1', ['as' => 'admin_menus_edit']);
    $routes->post('menus/update/(:num)', 'Admin\Menus::update/$1');
    $routes->get('menus/delete/(:num)', 'Admin\Menus::delete/$1', ['as' => 'admin_menus_delete']);

    $routes->get('promos', 'Admin\Promos::index', ['as' => 'admin_promos']);
    $routes->get('promos/create', 'Admin\Promos::create', ['as' => 'admin_promos_create']);
    $routes->post('promos/store', 'Admin\Promos::store');
    $routes->get('promos/edit/(:num)', 'Admin\Promos::edit/$1', ['as' => 'admin_promos_edit']);
    $routes->post('promos/update/(:num)', 'Admin\Promos::update/$1');
    $routes->get('promos/delete/(:num)', 'Admin\Promos::delete/$1', ['as' => 'admin_promos_delete']);

    $routes->get('settings', 'Admin\Settings::index', ['as' => 'admin_settings']);
    $routes->post('settings/update', 'Admin\Settings::update');

    $routes->get('contacts', 'Admin\Contacts::index', ['as' => 'admin_contacts']);
    $routes->get('contacts/delete/(:num)', 'Admin\Contacts::delete/$1', ['as' => 'admin_contacts_delete']);

    $routes->get('reviews', 'Admin\Reviews::index', ['as' => 'admin_reviews']);
    $routes->get('reviews/toggle/(:num)', 'Admin\Reviews::toggleStatus/$1', ['as' => 'admin_reviews_toggle']);
    $routes->get('reviews/delete/(:num)', 'Admin\Reviews::delete/$1', ['as' => 'admin_reviews_delete']);
});
