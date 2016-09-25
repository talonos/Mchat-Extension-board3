<?php
/**
*
* @package Board3 Portal v2.1+ - mchat on portal
* @copyright (c) Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @mchat on portal by Talonos @ http://pretereo-stormrage.co.uk
*/

namespace talonos\b3pmchat;

/**
* @package mchat
*/
class b3pmchat extends \board3\portal\modules\module_base
{
	/**
	* Allowed columns: Just sum up your options (Exp: left + right = 10)
	* top		1
	* left		2
	* center	4
	* right		8
	* bottom	16
	*/
	public $columns = 21;

	/**
	* Default guildox
	*/
	public $name = 'PORTAL_MCHAT_TITLE';

	/**
	* Default module-image:
	* file must be in "{T_THEME_PATH}/images/portal/"
	*/
	public $image_src = '';

	/**
	* module-language file
	* file must be in "language/{$user->lang}/mods/portal/"
	*/
		public $language = array(
				'vendor'	=> 'talonos/b3pmchat',
				'file'	=> 'common',
	);


	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \dmzx\mchat\core\functions */
	protected $functions;

	/** @var \dmzx\mchat\core\mchat */
	protected $mchat;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\user */
	protected $user;

	/** @var string */
	protected $php_ext;
	/**
	* 
	*
	* @param \phpbb\config\config $config phpBB config
	* @param \phpbb\template\template $template phpBB template
	* @param \dmzx\mchat\core\functions		$functions
	* @param \dmzx\mchat\core\mchat			$mchat
	* @param \phpbb\controller\helper		$helper
	* @param \phpbb\user					$user
	* @param string							$php_ext
	* @param \phpbb\auth\auth					$auth
	*/

	public function __construct($config, $template, \dmzx\mchat\core\functions $functions, \dmzx\mchat\core\mchat $mchat, \phpbb\controller\helper $helper, \phpbb\user $user, $php_ext)
	{
		$this->config = $config;
		$this->template = $template;
		$this->functions	= $functions;
		$this->mchat		= $mchat;
		$this->helper		= $helper;
		$this->user			= $user;
		$this->php_ext		= $php_ext;
	}


	public function get_template_center($module_id)
	{
		$this->mchat->page_index();
		$this->template->assign_vars(array(
			'S_DISPLAY_MCHAT_PORTAL_PLACEHOLDER'	=> ($this->config['mchat_on_portal']) ? true : false,
		));
		return '@talonos_b3pmchat/mchat_portal.html';
	}
	
	public function get_template_acp($module_id)
	{
	return array(
			'title'	=> 'PORTAL_MCHAT_TITLE',
			'explain' => true,
				'vars'	=> array(
						'legend1'                     => 'PORTAL_MCHAT_TITLE',
						'mchat_on_portal'		=> array('lang' => 'PORTAL_MCHAT_TITLE',	'validate' => 'string', 'type' => 'radio:yes_no',	'explain' => true),
				)
	);
	}

	/**
	* API functions
	*/
	public function install($module_id)
	{
		$this->config->set('mchat_on_portal', 1);
		return true;
	}

	public function uninstall($module_id, $db)
	{

		$this->config->delete('mchat_on_portal');
		return true;
	}
}
