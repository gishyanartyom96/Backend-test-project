<?php

namespace App\Services\Task\Actions;

use App\Repositories\Task\TaskRepositoryInterface;

class TaskDeleteAction
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
    }

    public function run(int $id): void
    {
        $this->taskRepository->delete($id);
    }
}
