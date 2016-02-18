<?php
/**
*
* @package mChat on Board3 Portal 1.0.0
* @copyright (c) 2015 Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\mchat\migrations;

class 1.0.0.b1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\dmzx\mchat\migrations\install_mchat');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('mchat_on_portal', 1)),
		);
	}
}
