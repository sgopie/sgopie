<?php

class FilterField{

    private string $columnName;
    private string $value;
    private string $operator;

    public function __construct($columnName, $value, $operator){
        $this->columnName = $columnName;
        $this->value = $value;
        $this->operator = $operator;
    }

    public function getColumnName(): string
    {
        return $this->columnName;
    }

    public function setColumnName(string $columnName): void
    {
        $this->columnName = $columnName;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
    public function getOperator(): string
    {
        return $this->operator;
    }
    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }
}