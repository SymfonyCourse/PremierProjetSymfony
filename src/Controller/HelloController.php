<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
class HelloController extends AbstractController
{
    # Complétez la route pour qu'elle accepte 3 paramètres de substitution:
    # le nom, le prénom et le sexe de l'utilisateur
    /**
     * @Route("/hello/{nom?}/{prenom?}/{age?}", name="hello")
     */
    public function index($nom, $prenom, $age): Response
    {
        /* Utilisez la fonction isset pour véfifier que le nom, le prénom 
        et l'age ne sont pas nulles, si c'est le cas, lancer une exception 404 */
        if (!isset($nom)||!isset($prenom) || !isset($age)) {
            throw new HttpException(404, 'Vous devez entrez les paramètres nom, prénom puis age');
            }

        /* Utilisez la fonction is_numeric pour tester si l'age est numérique, 
         Vérifiez aussi que l'age est entre 12 et 90,
         Si ce n'est pas le cas, lancez une exception 404 */
        if(!is_numeric($age) || ($age <12 && $age >90))
             throw new HttpException(404, "L'age doit être un entier entre 12 et 90");
        
        # Créez la réponse HTTP d'une manière explicite
        /* Affichez dans cette réponse un message Hello avec le nom, 
         le prénom et l'age de l'utilisateur */
        return new Response("Bonjour {$nom} {$prenom} <br>Vous avez {$age}");
    }
}
