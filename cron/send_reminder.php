<?php
/* Put your header comments here. */

namespace andreask\ium\cron;

use andreask\ium\classes\reminder;
use Symfony\Component\DependencyInjection\ContainerInterface;

class send_reminder extends \phpbb\cron\task\base
{
    protected $config;
    protected $user;
	protected $container;
    protected $log;

    /**
     * Constructor.
     *
     * @param \phpbb\config\config $config The config
     */

    public function __construct(\phpbb\config\config $config,\phpbb\log\log $log,\phpbb\user $user, ContainerInterface $container)
    {
        $this->config = $config;
        $this->user = $user;
        $this->container = $container;
        $this->log = $log;

    }

    /**
     * Runs this cron task.
     *
     * @return null
     */
    public function run()
    {
        // Do not forget to update the configuration variable for last run time.
		$reminder = $this->container->get('andreask.ium.cron.send_reminder');
		$reminder->send($this->config['andreask_ium_email_limit']);
		$this->config->set('test_task_last_gc', time());
		// for now add a line to logs.
		$this->log->add('send_reminder', 54 , '127.0.0.1', 'Sent reminders', time());
    }

    /**
     * Returns whether this cron task should run now, because enough time
     * has passed since it was last run.
     *
     * @return bool
     */
    public function should_run()
    {
        return $this->config['send_reminder_last_gc'] < time() - $this->config['send_reminder_gc'];

    }

	/**
	 * @return bool enable cron task if
	 */
	public function is_runnable()
    {
        return (bool) $this->config['andreask_ium_enable'];
    }
}
