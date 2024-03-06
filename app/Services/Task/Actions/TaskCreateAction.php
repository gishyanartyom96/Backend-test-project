<?php

namespace App\Services\Task\Actions;

use App\Http\Resources\Task\TaskResources;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Services\Task\Dto\TaskCreateDto;

class TaskCreateAction
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
    }

    public function run(TaskCreateDto $dto): TaskResources
    {
        $task = $this->taskRepository->create($dto);

        return new TaskResources($task);
    }
}
