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

	public function test_ium_norendom()
	{
		$this->add_language('andreask/ium', 'user_self_delete_page');
        $crawler = self::request('GET', 'app.php/ium/');
	    self::assert_response_html(404);
	}
}
