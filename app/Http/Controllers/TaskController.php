<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Http\Requests\Tasks\UpdateTaskRequest;
use App\Models\Task;
use App\Services\Tasks\CreateTaskCommand;
use App\Services\Tasks\GetTasksListCommand;
use App\Services\Tasks\UpdateTaskCommand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class TaskController extends Controller
{
    /**
     * Получение списка задач
     * @param Request $request
     * @param GetTasksListCommand $command
     * @return JsonResponse
     */
    public function index(Request $request, GetTasksListCommand $command): JsonResponse
    {
        return response()->json(
            $command->getTasksList($request->get('user_id'))
        );
    }

    /**
     * Добавление задачи
     * @param CreateTaskRequest $request
     * @param CreateTaskCommand $command
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(CreateTaskRequest $request, CreateTaskCommand $command): JsonResponse
    {
        return response()->json(
            $command->createTask($request->getDto())
        );
    }

    /**
     * Получение задачи
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json(
            Task::query()->findOrFail($id)
        );
    }

    /**
     * Обновление задачи
     * @param UpdateTaskRequest $request
     * @param UpdateTaskCommand $command
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(UpdateTaskRequest $request, UpdateTaskCommand $command, $id): JsonResponse
    {
        /** @var Task $task */
        $task = Task::query()->findOrFail($id);

        return response()->json(
            $command->updateTask($request->getDto(), $task)
        );
    }

    /**
     * Удаление задачи
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response()->json(Task::destroy($id));
    }

    /**
     * История изменений задачи
     * @param $id
     * @return JsonResponse
     */
    public function history($id): JsonResponse
    {
        /** @var Task $task */
        $task = Task::query()->findOrFail($id);

        return response()->json($task->histories);
    }
}
