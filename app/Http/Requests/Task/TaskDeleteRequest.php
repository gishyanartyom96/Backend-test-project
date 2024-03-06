<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskDeleteRequest extends FormRequest
{
    private const ID = 'id';

    public function authorize(): bool
    {
        return true;
    }

    public function getId(): int
    {
        return $this->route(self::ID);
    }
}
