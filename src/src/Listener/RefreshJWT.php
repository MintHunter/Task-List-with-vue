<?php


namespace App\Listener;



use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Cookie;

class RefreshJWT implements EventSubscriberInterface
{
	private $ttl;
	private $cookieSecure = false;

	public function __construct($ttl)
	{
		$this->ttl = $ttl;
	}

	public function setRefreshToken(AuthenticationSuccessEvent $event)
	{
		$response = $event-> getResponse();
		$data = $event->getData();
		$refreshToken = $data['refresh_token'];

		if($refreshToken){
			$response->headers->setCookie(new Cookie('REFRESH_TOKEN',$refreshToken,(
				new \DateTime())
			->add(new \DateInterval('PT' . $this->ttl . 'S')), '/', null, $this->cookieSecure
			));
		}

	}
	public static function getSubscribedEvents()
	{
		return [
			'lexik_jwt_authentication.on_authentication_success' => [
				['setRefreshToken']
			]
		];
	}

}