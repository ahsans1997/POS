<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Repositories\Interfaces\ProductCategoryRepositoryInterface;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function index()
    {
        return view('products.productcategory.index',[
            'productCategory' => ProductCategory::all()
        ]);
    }

    public function create()
    {
        return view('products.productcategory.create');
    }

    public function store($request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->code = $request->code;
        $productCategory->description = $request->description;
        $productCategory->save();
    }

    public function show($productCategory)
    {
        //
    }

    public function edit($productCategory)
    {
        //
    }

    public function update($request, $productCategory)
    {
        //
    }

    public function destroy($productCategory)
    {
        //
    }
}
