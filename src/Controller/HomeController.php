<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HomeController extends AbstractController
{
   
     /**
     * @Route("/home/{nom}", name="home_page")
     */
    public function index(string $nom): Response
    {
        return $this->render('home/hello.html.twig', ['nom' => $nom]);
    }
    
    /**
     * @Route("/home/{nom?}/{age?}", name="home_page2", requirements={"age"="\b[1-9][0-9]\b"})
     */
    public function index2(?string $nom, ?int $age): Response
    {
        if (!isset($nom) || !isset($age)) {
            throw new HttpException(404, 'On ne peut vous afficher la page de cette personne');
            }
        return $this->render('home/index.html.twig', [
            'nom' => $nom,
            'age'=> $age
        ]);
    }

    /**
     * @Route("/{nom}/{age}", name="home_page3", requirements={"age"="\b[1-9][0-9]\b"})
     */
    public function index3(string $nom, int $age): Response
    {
        return new Response("<h1>Ma première page Symfony</h1>
                            <h3>Bonjour {$nom}  </h3>
                            <h3>Vous avez {$age} ans !</h3>",
                            Response::HTTP_OK,
                            ['content-type' => 'text/html']
                        );
    }
}
