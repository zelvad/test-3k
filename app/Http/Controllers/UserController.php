<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\LoginUserRequest;
use App\Services\Users\CreateUserCommand;
use App\Services\Users\GetUsersListCommand;
use App\Services\Users\LoginUserCommand;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Регистрация и авторизация нового пользователя
     * @param CreateUserRequest $request
     * @param CreateUserCommand $createUserCommand
     * @param LoginUserCommand $loginUserCommand
     * @return JsonResponse
     * @throws Throwable
     */
    public function register(CreateUserRequest $request, CreateUserCommand $createUserCommand, LoginUserCommand $loginUserCommand): JsonResponse
    {
        $createUserCommand->createUser($request->getCreateDto());

        return response()->json(
            $loginUserCommand->loginUser($request->getLoginDto())
        );
    }

    /**
     * Авторизация пользователя
     * @param LoginUserRequest $request
     * @param LoginUserCommand $command
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request, LoginUserCommand $command): JsonResponse
    {
        return response()->json(
            $command->loginUser($request->getDto())
        );
    }

    /**
     * Выход из аккаунта
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        Auth::logout();
        return response()->json(['ok' => true]);
    }

    /**
     * Получение авторизированного пользователя
     * @return JsonResponse
     */
    public function getUser(): JsonResponse
    {
        return response()->json(Auth::user());
    }

    /**
     * Получение списка пользователей
     * @param GetUsersListCommand $command
     * @return JsonResponse
     */
    public function getUsersList(GetUsersListCommand $command): JsonResponse
    {
        return response()->json(
            $command->getUsersList()
        );
    }
}
