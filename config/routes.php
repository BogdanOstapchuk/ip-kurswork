<?php

return array(
    'film/([0-9]+)' => 'film/view/$1',
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index',
    'search' => 'search/index',
    'films' => 'films/index',
    'cartoons' => 'cartoons/index',
    'serials' => 'serials/index',
    'support' => 'support/index',
    'save/add/([0-9]+)' => 'save/add/$1',

    'genre/([0-9]+)/page-([0-9]+)' => 'catalog/genre/$1/$2',
    'genre/([0-9]+)' => 'catalog/genre/$1',

    'user/logout' => 'user/logout',
    'user/register' => 'user/register',
    'user/login' => 'user/login',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet/save' => 'cabinet/save',
    'cabinet' => 'cabinet/index',

    'admin/genre/create' => 'adminGenre/create',
    'admin/genre/update/([0-9]+)' => 'adminGenre/update/$1',
    'admin/genre/delete/([0-9]+)' => 'adminGenre/delete/$1',
    'admin/genre/page-([0-9]+)' => 'adminGenre/index/$1',
    'admin/genre' => 'adminGenre/index',

    'admin/user/create' => 'adminUser/create',
    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
    'admin/user/page-([0-9]+)' => 'adminUser/index/$1',
    'admin/user' => 'adminUser/index',

    'admin/film/create' => 'adminFilm/create',
    'admin/film/update/([0-9]+)' => 'adminFilm/update/$1',
    'admin/film/delete/([0-9]+)' => 'adminFilm/delete/$1',
    'admin/film/page-([0-9]+)' => 'adminFilm/index/$1',
    'admin/film' => 'adminFilm/index',
    'admin' => 'admin/index',

    '404' => 'site/error',

    '' => 'site/index',
);
