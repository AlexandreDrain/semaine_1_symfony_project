<?php

namespace App\Controller;

use App\Repository\QuiSommesNousRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuiSommesNousController extends AbstractController
{
    /**
     * @Route("/qui_sommes_nous", name="qui_sommes_nous")
     */
    public function indexBlog(QuiSommesNousRepository $quiSommesNousRepository)
    {
        return $this->render('qui_sommes_nous/index.html.twig', [
            "quiSommesNous" => $quiSommesNousRepository->findAll()
        ]);
    }
}
