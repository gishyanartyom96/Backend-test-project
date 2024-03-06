<?php

namespace App\Services\Task\Actions;

use App\Http\Resources\Task\TaskResources;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Services\Task\Dto\TaskIndexDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskIndexAction
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
    }

    public function run(TaskIndexDto $dto): AnonymousResourceCollection
    {
        $tasks = $this->taskRepository->index($dto);

        return TaskResources::collection($tasks);
    }
}
