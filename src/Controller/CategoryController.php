<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(CategoryRepository $categoryRepository)
    {
        return $this->render('category/index.html.twig', [
            "categories" => $categoryRepository->findAll()
        ]);
    }
    
    /**
     * @Route("/category/{id}/show_product", name="showProductByCat")
     */
    public function showProductByCat(Category $category, ProductRepository $productRepository)
    {
        return $this->render('category/showProductByCat.html.twig', [
            "showProductByCats" => $productRepository->findBy(["categories" => $category->getId()])
        ]);
    }
}
