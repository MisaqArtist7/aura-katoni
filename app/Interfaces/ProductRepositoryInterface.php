<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getBestSellers();

    public function getAllProducts();

    public function getAllWithFilters(array $filters = []);

    public function getAllProductsWithPagination();

    public function getLatestProducts();
    public function getDiscountsProduct();

    public function getSimilarProducts($categoryId);
    public function getProductById($id);

    public function getBoldProducts();
}
