<?php

/**
 * @copyright  Helmut Schottmüller 2010-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm/menu>
 * @package    menu 
 * @license    LGPL 
 * @filesource
 */

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['weeklymenus'] = '{title_legend},name,headline,type;{config_legend},menu_collection,next_weeks,prev_weeks;{template_legend:hide},menu_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['menu_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['menu_template'],
	'default'                 => 'menu_weekly',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_weeklymenus', 'getMenuTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['next_weeks'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['next_weeks'],
	'default'                 => 3,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "int(10) unsigned NOT NULL default '3'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['prev_weeks'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['prev_weeks'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "int(10) unsigned NOT NULL default '0"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['menu_collection'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['menu_collection'],
	'exclude'                 => true,
	'filter'                  => true,
	'sorting'                 => true,
	'flag'                    => 1,
	'inputType'               => 'select',
	'foreignKey'              => 'tl_menus.title',
	'eval'                    => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'long'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

/**
 * Class tl_module_weeklymenus
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2010-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm/menu>
 * @package    Controller
 */
class tl_module_weeklymenus extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Return all calendar templates as array
	 * @param object
	 * @return array
	 */
	public function getMenuTemplates(DataContainer $dc)
	{
		return $this->getTemplateGroup('menu_weekly', $dc->activeRecord->pid);
	}
}

?>