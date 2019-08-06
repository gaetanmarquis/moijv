<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /*
        Ce type de commentaires permet de créer les routes. Lorsque cette route est appelée, la méthode ci-dessous s'exécute
        @Route("URL", NomPage_pour_fonction_path)
        La fonction path(annoation_NamePage, optionnel_ParamDynamiqueURL) est utilisée pour faire des liens

        ex : path('product', { 'id' : product.id })
    */

    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository)
    {
        //Permet de trouver toutes les lignes dans la table PRODUCT (liée à ProductRepository)
        $products = $productRepository->findAll();
        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }
}