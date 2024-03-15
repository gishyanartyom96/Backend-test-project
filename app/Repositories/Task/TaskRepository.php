<?php

namespace App\Repositories\Task;

use App\Exceptions\DeletingErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Task;
use App\Services\Task\Dto\TaskCreateDto;
use App\Services\Task\Dto\TaskIndexDto;
use App\Services\Task\Dto\TaskUpdateDto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    private const DEFAULT_START_DATE = '1970-01-01T00:00:00';

    /**
     * @throws SavingErrorException
     */
    public function create(TaskCreateDto $dto): Task
    {
        $task = $this->newTask();

        $task->setName($dto->getName())
            ->setStatus($dto->getStatus())
            ->setDescription($dto->getDescription());

        $this->save($task);

        return $task;
    }

    /**
     * @throws SavingErrorException
     */
    public function update(TaskUpdateDto $dto): Task
    {
        $task = $this->getById($dto->getId());

        $task->setName($dto->getName())
            ->setStatus($dto->getStatus())
            ->setDescription($dto->getDescription());

        $this->save($task);

        return $task;
    }

    public function index(TaskIndexDto $dto): Collection
    {
        $query = $this->query();

        $query->when(!empty($dto->getStatus()), function (Builder $query) use ($dto) {
            $query->whereIn('status', $dto->getStatus());
        });

        $query->when($dto->getStartDate() || $dto->getEndDate(), function (Builder $query) use ($dto) {
            $query->whereBetween(
                'created_at',
                [
                    $dto->getStartDate() ?? self::DEFAULT_START_DATE,
                    $dto->getEndDate() ?? Carbon::now()
                ]
            );
        });

        return $query->get();
    }

    /**
     * @throws DeletingErrorException
     */
    public function delete(int $id): void
    {
        $query = $this->query();

        $query->where('id', $id);

        if (!$query->exists() || !$query->delete()) {
            throw new DeletingErrorException();
        }
    }

    public function getById(int $id): Task|Builder
    {
        $query = $this->query();

        $query->where('id', $id);

        return $query->firstOrFail();
    }

    private function newTask(): Task
    {
        return new Task();
    }

    private function query(): Builder
    {
        return Task::query();
    }

    /**
     * @throws SavingErrorException
     */
    private function save(Task $task): void
    {
        if (!$task->save()) {
            throw new SavingErrorException();
        }
    }
}
