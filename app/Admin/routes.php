<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->get('dict', 'DictController@index');//字典管理列表
    $router->post('dict', 'DictController@store');
    $router->get('dict/create', 'DictController@create');//字典管理新增页
    $router->get('dict/{id}/edit', 'DictController@edit');//字典管理编辑页
    $router->put('dict/{id}', 'DictController@update');//字典管理更新
    $router->get('dict/{parent_id}/list', 'DictController@list');//字典管理数据
    $router->delete('dict/{id}', 'DictController@destroy');//删除字典
});
