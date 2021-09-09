<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    /** Пользователи */
    $api->group([
        'prefix' => 'user'
    ], function (Router $api) {
        $api->post('login', [UserController::class, 'login']);
        $api->post('register', [UserController::class, 'register']);
        $api->post('logout', [UserController::class, 'logout']);
        $api->post('me', [UserController::class, 'getUser']);
        $api->get('all', [UserController::class, 'getUsersList']);
    });
    /** Авторизированная группа*/
    $api->group([
        'middleware' => 'auth:api'
    ], function (Router $api) {
        /** Список статусов */
        $api->get('statuses/get', [StatusController::class, 'index']);
        /** Список задач */
        $api->group([
            'prefix' => 'tasks'
        ], function (Router $api) {
            $api->get('list', [TaskController::class, 'index']);
            $api->get('get/{id}', [TaskController::class, 'show']);
            $api->get('history/{id}', [TaskController::class, 'history']);
            $api->post('create', [TaskController::class, 'store']);
            $api->post('update/{id}', [TaskController::class, 'update']);
            $api->delete('delete/{id}', [TaskController::class, 'destroy']);
        });
    });
});
