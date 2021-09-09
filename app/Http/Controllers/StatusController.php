<?php

namespace App\Http\Controllers;

use App\Services\Statuses\GetStatusesListCommand;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    /**
     * Получение списка статусов
     * @param GetStatusesListCommand $command
     * @return JsonResponse
     */
    public function index(GetStatusesListCommand $command): JsonResponse
    {
        return response()->json(
            $command->getStatusesList()
        );
    }
}
