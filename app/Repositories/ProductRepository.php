<?php

namespace App\Repositories;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    public function findAll($options = [])
    {
        $perPage = $options['per_page'] ?? null;
        $categorySlug = $options['filter']['category'] ?? null;
        $tagSlug = $options['filter']['tag'] ?? null;
        $priceFilter = $options['filter']['price'] ?? null;
        $sort = $options['sort'] ?? null;

        $products = Product::with(['categories', 'tags']);

        if ($categorySlug) {
            $category = CategoryProduct::where('slug', $categorySlug)->firstOrFail();

            $childCategoryIDs = CategoryProduct::childIDs($category->id);

            $categoryIDs = array_merge([$category->id], $childCategoryIDs);

            $products = $products->whereHas('categories', function ($query) use ($categoryIDs) {
                $query->whereIn('shop_categories.id', $categoryIDs);
            });
        }

        // if ($tagSlug) {
        //     $tag = Tag::where('slug', $tagSlug)->firstOrFail();

        //     $products = $products->whereHas('tags', function ($query) use ($tag) {
        //         $query->where('shop_tags.id', $tag->id);
        //     });
        // }

        if ($priceFilter) {
            $products = $products->where('price', '>=', $priceFilter['min'])
                ->where('price', '<=', $priceFilter['max']);
        }

        if ($sort) {
            $products = $products->orderBy($sort['sort'], $sort['order']);
        }

        if ($perPage) {
            return $products->paginate($perPage);
        }

        return $products->get();
    }

    public function findBySKU($sku)
    {
        return Product::where('sku', $sku)->firstOrFail();
    }

    public function findByID($id)
    {
        return Product::where('id', $id)->firstOrFail();
    }
}