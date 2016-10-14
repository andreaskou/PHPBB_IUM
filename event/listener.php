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

namespace andreask\ium\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class listener implements EventSubscriberInterface
{

	protected $log;
	protected $user;
	protected $container;

	public function __construct(ContainerInterface $container, \phpbb\user $user, \phpbb\log\log $log)
	{
		$this->container 	=	$container;
		$this->user 		=	$user;
		$this->log			=	$log;
	}

	static public function getSubscribedEvents()
	{
	    return array(
            'core.login_box_redirect'	=>	'update_table_ium_reminder_counter',
			'core.delete_user_after'	=>	'update_table_ium_reminder_user_deleted',
        );
    }

	public function update_table_ium_reminder_counter($event)
	{
		// Reset reminder counter if users has returned!
		$update = $this->container->get('andreask.ium.classes.reminder');
		$update->reset_counter($this->user->data['user_id']);
	}

	public function update_table_ium_reminder_user_deleted($event)
	{

		$mode = $event['mode'];
		$action = $event['retain_username'];
		$id = $event['user_ids'];

		$delete = $this->container->get('andreask.ium.classes.delete_user');
		$delete->clean_ium_table($id);

		// $this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'deletion mode ' . $mode, time());
		// $this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'deletion action ' . $action, time());
		// $this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'deleted user_id ' . $id[0], time());
	}
}
