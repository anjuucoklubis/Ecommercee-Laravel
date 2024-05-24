<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function findAll($options = []);
    public function findBySlug($slug);
}