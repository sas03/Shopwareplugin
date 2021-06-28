<?php

namespace App\Controller;

use App\Manager\CartManager;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository, CartManager $cartManager): Response
    {
        $cart = $cartManager->getCurrentCart();

        return $this->render('sortimentsliste/home/index.html.twig', [
            'products' => $productRepository->findAll(),
            'cart' => $cart
        ]);
    }
}
