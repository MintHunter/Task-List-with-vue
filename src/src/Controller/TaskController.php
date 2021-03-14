<?php

namespace App\Controller;

use DateTime;
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
		$taskArr = [
			0=>[
				'id'=>123,
				'title'=>'hardcode task 1',
				'text'=>'some lorem text some lorem text some lorem text some lorem text some lorem text',
				'work_stage' => [
					'stage_id' => 1,
					'name'=>'in process',
					'icon'=>'mdi-arrow-right-bold',
					'vuetify_material'=>[
						'text'=>'blue--text text--darken-3',
						'dom_element'=>'blue darken-3',
					],
				],
				'start_time' => '2021-03-10 17:00',
				'end_time' => '2021-03-15 17:00',
				'spend_time' => '5'
			],
			1=>[
				'id'=>121,
				'title'=>'hardcode  task 2',
				'text'=>'some lorem 2 text s2ome lo 2rem text some l2 orem te2xt som2e lor2em text some lorem text',
				'work_stage' => [
					'stage_id' => 0,
					'name'=>'finished',
					'icon'=>'mdi-arrow-right-bold',
					'vuetify_material'=>[
						'text'=>'green--text text--accent-3',
						'dom_element'=>'green accent-3',
					],
				],
				'start_time' => '2021-01-13 13:00',
				'end_time' => '2021-01-15 13:00',
				'spend_time' => '1'
			],
			2=>[
				'id'=>122,
				'title'=>'hardcode  task 3',
				'text'=>'some lorem 3 text s3ome lo 2rem3 text3 some l23 orem te23xt so3m2e 3lor32em33 text some lorem text',
				'work_stage' => [
					'stage_id' => 2,
					'name'=>'stopped',
					'icon'=>'mdi-arrow-right-bold',
					'vuetify_material'=>[
						'text'=>'yellow--text text--darken-1',
						'dom_element'=>'yellow darken-1',
					],
				],
				'start_time' => '2021-03-10 13:00',
				'end_time' => '2021-03-15 13:00',
				'spend_time' => '5'
			],
			3=>[
				'id'=>1245,
				'title'=>'hardcode  task 4',
				'text'=>'some lorem 3 text s3ome lo 2rem3 text3 some l23 orem te23xt so3m2e 3lor32em33 text some lorem text',
				'work_stage' => [
					'stage_id' => 3,
					'name'=>'out of time',
					'icon'=>'mdi-warning-circle-outline',
					'vuetify_material'=>[
						'text'=>'red--text text--darken-3',
						'dom_element'=>'red darken-3',
					],
				],
				'start_time' => '2021-02-15 13:00',
				'end_time' => '2021-02-15 13:00',
				'spend_time' => '5'
			]
		];
		foreach ($taskArr as $key => $task) {
			$endTime = new DateTime($task['end_time']);
			$todayTime = new DateTime();
			$dayDiff = $todayTime->diff($endTime)->format("%r%d"); //%r - знак минус
			if ($task['work_stage']['stage_id']==0 || $dayDiff > 1 ) {
				$taskArr[$key]['work_stage']['color'] ='#00e676'; // green
			}elseif ($task['work_stage']['stage_id']!=0 && $dayDiff == 1){
				$taskArr[$key]['work_stage']['color'] ='#f9a825'; //yellow
			}else{
				$taskArr[$key]['work_stage']['color'] ='#c62828'; //red
			}

			$taskArr[$key]['diff_time'] = $dayDiff;
		}
		return new JsonResponse(
			$taskArr
		);
	}
}