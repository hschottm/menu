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
 * @copyright  2010 Helmut Schottmüller 
 * @author     Helmut Schottmüller 
 * @package    menu 
 * @license    LGPL 
 * @filesource
 */

/**
 * Class WeeklyMenus 
 *
 * @copyright  2010 Helmut Schottmüller 
 * @author     Helmut Schottmüller 
 * @package    Controller
 */
class WeeklyMenus extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'menu_weekly';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### WEEKLY MENUS ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		global $objPage;

		$this->loadLanguageFile('tl_menu_week');

		$now = time();
		$day = date('w', $now);
		$monday = $now - ($day-1)*86400;
		$monday = $monday - ($monday % 86400);
		$from = $monday - $this->prev_weeks * 86400 * 7;
		$to = $monday + $this->next_weeks * 86400 * 7;

		// Get current event
		$arrWeeks = $this->Database->prepare("SELECT tl_menu_week.* FROM tl_menu_week WHERE pid = ? AND monday >= ? AND monday <= ? ORDER BY monday ASC")
			->execute($this->menu_collection, $from, $to)
			->fetchAllAssoc();
		foreach ($arrWeeks as $idx => $week)
		{
			$arrWeeks[$idx]['title'] = $this->formatDate($week['title'], $week['monday']);
			$days = array();
			for ($i = 0; $i < 7; $i++)
			{
				array_push($days, $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $week['monday']+$i*86400));
			}
			$arrWeeks[$idx]['mo_price'] = sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($week['mo_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator']));
			$arrWeeks[$idx]['tu_price'] = sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($week['tu_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator']));
			$arrWeeks[$idx]['we_price'] = sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($week['we_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator']));
			$arrWeeks[$idx]['th_price'] = sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($week['th_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator']));
			$arrWeeks[$idx]['fr_price'] = sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($week['fr_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator']));
			$arrWeeks[$idx]['sa_price'] = sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($week['sa_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator']));
			$arrWeeks[$idx]['su_price'] = sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($week['su_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator']));
			$arrWeeks[$idx]['mo_menu'] = $this->getMenu($week['mo_menu']);
			$arrWeeks[$idx]['tu_menu'] = $this->getMenu($week['tu_menu']);
			$arrWeeks[$idx]['we_menu'] = $this->getMenu($week['we_menu']);
			$arrWeeks[$idx]['th_menu'] = $this->getMenu($week['th_menu']);
			$arrWeeks[$idx]['fr_menu'] = $this->getMenu($week['fr_menu']);
			$arrWeeks[$idx]['sa_menu'] = $this->getMenu($week['sa_menu']);
			$arrWeeks[$idx]['su_menu'] = $this->getMenu($week['su_menu']);
			$arrWeeks[$idx]['days'] = $days;
		}
		$this->Template->weeks = $arrWeeks;
	}

	protected function getMenu($id)
	{
		$arrFound = $this->Database->prepare("SELECT title FROM tl_menu WHERE id = %s")->execute($id)->fetchAssoc();
		return $arrFound['title'];
	}

	protected function formatDate($format, $timestamp)
	{
		foreach (range('A','Z') as $i)
		{
			switch ($i)
			{
				case 'F':
					$format = str_replace('{{' . $i . '}}', $GLOBALS['TL_LANG']['MONTHS'][date('n', $timestamp)], $format);
					break;
				case 'M':
					$format = str_replace('{{' . $i . '}}', substr($GLOBALS['TL_LANG']['MONTHS'][date('n', $timestamp)], 0, 3), $format);
					break;
				case 'D':
					$format = str_replace('{{' . $i . '}}', substr($GLOBALS['TL_LANG']['DAYS'][date('w', $timestamp)], 0, 3), $format);
					break;
				default:
					$format = str_replace('{{' . $i . '}}', date($i, $timestamp), $format);
					break;
			}
		}
		foreach (range('a','z') as $i)
		{
			switch ($i)
			{
				case 'l':
					$format = str_replace('{{' . $i . '}}', $GLOBALS['TL_LANG']['DAYS'][date('w', $timestamp)], $format);
					break;
				default:
					$format = str_replace('{{' . $i . '}}', date($i, $timestamp), $format);
					break;
			}
		}
		return $format;
	}
}

?>