<?php

return [
    '' => 'Controllers\HomeController@index',
    'contact' => 'Controllers\ContactController@index',
    'about' => 'Controllers\AboutController@index',
    'admin' => 'Controllers\Admin\DashboardController@index',

    'admin/brands' => 'Controllers\Admin\BrandController@index',
    'admin/brands/create' => 'Controllers\Admin\BrandController@create',
    'admin/brands/store' => 'Controllers\Admin\BrandController@store',
    'admin/brands/{id}' => 'Controllers\Admin\BrandController@show',
    'admin/brands/edit/{id}' => 'Controllers\Admin\BrandController@edit',
    'admin/brands/update/{id}' => 'Controllers\Admin\BrandController@update',
    'admin/brands/destroy/{id}' => 'Controllers\Admin\BrandController@destroy',
];