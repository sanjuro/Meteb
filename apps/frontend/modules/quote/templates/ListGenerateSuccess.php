<?php use_stylesheet('dashboard.css') ?>
<?php use_stylesheet('quote.css') ?>

<h1>Quote Data</h1>
<p>
	The data below has been calculated with the details you have supplied when creating this quote.
	<br>
	If you are satisfied you may continue and download the Quote in PDF form.
</p>
<div id="activityContent">
						
				
				<span class="quotedetails_label"><?php echo __('Data Date')?></span>
				<span class="quotedetails_data red"><?php echo $quote_calculations['data_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Quote Date')?></span>
				<span class="quotedetails_data red"><?php echo $quote_calculations['quote_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Commencement Date')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['commencement_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('First Payment Date')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['first_payment_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('First Increase Date')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['first_increase_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('PP1')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['pp1']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('PP2')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['pp2']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('PP3')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['pp3']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Gross Annuity 1')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['gross_annuity_1']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Gross Annuity 2')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['gross_annuity_2']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Gross Annuity 3')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['gross_annuity_3']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Tax 1')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['tax1']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Tax 2')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['tax2']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Tax 3')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['tax3']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Net Annuity 1')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['net_annuity_1']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Net Annuity 2')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['net_annuity_2']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Net Annuity 3')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['net_annuity_3']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Commision Sacrificed')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['commission_sacrificed']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Main Age Next')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['main_age_next']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Spouse Age Next')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['spouse_age_next']?></span>
				<br>
				<br>
				<p>
					<a href="<?php echo url_for('quote_pdf', $quote)?>"><img width="91" height="25" alt="PDF" src="/images/backend/pdf_quote.png"></a>
				    <a href=""><img width="91" height="25" alt="Email" src="/images/backend/email_icon.png"></a>
				</p>
</div>