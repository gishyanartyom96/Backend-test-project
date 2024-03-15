<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskIndexRequest extends FormRequest
{
    private const STATUS = 'taskStatus';
    private const START_DATE = 'startDate';
    private const END_DATE = 'endDate';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::STATUS => [
                'array',
                'nullable',
            ],
            self::START_DATE => [
                'string',
                'nullable',
            ],
            self::END_DATE => [
                'string',
                'nullable',
            ],
        ];
    }

    public function getStatus(): ?array
    {
        return $this->get(self::STATUS);
    }

    public function getStartDate(): ?string
    {
        return $this->get(self::START_DATE);
    }

    public function getEndDate(): ?string
    {
        return $this->get(self::END_DATE);
    }
}
