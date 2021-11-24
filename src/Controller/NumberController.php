<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
class NumberController extends AbstractController
{
  /* Complétez la route pour qu'elle accepte un entier 'nb' 
  en tant que paramètre de substitution*/
    /**
     * @Route("/nombre/{nb?}", name="nombre", priority=3)
     */
    public function index($nb): Response
    {
        /* Utilisez la fonction is_numeric pour tester si 'nb' est numérique, 
           Si ce n'est pas le cas, lancez une exception 404 */
        if(!is_numeric($nb))
             throw new HttpException(404, "Le paramètre doit être un entier");
        /* L'objectif est de vérifier si 'nb' est pair ou impair*/
        $message="nombre impair !";
        /* si $nb est pair, alors $message ="nombre pair!" */
         if($nb % 2 ==0)
            $message="nombre pair !";
        /* envoyer $nb et $message à la vue*/
        return $this->render('number/index.html.twig', [
            'nb'=>$nb,
            'message' => $message,
        ]);
    }
}
