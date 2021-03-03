<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
	/**
	 * @Route("/getPost", name="getPost")
	 * @return JsonResponse
	 */
	public function index(): JsonResponse
	{
		return new JsonResponse([
			'message'=>'message From PostController'
		]);
	}
}