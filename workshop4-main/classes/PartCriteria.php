<?php
class PartCriteria extends AbstractCriteria {

private ?string $name = null;
private ?string $description = null;
private ?int $vendorId = null;
public function __construct($table, $orderField){
    parent:: __construct($table, $orderField);
}
public function getName(): ?string {
    return $this->name;
}
public function setName($name): void{
    $this->name = $name;
}
public function getDescription(): ?string{
    return $this->description;
}
public function setDescription($description): void{
    $this->description = $description;
}
public function getVendorId(): ?int{
    return $this->vendorId;
}
public function setVendorId(?int $vendorId): void{
    $this->vendorId = $vendorId;
}
public function setFilterFields(): void{
    if (!empty($this->name)) {
        $this->filterFields[] = new FilterField('name', "%", $this->name . "%", 'LIKE');
    }
    if (!empty($this->description)) {
        $this->filterFields[] = new FilterField('description', "%" . $this->description . "%", 'LIKE');
    }
    if (!empty($this->vendorId)) {
        $this->filterFields[] = new FilterField('vendor_id', $this->vendorId, '%');
    }
}
}
?>