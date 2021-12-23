<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class BasketContent extends Component
{
    /**
     * @var bool
     */
    public $show_content = false;

    /**
     * @var array
     */
    protected $listeners = ['basket:toggle' => 'toggle'];

    /**
     * Toggle the basket content visibility.
     *
     * @return void
     */
    public function toggle(): void
    {
        $this->show_content = ! $this->show_content;
    }

    /**
     * The Render method
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.basket-content');
    }
}
