<?php

namespace App\Application\Query\ProductsList;

interface ProductListQueryInterface
{
    /**
     * @param int $limit
     * @param int $page
     * @return mixed
     */
    public function find(int $limit, int $page);
}
