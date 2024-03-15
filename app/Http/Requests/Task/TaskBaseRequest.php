<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskBaseRequest extends FormRequest
{
    private const NAME = 'name';
    private const STATUS = 'status';
    private const DESCRIPTION = 'description';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::NAME => [
                'string',
                'required',
            ],
            self::STATUS => [
                'string',
                'required',
            ],
            self::DESCRIPTION => [
                'string',
                'nullable',
            ],
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getStatus(): string
    {
        return $this->get(self::STATUS);
    }

    public function getDescription(): ?string
    {
        return $this->get(self::DESCRIPTION);
    }
}
