<?php
/**
 * This class will be used to generate pdfs of the system
 *
 * @package default
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
	public $Group;
	public $TopLevelGroup;
	public $PaymentReference;	
	public $YourReference;	



	/**
	 * Function to create a Quote
	 *
	 *
	 *
	 * @param string  $PdfObject Template name
	 * @param unknown $items     (optional)
	 * @return boolean if any values are found it returns true
	 */
	public function CreateQuote($PdfObject, $items = '') {
		$pdfobjectNumber  = $PdfObject->getId();
	
		$subtotal = $PdfObject->getSubtotal();

		$vat = $PdfObject->getVat();

		$sendbox = $PdfObject->getSendbox();

		$dvdboxtotal = 0.00;

		$total = $PdfObject->getTotal();		

		$group = $PdfObject->getGroup();
		$toplevelgroup = GroupPeer::getToplevelgroup($group);

		if (empty($quoteitems)) {
			$items = $PdfObject->getQuoteitems();
		}

		$QuoteDuration = $PdfObject->getUpdatetype();
		
	    /**
	     *  PDF Items
	     */

		switch ($PdfObject->getTypeid()) {
		case 2;
        		$PDFContent = '';

        		$PDFContent .=''.
        			'<table id="invoiceLines" class="innerTable">
               <tr>
              	<th width="240px" align="left">'.__('Product').'</th>
              	<th width="80px" align="center">'.__('Type').'</th>
              	<th width="70px" align="center">'.__('Duration').'</th>
              	<th width="70px" align="center">'.($PdfObject->getTypeid() == 2?__('New Quantity'):__('Quantity')).'</th>
              	<th width="80px" align="center">'.__('Discount').'</th>
              	<th width="150px" align="right">'.__('Price').'</th>
               </tr>';	
		
				foreach ($items as $item) {
					
		     	$c = new Criteria();
			    $c->add(LicensePeer::USERNAME, $item->getUsername());
			    $c->add(LicensePeer::PASSWORD, $item->getPassword());
			    $c->add(LicensePeer::LICENSESTATUSID, 1);
			    $licenseToRenew = LicensePeer::doSelectOne($c);
				
				$updatetype = '';

				if (!in_array($item->getDiscountid(), array(1, 2, 3, 4)))
					$updatetype = '';
				else
					$updatetype = $item->getUpdatetypeid();

			    
				switch ($updatetype) {
					case 1:
						$updatetype = __('1 year');
						break;
					case 2:
						$updatetype = __('2 years');
						break;
					case 6:
						$updatetype = date('d/m/y', $licenseToRenew->getExpiration());
						break;
					default:
						$updatetype = date('d/m/y', $item->getDiscount()->getLicenseexpiration()) ;
						break;
				}
				
				$discount = number_format($item->getDiscount()->getPercent(), 2, '.', '');
				
        		if($discount > 0){
        		    $discountHeader = '<th width="80px" align="center">'.__('Discount').'</th>';
                    $discountBody = '<td align="center">'.$discount.'%</td>';        		
        		}else{        		    
        		    $discountHeader = '<th width="80px" align="center"></th>';
                    $discountBody = '<td align="center"></td>';
        		}
			
					
				$PDFContent .='<tr><td class="product" align="left">'.$item->getProduct()->getTitle().'</td><td class="amount" align="center">'.__('Enlarge').'</td><td align="center">'.$updatetype.'</td><td align="center">'.$item->getQuantity().'</td>'.$discountBody.'<td class="amount" align="right">'.number_format($item->getClientprice(), 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';

				$c = new Criteria();
				$c->add(LicensePeer::USERNAME, $item->getUsername());
				$QuoteitemLicense = LicensePeer::doSelectOne($c);

				$EnlargeCheck = LicensePeer::enlargeCheck( $QuoteitemLicense, $item->getQuantity() );

				$FullPriceEnlarge = PricingPeer::getPriceForProduct( $item->getProduct()->getCode(), $item->getQuantity() , 1, $item->getUpdatetypeid() );

				$DaysLeftOnOldLicense =  $QuoteitemLicense->getDaysLeftOnLicense() ;

				$PDFContent .='<tr><td colspan="6">'.__('Pro Rata Days: ').$DaysLeftOnOldLicense.' ('.__('used to calculate price').') -'.$item->getUsername().' '.__('enlarged from').' '.$QuoteitemLicense->getQuantity().' '.'to'.' '.$item->getQuantity().'</td></tr>';

				if ( $EnlargeCheck == 'upgrade') {
					$PDFContent .='<tr><td class="product" colspan="6">'.__('Please note: There is a username and password change since this is an upgrade').'</td>';
				}
				
				$dvdboxtotal += $item->getDvdboxamount();
			}
			break;
		case 4;
        		$PDFContent = '';

        		$PDFContent .=''.
        			'<table id="invoiceLines" class="innerTable">
               <tr>
              	<th width="240px" align="left">'.__('Product').'</th>
              	<th width="80px" align="center">'.__('Type').'</th>
              	<th width="70px" align="center">'.__('Duration').'</th>
              	<th width="70px" align="center">'.($PdfObject->getTypeid() == 2?__('New Quantity'):__('Quantity')).'</th>
              	<th width="80px" align="center">'.__('Discount').'</th>
              	<th width="150px" align="right">'.__('Price').'</th>
               </tr>';
		
				foreach ($items as $item) {
					
				$RetailPack = RetailpackPeer::retrieveByPK($item->getProductcode());

				//$updatetype = $item->getUpdatetypeid();
				$updatetype = '';

				if (!in_array($item->getDiscountid(), array(1, 2, 3, 4)))
					$updatetype = '';
				else
					$updatetype = $item->getUpdatetypeid();

				switch ($updatetype) {
				case 1:
					$updatetype = __('1 year');
					break;
				case 2:
					$updatetype = __('2 years');
					break;
				default:
					$updatetype = date('d/m/y', $item->getDiscount()->getLicenseexpiration()) ;
					break;
				}
				
				$discount = number_format($item->getDiscount()->getPercent(), 2, '.', '');
				
        		if($discount > 0){
        		    
        		    $discountHeader = '<th width="80px" align="center">'.__('Discount').'</th>';
                    $discountBody = '<td align="center">'.$discount.'%</td>';
        		
        		}else{
        		    
        		    $discountHeader = '<th width="80px" align="center"></th>';
                    $discountBody = '<td align="center"></td>';
        		}

				$PDFContent .='<tr><td class="product" >'.$RetailPack->getProduct()->getTitle().'</td><td class="amount" align="center">'.ucwords($item->getPurchasetype()->getTitle()).'</td><td align="center">'.$updatetype.'</td><td align="center">'.$item->getQuantity().'</td>'.$discountBody.'<td class="amount" align="right">'.number_format($item->getClientprice(), 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';

				$dvdboxtotal += $item->getDvdboxamount();
			}
			break;
		case 5;
        		$PDFContent = '';

        		$PDFContent .=''.
        			'<table id="invoiceLines" class="innerTable">
               <tr>
              	<th width="240px" align="left">'.__('Product').'</th>
              	<th width="80px" align="center">'.__('Type').'</th>
              	<th width="70px" align="center">'.__('Duration').'</th>
              	<th width="70px" align="center">'.($PdfObject->getTypeid() == 2?__('New Quantity'):__('Quantity')).'</th>
                <th width="80px" align="center">'.__('Discount').'</th>
              	<th width="150px" align="right">'.__('Price').'</th>
               </tr>';			
		
				foreach ($items as $item) {
				$OemPack = OempackPeer::retrieveByPK($item->getProductcode());

				//$updatetype = $item->getUpdatetypeid();
				$updatetype = '';

				if (!in_array($item->getDiscountid(), array(1, 2, 3, 4)))
					$updatetype = '';
				else
					$updatetype = $item->getUpdatetypeid();

				switch ($updatetype) {
				case 1:
					$updatetype = __('1 year');
					break;
				case 2:
					$updatetype = __('2 years');
					break;
				default:
					$updatetype = date('d/m/y', $item->getDiscount()->getLicenseexpiration()) ;
					break;
				}
				
				$discount = number_format($item->getDiscount()->getPercent(), 2, '.', '');
				
        		if($discount > 0){
        		    $discountHeader = '<th width="80px" align="center">'.__('Discount').'</th>';
                    $discountBody = '<td align="center">'.$discount.'%</td>';
        		
        		}else{
        		    
        		    $discountHeader = '<th width="80px" align="center"></th>';
                    $discountBody = '<td align="center"></td>';
        		}

				$PDFContent .='<tr><td class="product" >'.$OemPack->getProduct()->getTitle().'</td><td class="amount" align="center">'.strtoupper($item->getPurchasetype()->getTitle()).'</td><td align="center">'.$updatetype.'</td><td align="center">'.$OemPack->getPacksize().'</td>'.$discountBody.'<td class="amount" align="right">'.number_format($item->getClientprice(), 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';

				$dvdboxtotal += $item->getDvdboxamount();
			}
			break;
		case 6;
        		$PDFContent = '';

        		$PDFContent .=''.
        			'<table id="invoiceLines" class="innerTable">
               <tr>
              	<th width="240px" align="left">'.__('Product').'</th>
              	<th width="80px" align="center">'.__('Type').'</th>
              	<th width="70px" align="center">'.__('Duration').'</th>
              	<th width="70px" align="center">'.($PdfObject->getTypeid() == 2?__('New Quantity'):__('Quantity')).'</th>
              	<th width="80px" align="center">'.__('Discount').'</th>
              	<th width="150px" align="right">'.__('Price').'</th>
               </tr>';
		
				foreach ($items as $item) {

				//$updatetype = $item->getUpdatetypeid();
				$updatetype = '';

				if (!in_array($item->getDiscountid(), array(1, 2, 3, 4)))
					$updatetype = '';
				else
					$updatetype = $item->getUpdatetypeid();

				switch ($updatetype) {
				case 1:
					$updatetype = __('1 year');
					break;
				case 2:
					$updatetype = __('2 years');
					break;
				default:
					$updatetype = date('d/m/y', $item->getDiscount()->getLicenseexpiration()) ;
					break;
				}
				
				$discount = number_format($item->getDiscount()->getPercent(), 2, '.', '');
				
        		if($discount > 0){
        		    $discountHeader = '<th width="80px" align="center">'.__('Discount').'</th>';
                    $discountBody = '<td align="center">'.$discount.'%</td>';
        		
        		}else{
        		    
        		    $discountHeader = '<th width="80px" align="center"></th>';
                    $discountBody = '<td align="center"></td>';
        		}


				$PDFContent .='<tr><td class="product" >'.$item->getProduct()->getTitle().'</td><td class="amount" align="center">'.ucwords($item->getPurchasetype()->getTitle()).'</td><td align="center">'.$updatetype.'</td><td align="center">'.$item->getQuantity().'</td>'.$discountBody.'<td class="amount" align="right">'.number_format($item->getClientprice(), 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';
				$PDFContent .='<tr><td class="product" colspan="6">'.__('Username').':<b>'.$item->getUsername().'</b> '.__('Password').':<b>'.$item->getPassword().'</b></td></tr>';
				$dvdboxtotal += $item->getDvdboxamount();
			}
			break;
		default;
        		$PDFContent = '';

        		$PDFContent .=''.
        			'<table id="invoiceLines" class="innerTable">
               <tr>
              	<th width="240px" align="left">'.__('Product').'</th>
              	<th width="80px" align="center">'.__('Type').'</th>
              	<th width="70px" align="center">'.__('Duration').'</th>
              	<th width="70px" align="center">'.($PdfObject->getTypeid() == 2?__('New Quantity'):__('Quantity')).'</th>
              	<th width="80px" align="center">'.__('Discount').'</th>
              	<th width="150px" align="right">'.__('Price').'</th>
               </tr>';
		
				foreach ($items as $item) {

				//$updatetype = $item->getUpdatetypeid();
				$updatetype = '';

				if (!in_array($item->getDiscountid(), array(1, 2, 3, 4)))
					$updatetype = '';
				else
					$updatetype = $item->getUpdatetypeid();

				switch ($updatetype) {
				case 1:
					$updatetype = __('1 year');
					break;
				case 2:
					$updatetype = __('2 years');
					break;
				default:
					$updatetype = date('d/m/y', $item->getDiscount()->getLicenseexpiration()) ;
					break;
				}
				
				$discount = number_format($item->getDiscount()->getPercent(), 2, '.', '');
				
        		if($discount > 0){
        		    $discountHeader = '<th width="80px" align="center">'.__('Discount').'</th>';
                    $discountBody = '<td align="center">'.$discount.'%</td>';
        		
        		}else{
        		    
        		    $discountHeader = '<th width="80px" align="center"></th>';
                    $discountBody = '<td align="center"></td>';
        		}

				$PDFContent .='<tr><td class="product" >'.$item->getProduct()->getTitle().'</td><td class="amount" align="center">'.ucwords($item->getPurchasetype()->getTitle()).'</td><td align="center">'.$updatetype.'</td><td align="center">'.$item->getQuantity().'</td>'.$discountBody.'<td class="amount" align="right">'.number_format($item->getClientprice(), 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';

				$dvdboxtotal += $item->getDvdboxamount();
			}
			break;
		}

		/////////////////////////////////////////////////////////////////////////////
		// PDF Subtotal
		/////////////////////////////////////////////////////////////////////////////
		$PDFContent .='<tr><td colspan="5" align="right">'.__('License Subtotal').'</td><td class="amount" align="right">'.number_format($subtotal, 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';

		/////////////////////////////////////////////////////////////////////////////
		// PDF Box Fee
		/////////////////////////////////////////////////////////////////////////////
		if ($dvdboxtotal != 0.00) {
			$PDFContent .='<tr><td colspan="5" align="right">'.__('DVD Box Fee').'(Excl VAT)</td><td class="amount" align="right">'.number_format($dvdboxtotal, 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';
		}

		/////////////////////////////////////////////////////////////////////////////
		// PDF Vat
		/////////////////////////////////////////////////////////////////////////////
		//if ($topLevelGroup->getVat() != 2 && $toplevelgroup->getGrouptypeid() == 2) {
		$PDFContent .='<tr><td colspan="5" align="right">'.__('VAT Subtotal').'</td><td class="amount" align="right">'.number_format($vat, 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</td></tr>';
		//}

		/////////////////////////////////////////////////////////////////////////////
		// PDF Total
		/////////////////////////////////////////////////////////////////////////////
		$PDFContent .='<tr id="total"><th colspan="5" align="right" >TOTAL</th><th class="amount" align="right">'.number_format($total, 2, '.', '')." ".strtoupper(sfConfig::get('app_currency')).'</th></tr>';

		$PDFContent .= '</table>';

		$this->setTemplatePageName('ESET Quotation');
		$this->setTemplateTitle('Quotation/Pro-Forma Invoice');
		$this->setPDFNumber($pdfobjectNumber);
		$this->setPDFDate(date('d M Y', $PdfObject->getCreatedat()));
		$this->setPDFContent($PDFContent);
		$this->setGroup($group);
		$this->setTopLevelGroup($toplevelgroup);
		$this->setPaymentReference($PdfObject->getPaymentref());
		$this->setYourReference($PdfObject->getYourref());

		return $this->renderTemplate( 1 );

	}


	/**
	 * Function to render the basic template for the pdf
	 *
	 *
	 * @return
	 *
	 * @param unknown $PDFType     (optional)
	 * @param unknown $OrderNumber (optional)
	 */
	private function renderTemplate( $PDFType = 1, $OrderNumber = 0 ) {

		$TemplatePageName = $this->TemplatePageName;
		$TemplateTitle = $this->TemplateTitle;
		$PDFNumber = $this->PDFNumber;
		$PDFDate = $this->PDFDate;
		$PDFContent = $this->PDFContent;
		$Group = $this->Group;
		$TopLevelGroup = $this->TopLevelGroup;
		$PaymentReference = $this->PaymentReference;
		$YourReference = $this->YourReference;

		$image = 'quotebackground';

		switch ($PDFType) {
		case 2:
			$image = 'custominvoicebackground';
			break;
		case 3:
			$image = 'invoicebackground';
			break;
		case 4:
			$image = 'licensebackground';
			break;
		case 5:
			$image = 'creditnotebackground';
			break;
		case 6:
			$image = 'accountsnviewbackground';
			break;
		case 1:
		default:
			$image = 'quotebackground';
			break;
		}

		$html = '<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>'.$TemplatePageName.'</title>

		<style type="text/css">
			body { color: #555555; font-family: Arial, Helvetica, sans-serif;  margin: 0; padding: 0;sans-serif; background-color: #f2f3f5; background-image: url(\'images/pdf/bodyGradient.png\'); background-repeat: repeat-x; background-position: left top; }
			table { font-size: 12px; }
			h1, h2, h3, h4, h5 { margin: 0 0 0 0; padding: 0 0 0 0; color: #066f75; font-weight: bold; }
			h1 { font-size: 30px; }
			h2 { margin: 0 0 0 0; color: #000000; font-size: 20px; font-weight: normal; }
			h3, h4, h5 { margin: 0 0 7px 0; }
			h3 { font-size: 18px; }
			h4 { font-size: 14px; }
			h5 { font-size: 12px; margin: 0 0 10px 0; color: #006699; }
			p { margin: 0 0 12px 0; line-height: 15px; }
			hr { height: 1px; line-height: 1px; border: none; border-top: 1px solid #dde2e6; margin: 5px 20px; }
			ul, li { margin: 0 0 0 0; padding: 0 0 0 0; }
			li { line-height: 15px; }
			.bulletLarge { padding: 0 0 0 3px; }
			.bulletLarge li { list-style-type: none; background-image: url(\'images/pdf/bulletLarge.png\'); background-repeat: no-repeat; background-position: left 5px; padding: 0 0 4px 15px; }
			.bulletLarge li a { color: #3c3c3c; }
			#headerwrapper { background-color: #f2f3f5; background-image: url(\'images/pdf/headerGradient.png\'); background-repeat: repeat-x; background-position: left top; height: 58px;   }
			#header {  margin: 0 auto; width: 800px; padding: 0 30px;}
			#main{ background-color: #FFF;border: 1px solid #DDE2E6; margin: 20px auto; width: 750px;}
			#info {  background-image: url(\'images/pdf/'.$image.'.jpg\'); background-repeat: no-repeat; background-position: right top; height: 30px; padding: 20px;}
			#pdfinfo{ padding: 20px; }
			#pdfnumber { float: left; color: #000000; font-size: 20px;}
			#pdfdate { width: 200px; text-align: right;}
			#clientinfo {  font-size: 12px; padding: 20px 30px 20px 20px; }
			#content { padding: 20px; }
			#signature { width: 750px; }
			#date { margin:0 0 20px 0; font-size:12px; color: #066f75; font-weight: bold; padding-bottom: 10px; clear:both;}
			#vatno { font-size:12px;  margin: 0 0 0 0; }
			#footer { font-size: 10px; padding: 20px; }
			#footeroutside { font-size: 10px; padding: 0px 70px; }
			#invoiceLines { border-top: 1px solid #dde2e6; border-bottom: 1px solid #dde2e6; margin: 10px 0 40px 0; }
			#invoiceLines td, #invoiceLines th { border-top: 1px solid #dde2e6; padding: 6px 0 6px 0; }
			#invoiceLines td.product { color: #006699; }
			#invoiceLines td.amount, #invoiceLines th.amount { padding: 6px 8px 6px 8px; }
			#invoiceLines tr#total th { background-color: #f2f3f5; color: #000000; font-size: 14px; }
			.innerTable {width: 100%; }
			.small { font-size: 11px; }
			.lighter { color: #888888; }
			.noMargin { margin: 0 0 0 0; }
			.column { float: right; }
			.clearer { clear: both; }
		</style>
	</head>

	<body>

		<div id="headerwrapper">
			<div id="header">
				<a href="http://www.eset.co.za"><img src="images/pdf/logo.png" alt="Southern Africa - we protect your digital worlds" border="0"></a>
			</div>
		</div>
		<div id="main">
			<div id="info">
				<h1>'.$TemplateTitle.'</h1>
			</div>
			<div id="pdfinfo">
				<div style="float: right; text-align: right;">
					<font id="date" >'.$PDFDate.'</font>
					<br>
					<font id="vatno" class="lighter">VAT Reg. No. '.sfConfig::get('app_vat_number').'</font>
				</div>
				<div id="pdfnumber" style="float: right;">'.(!empty($PDFNumber)?'No. '.$PDFNumber:'').'</div>
			</div>

			<hr>
			<div id="clientinfo">
					<p><strong>'.ucwords($Group->getRegisteredname()).'</strong><br>';
			
			switch ($PDFType) {
			case 2:
			case 3:
			case 5:
			case 6:
				 $html .= '<strong>'.__('ClientID').': '.ucwords($Group->getId()).'</strong><br>';
				break;
			case 1:
			case 4:
			default:
				break;
			}
            if( is_object($Group->getPhysicaladdress())){
                
                $physicalAddress = $Group->getPhysicaladdress();
                if( $physicalAddress->getAddr2()){
                    $html .= $physicalAddress->getAddr2().'<br> ';
                }

                if( $physicalAddress->getAddr3()){
                    $html .= $physicalAddress->getAddr3().'<br> ';
                }

                if( $physicalAddress->getAddr4()){
                    $html .= $physicalAddress->getAddr4().'<br> ';
                }

                if( $physicalAddress->getAddr5()){
                    $html .= $physicalAddress->getAddr5();
                }					
            }
			$html .='</p><p class="lighter">'.($Group->getVatregistered() == 1?'VAT No. '.$Group->getVatno():'').'<br>'.
					($OrderNumber?'Order No. '.$OrderNumber:'');
			
			if(!empty($YourReference)){
				$html .='<br>'.__('Your Reference: ').$YourReference;
			}

			$html .='</p></div>';
					
			$html .='<div id="content">
			'.$PDFContent.'
			<div class="clearer"></div>
			</div>

			<div id="footer">';

		if (!in_array($PDFType,  array( 4, 5 )) && $Group->getParentid() == sfConfig::get('app_eset_groupid')){
			
			if(in_array($Group->getGrouptypeid(), array(2,3))){
				$html .= '<h5 style="color:red;">ACCOUNT PAYABLE ON PRESENTATION OF STATEMENT</h5>';
			}
			
			$html .= '	<h4>Bank Details</h4>

				<table width="600" cellpadding="0" cellspacing="0" border="0">
						<tr valign="top">
							<td width="200">
											<p>Account Name: '.sfConfig::get('app_banking_accountname').'<br>
											Bank: '.sfConfig::get('app_banking_bank').'<br>
											Branch: '.sfConfig::get('app_banking_branch').'<br>
											Current Account No: '.sfConfig::get('app_banking_accountno').'</p>
							</td>
							<td width="300">
								<ul class="bulletSmall">
										<li class="lighter">Use the invoice number as the reference.</li>
										<li class="lighter">Payment in full is required. Any bank charges are for your account.</li>
										<li class="lighter">Proof of payment can be faxed to 088 021 689 1151 or e-mailed to <br>
										<a href="mailto:'.sfConfig::get('app_email_accounts').'">'.sfConfig::get('app_email_accounts').'</a>.
										</li>
								</ul>
							</td>
						</tr>
				</table>
			';
		}

		$html .= '
			</div>
		</div>
		<div id="footeroutside">
					<table width="750" cellpadding="0" cellspacing="0" border="0" id="signature">
						<tr valign="top">
							<td width="200" align="left" id="profile">
								<p class="small">
									<strong>'.sfConfig::get('app_company_name').'</strong><br>
									'.sfConfig::get('app_address_companyname').'<br>
									A member of the 4Di Group<br>
									Reg No. '.sfConfig::get('app_address_companyno').'
								</p>
							</td>
							<td width="550" align="left" id="contact">
								<ul class="bulletSmall small">
									<li>Physical: '.sfConfig::get('app_address_residential_address_line1').' '.sfConfig::get('app_address_residential_address_line2').'</li>
									<li>Postal:  '.sfConfig::get('app_address_postal_address_line1').'</li>
									<li>Telephone: '.sfConfig::get('app_address_telephone').'</li>
									<li>Fax: '.sfConfig::get('app_address_fax').'</li>
								</ul>
							</td>
						</tr>
					</table>
		</div>
	</body>
	</html>';

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



	/**
	 *
	 *
	 * @param unknown $group
	 */
	public function setGroup($group) {
		$this->Group = $group;
	}



	/**
	 *
	 *
	 * @param unknown $toplevelgroup
	 */
	public function setTopLevelGroup($toplevelgroup) {
		$this->TopLevelGroup = $toplevelgroup;
	}
	
	
	
	/**
	 * Function to set the PAayment Reference field on a pdf
	 *
	 * @param varchar $paymentreference The reference to be used
	 */
	public function setPaymentReference($paymentreference) {
		$this->PaymentReference = $paymentreference;
	}
	
	
	
	
	/**
	 * Function to set the Your Reference field on a pdf
	 *
	 * @param varchar $yourreference The reference to be used
	 */
	public function setYourReference($yourreference) {
		$this->YourReference = $yourreference;
	}


}


?>
