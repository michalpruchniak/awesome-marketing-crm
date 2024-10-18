<?php
namespace Modules\Activities\DTO;

use App\Enums\OrderByType;

class GetAllActivitiesArgsDTO {
    private ?OrderByType $orderBy;
    private ?int $limit;
    private ?int $paginate;
    private ?int $customerId;
    private ?int $userId;

    public function __construct(
        ?int $customerId = null,
        ?int $userId = null,
        ?OrderByType $orderBy = OrderByType::ASC,
        ?int $limit = null,
        ?int $paginate = null)
    {
        $this->orderBy = $orderBy;
        $this->limit = $limit;
        $this->paginate = $paginate;
        $this->customerId = $customerId;
        $this->userId = $userId;
    }

    public function getOrderBy(): ?string
    {
        return $this->orderBy->value;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getPaginate(): ?int
    {
        return $this->paginate;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }
}
