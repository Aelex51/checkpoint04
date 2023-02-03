<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product', name: 'app_')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'product')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/{id}', name: 'product_show', methods: ['GET'])]
    public function show($id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);

        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
    #[Route('/category/{id}', name: 'product_category')]
    public function showByCategory(Category $category, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(['category' => $category]);

        return $this->render('product/show_categories.html.twig', [
            'product' => $product,
        ]);
    }
}
