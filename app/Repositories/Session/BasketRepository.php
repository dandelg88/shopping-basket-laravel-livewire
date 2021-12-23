<?php

namespace App\Repositories\Session;

use App\Repositories\Contracts\BasketRepositoryContract;
use Illuminate\Contracts\Session\Session;

class BasketRepository implements BasketRepositoryContract
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * BasketRepository constructor.
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function add(int $id, int $qty): void
    {
        $this->session->put($this->identity($id), $qty);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentQty(int $id): int
    {
        return $this->session->get($this->identity($id), 0);
    }

    /**
     * Get the item identity.
     *
     * @param int $id
     * @return string
     */
    private function identity(int $id): string
    {
        return 'basket.' . $id;
    }
}
