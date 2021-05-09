<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternTestController extends AbstractController
{
    /**
     * @Route("/pattern/test", name="pattern_test")
     */
    public function index(): Response
    {

    }
}
