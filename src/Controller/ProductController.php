<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ProductForm;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'product_index')]
    public function index(ProductRepository $repository): Response
    {

        return $this->render('product/index.html.twig', [
            'products' => $repository->findAll(),
        ]);
    }

    #[Route('/product/{id<\d+>}', name: 'product_show')]
    public function show(Product $product):Response 
    {
        
        // $product = $repository->findOneBy(['id' => $id]);

        // if ($product === null) {
        //     throw $this->createNotFoundException("Product not found");
        // }

        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }


    #[Route('/product/new', name: 'product_new')]
    public function new(): Response
    {

        $form = $this->createForm(ProductForm::class);

        return $this->render('product/new.html.twig', [
            'form' => $form,
        ]);
    }
}
