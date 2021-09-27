<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/home/{name}", name="homepage")
     */
    public function home($name): Response
    {
        return $this->render('index/index.html.twig',["yourName"=>$name]);
      # return new Response("<h1>Ma première page Symfony</h1>");
    }
}



