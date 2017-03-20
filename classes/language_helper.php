<?php

namespace andreask\ium\classes;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 *
 */
class language_helper
{

	protected 	$container;
	protected 	$language;
	protected 	$config;
	protected 	$user;
	public		$lang_name;

	function __construct(\phpbb\user $user, ContainerInterface $container,\phpbb\config\config $config)
	{
		$this->container = $container;
		$this->config = $config;
		$this->user = $user;

		if (phpbb_version_compare($this->config['version'], '3.2', '>='))
		{
			$this->language = $this->container->get('language');
		}
	}


	public function add_lang($path, $lang)
	{
		if (phpbb_version_compare($this->config['version'], '3.2', '>='))
		{
			$this->language->add_lang($lang, $path);
		}
		else
		{
			$this->user->add_lang_ext($path, $lang);
		}
	}

	public function lang()
	{
		$args = func_get_args();
		if (phpbb_version_compare($this->config['version'], '3.2', '>='))
		{
			return $this->language->lang(...$args);
		}
		else
		{
			return $this->user->lang(...$args);
		}
	}

	public function set_user_language($lang, $tz = null)
	{
		if (phpbb_version_compare($this->config['version'], '3.2', '>='))
		{
			$this->language->set_user_language($lang);
		}
		else
		{
			$user_instance = new \phpbb\user('\phpbb\datetime');
			$user_instance->lang_name = $user_instance->data['user_lang'] = $lang;
			$user_instance->timezone = $user_instance->data['user_timezone'] = $tz;
			$this->lang_name = $lang;
		}
	}

	public function get_used_language()
	{
		if (phpbb_version_compare($this->config['version'], '3.2', '>='))
		{
			return $this->language->get_used_language();
		}
		else
		{
			return false;
		}
	}
}
