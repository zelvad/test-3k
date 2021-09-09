<?php

namespace App\Services\Tasks;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class GetTasksListCommand
{
    /**
     * Получение списка тасок
     * @param int|null $userId
     * @return LengthAwarePaginator
     */
    public function getTasksList(int $userId = null): LengthAwarePaginator
    {
        return Task::query()
            ->when($userId, function (Builder $builder) use ($userId) {
                $builder->where('user_id', $userId);
            })->paginate();
    }
}
