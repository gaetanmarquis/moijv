<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function details(ProductRepository $productRepository, int $id)
    {
        /*
            ->find(1) <=> SELECT * FROM product WHERE id = 1
        */
        $products = $productRepository->find( $id );
        
        if( $products === null ){
            return $this->render('product/404.html.twig');
        }
        else{
            return $this->render('product/details.html.twig', [
                'prod' => $products,
            ]);
        }
    }
}
