<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Services\Task\Dto\TaskCreateDto;
use App\Services\Task\Dto\TaskIndexDto;
use App\Services\Task\Dto\TaskUpdateDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function create(TaskCreateDto $dto): Task;
    public function update(TaskUpdateDto $dto): Task;
    public function index(TaskIndexDto $dto): Collection;
    public function delete(int $id): void;
    public function getById(int $id): Builder|Model;
}
