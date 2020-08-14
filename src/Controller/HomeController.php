<?php

namespace App\Controller;

use DateTime;
use App\Entity\Product;
use App\Entity\CommentaireProduit;
use App\Repository\SliderRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommentaireProduitRepository;
use App\Repository\ProductImageRelativeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController // La page d'acceuil gère aussi les produits !
{

    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository, SliderRepository $sliderRepository)
    {
        $produits = $productRepository->findAll();

        return $this->render('home/index.html.twig', [
            "produits" => $produits,
            "sliderImages" => $sliderRepository->findAll()
        ]);
    }


    /**
     * @Route("/produit/{id}", name="detail_produit", methods={"GET", "POST"})
     */
    public function showProduct(
        Product $product, 
        ProductImageRelativeRepository $productImageRelativeRepository, 
        ProductRepository $productRepository, 
        CommentaireProduitRepository $commentaireProduitRepository
        ): Response
    {

        if (array_key_exists("userName", $_POST) && array_key_exists("userCommentaire", $_POST)) {

            if (!empty($_POST["userName"]) && !empty($_POST["userCommentaire"])) {

                $entityManager = $this->getDoctrine()->getManager();

                $commentaireProduct = new CommentaireProduit();
                $commentaireProduct->setUserName($_POST["userName"]);
                $commentaireProduct->setUserCommentaire($_POST["userCommentaire"]);
                $commentaireProduct->setProduct($product);

                $entityManager->persist($commentaireProduct);

                $entityManager->flush();

                return $this->redirectToRoute("home");

            }

        }
        
        return $this->render('home/showProduct.html.twig', [
            "produit" => $product,
            "imageRelative" => $productImageRelativeRepository->findBy(["product" => $product->getId()]),
            "produitByCats" => $productRepository->findBy(["categories" => $product->getCategories()]),
            "commentaires" => $commentaireProduitRepository->findBy(["product" => $product->getId()])
        ]);
    }

    /**
     * @Route("/produit_recherche", name="searched_product", methods={"GET", "POST"})
     */
    public function searchedProduct(ProductRepository $productRepository): Response
    {
        return $this->render('home/searchedPorduct.html.twig', [
            "searchedProduits" => $productRepository->findBySearchedLikeProduct($_POST["searchedProduct"])
        ]);
    }

}
