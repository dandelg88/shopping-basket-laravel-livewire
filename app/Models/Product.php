<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $excerpt
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $formatted_price
 */
class Product extends Model
{
    use HasFactory;

    /**
     * Get price as decimal.
     *
     * @return string
     */
    public function getFormattedPriceAttribute(): string
    {
        return int_to_decimal($this->price);
    }
}
