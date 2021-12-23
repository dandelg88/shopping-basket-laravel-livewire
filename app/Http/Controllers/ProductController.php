<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display list of products.
     *
     * @return View
     */
    public function index(): View
    {
        return view('product.index')->with('products', Product::all());
    }

    /**
     * Display product.
     *
     * @param  Product  $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view('product.show')->with('product', $product);
    }
}
