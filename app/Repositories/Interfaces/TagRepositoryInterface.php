<?php

namespace App\Repositories\Interfaces;

interface TagRepositoryInterface
{
    public function findAll($options = []);
    public function findBySlug($slug);
}