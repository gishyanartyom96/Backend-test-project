<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskCreateRequest;
use App\Http\Resources\Task\TaskResources;
use App\Services\Task\Actions\TaskCreateAction;
use App\Services\Task\Dto\TaskCreateDto;

class TaskCreateController extends Controller
{
    public function __invoke(TaskCreateRequest $request, TaskCreateAction $action): TaskResources
    {
        $dto = new TaskCreateDto($request);

        return $action->run($dto);
    }
}
