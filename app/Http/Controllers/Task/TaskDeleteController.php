<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskDeleteRequest;
use App\Services\Task\Actions\TaskDeleteAction;
use Illuminate\Http\JsonResponse;

class TaskDeleteController extends Controller
{
    public function __invoke(TaskDeleteRequest $request, TaskDeleteAction $action): JsonResponse
    {
        $action->run($request->getId());

        return $this->response();
    }
}
