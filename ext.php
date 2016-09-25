<?php
/**
* @package mChat addon Pop Up Extension
* @copyright (c) 2015 dmzx - http://dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace talonos\b3pmchat;

/**
* @ignore
*/

class ext extends \phpbb\extension\base
{
	/**
	 * Check whether or not the extension can be enabled.
	 *
	 * @return bool
	 * @access public
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');
		$mchatver = $config['mchat_version'];
		$ext_manager = $this->container->get('ext.manager');
		if ($mchatver = '2.0.0-RC6' && $ext_manager->is_enabled('dmzx/mchat') == 'true')
		{
		$responce = true;
		}
		else
		{
		$this->container->get('user')->add_lang_ext('talonos/b3pmchat', 'common');
		trigger_error($this->container->get('user')->lang['B3PMCHAT_UPGRADE'], E_USER_WARNING);
		$responce = false;
		}
		return $responce;
	}
}