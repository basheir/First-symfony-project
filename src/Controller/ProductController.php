<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'product_index')]
    public function index(ProductRepository $repository): Response
    {

        return $this->render('product/index.html.twig', [
            'products' => $repository->findAll(),
        ]);
    }

    #[Route('/product/{id<\d+>}')]
    public function show($id, ProductRepository $repository):Response 
    {
        
        $product = $repository->findOneBy(['id' => $id]);

        if ($product === null) {
            throw $this->createNotFoundException("Product not found");
        }

        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }
}
