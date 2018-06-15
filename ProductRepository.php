<?php

namespace App\Repositories;

interface ProductRepository
{
    /**
     * @param int $id
     *
     * @return array
     */
    public function findById(int $id): array;
}