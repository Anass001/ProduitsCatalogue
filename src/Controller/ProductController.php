<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_product')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $products = $entityManager->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/products/{id}/delete', name: 'app_product_delete')]
    public function delete(Product $product, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($product);
        $entityManager->flush();

        return $this->redirectToRoute('app_product');
    }

    #[Route('/products/{id}/edit', name: 'app_product_add')]
    public function add(Product $product, EntityManagerInterface $entityManager): Response
    {
        $entityManager->persist($product);
        $entityManager->flush();

        return $this->redirectToRoute('app_product');
    }

    #[Route('/products/{id}/edit', name: 'app_product_edit')]
    public function edit(Product $product, EntityManagerInterface $entityManager): Response
    {
        $entityManager->persist($product);
        $entityManager->flush();

        return $this->redirectToRoute('app_product');
    }

    #[Route('/products/new', name: 'app_product_new')]
    public function new(\Symfony\Component\HttpFoundation\Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $product = $form->getData();

            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('app_product');
        }

        return $this->render('product/new.html.twig', [
            'form' => $form,
        ]);
    }

}
