<?php
namespace App\Listener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\HttpFoundation\Cookie;


class AuthListener
{
	private $cookieSecure= false;
	private $tokenTtl;

	public function __construct($tokenTtl){
		$this->tokenTtl = $tokenTtl;

	}

	public function onAuthSuccess(AuthenticationSuccessEvent $event) {
		$response = $event-> getResponse();
		$data = $event->getData();
		$token = $data['token'];
		unset ($data['token']);
		$event->setData($data);

		$response->headers->setCookie(new Cookie('BEARER', $token, (
		new \DateTime())
			->add(new \DateInterval('PT' . $this->tokenTtl . 'S')), '/', null, $this->cookieSecure));
	}

}