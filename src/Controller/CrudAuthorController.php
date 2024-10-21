<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/crud')]
class CrudAuthorController extends AbstractController
{
    #[Route('/list', name: 'app_list_author')]
    public function list(AuthorRepository $authorRepository, Request $request): Response
    {
        $email=$request->get('search');
        if($email){
            $authors=$authorRepository->findAuthorsByEmail($email);
        }
        else{
            $authors=$authorRepository->findAll();
        }
        return $this->render('crud_author/list.html.twig', [
            'authors' => $authors,
        ]);

    }
    #[Route('/search/{id}', name: 'app_search_author')]
    public function search(AuthorRepository $authorRepository, $id): Response
    {
        $author=$authorRepository->find($id);
        return $this->render('crud_author/search.html.twig', [
            'author' => $author,
        ]);
    }
    //method to insert object into DB
    #[Route("/new", name:"app_new_author")]
    public function newAuthor(ManagerRegistry $doctrine):Response{
        //1.create instance of Author
        $author= new Author();
        $author->setName('John');
        $author->setEmail('john@example.com');
        //2.cnx with the DB
        $em=$doctrine->getManager();
        //persist data
        $em->persist($author);
        //save data in database
        $em->flush();
        return $this->redirectToRoute('app_list_author');
    }
    //method to delete author
    #[Route("/delete/{id}", name:"app_delete_author")]
    public function deleteAuthor(ManagerRegistry $doctrine,Author $author):Response{
        //$id=1; //replace with actual id
       // $author=$authorRepository->find($id);
        if($author){
            $em=$doctrine->getManager();
            $em->remove($author);
            $em->flush();
        }
        return $this->redirectToRoute('app_list_author');
    }
    #[Route("/update/{id}", name:"app_update_author")]
    public function updateAuthor(ManagerRegistry $doctrine,Author $author):Response{

        // $author=$authorRepository->find($id);
        if($author){
            $em=$doctrine->getManager();
            $author->setName("Aziz");
            $em->flush();
        }
        return $this->redirectToRoute('app_list_author');
    }

    public function searchLikeName()
    {
        ///

    }
#[Route("/searchemail", name:"app_searchbyemail_author")]
public function searchByEmail(AuthorRepository $authorRepository,Request $request)
{


    return $this->render('crud_author\list.html.twig',['authors' => $authors]);

}

}
