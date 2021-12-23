<?php

if (!function_exists('int_to_decimal')) {
    function int_to_decimal(int $number): string
    {
        return number_format(($number / 100), 2);
    }
}

if (!function_exists('basket')) {
    function basket(): \App\Repositories\Contracts\BasketRepositoryContract
    {
        return app(\App\Repositories\Contracts\BasketRepositoryContract::class);
    }
}
