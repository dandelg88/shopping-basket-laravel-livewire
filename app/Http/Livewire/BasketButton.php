<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class BasketButton extends Component
{
    /**
     * @var int
     */
    public $qty = 0;

    /**
     * @var array
     */
    protected $listeners = ['basket:updated' => 'update'];

    /**
     * Update basket quantity.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->update();
    }

    /**
     * Add item to the basket.
     *
     * @return void
     */
    public function update(): void
    {
        $this->qty = array_sum(basket()->all());
    }

    /**
     * Toggle basket content.
     *
     * @return void
     */
    public function toggle(): void
    {
        $this->emit('basket:toggle');
    }

    /**
     * The Render method
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.basket-button');
    }
}
