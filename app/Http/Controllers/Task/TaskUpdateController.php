<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Services\Task\Actions\TaskUpdateAction;
use App\Services\Task\Dto\TaskUpdateDto;

class TaskUpdateController extends Controller
{
    public function __invoke(TaskUpdateRequest $request, TaskUpdateAction $action)
    {
        $dto = new TaskUpdateDto($request);

        return $action->run($dto);
    }
}
