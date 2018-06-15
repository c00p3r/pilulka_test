<?php

namespace App\Drivers;

interface MySQLDriver
{
    /**
     * @param int $id
     *
     * @return array
     */
    public function findProduct(int $id): array;
}