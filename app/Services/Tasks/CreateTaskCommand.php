<?php

namespace App\Services\Tasks;

use App\Models\Task;
use App\Services\Dto\Tasks\CreateTaskDto;
use Throwable;

class CreateTaskCommand
{
    /**
     * Добавление задачи
     * @param CreateTaskDto $dto
     * @return Task
     * @throws Throwable
     */
    public function createTask(CreateTaskDto $dto): Task
    {
        $newTask = new Task;
        $newTask->name = $dto->getName();
        $newTask->deadline_date = $dto->getDeadlineDate();
        $newTask->description = $dto->getDescription();
        $newTask->user_id = $dto->getUserId();
        $newTask->status_id = $dto->getStatusId();
        $newTask->saveOrFail();

        return $newTask;
    }
}
