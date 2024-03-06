<?php

namespace App\Services\Task\Actions;

use App\Http\Resources\Task\TaskResources;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Services\Task\Dto\TaskUpdateDto;

class TaskUpdateAction
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
    }

    public function run(TaskUpdateDto $dto): TaskResources
    {
        $task = $this->taskRepository->update($dto);

        return new TaskResources($task);
    }
}
