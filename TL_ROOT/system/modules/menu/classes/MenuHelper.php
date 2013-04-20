<?php

/**
 * @copyright  Helmut Schottmüller 2010-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm/menu>
 * @package    menu 
 * @license    LGPL 
 * @filesource
 */

namespace Contao;

/**
 * Class MenuHelper
 *
 * Provide helper methods for the menu extension
 * @copyright  Helmut Schottmüller 2010-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm/menu>
 * @package    Controller
 */

class MenuHelper
{
	public function priceRegexp($strRegexp, $varValue, Widget $objWidget)
	{
		if ($strRegexp == 'price')
		{
			if (!preg_match('/^[0-9]*?\\.{0,1}[0-9]{0,2}$/', $varValue))
			{
				$objWidget->addError(sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_error'], $objWidget->label));
			}
			return true;
		}
		return false;
	}
}


?>