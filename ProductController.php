<?php

namespace App\Controllers;

use App\Repositories\ProductRepository;

/**
 * Class ProductController
 *
 * Route("/products")
 */
class ProductController
{
    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Method("GET")
     * Route("/{id}")
     *
     * @param int $id
     *
     * @return string
     */
    public function productAction(int $id): string
    {
        $product = $this->repository->findById($id);

        // some Serializer might be used
        return json_encode($product);
    }
}