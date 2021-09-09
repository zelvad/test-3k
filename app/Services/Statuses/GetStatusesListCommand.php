<?php

namespace App\Services\Statuses;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class GetStatusesListCommand
{
    /**
     * Получение списка статусов
     * @return Status[]|Collection
     */
    public function getStatusesList()
    {
        return Status::all();
    }
}
