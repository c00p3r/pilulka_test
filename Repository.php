<?php

namespace App\Repositories;

use App\Cache\Cache;
use App\Drivers\ElasticSearchDriver;
use App\Drivers\MySQLDriver;
use ProductSearchInfo;

class Repository implements ProductRepository
{
    /**
     * @var Cache
     */
    private $cache;
    /**
     * @var MySQLDriver
     */
    private $database;
    /**
     * @var ElasticSearchDriver
     */
    private $elastic;
    /**
     * @var ProductSearchInfo
     */
    private $productSearchInfo;

    /**
     * ProductManager constructor.
     *
     * @param Cache $cache
     * @param MySQLDriver $mySQL
     * @param ElasticSearchDriver $elasticSearch
     * @param ProductSearchInfo $productSearchInfo
     */
    public function __construct(
        Cache $cache,
        MySQLDriver $mySQL,
        ElasticSearchDriver $elasticSearch,
        ProductSearchInfo $productSearchInfo
    ) {
        $this->cache = $cache;
        $this->database = $mySQL;
        $this->elastic = $elasticSearch;
        $this->productSearchInfo = $productSearchInfo;
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findById(int $id): array
    {
        if ($this->cache->has($id)) {
            $product = $this->cache->get($id);
        }
        if (empty($product)) {
            $product = $this->elastic->findById($id);
            $this->cache->set($id, $product);
        }
        if (empty($product)) {
            $product = $this->database->findProduct($id);
            $this->cache->set($id, $product);
        }

        $this->productSearchInfo->updateCounter($id);

        return $product;
    }
}