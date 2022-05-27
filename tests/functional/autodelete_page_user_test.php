<?php
//tests/classes/ignore_user_test.php
namespace andreask\ium\functional;

// require_once dirname(__FILE__) . '/../phpBB/includes/functions.php';
/**
 * @group functional
 */
class main_test extends phpbb_functional_test_case
{
	static protected function setup_extensions()
    {
        return ['andreask/ium'];
    }

	public function test_ium_norendom()
	{
		$this->add_language('andreask/ium', 'user_self_delete_page');
        $crawler = self::request('GET', 'app.php/ium/');
		$this->assertStringContainsString($this->lang('NO_AUTH_SPEAKING', 'bertie'), $crawler->filter('#message p')->text());
	}


}
