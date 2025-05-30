<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ProductForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

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
    public function show(Product $product): Response
    {


        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }


    #[Route('/product/new', name: 'product_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {

        $product = new Product;

        $form = $this->createForm(ProductForm::class, $product);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($product);

            $manager->flush();

            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()
            ]);
        }



        return $this->render('product/new.html.twig', [
            'form' => $form,
        ]);
    }
}
