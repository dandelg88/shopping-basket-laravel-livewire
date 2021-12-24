<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class BasketContent extends Component
{
    /**
     * @var bool
     */
    public $show_content = false;

    /**
     * @var array
     */
    public $basket_items = [];

    /**
     * @var array
     */
    public $products = [];

    /**
     * @var float
     */
    public $basket_total = 0.0;

    /**
     * @var array
     */
    protected $listeners = [
        'basket:toggle' => 'toggle',
        'basket:updated' => 'hydrate',
    ];

    /**
     * The Hydrate method.
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->basket_items = basket()->all();

        $this->products = tap($this->getProducts(), function (Collection $products) {
            $this->basket_total = int_to_decimal($products->sum('total'));
        })->toArray();
    }

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
     * Decrease item's quantity.
     *
     * @param int $id
     * @return void
     */
    public function decrease(int $id): void
    {
        if(($qty = $this->basket_items[$id] - 1) < 1) {
            $this->remove($id);
        } else {
            basket()->add($id, $qty);
            $this->update();
        }
    }

    /**
     * Increase item's quantity.
     *
     * @param int $id
     * @return void
     */
    public function increase(int $id): void
    {
        basket()->add($id, $this->basket_items[$id] + 1);
        $this->update();
    }

    /**
     * Remove item from the basket.
     *
     * @param int $id
     * @return void
     */
    public function remove(int $id): void
    {
        basket()->remove($id);
        $this->update();
    }

    /**
     * Update the basket content.
     *
     * @return void
     */
    public function update(): void
    {
        $this->emit('basket:updated');
    }

    /**
     * Get the products data.
     *
     * @return Collection
     */
    private function getProducts(): Collection
    {
        if(empty($this->basket_items)) return new Collection;

        return Product::query()->whereIn('id', array_keys($this->basket_items))->get()
            ->map(function (Product $product) {
                return (object) [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'formatted_price' => $product->formatted_price,
                    'qty' => $qty = $this->basket_items[$product->id],
                    'total' => $product->price * $qty,
                ];
            });
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
