<?php

class VendorCriteria extends AbstractCriteria {

    private ?string $name = null;
    private ?string $description = null;

    public function __construct($table, $orderField){
        parent::__construct($table, $orderField);
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName($name): void{
        $this->name = $name;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription($description): void{
        $this->description = $description;
    }
    public function setFilterFields(): void
    {

        if(!empty($this->name)){
            $this->filterFields[] = new FilterField('name', "%". $this->name . "%", 'LIKE');
        }

        if(!empty($this->description)){
            $this->filterFields[] = new FilterField('description', "%". $this->description ."%", 'LIKE');
        }

    }
}