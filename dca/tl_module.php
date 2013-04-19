<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Helmut Schottmüller 2010
 * @author     Helmut Schottmüller <http://www.aurealis.de>
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
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['next_weeks'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['next_weeks'],
	'default'                 => 3,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['prev_weeks'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['prev_weeks'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
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
	'eval'                    => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'long')
);

/**
 * Class tl_module_weeklymenus
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2010
 * @author     Helmut Schottmüller <http://www.aurealis.de>
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