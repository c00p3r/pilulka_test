<?php

namespace App\Drivers;

interface ElasticSearchDriver
{
    /**
     * @param int $id
     *
     * @return array
     */
    public function findById(int $id): array;
}