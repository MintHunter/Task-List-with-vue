<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractFOSRestController
{

	/**
	 * @var UserRepository
	 */
	private $userRepository;
	/**
	 * @var UserPasswordEncoderInterface
	 */
	private $passwordEncoder;
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
	{
		$this->userRepository = $userRepository;
		$this->passwordEncoder = $passwordEncoder;
		$this->entityManager = $entityManager;
	}

	/**
	 * @Route("/api/register", name="regiser")
	 * @param Request $request
	 * @return View
	 */
	public function index(Request $request)
	{
		$requestBodyContent = json_decode($request->getContent());

		$email = $requestBodyContent->email;
		$password = $requestBodyContent->password;
		$userNickName = $requestBodyContent->userNickName;

		$repositoryUserExist = $this->userRepository->findOneBy(['email' => $email]);
		if ($repositoryUserExist)
			return $this->view(['message' => 'User already exist'], Response::HTTP_CONFLICT); //409 status

		$user = new User();

		$user->setEmail($email);
		$user->setNickName($userNickName);
		$user->setPassword(
			$this->passwordEncoder->encodePassword($user, $password)
		);

		$this->entityManager->persist($user);
		$this->entityManager->flush();

		return $this->view(['message' => 'Successful registration'], Response::HTTP_CREATED); //201 status


	}
}
