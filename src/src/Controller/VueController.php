<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VueController extends AbstractController
{
	/**
	 * @Route ("/", name="vue")
	 * @Route("/register", name="register")
	 * @Route("/auth", name="auth")
	 */
	function index(){
		return $this->render("base.html.twig");
	}
	/**
	 * @Route ("/test", name="test")
	 */
	function test(){
		return $this->render("test.html.twig");
	}

}