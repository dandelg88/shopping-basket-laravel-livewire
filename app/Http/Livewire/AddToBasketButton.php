<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class AddToBasketButton extends Component
{
    public $product_id;

    public function mount(int $id): void
    {
        $this->product_id = $id;
    }

    public function render(): View
    {
        return view('livewire.add-to-basket-button');
    }
}
