<?php

namespace App\Services\Dto\Tasks;

class UpdateTaskDto
{
    private string $name;
    private string $deadlineDate;
    private string $description;
    private int $userId;
    private int $statusId;

    public function __construct(string $name, string $deadlineDate, string $description, int $userId, int $statusId)
    {
        $this->name = $name;
        $this->deadlineDate = $deadlineDate;
        $this->description = $description;
        $this->userId = $userId;
        $this->statusId = $statusId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDeadlineDate(): string
    {
        return $this->deadlineDate;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }
}
