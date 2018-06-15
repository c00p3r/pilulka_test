<?php

/**
 * Class ProductSearchInfoInterface
 */
interface ProductSearchInfo
{
    /**
     * @param int $id
     *
     * @return void
     */
    public static function updateCounter(int $id): void;
}