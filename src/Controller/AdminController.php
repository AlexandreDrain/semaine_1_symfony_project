<?php

namespace App\Controller;

use App\Entity\Slider;
use App\Entity\Article;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Category;
use App\Form\SliderFormType;
use App\Entity\QuiSommesNous;
use App\Form\ArticleFormType;
use App\Form\ContactFormType;
use App\Form\ProductFormType;
use App\Form\CategoryFormType;
use App\Entity\ReceivedMessages;
use App\Form\QuiSommesNousFormType;
use App\Repository\SliderRepository;
use App\Repository\ArticleRepository;
use App\Repository\ContactRepository;
use App\Repository\ProductRepository;
use App\Form\ReceivedMessagesFormType;
use App\Repository\CategoryRepository;
use App\Repository\QuiSommesNousRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ReceivedMessagesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
        ]);
    }

    /**
     * @Route("/admin/category", name="admin_category")
     */
    public function adminCategoryIndex(CategoryRepository $categoryRepository)
    {
        return $this->render('admin/category/index.html.twig', [
            "categories" => $categoryRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/category_new", name="admin_category_create")
     */
    public function adminCategoryCreate(Request $request)
    {

        $category = new Category();
        
        $form = $this->createForm(CategoryFormType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_category');
        }

        return $this->render('admin/category/create.html.twig', [
            "categoryForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/category_modify/{id}", name="admin_category_modify")
     */
    public function adminCategoryModify(Request $request, Category $category)
    {

        $form = $this->createForm(CategoryFormType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_category');
        }

        return $this->render('admin/category/modify.html.twig', [
            "categoryForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/category_delete/{id}", name="admin_category_delete")
     */
    public function adminCategoryDelete(Request $request, Category $category)
    {

        $form = $this->createForm(CategoryFormType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_category');
        }

        return $this->render('admin/category/delete.html.twig', [
            "categoryForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/product", name="admin_product")
     */
    public function adminProductIndex(ProductRepository $productRepository)
    {
        return $this->render('admin/product/index.html.twig', [
            "products" => $productRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/product_new", name="admin_product_create")
     */
    public function adminProductCreate(Request $request)
    {

        $product = new Product();
        
        $form = $this->createForm(ProductFormType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_product');
        }

        return $this->render('admin/product/create.html.twig', [
            "productForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/product_modify/{id}", name="admin_product_modify")
     */
    public function adminProductModify(Request $request, Product $product)
    {

        $form = $this->createForm(ProductFormType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_product');
        }

        return $this->render('admin/product/modify.html.twig', [
            "productForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/product_delete/{id}", name="admin_product_delete")
     */
    public function adminProductDelete(Request $request, Product $product)
    {

        $form = $this->createForm(ProductFormType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_product');
        }

        return $this->render('admin/product/delete.html.twig', [
            "productForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/article", name="admin_article")
     */
    public function adminArticleIndex(ArticleRepository $articleRepository)
    {
        return $this->render('admin/article/index.html.twig', [
            "articles" => $articleRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/article_new", name="admin_article_create")
     */
    public function adminArticleCreate(Request $request)
    {

        $article = new Article();
        
        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_article');
        }

        return $this->render('admin/article/create.html.twig', [
            "articleForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/article_modify/{id}", name="admin_article_modify")
     */
    public function adminArticleModify(Request $request, Article $article)
    {

        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_article');
        }

        return $this->render('admin/article/modify.html.twig', [
            "articleForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/article_delete/{id}", name="admin_article_delete")
     */
    public function adminArticleDelete(Request $request, Article $article)
    {

        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_article');
        }

        return $this->render('admin/article/delete.html.twig', [
            "articleForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/slider", name="admin_slider")
     */
    public function adminSliderIndex(SliderRepository $sliderRepository)
    {
        return $this->render('admin/slider/index.html.twig', [
            "sliders" => $sliderRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/slider_new", name="admin_slider_create")
     */
    public function adminSliderCreate(Request $request)
    {

        $slider = new Slider();
        
        $form = $this->createForm(SliderFormType::class, $slider);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($slider);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_slider');
        }

        return $this->render('admin/slider/create.html.twig', [
            "sliderForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/slider_modify/{id}", name="admin_slider_modify")
     */
    public function adminSliderModify(Request $request, Slider $slider)
    {

        $form = $this->createForm(SliderFormType::class, $slider);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($slider);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_slider');
        }

        return $this->render('admin/slider/modify.html.twig', [
            "sliderForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/slider_delete/{id}", name="admin_slider_delete")
     */
    public function adminSliderDelete(Request $request, Slider $slider)
    {

        $form = $this->createForm(SliderFormType::class, $slider);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($slider);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_slider');
        }

        return $this->render('admin/slider/delete.html.twig', [
            "sliderForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/contact", name="admin_contact")
     */
    public function adminContactIndex(ContactRepository $contactRepository)
    {
        return $this->render('admin/contact/index.html.twig', [
            "contacts" => $contactRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/contact_new", name="admin_contact_create")
     */
    public function adminContactCreate(Request $request)
    {

        $contact = new Contact();
        
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_contact');
        }

        return $this->render('admin/contact/create.html.twig', [
            "contactForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/contact_modify/{id}", name="admin_contact_modify")
     */
    public function adminContactModify(Request $request, Contact $contact)
    {

        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_contact');
        }

        return $this->render('admin/contact/modify.html.twig', [
            "contactForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/contact_delete/{id}", name="admin_contact_delete")
     */
    public function adminContactDelete(Request $request, Contact $contact)
    {

        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_contact');
        }

        return $this->render('admin/contact/delete.html.twig', [
            "contactForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/quiSommesNous", name="admin_quiSommesNous")
     */
    public function adminQuiSommesNousIndex(QuiSommesNousRepository $quiSommesNousRepository)
    {
        return $this->render('admin/quiSommesNous/index.html.twig', [
            "quiSommesNous" => $quiSommesNousRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/quiSommesNous_modify/{id}", name="admin_quiSommesNous_modify")
     */
    public function adminQuiSommesNousModify(Request $request, QuiSommesNous $quiSommesNous)
    {

        $form = $this->createForm(QuiSommesNousFormType::class, $quiSommesNous);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quiSommesNous);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_quiSommesNous');
        }

        return $this->render('admin/quiSommesNous/modify.html.twig', [
            "quiSommesNousForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/receivedMessages", name="admin_receivedMessages")
     */
    public function adminReceivedMessagesIndex(ReceivedMessagesRepository $receivedMessagesRepository)
    {
        return $this->render('admin/receivedMessages/index.html.twig', [
            "receivedMessages" => $receivedMessagesRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/receivedMessages_new", name="admin_receivedMessages_create")
     */
    public function adminReceivedMessagesCreate(Request $request)
    {

        $receivedMessages = new ReceivedMessages();
        
        $form = $this->createForm(ReceivedMessagesFormType::class, $receivedMessages);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($receivedMessages);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_receivedMessages');
        }

        return $this->render('admin/receivedMessages/create.html.twig', [
            "receivedMessagesForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/receivedMessages_delete/{id}", name="admin_receivedMessages_delete")
     */
    public function adminReceivedMessagesDelete(Request $request, ReceivedMessages $receivedMessages)
    {

        $form = $this->createForm(ReceivedMessagesFormType::class, $receivedMessages);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($receivedMessages);
            $entityManager->flush();
    
            return $this->redirectToRoute('admin_receivedMessages');
        }

        return $this->render('admin/receivedMessages/delete.html.twig', [
            "receivedMessagesForm" => $form->createView()
        ]);
    }
}
