<?php

class ShoppingCartProduct
{
    private Part $part;
    private int $quantity;

    public function __construct($part, $quantity)
    {
        $this->part = $part;
        $this->quantity = $quantity;
    }

    /**
     * @return Part
     */
    public function getPart(): Part
    {
        return $this->part;
    }

    /**
     * @param Part $part
     */
    public function setPart(Part $part): void
    {
        $this->part = $part;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): float
    {
        return (float)$this->getQuantity() * $this->part->price;
    }
}