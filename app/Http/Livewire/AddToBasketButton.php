<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class AddToBasketButton extends Component
{
    public $product_id;
    public $qty = 1;
    public $current_qty = 0;

    /**
     * The Mount method.
     *
     * @param int $id
     * @return void
     */
    public function mount(int $id): void
    {
        $this->product_id = $id;
    }

    /**
     * The Hydrate method.
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->current_qty = basket()->getCurrentQty($this->product_id);
    }

    /**
     * Add item to the basket.
     *
     * @return void
     */
    public function add(): void
    {
        $qty = $this->current_qty + (int) $this->qty;

        if ($qty < 1) return;

        basket()->add($this->product_id, $qty);
        $this->qty = 1;
        $this->emit('basket:updated');
    }

    /**
     * The Render method
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.add-to-basket-button');
    }
}
