<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\CommentaireArticle;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommentaireArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(ArticleRepository $articleRepository)
    {
        return $this->render('article/index.html.twig', [
            "articles" => $articleRepository->findAll()
        ]);
    }

    /**
     * @Route("/details_article/{id}", name="showArticle")
     */
    public function showArticle(Article $article, CommentaireArticleRepository $commentaireArticleRepository)
    {

        if (array_key_exists("userName", $_POST) && array_key_exists("userCommentaire", $_POST)) {

            if (!empty($_POST["userName"]) && !empty($_POST["userCommentaire"])) {

                $entityManager = $this->getDoctrine()->getManager();

                $commentaireArticle = new CommentaireArticle();
                $commentaireArticle->setUserName($_POST["userName"]);
                $commentaireArticle->setUserCommentaire($_POST["userCommentaire"]);
                $commentaireArticle->setArticle($article);

                $entityManager->persist($commentaireArticle);

                $entityManager->flush();

                return $this->redirectToRoute("article");

            }

        }

        return $this->render('article/show.html.twig', [
            "article" => $article,
            "commentaires" => $commentaireArticleRepository->findBy(["article" => $article->getId()])
        ]);
    }
}
