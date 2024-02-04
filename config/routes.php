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

    'admin/badges' => 'Controllers\Admin\BadgeController@index',
    'admin/badges/create' => 'Controllers\Admin\BadgeController@create',
    'admin/badges/store' => 'Controllers\Admin\BadgeController@store',
    'admin/badges/{id}' => 'Controllers\Admin\BadgeController@show',
    'admin/badges/edit/{id}' => 'Controllers\Admin\BadgeController@edit',
    'admin/badges/update' => 'Controllers\Admin\BadgeController@update',
    'admin/badges/destroy/{id}' => 'Controllers\Admin\BadgeController@destroy',

    'admin/products' => 'Controllers\Admin\ProductController@index',
    'admin/products/create' => 'Controllers\Admin\ProductController@create',
    'admin/products/store' => 'Controllers\Admin\ProductController@store',
    'admin/products/edit/{id}' => 'Controllers\Admin\ProductController@edit',
    'admin/products/update' => 'Controllers\Admin\ProductController@update',
    'admin/products/destroy/{id}' => 'Controllers\Admin\ProductController@destroy',

    'products' => 'Controllers\HomeController@getProducts',

    'admin/roles' => 'Controllers\Admin\RoleController@index',
    'admin/roles/create' => 'Controllers\Admin\RoleController@create',
    'admin/roles/store' => 'Controllers\Admin\RoleController@store',
    'admin/roles/edit/{id}' => 'Controllers\Admin\RoleController@edit',
    'admin/roles/update' => 'Controllers\Admin\RoleController@update',
    'admin/roles/destroy/{id}' => 'Controllers\Admin\RoleController@destroy',

    'admin/users' => 'Controllers\Admin\UserController@index',
    'admin/users/create' => 'Controllers\Admin\UserController@create',
    'admin/users/store' => 'Controllers\Admin\UserController@store',
    'admin/users/edit/{id}' => 'Controllers\Admin\UserController@edit',
    'admin/users/update' => 'Controllers\Admin\UserController@update',
    'admin/users/destroy/{id}' => 'Controllers\Admin\UserController@destroy',

    "register" => "Controllers\RegisterController@index",
    "signup" => "Controllers\RegisterController@signup",
    "login" => "Controllers\LoginController@index",
    "signin" => "Controllers\LoginController@signin",
    "logout" => "Controllers\LoginController@logout",
    "profile" => "Controllers\ProfileController@index",

    "cart" => "Controllers\CartController@index",

    "api/auth" => "Controllers\CartController@auth",
    "api/checkout" => "Controllers\CartController@checkout",

];