<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
class LukyController extends AbstractController
{
    /**
     * @Route("/luky/{max}", name="luky", requirements={"max"="\d+"})
     */
    public function index(int $max): Response
    {
        $number = random_int(0, $max);
        return $this->render('luky/index.html.twig', ['number' => $number]);
    }
    
    /**
     * @Route("/{max?}", name="luky2")
     */
    public function index2($max): Response
    {
        if (!isset($max)||!is_numeric($max)) {
            throw new HttpException(404, 'We could not display your luky number :(');
            }
        $number = random_int(0, $max);
        return $this->render('luky/index.html.twig', ['number' => $number]);
    }
    /**
     * @Route("/luky/number", name="luky_number")
     */
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response("<h1>Lucky number: {$number} </h1>");
    }
}
