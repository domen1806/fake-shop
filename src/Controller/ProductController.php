<?php

namespace App\Controller;

use App\Application\Command\Product\SetNewProduct;
use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/products/{page}", name="products", requirements={"page"="\d+"})
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

    /**
     * @Route("/admin/new-product", name="new_product")
     */
    public function addProductAction(Request $request)
    {
        $product = new Product();
        $form    = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Product $product */
            $product = $form->getData();

            $this->get('command_bus')
                ->handle(
                    new SetNewProduct(
                        $product->getName(),
                        $product->getDescription(),
                        $product->getPrice()
                    )
                );

            return $this->redirectToRoute('products');
        }

        return $this->render(
            'product/add_product.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
