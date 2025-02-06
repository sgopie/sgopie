<?php

abstract class AbstractCriteria implements Criteria
{

    private string $table;
    private string $orderField;

    private ?string $fromJoins = null;

    private string $ordering = 'ASC';

    protected array $filterFields = array();

    public function __construct($table, $orderField)
    {
        $this->table = $table;
        $this->orderField = $orderField;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function setTable($table): void
    {
        $this->table = $table;
    }

    public function getOrderField(): string
    {
        return $this->orderField;
    }

    public function setOrderField($orderField): void
    {
        $this->orderField = $orderField;
    }

    public function setFromJoins($fromJoins): void
    {
        $this->fromJoins = $fromJoins;
    }

    public function getFromJoins(): ?string
    {
        return $this->fromJoins;
    }

    public function getOrdering(): string
    {
        return $this->ordering;
    }

    public function setOrdering($ordering): void
    {
        $this->ordering = $ordering;
    }

    public function getFilterFields(): array
    {
        return $this->filterFields;
    }

    public function buildQuery(): string
    {
        $this->setFilterFields();
        if(!isset($this->fromJoins)) {
            $query = "SELECT * FROM " . $this->table . " WHERE 1=1 ";
        } else {
            $query = "SELECT * FROM " . $this->fromJoins . " WHERE 1=1 ";
        }
        foreach ($this->filterFields as $filterField) {
            $query .= "AND " . $filterField->getColumnName() . " " . $filterField->getOperator() . " :" . $filterField->getColumnName() . " ";
        }
        $query .= " ORDER BY " . $this->orderField . " " . $this->ordering;
        return $query;
    }
}