<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskIndexRequest;
use App\Services\Task\Actions\TaskIndexAction;
use App\Services\Task\Dto\TaskIndexDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskIndexController extends Controller
{
    public function __invoke(TaskIndexRequest $request, TaskIndexAction $action): AnonymousResourceCollection
    {
        $dto = new TaskIndexDto($request);

        return $action->run($dto);
    }
}
