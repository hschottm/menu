<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * @copyright  Helmut Schottmüller 2011
 * @author     Helmut Schottmüller <contao@aurealis.de>
 * @package    menu
 * @license    LGPL
 */

/**
 * Class MenuHelper
 *
 * Provide helper methods for the menu extension
 * @copyright  Helmut Schottmüller 2011
 * @author     Helmut Schottmüller <contao@aurealis.de>
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