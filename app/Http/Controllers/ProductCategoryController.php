<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Repositories\Interfaces\ProductCategoryRepositoryInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $productCategoryRepository;
    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->productCategoryRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->productCategoryRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->productCategoryRepository->store($request);
        Toastr::success('Product Category Created Successfully', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
