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
$GLOBALS['TL_LANG']['tl_menu_week']['title']              = array('Titel', 'Bitte geben Sie den Wochenmenü-Titel ein.');
$GLOBALS['TL_LANG']['tl_menu_week']['alias']              = array('Wochenmenü-Alias', 'Hier können Sie einen eindeutigen Kurzbezeichner eingeben.');
$GLOBALS['TL_LANG']['tl_menu_week']['tstamp']             = array('Änderungsdatum', 'Datum und Uhrzeit der letzten Änderung');
$GLOBALS['TL_LANG']['tl_menu_week']['monday']             = array('Datum des Wochen-Montags', 'Datum des Montags der Woche, für die das Wochenmenü erstellt werden soll');
$GLOBALS['TL_LANG']['tl_menu_week']['has_alternate_text'] = array('Alternativen Text verwenden', 'Gibt an, ob statt des Gerichts und des Preises ein alternativer Text verwendet werden soll');
$GLOBALS['TL_LANG']['tl_menu_week']['alternate_text']     = array('Alternativer Text', 'Alternativer Text, der das Gericht und den Preis ersetzt');
$GLOBALS['TL_LANG']['tl_menu_week']['has_additional_text'] = array('Zusätzlichen Text hinzufügen', 'Gibt an, ob zusätzlich zum Gericht noch ein weiterer Text verwendet werden soll');
$GLOBALS['TL_LANG']['tl_menu_week']['additional_text']    = array('Zusätzlicher Text', 'Zusätzlicher Text, der mit dem Gericht angezeigt werden soll (z.B. "Ab 16 Uhr geschlossene Gesellschaft")');
$GLOBALS['TL_LANG']['tl_menu_week']['add_new_menu']       = array('Als neues Gericht hinzufügen', 'Gibt an, ob statt eines bestehenden Gerichts ein neues Gericht hinzugefügt werden soll');
$GLOBALS['TL_LANG']['tl_menu_week']['new_menu']           = array('Neues Gericht', 'Name des neuen Gerichts');
$GLOBALS['TL_LANG']['tl_menu_week']['menu']               = array('Gericht', 'Wählen Sie ein bestehendes Gericht aus der Liste der verfügbaren Gerichte aus');
$GLOBALS['TL_LANG']['tl_menu_week']['suffix']             = array('Zusatz', 'Geben Sie einen Zusatz ein, der an den Tag angehängt wird (z.B. "Ostersonntag")');
$GLOBALS['TL_LANG']['tl_menu_week']['price']              = array('Preis', 'Preis des Gerichts');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_menu_week']['menu_week_legend'] = 'Wochenmenü-Titel';
$GLOBALS['TL_LANG']['tl_menu_week']['monday_legend']    = 'Montag';
$GLOBALS['TL_LANG']['tl_menu_week']['tuesday_legend']   = 'Dienstag';
$GLOBALS['TL_LANG']['tl_menu_week']['wednesday_legend'] = 'Mittwoch';
$GLOBALS['TL_LANG']['tl_menu_week']['thursday_legend']  = 'Donnerstag';
$GLOBALS['TL_LANG']['tl_menu_week']['friday_legend']    = 'Freitag';
$GLOBALS['TL_LANG']['tl_menu_week']['saturday_legend']  = 'Samstag';
$GLOBALS['TL_LANG']['tl_menu_week']['sunday_legend']    = 'Sonntag';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_menu_week']['new']        = array('Neues Wochenmenü', 'Ein neues Wochenmenü erstellen');
$GLOBALS['TL_LANG']['tl_menu_week']['show']       = array('Wochenmenüdetails', 'Details des Wochenmenüs ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_menu_week']['edit']       = array('Wochenmenü bearbeiten', 'Wochenmenü ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_menu_week']['editheader'] = array('Wochenmenü-Einstellungen bearbeiten', 'Einstellungen des Wochenmenüs ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_menu_week']['copy']       = array('Wochenmenü duplizieren', 'Wochenmenü ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_menu_week']['delete']     = array('Wochenmenü löschen', 'Wochenmenü ID %s löschen');
$GLOBALS['TL_LANG']['tl_menu_week']['export']     = array('Wochenmenü exportieren', 'Wochenmenü ID %s exportieren');

/**
 * Special
 */
$GLOBALS['TL_LANG']['tl_menu_week']['title_default']          = 'Wochenspeisenplan für die {{W}}. Kalenderwoche {{Y}}';
$GLOBALS['TL_LANG']['tl_menu_week']['price_format']           = '%s€';
$GLOBALS['TL_LANG']['tl_menu_week']['price_error']            = 'Feld %s muss einen gültigen Preis beinhalten.';
$GLOBALS['TL_LANG']['tl_menu_week']['date_format_day']        = '{{l}}, {{d}}.{{m}}.';
$GLOBALS['TL_LANG']['tl_menu_week']['export_to_pdf']          = 'Als PDF exportieren';

?>