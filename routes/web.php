<?php

//项目管理系统
Route::group(
    [
        'namespace' => 'Progress',
        'prefix' => 'pro',
        'middleware' => ['islogined'],
    ],
    function ($router) {
        $router->get('/', 'ProjectController@index');
        $router->get('/profile', 'ProfileController@profile');
        $router->get('/projects', 'ProjectController@index');
        $router->get('/tasks', 'TaskController@tasks');
        $router->get('/project/detail/{opid}/{taskprogress?}', 'ProjectController@projectDetail');
        $router->get('/tasks/detail/{opid}', 'TaskController@tasksDetail');
        $router->get('/show/project/{opid?}', 'ProjectController@show');
        $router->get('/show/task/{opid?}/{projectid?}', 'TaskController@show');
        $router->post('/store/project', 'ProjectController@store');
        $router->post('/store/task', 'TaskController@store');
        $router->post('/destroy/project/{opid}', 'ProjectController@destroy');
    }
);

//登录系统路由集合
Auth::routes();
