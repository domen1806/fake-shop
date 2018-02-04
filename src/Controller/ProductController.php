<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/produkty/{page}", name="products", requirements={"page"="\d+"})
     *
     * @param int $page
     * @return Response
     */
    public function listAction($page = 1)
    {
        $query = $this->get('products.list.query')->find(10, $page);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page,
            10
        );

        return $this->render(
            'product/list.html.twig',
            [
                'pagination' => $pagination,
            ]
        );
    }
}
