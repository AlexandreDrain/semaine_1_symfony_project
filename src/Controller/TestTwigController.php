<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestTwigController extends AbstractController
{
    /**
     * @Route("/test_twig", name="test_twig")
     */
    public function index()
    {

        $salut = "Salut";

        return $this->render('test_twig/index.html.twig', [
            'controller_name' => 'TestTwigController',
            'salut' => $salut
        ]);
    }
}
