<?php

namespace App\Services\Tasks;

use App\Models\Task;
use App\Services\Dto\Tasks\UpdateTaskDto;
use Throwable;

class UpdateTaskCommand
{
    /**
     * Обновление задачи
     * @param UpdateTaskDto $dto
     * @param Task $task
     * @return Task
     * @throws Throwable
     */
    public function updateTask(UpdateTaskDto $dto, Task $task): Task
    {
        $task->name = $dto->getName();
        $task->deadline_date = $dto->getDeadlineDate();
        $task->description = $dto->getDescription();
        $task->user_id = $dto->getUserId();
        $task->status_id = $dto->getStatusId();
        $task->updateOrFail();

        return $task;
    }
}
