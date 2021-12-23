<?php

namespace App\Repositories\Contracts;

interface BasketRepositoryContract
{
    /**
     * Get basket's items quantity.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Add item to the basket.
     *
     * @param int $id
     * @param int $qty
     * @return void
     */
    public function add(int $id, int $qty): void;

    /**
     * Get item's current quantity in the basket.
     *
     * @param int $id
     * @return int
     */
    public function getCurrentQty(int $id): int;
}
