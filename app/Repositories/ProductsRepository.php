<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function index()
    {
        return Product::all();
    }
}
