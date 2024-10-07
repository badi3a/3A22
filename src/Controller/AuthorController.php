<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{   private $authors;
    public function __construct(){
            $this->authors=[
                ['id'=>1, 'name'=>'Taha Hussain','nbrBooks'=>300,'picture'=>'images/th.jpeg', 'email'=>"taha@gmail.com"],
                ['id'=>2, 'name'=>'Victor Hugo','nbrBooks'=>200,'picture'=>'images/vh.jpeg','email'=>"vh@gmail.com"],
            ];
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

       return $this->render('author/list.html.twig',
       [
           'authors'=>$this->authors
       ]);
   }

    #[Route("/showDetails/{id}",name:"app_showDetail",methods:["GET"])]
public function showDetailsAction($id){
        //show author details in showDetails.html.twig
        //var_dump($id);
        //die();
        return $this->render("author/showDetails.html.twig", array());
    }
}
