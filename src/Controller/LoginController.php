<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login_page")
     */
    public function index(): Response
    {
        // au lieu d'écrire array('nom'=>'Tounsi') , écrivez directement ['nom'=>'Tounsi']
        $url = $this->generateUrl('home_page', ['nom'=>'Tounsi']);
        return $this->redirect($url); // au lieu de "return new RedirectResponse($url);"
    }
    /**
     * @Route("/login/filter", name="filter")
     */
    public function index2(): Response
    {
        return $this->render('login/index.html.twig');
    }
}
