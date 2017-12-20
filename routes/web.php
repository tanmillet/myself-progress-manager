<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        // phpinfo();die();
//         $x=87;
//         $y=($x%7)*16;
//         $z=$x>$y?1:0;
//         echo $z;
// die();
//         $user = \Auth::loginUsingId(1);
//         $user = \Illuminate\Support\Facades\Auth::user();
        /*$res = \LucasRBAC\Permission\Models\Role::create([
            'name' => '测试管理员',
            'guard_name' => 'TestAdmin',
        ]);*/
        // $userRole = $user->roles->toArray();
        // $role = \LucasRBAC\Permission\Models\Role::findByName($userRole[0]['name'],$userRole[0]['display_name']);
        // dump($role->permissions->contains('name' , '/g/admin'));
        //
        // foreach ($role->permissions as $permission){
        //     dump($permission->name);
        // }

        // dump($role->users);
        // dump($user->name);
        // dump(app('lucasRbac'));
        // die();

        // return view('geo');
    }
);

Route::namespace('Admin')->prefix('admin')->group(
    function ($router) {
        // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
        $router->get('/', 'IndexController@index');
        $router->get('/template', 'TemplateController@index');
        $router->get('/video', 'TemplateController@video');
        $router->get('/video/detail', 'TemplateController@videoDetail');
        $router->get('/table', 'TemplateController@table');
        $router->get('/geo', 'GeoController@index');
        $router->get('/geoanalyze', 'GeoController@analyze');
        // $router->get('/table', 'IndexController@table');
        $router->get('/timeline', 'IndexController@admin2Timeline');
        $router->get('/form', 'IndexController@form');
        $router->match(['get', 'post'], '/login', 'IndexController@login');
    }
);

//项目管理系统
Route::group(
    [
        'namespace' => 'Progress',
        'prefix' => 'pro',
        'middleware' => ['islogined'],
    ],
    function ($router) {
        $router->get('/', 'ProjectController@index');
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

Route::namespace('Admin')->prefix('admin2')->group(
    function ($router) {
        // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
        $router->get('/', 'IndexController@admin2App');
        $router->get('/roles', 'RoleController@index');
        $router->get('/permissions', 'PermissionController@index');
        $router->get('/tltypes', 'TlTypeController@index');
        $router->get('/tlcontents', 'TimeLineController@index');
        $router->get('/show/role/{opid?}', 'RoleController@show');
        $router->get('/show/tltype/{opid?}', 'TlTypeController@show');
        $router->get('/show/tlcontent/{opid?}', 'TimeLineController@show');
        $router->get('/show/permission/{opid?}', 'PermissionController@show');
        $router->post('/store/role', 'RoleController@store');
        $router->post('/store/tltype', 'TlTypeController@store');
        $router->post('/store/tlcontent', 'TimeLineController@store');
        $router->post('/store/permission', 'PermissionController@store');
        $router->post('/destroy/role/{opid}', 'RoleController@destroy');
        $router->post('/destroy/tltype/{opid}', 'TlTypeController@destroy');
        $router->post('/destroy/tlcontent/{opid}', 'TimeLineController@destroy');
        $router->post('/destroy/permission/{opid}', 'PermissionController@destroy');
        $router->get('/dispatch/permission/{opid}', 'PermissionController@dispatchPermission');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
