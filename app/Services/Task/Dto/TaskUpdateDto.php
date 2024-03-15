<?php

namespace App\Services\Task\Dto;

use App\Http\Requests\Task\TaskUpdateRequest;

class TaskUpdateDto extends TaskBaseDto
{
    private int $id;
    public function __construct(TaskUpdateRequest $request)
    {
        $this->id = $request->getId();

        parent::__construct($request);
    }

    public function getId(): int
    {
        return $this->id;
    }
}
