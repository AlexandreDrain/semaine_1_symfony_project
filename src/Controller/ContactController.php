<?php

namespace App\Controller;

use App\Entity\ReceivedMessages;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */
    public function index(ContactRepository $contactRepository, Request $request)
    {

        $receivedMessages = new ReceivedMessages;
        //$request = Request::createFromGlobals();

        if ($request->request->get('prenom')!=NULL && $request->request->get('email')!=NULL && $request->request->get('titre_plainte')!=NULL && $request->request->get('plainte')!=NULL) {

            $entityManager = $this->getDoctrine()->getManager();
            $receivedMessages->setTitle($_POST["titre_plainte"]);
            $receivedMessages->setDescription($_POST["plainte"]);
            $receivedMessages->setFirstName($_POST["prenom"]);
            $receivedMessages->setEmail($_POST["email"]);
            $entityManager->persist($receivedMessages);
            $entityManager->flush();

            return $this->redirectToRoute("home");
        }

        return $this->render('contact/index.html.twig', [
            "contact" => $contactRepository->findOneBy(["id" => "1"]),
        ]);
    }
}
