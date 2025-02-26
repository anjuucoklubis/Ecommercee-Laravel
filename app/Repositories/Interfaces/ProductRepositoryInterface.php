<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function findAll($options = []);
    public function findBySKU($sku);
    public function findByID($id);
}