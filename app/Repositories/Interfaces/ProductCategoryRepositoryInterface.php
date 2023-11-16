<?php

namespace App\Repositories\Interfaces;

interface ProductCategoryRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function show($productCategory);

    public function edit($productCategory);

    public function update($request, $productCategory);

    public function destroy($productCategory);
}
