<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{   private $authors;
   public function __construct(){

   }
   #[Route("/library",name:"app_library",methods:["GET"])]
    public function index(){
       return $this->render('author/index.html.twig');
   }

   #[Route("/author/{name}",
       name:"app_author",
       methods:["GET"],
       defaults:["name"=>"taha hussain"])]
   public function showAuthor($name){
       return $this->render('author/show.html.twig',
       array(
           'name'=>$name
       ));
   }

   //return list of authors
   #[Route("/list",name:"app_list",methods:["GET"])]
   public function authorList(){

       $this->render('author/list.html.twig',
       [
           'authors'=>$this->authors
       ]);
   }
}
