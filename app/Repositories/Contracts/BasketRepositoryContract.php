<?php

namespace App\Repositories\Contracts;

interface BasketRepositoryContract
{
    /**
     * Get basket's content.
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
     * Remove item from the basket.
     *
     * @param int $id
     * @return void
     */
    public function remove(int $id): void;

    /**
     * Get item's current quantity in the basket.
     *
     * @param int $id
     * @return int
     */
    public function getCurrentQty(int $id): int;
}
