<?php
namespace andreask\ium\functional;

/**
 * @group functional
 */
class autodelete_page_user_test extends \phpbb_functional_test_case
{
	static protected function setup_extensions()
    {
        return ['andreask/ium'];
    }

	public function test_ium_norandom()
	{
		$this->add_language('andreask/ium', 'user_self_delete_page');
        $crawler = self::request('GET', 'app.php/ium/');
	    self::assert_response_html(404);
	}

	public function test_user_self_delete_with_random()
	{
		$this->login();
		$this->add_language('andreask/ium', 'user_self_delete_page');
		$crawler = self::request('GET', 'app.php/ium/1234567?sid=' .  $this->sid);
		$this->assertContains($this->lang('INVALID_LINK_OR_USER'), $crawler->filter('p')->text());
	}
}
