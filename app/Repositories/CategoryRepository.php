<?php

namespace App\Repositories;

use App\Models\CategoryProduct;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    
    public function findAll($options = [])
    {
        return CategoryProduct::orderBy('name', 'asc')->get();
    }

    public function findBySlug($slug)
    {
        return CategoryProduct::where('slug', $slug)->firstOrFail();
    }
}