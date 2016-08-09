<?php

namespace andreask\ium\acp;


use phpbb\log\null;
use Symfony\Component\DependencyInjection\ContainerInterface;

class reminder
{

    /**
     *
     * This file is part of the phpBB Forum Software package.
     *
     * @copyright (c) phpBB Limited <https://www.phpbb.com>
     * @license GNU General Public License, version 2 (GPL-2.0)
     *
     * For full copyright and license information, please see
     * the docs/CREDITS.txt file.
     *
     */

    protected $users = [];

    public function set_users($user){
        $this->users = $user;
    }

    private function send_reminder()
    {

        global $phpEx, $phpbb_root_path, $config;

        if ($this->users) {

            if (!class_exists('messenger')) {
                include($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
            }

            foreach ($this->users as $user) {

                $messenger = new \messenger(false);
                $server_url = generate_board_url();
                $messenger->template('@andreask_ium/template', 'en');
                $messenger->to($user['user_email'], $user['username']);
                $messenger->assign_vars(array(
                    'USERNAME' => htmlspecialchars_decode($user['username']),
                    'LAST_VISIT' => $user['last_visit'],
                    'ADMIN_MAIL' => 'admin@mail.bla',
                    'SITE_NAME' => 'This is the sine name!!!',
                    'URL' => $server_url
                ));
                $messenger->send(NOTIFY_EMAIL);
            }
        }
    }
}
