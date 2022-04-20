<?php

/**
* This file is part of the phpBB Forum extension package
* IUM (Inactive User Manager).
*
* @copyright (c) 2016 by Andreas Kourtidis
* @license   GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the CREDITS.txt file.
*/

namespace andreask\ium\cron;

class send_reminder extends \phpbb\cron\task\base
{
	protected	$config;
	protected	$user;
	protected	$reminder;
	protected	$delete_user;

	/**
	* Constructor.
	*
	* @param \phpbb\config\config $config The config
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\user $user, \andreask\ium\classes\reminder $reminder, \andreask\ium\classes\delete_user $delete_user)
	{
		$this->config		=	$config;
		$this->user			=	$user;
		$this->reminder		=	$reminder;
		$this->delete_user	=	$delete_user;
	}

	/**
	* Runs this cron task.
	*
	* @return null
	*/
	public function run()
	{
		$reminder = $this->reminder;
		$reminder->send();

		// Update last run datetime stamp
		$this->config->set('send_reminder_last_gc', time());

		// autodelete users if active
		if ($this->config['andreask_ium_auto_del'])
		{
			$this->delete_user->auto_delete();
		}
	}


	/**
	* Returns whether this cron task should run now, because enough time
	* has passed since it was last run.
	*
	* @return bool
	*/
	public function should_run()
	{
		return $this->config['send_reminder_last_gc'] < (time() - $this->config['send_reminder_gc']);
	}

	/**
	* @return bool enable cron task if it's enabled in the ext.
	*/
	public function is_runnable()
	{
		return (bool) $this->config['andreask_ium_enable'];
	}
}
