<?php

namespace App\Services\Task\Dto;

use App\Http\Requests\Task\TaskIndexRequest;

class TaskIndexDto
{
    private ?array $status;
    private ?string $startDate;
    private ?string $endDate;
    public function __construct(TaskIndexRequest $request)
    {
        $this->status = $request->getStatus();
        $this->startDate = $request->getStartDate();
        $this->endDate = $request->getEndDate();
    }

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }
}
