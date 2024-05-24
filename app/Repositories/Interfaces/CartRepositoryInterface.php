<?php

namespace App\Repositories\Interfaces;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;


interface CartRepositoryInterface
{
    public function findByUser(User $user): Cart;
    public function addItem(Product $product, $qty): CartItem;
    public function removeItem($id): bool;
    public function updateQty($items = []): void;
}