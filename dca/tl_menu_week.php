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
 * Class tl_menu_week
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2010
 * @author     Helmut Schottmüller <http://www.aurealis.de>
 * @package    Controller
 */
class tl_menu_week extends Backend
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
	 * Add the type of input field
	 * @param array
	 * @return string
	 */
	public function listMenus($arrRow)
	{
		$time = time();
		$title = $this->formatDate($arrRow['title'], $arrRow['monday']);

		$result = '
<div class="cte_type published"><strong>' . $title . '</strong></div>
<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h52' : '') . ' block">
<table>' . '
<tr><td>' . $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $arrRow['monday']) . ((strlen($arrRow['mo_suffix'])) ? ' (' . $arrRow['mo_suffix'] . ')' : '') . '</td><td' . (($arrRow['mo_has_alternate_text']) ? ' colspan="2">' : '>') . (($arrRow['mo_has_alternate_text']) ? $arrRow['mo_alternate_text'] : ($this->getMenu($arrRow['mo_menu']) . (($arrRow['mo_has_additional_text']) ? ("<div>".$arrRow['mo_additional_text'].'</div>') : ''))) . '</td>' . (($arrRow['mo_has_alternate_text']) ? '' : ('<td>' . sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($arrRow['mo_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator'])) . '</td>')) . '</tr>
<tr><td>' . $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $arrRow['monday']+1*86400) . ((strlen($arrRow['tu_suffix'])) ? ' (' . $arrRow['tu_suffix'] . ')' : '') . '</td><td' . (($arrRow['tu_has_alternate_text']) ? ' colspan="2">' : '>') . (($arrRow['tu_has_alternate_text']) ? $arrRow['tu_alternate_text'] : ($this->getMenu($arrRow['tu_menu']) . (($arrRow['tu_has_additional_text']) ? ("<div>".$arrRow['tu_additional_text'].'</div>') : ''))) . '</td>' . (($arrRow['tu_has_alternate_text']) ? '' : ('<td>' . sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($arrRow['tu_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator'])) . '</td>')) . '</tr>
<tr><td>' . $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $arrRow['monday']+2*86400) . ((strlen($arrRow['we_suffix'])) ? ' (' . $arrRow['we_suffix'] . ')' : '') . '</td><td' . (($arrRow['we_has_alternate_text']) ? ' colspan="2">' : '>') . (($arrRow['we_has_alternate_text']) ? $arrRow['we_alternate_text'] : ($this->getMenu($arrRow['we_menu']) . (($arrRow['we_has_additional_text']) ? ("<div>".$arrRow['we_additional_text'].'</div>') : ''))) . '</td>' . (($arrRow['we_has_alternate_text']) ? '' : ('<td>' . sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($arrRow['we_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator'])) . '</td>')) . '</tr>
<tr><td>' . $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $arrRow['monday']+3*86400) . ((strlen($arrRow['th_suffix'])) ? ' (' . $arrRow['th_suffix'] . ')' : '') . '</td><td' . (($arrRow['th_has_alternate_text']) ? ' colspan="2">' : '>') . (($arrRow['th_has_alternate_text']) ? $arrRow['th_alternate_text'] : ($this->getMenu($arrRow['th_menu']) . (($arrRow['th_has_additional_text']) ? ("<div>".$arrRow['th_additional_text'].'</div>') : ''))) . '</td>' . (($arrRow['th_has_alternate_text']) ? '' : ('<td>' . sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($arrRow['th_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator'])) . '</td>')) . '</tr>
<tr><td>' . $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $arrRow['monday']+4*86400) . ((strlen($arrRow['fr_suffix'])) ? ' (' . $arrRow['fr_suffix'] . ')' : '') . '</td><td' . (($arrRow['fr_has_alternate_text']) ? ' colspan="2">' : '>') . (($arrRow['fr_has_alternate_text']) ? $arrRow['fr_alternate_text'] : ($this->getMenu($arrRow['fr_menu']) . (($arrRow['fr_has_additional_text']) ? ("<div>".$arrRow['fr_additional_text'].'</div>') : ''))) . '</td>' . (($arrRow['fr_has_alternate_text']) ? '' : ('<td>' . sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($arrRow['fr_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator'])) . '</td>')) . '</tr>
<tr><td>' . $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $arrRow['monday']+5*86400) . ((strlen($arrRow['sa_suffix'])) ? ' (' . $arrRow['sa_suffix'] . ')' : '') . '</td><td' . (($arrRow['sa_has_alternate_text']) ? ' colspan="2">' : '>') . (($arrRow['sa_has_alternate_text']) ? $arrRow['sa_alternate_text'] : ($this->getMenu($arrRow['sa_menu']) . (($arrRow['sa_has_additional_text']) ? ("<div>".$arrRow['sa_additional_text'].'</div>') : ''))) . '</td>' . (($arrRow['sa_has_alternate_text']) ? '' : ('<td>' . sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($arrRow['sa_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator'])) . '</td>')) . '</tr>
<tr><td>' . $this->formatDate($GLOBALS['TL_LANG']['tl_menu_week']['date_format_day'], $arrRow['monday']+6*86400) . ((strlen($arrRow['su_suffix'])) ? ' (' . $arrRow['su_suffix'] . ')' : '') . '</td><td' . (($arrRow['su_has_alternate_text']) ? ' colspan="2">' : '>') . (($arrRow['su_has_alternate_text']) ? $arrRow['su_alternate_text'] : ($this->getMenu($arrRow['su_menu']) . (($arrRow['su_has_additional_text']) ? ("<div>".$arrRow['su_additional_text'].'</div>') : ''))) . '</td>' . (($arrRow['su_has_alternate_text']) ? '' : ('<td>' . sprintf($GLOBALS['TL_LANG']['tl_menu_week']['price_format'], number_format($arrRow['su_price'], 2, $GLOBALS['TL_LANG']['MSC']['decimalSeparator'], $GLOBALS['TL_LANG']['MSC']['thousandsSeparator'])) . '</td>')) . '</tr>
</table></div>' . "\n";
		return $result;
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
	
	public function getMenu($id)
	{
		$arrFound = $this->Database->prepare("SELECT title FROM tl_menu WHERE id = %s")->execute($id)->fetchAssoc();
		return $arrFound['title'];
	}

	public static function getMondayOfActualWeek()
	{
		$now = time();
		$day = date('w', $now);
		$now = $now - ($day-1)*86400;
		return $now - ($now % 86400);
	}

	/**
	 * Check if the monday of the week is really a monday
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function checkIfMondayIsAMonday($varValue, DataContainer $dc)
	{
		$now = $varValue;
		$day = date('w', $now);
		if ($day != 1)
		{
			$now = $now - ($day-1)*86400;
		}
		return $now;
	}

	/**
	 * Autogenerate a event alias if it has not been set yet
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate alias if there is none
		if (!strlen($varValue))
		{
			$autoAlias = true;
			$varValue = sprintf('kw%02d-%02d', date('W', $dc->activeRecord->monday), date('y', $dc->activeRecord->monday));
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_menu_week WHERE alias=?")
								   ->executeUncached($varValue);

		// Check whether the alias exists
		if ($objAlias->numRows > 1 && !$autoAlias)
		{
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
		}

		// Add ID to alias
		if ($objAlias->numRows && $autoAlias)
		{
			$varValue .= '-' . $dc->id;
		}

		return $varValue;
	}

	/**
	 * Automatically set the end time if not set
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function setEmptyEndTime($varValue, DataContainer $dc)
	{
		if ($varValue == '')
		{
			$varValue = $dc->activeRecord->startTime;
		}

		return $varValue;
	}


	/**
	 * Check for a valid recurrence interval
	 * @param mixed
	 * @return mixed
	 */
	public function checkInterval($varValue)
	{
		$varValue = deserialize($varValue);

		if ($varValue['value'] < 1)
		{
			$varValue['value'] = 1;
		}

		return serialize($varValue);
	}


	/**
	 * Adjust start end end time of the event based on date, span, startTime and endTime
	 * @param object
	 */
	public function addNewMenus(DataContainer $dc)
	{
		// Return if there is no active record (override all)
		if (!$dc->activeRecord)
		{
			return;
		}
		$arrSet = array();
		if ($dc->activeRecord->mo_add_new_menu)
		{
			if (strlen($dc->activeRecord->mo_new_menu))
			{
				$menu = $dc->activeRecord->mo_new_menu;
				$arrSet['mo_add_new_menu'] = '';
				$arrSet['mo_new_menu'] = '';
				$arrFound = $this->Database->prepare("SELECT id, title FROM tl_menu WHERE title = %s")->execute($menu)->fetchAssoc();
				if (!is_array($arrFound))
				{
					$stmt = $this->Database->prepare("INSERT INTO tl_menu (title, tstamp) VALUES (?, ?)")
						->execute($menu, time());
					$insertid = $stmt->insertId;
					$arrSet['mo_menu'] = $insertid;
				}
				else
				{
					$arrSet['mo_menu'] = $arrFound['id'];
				}
			}
		}
		if ($dc->activeRecord->mo_has_alternate_text)
		{
			if (strlen($dc->activeRecord->mo_alternate_text))
			{
				$arrSet['mo_add_new_menu'] = '';
				$arrSet['mo_new_menu'] = '';
				$arrSet['mo_menu'] = 0;
			}
		}
		if ($dc->activeRecord->tu_add_new_menu)
		{
			if (strlen($dc->activeRecord->tu_new_menu))
			{
				$menu = $dc->activeRecord->tu_new_menu;
				$arrSet['tu_add_new_menu'] = '';
				$arrSet['tu_new_menu'] = '';
				$arrFound = $this->Database->prepare("SELECT id, title FROM tl_menu WHERE title = %s")->execute($menu)->fetchAssoc();
				if (!is_array($arrFound))
				{
					$stmt = $this->Database->prepare("INSERT INTO tl_menu (title, tstamp) VALUES (?, ?)")
						->execute($menu, time());
					$insertid = $stmt->insertId;
					$arrSet['tu_menu'] = $insertid;
				}
				else
				{
					$arrSet['tu_menu'] = $arrFound['id'];
				}
			}
		}
		if ($dc->activeRecord->tu_has_alternate_text)
		{
			if (strlen($dc->activeRecord->tu_alternate_text))
			{
				$arrSet['tu_add_new_menu'] = '';
				$arrSet['tu_new_menu'] = '';
				$arrSet['tu_menu'] = 0;
			}
		}
		if ($dc->activeRecord->we_add_new_menu)
		{
			if (strlen($dc->activeRecord->we_new_menu))
			{
				$menu = $dc->activeRecord->we_new_menu;
				$arrSet['we_add_new_menu'] = '';
				$arrSet['we_new_menu'] = '';
				$arrFound = $this->Database->prepare("SELECT id, title FROM tl_menu WHERE title = %s")->execute($menu)->fetchAssoc();
				if (!is_array($arrFound))
				{
					$stmt = $this->Database->prepare("INSERT INTO tl_menu (title, tstamp) VALUES (?, ?)")
						->execute($menu, time());
					$insertid = $stmt->insertId;
					$arrSet['we_menu'] = $insertid;
				}
				else
				{
					$arrSet['we_menu'] = $arrFound['id'];
				}
			}
		}
		if ($dc->activeRecord->we_has_alternate_text)
		{
			if (strlen($dc->activeRecord->we_alternate_text))
			{
				$arrSet['we_add_new_menu'] = '';
				$arrSet['we_new_menu'] = '';
				$arrSet['we_menu'] = 0;
			}
		}
		if ($dc->activeRecord->th_add_new_menu)
		{
			if (strlen($dc->activeRecord->th_new_menu))
			{
				$menu = $dc->activeRecord->th_new_menu;
				$arrSet['th_add_new_menu'] = '';
				$arrSet['th_new_menu'] = '';
				$arrFound = $this->Database->prepare("SELECT id, title FROM tl_menu WHERE title = %s")->execute($menu)->fetchAssoc();
				if (!is_array($arrFound))
				{
					$stmt = $this->Database->prepare("INSERT INTO tl_menu (title, tstamp) VALUES (?, ?)")
						->execute($menu, time());
					$insertid = $stmt->insertId;
					$arrSet['th_menu'] = $insertid;
				}
				else
				{
					$arrSet['th_menu'] = $arrFound['id'];
				}
			}
		}
		if ($dc->activeRecord->th_has_alternate_text)
		{
			if (strlen($dc->activeRecord->th_alternate_text))
			{
				$arrSet['th_add_new_menu'] = '';
				$arrSet['th_new_menu'] = '';
				$arrSet['th_menu'] = 0;
			}
		}
		if ($dc->activeRecord->fr_add_new_menu)
		{
			if (strlen($dc->activeRecord->fr_new_menu))
			{
				$menu = $dc->activeRecord->fr_new_menu;
				$arrSet['fr_add_new_menu'] = '';
				$arrSet['fr_new_menu'] = '';
				$arrFound = $this->Database->prepare("SELECT id, title FROM tl_menu WHERE title = %s")->execute($menu)->fetchAssoc();
				if (!is_array($arrFound))
				{
					$stmt = $this->Database->prepare("INSERT INTO tl_menu (title, tstamp) VALUES (?, ?)")
						->execute($menu, time());
					$insertid = $stmt->insertId;
					$arrSet['fr_menu'] = $insertid;
				}
				else
				{
					$arrSet['fr_menu'] = $arrFound['id'];
				}
			}
		}
		if ($dc->activeRecord->fr_has_alternate_text)
		{
			if (strlen($dc->activeRecord->fr_alternate_text))
			{
				$arrSet['fr_add_new_menu'] = '';
				$arrSet['fr_new_menu'] = '';
				$arrSet['fr_menu'] = 0;
			}
		}
		if ($dc->activeRecord->sa_add_new_menu)
		{
			if (strlen($dc->activeRecord->sa_new_menu))
			{
				$menu = $dc->activeRecord->sa_new_menu;
				$arrSet['sa_add_new_menu'] = '';
				$arrSet['sa_new_menu'] = '';
				$arrFound = $this->Database->prepare("SELECT id, title FROM tl_menu WHERE title = %s")->execute($menu)->fetchAssoc();
				if (!is_array($arrFound))
				{
					$stmt = $this->Database->prepare("INSERT INTO tl_menu (title, tstamp) VALUES (?, ?)")
						->execute($menu, time());
					$insertid = $stmt->insertId;
					$arrSet['sa_menu'] = $insertid;
				}
				else
				{
					$arrSet['sa_menu'] = $arrFound['id'];
				}
			}
		}
		if ($dc->activeRecord->sa_has_alternate_text)
		{
			if (strlen($dc->activeRecord->sa_alternate_text))
			{
				$arrSet['sa_add_new_menu'] = '';
				$arrSet['sa_new_menu'] = '';
				$arrSet['sa_menu'] = 0;
			}
		}
		if ($dc->activeRecord->su_add_new_menu)
		{
			if (strlen($dc->activeRecord->su_new_menu))
			{
				$menu = $dc->activeRecord->su_new_menu;
				$arrSet['su_add_new_menu'] = '';
				$arrSet['su_new_menu'] = '';
				$arrFound = $this->Database->prepare("SELECT id, title FROM tl_menu WHERE title = %s")->execute($menu)->fetchAssoc();
				if (!is_array($arrFound))
				{
					$stmt = $this->Database->prepare("INSERT INTO tl_menu (title, tstamp) VALUES (?, ?)")
						->execute($menu, time());
					$insertid = $stmt->insertId;
					$arrSet['su_menu'] = $insertid;
				}
				else
				{
					$arrSet['su_menu'] = $arrFound['id'];
				}
			}
		}
		if ($dc->activeRecord->su_has_alternate_text)
		{
			if (strlen($dc->activeRecord->su_alternate_text))
			{
				$arrSet['su_add_new_menu'] = '';
				$arrSet['su_new_menu'] = '';
				$arrSet['su_menu'] = 0;
			}
		}
		if (count($arrSet))
		{
			$this->Database->prepare("UPDATE tl_menu_week %s WHERE id=?")->set($arrSet)->execute($dc->id);
		}
	}
}

/**
 * Table tl_menu_week
 */
$GLOBALS['TL_DCA']['tl_menu_week'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_menus',
		'enableVersioning'            => true,
		'onsubmit_callback' => array
		(
			array('tl_menu_week', 'addNewMenus'),
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('monday DESC'),
			'headerFields'            => array('title', 'tstamp'),
			'panelLayout'             => 'filter;limit',
			'child_record_callback'   => array('tl_menu_week', 'listMenus')
		),
		'global_operations' => array
		(
			'exportmultiple' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['exportmultiple'],
				'href'                => 'key=multiple',
				'class'               => 'header_export',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="m"'
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_menu_week']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_menu_week']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_menu_week']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_menu_week']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'export' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_menu_week']['export'],
				'href'                => 'key=export',
				'icon'                => 'iconPDF.gif'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_menu_week']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('mo_has_alternate_text', 'mo_add_new_menu', 'tu_has_alternate_text', 'tu_add_new_menu', 'we_has_alternate_text', 'we_add_new_menu', 'th_has_alternate_text', 'th_add_new_menu', 'fr_has_alternate_text', 'fr_add_new_menu', 'sa_has_alternate_text', 'sa_add_new_menu', 'su_has_alternate_text', 'su_add_new_menu','mo_has_additional_text','tu_has_additional_text','we_has_additional_text','th_has_additional_text','fr_has_additional_text','sa_has_additional_text','su_has_additional_text'),
		'default'                     => '{menu_week_legend},monday,alias,title;{monday_legend},mo_suffix,mo_price,mo_menu,mo_add_new_menu,mo_has_alternate_text,mo_has_additional_text;{tuesday_legend},tu_suffix,tu_price,tu_menu,tu_add_new_menu,tu_has_alternate_text,tu_has_additional_text;{wednesday_legend},we_suffix,we_price,we_menu,we_add_new_menu,we_has_alternate_text,we_has_additional_text;{thursday_legend},th_suffix,th_price,th_menu,th_add_new_menu,th_has_alternate_text,th_has_additional_text;{friday_legend},fr_suffix,fr_price,fr_menu,fr_add_new_menu,fr_has_alternate_text,fr_has_additional_text;{saturday_legend},sa_suffix,sa_price,sa_menu,sa_add_new_menu,sa_has_alternate_text,sa_has_additional_text;{sunday_legend},su_suffix,su_price,su_menu,su_add_new_menu,su_has_alternate_text,su_has_additional_text'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'mo_add_new_menu'             => 'mo_new_menu',
		'tu_add_new_menu'             => 'tu_new_menu',
		'we_add_new_menu'             => 'we_new_menu',
		'th_add_new_menu'             => 'th_new_menu',
		'fr_add_new_menu'             => 'fr_new_menu',
		'sa_add_new_menu'             => 'sa_new_menu',
		'su_add_new_menu'             => 'su_new_menu',
		'mo_has_alternate_text'       => 'mo_alternate_text',
		'tu_has_alternate_text'       => 'tu_alternate_text',
		'we_has_alternate_text'       => 'we_alternate_text',
		'th_has_alternate_text'       => 'th_alternate_text',
		'fr_has_alternate_text'       => 'fr_alternate_text',
		'sa_has_alternate_text'       => 'sa_alternate_text',
		'su_has_alternate_text'       => 'su_alternate_text',
		'mo_has_additional_text'      => 'mo_additional_text',
		'tu_has_additional_text'      => 'tu_additional_text',
		'we_has_additional_text'      => 'we_additional_text',
		'th_has_additional_text'      => 'th_additional_text',
		'fr_has_additional_text'      => 'fr_additional_text',
		'sa_has_additional_text'      => 'sa_additional_text',
		'su_has_additional_text'      => 'su_additional_text'
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['title'],
			'exclude'                 => true,
			'default'                 => &$GLOBALS['TL_LANG']['tl_menu_week']['title_default'],
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class' => 'long')
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alias'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_menu_week', 'generateAlias')
			)
		),
		'monday' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['monday'],
			'default'                 => tl_menu_week::getMondayOfActualWeek(),
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 8,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
			'save_callback' => array
			(
				array('tl_menu_week', 'checkIfMondayIsAMonday')
			)
		),
		'mo_has_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'mo_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'mo_add_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'mo_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['new_menu'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'mo_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['menu'],
			'exclude'                 => true,
			'filter'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_menu.title',
			'eval'                    => array('mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'long')
		),
		'mo_price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'price', 'size'=>10, 'tl_class'=>'w50')
		),
		'tu_has_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'tu_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'tu_add_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'tu_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['new_menu'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'tu_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['menu'],
			'exclude'                 => true,
			'filter'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_menu.title',
			'eval'                    => array('mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'long')
		),
		'tu_price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'price', 'size'=>10, 'tl_class'=>'w50')
		),
		'we_has_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'we_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'we_add_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'we_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['new_menu'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'we_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['menu'],
			'exclude'                 => true,
			'filter'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_menu.title',
			'eval'                    => array('mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'long')
		),
		'we_price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'price', 'size'=>10, 'tl_class'=>'w50')
		),
		'th_has_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'th_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'th_add_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'th_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['new_menu'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'th_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['menu'],
			'exclude'                 => true,
			'filter'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_menu.title',
			'eval'                    => array('mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'long')
		),
		'th_price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'price', 'size'=>10, 'tl_class'=>'w50')
		),
		'fr_has_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'fr_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'fr_add_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'fr_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['new_menu'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'fr_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['menu'],
			'exclude'                 => true,
			'filter'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_menu.title',
			'eval'                    => array('mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'long')
		),
		'fr_price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'price', 'size'=>10, 'tl_class'=>'w50')
		),
		'sa_has_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'sa_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'sa_add_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'sa_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['new_menu'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'sa_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['menu'],
			'exclude'                 => true,
			'filter'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_menu.title',
			'eval'                    => array('mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'long')
		),
		'sa_price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'price', 'size'=>10, 'tl_class'=>'w50')
		),
		'su_has_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'su_alternate_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'su_add_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'su_new_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['new_menu'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'su_menu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['menu'],
			'exclude'                 => true,
			'filter'                  => false,
			'sorting'                 => false,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_menu.title',
			'eval'                    => array('mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'long')
		),
		'su_price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'price', 'size'=>10, 'tl_class'=>'w50')
		),
		'mo_has_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'mo_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['additional_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'tu_has_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'tu_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['additional_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'we_has_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'we_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['additional_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'th_has_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'th_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['additional_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'fr_has_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'fr_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['additional_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'sa_has_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'sa_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['additional_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'su_has_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'su_additional_text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['additional_text'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'style'=>'height:60px;', 'allowHtml'=>true)
		),
		'mo_suffix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['suffix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>80, 'tl_class'=>'w50')
		),
		'tu_suffix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['suffix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>80, 'tl_class'=>'w50')
		),
		'we_suffix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['suffix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>80, 'tl_class'=>'w50')
		),
		'th_suffix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['suffix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>80, 'tl_class'=>'w50')
		),
		'fr_suffix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['suffix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>80, 'tl_class'=>'w50')
		),
		'sa_suffix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['suffix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>80, 'tl_class'=>'w50')
		),
		'su_suffix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_menu_week']['suffix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>80, 'tl_class'=>'w50')
		)
	)
);

?>