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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_menu_week']['title']              = array('Title', 'Please enter the lunch offer title');
$GLOBALS['TL_LANG']['tl_menu_week']['alias']              = array('Lunch offer alias', 'The lunch offer alias is a unique reference to the lunch offer which can be called instead of its numeric ID');
$GLOBALS['TL_LANG']['tl_menu_week']['tstamp']             = array('Revision date', 'Date and time of the latest revision');
$GLOBALS['TL_LANG']['tl_menu_week']['monday']             = array('Date of week\'s monday', 'Date of the monday that is the starting monday of the lunch offer week');
$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'] = array('Use alternative text', 'Check this, if you want to use an alternative text instead of the dish and the price');
$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text']     = array('Alternative text', 'Alternative text that will be used instead of the dish and the price, e.g. \'Closed on mondays\'');
$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'] = array('Add additional text', 'Check this, if you want to add some additional text to the dish title');
$GLOBALS['TL_LANG']['tl_menu_week']['additional_text']    = array('Additional text', 'Additional text used with the dish title (e.g. "Closed for public from 6 p.m.")');
$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu']       = array('Add as new dish', 'Check this, if you want to add a new dish to the database instead of selecting an existing dish');
$GLOBALS['TL_LANG']['tl_menu_week']['new_menu']           = array('New dish', 'Name of the new dish');
$GLOBALS['TL_LANG']['tl_menu_week']['menu']               = array('Dish', 'Select a dish from the list of available dishes');
$GLOBALS['TL_LANG']['tl_menu_week']['suffix']             = array('Appendix', 'Add an appendix for the day, e.g. "Easter Monday"');
$GLOBALS['TL_LANG']['tl_menu_week']['price']              = array('Price', 'Enter a price for the dish');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_menu_week']['menu_week_legend'] = 'Lunch offer title';
$GLOBALS['TL_LANG']['tl_menu_week']['monday_legend']    = 'Monday';
$GLOBALS['TL_LANG']['tl_menu_week']['tuesday_legend']   = 'Tuesday';
$GLOBALS['TL_LANG']['tl_menu_week']['wednesday_legend'] = 'Wednesday';
$GLOBALS['TL_LANG']['tl_menu_week']['thursday_legend']  = 'Thursday';
$GLOBALS['TL_LANG']['tl_menu_week']['friday_legend']    = 'Friday';
$GLOBALS['TL_LANG']['tl_menu_week']['saturday_legend']  = 'Saturday';
$GLOBALS['TL_LANG']['tl_menu_week']['sunday_legend']    = 'Sunday';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_menu_week']['new']        = array('New lunch offer', 'Create a new lunch offer');
$GLOBALS['TL_LANG']['tl_menu_week']['show']       = array('Lunch offer details', 'Show the details of lunch offer ID %s');
$GLOBALS['TL_LANG']['tl_menu_week']['edit']       = array('Edit lunch offer', 'Edit lunch offer ID %s');
$GLOBALS['TL_LANG']['tl_menu_week']['copy']       = array('Duplicate lunch offer', 'Duplicate lunch offer ID %s');
$GLOBALS['TL_LANG']['tl_menu_week']['delete']     = array('Delete lunch offer', 'Delete lunch offer ID %s');
$GLOBALS['TL_LANG']['tl_menu_week']['export']     = array('Export lunch offer', 'Export lunch offer ID %s');

/**
 * Special
 */
$GLOBALS['TL_LANG']['tl_menu_week']['title_default']          = 'Lunch offer for calendar week {{W}}, {{Y}}';
$GLOBALS['TL_LANG']['tl_menu_week']['price_format']           = '€%s';
$GLOBALS['TL_LANG']['tl_menu_week']['price_error']            = 'Field %s should be a valid price.';
$GLOBALS['TL_LANG']['tl_menu_week']['date_format_day']        = '{{l}}, {{m}}-{{d}}';
$GLOBALS['TL_LANG']['tl_menu_week']['export_to_pdf']          = 'Export to PDF';

?>