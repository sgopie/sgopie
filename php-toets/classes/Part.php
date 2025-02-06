<?php
class Part
{
    public $id;
    public $name;
    public $description;
    public $image;
    public $price;
    public $vendorId;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->price, 'float');
    }
}