<?php

// test/ium/classes/top_topics_test.php

// require_once dirname(__FILE__) . '/../phpbb/includes/functions.php';

namespace andreasl\ium\tests\ium\classes;

class andreask_ium_top_topics_test extends phpbb_test_case
{
	// \phpbb\config\config $config, \phpbb\auth\auth $auth, \phpbb\db\driver\driver_interface $db

	protected $controller, $config, $auth, $db;

	public function setup()
	{
		parent::setup();

		$this->config = $this->getMockBuilder('\phpbb\config\config')
            ->disableOriginalConstructor()
            ->getMock();

		$this->auth = $this->getMockBuilder('\phpbb\auth\auth')
			->disableOriginalConstructor()
			->getMock();

		$this->db = $this->getMockBuilder('\phpbb\db\driver\driver_interface')
			->disableOriginalConstructor()
			->getMock();

		$this->controller = new \andreask\ium\classes\top_topics(
			$this->config,
			$this->auth,
			$this->db
		);
	}

	public function test_get_user_top_topics($id)
	{
		# code...
	}
}
