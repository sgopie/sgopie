<?php

interface Criteria{

    public function buildQuery(): string;

    public function setFilterFields(): void;

    public function setFromJoins($fromJoins): void;

    public function getFromJoins(): ?string;

    public function getFilterFields(): array;

    public function getTable(): string;

    public function setOrderField($orderField): void;

    public function getOrdering(): string;

    public function setOrdering($ordering): void;
}