<?php

namespace App\Services\Task\Dto;

use App\Http\Requests\Task\TaskBaseRequest;

class TaskBaseDto
{
    private string $name;
    private string $status;
    private string $description;

    public function __construct(TaskBaseRequest $request)
    {
        $this->name = $request->getName();
        $this->status = $request->getStatus();
        $this->description = $request->getDescription();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
