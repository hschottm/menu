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
$GLOBALS['TL_LANG']['tl_menus']['title']          = array('Titel', 'Bitte geben Sie den Menüplan-Titel ein.');
$GLOBALS['TL_LANG']['tl_menus']['alias']          = array('Menüplan-Alias', 'Hier können Sie einen eindeutigen Kurzbezeichner eingeben.');
$GLOBALS['TL_LANG']['tl_menus']['description']    = array('Menüplan-Beschreibung', 'Bitte geben Sie eine kurze Beschreibung des Menüplans ein.');
$GLOBALS['TL_LANG']['tl_menus']['tstamp']         = array('Änderungsdatum', 'Datum und Uhrzeit der letzten Änderung');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_menus']['title_legend']     = 'Menüplan-Titel';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_menus']['new']        = array('Neuer Menüplan', 'Einen neuen Menüplan erstellen');
$GLOBALS['TL_LANG']['tl_menus']['show']       = array('Menüplandetails', 'Details des Menüplans ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_menus']['edit']       = array('Menüplan bearbeiten', 'Menüplan ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_menus']['editheader'] = array('Menüplan-Einstellungen bearbeiten', 'Einstellungen des Menüplans ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_menus']['copy']       = array('Menüplan duplizieren', 'Menüplan ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_menus']['delete']     = array('Menüplan löschen', 'Menüplan ID %s löschen');

?>