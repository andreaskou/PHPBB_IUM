<?php
/* Put your header comments here. */

namespace andreask\ium\cron;

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

    public function __construct(\phpbb\config\config $config, \phpbb\log\log $log, \phpbb\user $user, ContainerInterface $container)
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
		$this->log->add('admin', 54 , '127.0.0.1', 'In the cron run before sending reminders', time());

		$reminder = $this->container->get('andreask.ium.classes.reminder');
		$reminder->send((int) $this->config['andreask_ium_email_limit']);

		$this->config->set('send_reminder_last_gc', time());
		// for now add a line to logs.
		$this->log->add('admin', 54 , '127.0.0.1', 'Sent reminders', time());
    }

    /**
     * Returns whether this cron task should run now, because enough time
     * has passed since it was last run.
     *
     * @return bool
     */

    public function should_run()
    {
    	$run = (bool) ($this->config['send_reminder_last_gc'] < (time() - $this->config['send_reminder_gc']));
		$this->log->add('admin','54','127.0.0.1',"Do I need to run? (".$run. ") last_gc ".date("Y-m-d H:i:s",$this->config['send_reminder_last_gc'])." now :" .date("Y-m-d H:i:s",time())." - ". $this->config['send_reminder_gc'] ." Seconds", time());
        return (bool) $this->config['send_reminder_last_gc'] < strtotime('10 minutes ago');
    }

	/**
	 * @return bool enable cron task if
	 */

	public function is_runnable()
    {
    	$test = $this->config['andreask_ium_enable'];
    	$this->log->add('admin','54','127.0.0.1',"Can I run? : $test ", time());
        return (bool) $this->config['andreask_ium_enable'];
    }
}
