<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Menu
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\MenuExport'  => 'system/modules/menu/classes/MenuExport.php',
	'Contao\MenuHelper'  => 'system/modules/menu/classes/MenuHelper.php',
	'Contao\WeeklyMenus' => 'system/modules/menu/classes/WeeklyMenus.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_menu_select_weekly' => 'system/modules/menu/templates',
	'menu_weekly'           => 'system/modules/menu/templates',
	'menu_weekly_pdf'       => 'system/modules/menu/templates',
));
