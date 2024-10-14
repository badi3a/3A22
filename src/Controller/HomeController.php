<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
   
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_list_author');
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {    //cnx BD
        $name= "Aziz";
        return $this->render('home/contact.html.twig',
            array('name'=>$name));
    }


}
