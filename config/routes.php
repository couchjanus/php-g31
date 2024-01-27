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
    'admin/brands/update' => 'Controllers\Admin\BrandController@update',
    // 'admin/brands/update/{id}' => 'Controllers\Admin\BrandController@update',
    'admin/brands/destroy/{id}' => 'Controllers\Admin\BrandController@destroy',

    'admin/sections' => 'Controllers\Admin\SectionController@index',
    'admin/sections/create' => 'Controllers\Admin\SectionController@create',
    'admin/sections/store' => 'Controllers\Admin\SectionController@store',
    'admin/sections/{id}' => 'Controllers\Admin\SectionController@show',
    'admin/sections/edit/{id}' => 'Controllers\Admin\SectionController@edit',
    'admin/sections/update' => 'Controllers\Admin\SectionController@update',
    'admin/sections/destroy/{id}' => 'Controllers\Admin\SectionController@destroy',

    
    'admin/categories' => 'Controllers\Admin\CategoryController@index',
    'admin/categories/create' => 'Controllers\Admin\CategoryController@create',
    'admin/categories/store' => 'Controllers\Admin\CategoryController@store',
    'admin/categories/{id}' => 'Controllers\Admin\CategoryController@show',
    'admin/categories/edit/{id}' => 'Controllers\Admin\CategoryController@edit',
    'admin/categories/update' => 'Controllers\Admin\CategoryController@update',
    'admin/categories/destroy/{id}' => 'Controllers\Admin\CategoryController@destroy',
];