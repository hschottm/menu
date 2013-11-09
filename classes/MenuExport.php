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
 * Class MenuExport
 *
 * Provide methods to handle the PDF export of weekly menus
 * @copyright  Helmut Schottmüller 2010-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm/menu>
 * @package    Controller
 */
class MenuExport extends Backend
{
	/**
	 * Print a menu as PDF and stream it to the browser
	 * @param object
	 */
	public function exportMenuToPDF(DataContainer $dc, $id = null)
	{
		if (\Input::get('key') != 'export' && \Input::get('key') != 'multiple')
		{
			return '';
		}

		if (is_array($id))
		{
			$arrWeeks = $this->Database->prepare("SELECT * FROM tl_menu_week WHERE id IN (" . join($id, ',') . ") ORDER BY monday")->execute()->fetchAllAssoc();
		}
		else
		{
			$arrWeeks = $this->Database->prepare("SELECT * FROM tl_menu_week WHERE id = %s")->execute($dc->id)->fetchAllAssoc();
		}

		$strArticle = $this->getMenuAsHTML($arrWeeks);
		$strArticle = $this->replaceInsertTags($strArticle);
		$strArticle = html_entity_decode($strArticle, ENT_QUOTES, $GLOBALS['TL_CONFIG']['characterSet']);
		$strArticle = $this->convertRelativeUrls($strArticle, '', true);

		// Remove form elements and JavaScript links
		$arrSearch = array
		(
			'@<form.*</form>@Us',
			'@<a [^>]*href="[^"]*javascript:[^>]+>.*</a>@Us'
		);

		$strArticle = preg_replace($arrSearch, '', $strArticle);

		// Handle line breaks in preformatted text
		$strArticle = preg_replace_callback('@(<pre.*</pre>)@Us', 'nl2br_callback', $strArticle);

		// Default PDF export using TCPDF
		$arrSearch = array
		(
			'@<span style="text-decoration: ?underline;?">(.*)</span>@Us',
			'@(<img[^>]+>)@',
			'@(<div[^>]+block[^>]+>)@',
			'@[\n\r\t]+@',
			'@<br /><div class="mod_article@',
			'@href="([^"]+)(pdf=[0-9]*(&|&amp;)?)([^"]*)"@'
		);

		$arrReplace = array
		(
			'<u>$1</u>',
			'<br />$1',
			'<br />$1',
			' ',
			'<div class="mod_article',
			'href="$1$4"'
		);

		$strArticle = preg_replace($arrSearch, $arrReplace, $strArticle);

		// TCPDF configuration
		$l['a_meta_dir'] = 'ltr';
		$l['a_meta_charset'] = $GLOBALS['TL_CONFIG']['characterSet'];
		$l['a_meta_language'] = $GLOBALS['TL_LANGUAGE'];
		$l['w_page'] = 'page';

		// Include library
		require_once(TL_ROOT . '/system/config/tcpdf.php');
		require_once(TL_ROOT . '/system/modules/core/vendor/tcpdf/tcpdf.php');

		// Create new PDF document
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

		// Set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(PDF_AUTHOR);
		$menutitle = $this->formatDate($arrWeeks[0]['title'], $arrWeeks[0]['monday']);
		$pdf->SetTitle($menutitle);
		$pdf->SetSubject($menutitle);

		// Prevent font subsetting (huge speed improvement)
		$pdf->setFontSubsetting(false);

		// Remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$tagvs = array(
			'p' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)),
			'h1' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)),
			'h2' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)),
			'div' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0))
		);
		$pdf->setHtmlVSpace($tagvs);
				// Set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);

		// Set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// Set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// Set some language-dependent strings
		$pdf->setLanguageArray($l);

		// Initialize document and add a page
		$pdf->AliasNbPages();
		$pdf->AddPage();

		// Set font
		$pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);

		// Write the HTML content
		$pdf->writeHTML($strArticle, true, 0, true, 0);

		// Close and output PDF document
		$pdf->lastPage();
		$pdf->Output(standardize(ampersand($menutitle, false)) . '.pdf', 'D');

		// Stop script execution
		exit;
	}

	/**
	 * Generate module
	 */
	protected function getMenuAsHTML($arrWeeks)
	{
		global $objPage;

		$this->loadLanguageFile('tl_menu_week');

		$tpl = new \FrontendTemplate('menu_weekly_pdf');

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
		$tpl->weeks = $arrWeeks;
		return $tpl->parse();
	}

	protected function getMenu($id)
	{
		$arrFound = $this->Database->prepare("SELECT title FROM tl_menu WHERE id = %s")->execute($id)->fetchAssoc();
		return $arrFound['title'];
	}

	protected function getLunchOfferCollection($id)
	{
		$arrFound = $this->Database->prepare("SELECT title FROM tl_menus WHERE id = %s")->execute($id)->fetchAssoc();
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

	public function selectMultiple(DataContainer $dc)
	{
		if (\Input::get('key') != 'multiple')
		{
			return '';
		}
		$postdata = \Input::post('men');
		if (is_array($postdata))
		{
			$this->exportMenuToPDF($dc, $postdata);
			$this->redirect(\Environment::get('script') . '?do=' . \Input::get('do') . '&amp;table=tl_menu_week&amp;id='.\Input::get('id'));
		}
		$this->loadLanguageFile('tl_menu_week');
		$return = "";
		$filter = $this->Session->get('filter');
		$menufilter = $filter['tl_menu_week_' . \Input::get('id')]['limit'];
		$limit = '';
		if (strlen($menufilter) && strcmp($menufilter, 'all') != 0)
		{
			$limit = ' LIMIT ' . $menufilter;
		}
		$objMenu = $this->Database->prepare("SELECT * FROM tl_menu_week WHERE pid = ? ORDER BY monday DESC$limit")
			->execute(\Input::get('id'));
		$data = array();
		$abs_question_no = 0;

		while ($row = $objMenu->fetchAssoc())
		{
			array_push($data, array(
				'title' => specialchars($this->formatDate($row['title'], $row['monday'])),
				'id' => $row['id']
			));
		}
		$this->Template = new \BackendTemplate('be_menu_select_weekly');
		$this->Template->back = $GLOBALS['TL_LANG']['MSC']['goBack'];
		$this->Template->hrefBack = \Environment::get('script') . '?do=' . \Input::get('do') . '&amp;table=tl_menu_week&amp;id='.\Input::get('id');
		$this->Template->action = \Environment::get('script') . '?do=' . \Input::get('do') . '&amp;table=tl_menu_week&amp;id='.\Input::get('id') . '&amp;key=multiple';
		$buttons = array(
			'<input type="submit" name="export" id="export" class="tl_submit" accesskey="e" value="' . $GLOBALS['TL_LANG']['tl_menu_week']['export_to_pdf'] . '" />'
		);
		$this->Template->buttons = $buttons;
		$this->Template->lngSelectAll = $GLOBALS['TL_LANG']['MSC']['selectAll'];
		$this->Template->heading = $this->getLunchOfferCollection(\Input::get('id'));
		$this->Template->data = $data;
		return $this->Template->parse();
	}
	
}