<?php

namespace App\Http\Requests\Task;

class TaskUpdateRequest extends TaskBaseRequest
{
    private const ID = 'id';

    public function getId(): int
    {
        return $this->route(self::ID);
    }
}
