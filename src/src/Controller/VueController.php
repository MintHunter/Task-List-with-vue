<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VueController extends AbstractController
{
	/**
	 * @Route ("/", name="vue")
	 * @Route("/register", name="register")
	 */
	function index(){
		return $this->render("base.html.twig");
	}

}