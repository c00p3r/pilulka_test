<?php

namespace App\Cache;

interface Cache
{
    /**
     * @param int $key
     *
     * @return bool
     */
    public function has(int $key): bool;

    /**
     * @param int $key
     *
     * @return array|null
     */
    public function get(int $key): ?array;

    /**
     * @param int $key
     * @param array $value
     *
     * @return void
     */
    public function set(int $key, array $value): void;
}