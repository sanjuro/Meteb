<?php
/**
 * Meteb PDF Class
 * 
 * This class will handle the PDF generation
 * 
 * @package    meteb
 * @subpackage lib
 * @author     Shadley Wentzel <shad6ster@gmail.com>
 * @version    GIT
 */


require_once sfConfig::get('sf_lib_dir').'/vendor/dompdf/dompdf_config.inc.php';

class metebPDF extends DOMPDF{

	public $PDF;
	public $HTML;
	public $TemplatePageName;
	public $TemplateTitle;
	public $PDFNumber;
	public $PDFDate;
	public $PDFContent;



	/**
	 * Function to create a Quote, this uses the partial for a Quote document
	 * gets al the needed variables and generates a PDF
	 *
	 * @param string  $PdfObject The Quote Object to generate
	 * @param unknown $PDFContent  Quote content for PDF
	 * @return boolean if any values are found it returns true
	 */
	public function CreateQuote($PdfObject, $PDFContent) {

		$pdfobjectNumber = $PdfObject->getId();		

		$this->setTemplatePageName('Metropolitan Life Quotation');
		$this->setTemplateTitle('');
		$this->setPDFNumber($pdfobjectNumber);
		$this->setPDFDate( $PdfObject->getCreatedAt());
		$this->setPDFContent($PDFContent);
		
		return $this->renderTemplate( );

	}


	/**
	 * Function to render the basic template for the pdf
	 *
	 *
	 * @return
	 */
	private function renderTemplate(  ) {

		$TemplatePageName = $this->TemplatePageName;
		$TemplateTitle = $this->TemplateTitle;
		$PDFNumber = $this->PDFNumber;
		$PDFDate = new DateTime($this->PDFDate);
		$PDFContent = $this->PDFContent;

		$image = 'quotebackground';


		$html = '<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>'.$TemplatePageName.'</title>

		<style type="text/css">
			body { color: #555555; font-family: "Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;  margin: 0; padding: 0;sans-serif; background-color: #002E67; background-image: url(\'/images/pdf/page_background.gif\'); background-repeat: repeat-x; }
			table { font-size: 12px; }
			h1 { color: #000033; font-size: 30px; }
			h2 { margin: 0 0 0 0; color: #000000; font-size: 20px; font-weight: normal; }
			h3, h4, h5 { margin: 0 0 7px 0; }
			h3 { color: #E31818; font-size: 18px; }
			h4 { font-size: 14px; }
			h5 { font-size: 12px; margin: 0 0 10px 0; color: #006699; }
			p { font-size:12px; margin: 0 0 12px 0; line-height: 15px; }
			hr { height: 1px; line-height: 1px; border: none; border-top: 1px solid #dde2e6; margin: 5px 20px; }
			ul, li { margin: 0 0 0 0; padding: 0 0 0 0; }
			li { line-height: 15px; }
			.bulletLarge { padding: 0 0 0 3px; }
			.bulletLarge li { list-style-type: none; background-image: url(\'images/pdf/bulletLarge.png\'); background-repeat: no-repeat; background-position: left 5px; padding: 0 0 4px 15px; }
			.bulletLarge li a { color: #3c3c3c; }
			#headerwrapper { background-image: url(\'/images/pdf/page_background.gif\'); background-repeat: repeat-x;  background-position: left top; height: 112px;   }
			#header {  margin: 0 auto; width: 100%; padding: 0 30px 10px 30px; height: 125px;}
			#main{ background-color: #FFF;border: 1px solid #DDE2E6; margin: 20px auto; width: 750px;}
			#info {   height: 30px; padding: 20px;}
			#pdfinfo{ padding: 20px; }
			#pdfnumber { float: left; color: #000000; font-size: 20px;}
			#pdfdate { width: 200px; text-align: right;}
			#clientinfo {  font-size: 12px; padding: 20px 30px 20px 20px; }
			#content { padding: 20px; }
		</style>
	</head>

	<body>
		<div id="headerwrapper">
			<div id="header">
				<a href="http://www.ebannuities.co.za"><img src="images/pdf/quotebackground.jpg" alt="Metropolitan Employee Benefits" border="0"></a>
			</div>
		</div>
		<div id="main">
			<div id="pdfinfo">
				<div style="float: right; text-align: right;">
					<font id="date" >'.$PDFDate->format('d F Y').'</font>
					<br>
					<font id="vatno" class="lighter">VAT Reg. No. '.sfConfig::get('app_vat_number').'</font>
				</div>
				<div id="pdfnumber" style="float: right;">Gross Annuity Quote '.(!empty($PDFNumber)?'No. '.$PDFNumber:'').'</div>
			</div>';
					
			$html .='<div id="content">
			'.$PDFContent.'
			<div class="clearer"></div>
			</div>

			<div id="footer"></div>
	</body>';

		$this->HTML = $html;
		
	}



	/**
	 *
	 *
	 * @param unknown $templatepagename
	 */
	public function setTemplatePageName($templatepagename) {
		$this->TemplatePageName = $templatepagename;
	}



	/**
	 *
	 *
	 * @param unknown $tempaltetitle
	 */
	public function setTemplateTitle($tempaltetitle) {
		$this->TemplateTitle = $tempaltetitle;
	}



	/**
	 *
	 *
	 * @param unknown $pdfnumber
	 */
	public function setPDFNumber($pdfnumber) {
		$this->PDFNumber = $pdfnumber;
	}



	/**
	 *
	 *
	 * @param unknown $pdfdate
	 */
	public function setPDFDate($pdfdate) {
		$this->PDFDate = $pdfdate;
	}



	/**
	 *
	 *
	 * @param unknown $pdfcontent
	 */
	public function setPDFContent($pdfcontent) {
		$this->PDFContent = $pdfcontent;
	}


}