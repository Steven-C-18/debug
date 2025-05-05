<?php
/**
 * Debug. An extension for the phpBB Forum Software package.
 * @copyright (c) 2025, Steve, https://steven-clark.tech/phpBB3/index.php
 * @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace steve\debug\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return [
			'core.phpbb_generate_debug_output'		=> 'admin_auth',
		];
	}

	protected $auth;

	public function __construct(\phpbb\auth\auth $auth)
	{
		$this->auth = $auth;
	}

	public function admin_auth($event)
	{
		if (empty($this->auth->acl_get('a_')))
		{
			$event['debug_info'] = [];
		}
	}
}
