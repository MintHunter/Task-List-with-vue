<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
	/**
	 * @Route("/getTasks", name="getTasks")
	 * @return JsonResponse
	 */
	public function index(): JsonResponse
	{
		return new JsonResponse(
			[
				0=>[
					'id'=>123,
					'title'=>'hardcode task 1',
					'text'=>'some lorem text some lorem text some lorem text some lorem text some lorem text',
					'work_stage' => 'in process',
					'start_time' => '10.03.2021 17:00',
					'end_time' => '15.03.2021',
					'spend_time' => '5'
				],
				1=>[
					'id'=>121,
					'title'=>'hardcode  task 2',
					'text'=>'some lorem 2 text s2ome lo 2rem text some l2 orem te2xt som2e lor2em text some lorem text',
					'work_stage' => 'finished',
					'start_time' => '11.03.2021 13:00',
					'end_time' => '14.03.2021 13:00',
					'spend_time' => '1'
				]
			]
		);
	}
}