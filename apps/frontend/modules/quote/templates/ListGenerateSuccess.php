<?php use_stylesheet('dashboard.css') ?>
<?php use_stylesheet('quote.css') ?>

<h1>Quote Data</h1>
<p>
	The data below has been calculated with the details you have supplied when creating this quote.
	<br>
	If you are satisfied you may continue and download the Quote in PDF form.
</p>
<div id="activityContent">
				<table>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Data Date')?></span></td>
						<td><span class="quotedetails_data red"><?php echo $quote_calculations['data_date']?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Quote Date')?></span></td>
						<td><span class="quotedetails_data red"><?php echo $quote_calculations['quote_date']?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Commencement Date')?></span></td>
						<td><span class="quotedetails_data"><?php echo $quote_calculations['commencement_date']?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('First Payment Date')?></span></td>
						<td><span class="quotedetails_data"><?php echo $quote_calculations['first_payment_date']?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('First Increase Date')?></span></td>
						<td><span class="quotedetails_data"><?php echo $quote_calculations['first_increase_date']?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('PP1')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['pp1'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('PP2')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['pp2'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('PP3')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['pp3'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Gross Annuity 1')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['gross_annuity_1'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Gross Annuity 2')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['gross_annuity_2'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Gross Annuity 3')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['gross_annuity_3'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Tax 1')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['tax1'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Tax 2')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['tax2'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Tax 3')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['tax3'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Net Annuity 1')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['net_annuity_1'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Net Annuity 2')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['net_annuity_2'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Net Annuity 3')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['net_annuity_3'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Commission Percentage')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['commission_sacrificed'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Main Age Next')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['main_age_next'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Spouse Age Next')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['spouse_age_next'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Premium Charge 1')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['premium_charge_1'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Premium Charge 2')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['premium_charge_2'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Premium Charge 3')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['premium_charge_3'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Admin Charge 1')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['admin_charge_1'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Admin Charge 2')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['admin_charge_2'], 2, '.', ',')  ?></span></td>
					</tr>
					<tr>
						<td><span class="quotedetails_label"><?php echo __('Admin Charge 3')?></span></td>
						<td><span class="quotedetails_data">R <?php echo number_format($quote_calculations['admin_charge_3'], 2, '.', ',')  ?></span></td>
					</tr>
				</table>						
				
				<p>
					<a href="<?php echo url_for('quote_pdf', $quote)?>"><img width="91" height="25" alt="PDF" src="/images/backend/pdf_quote.png"></a>
				    <a href=""><img width="91" height="25" alt="Email" src="/images/backend/email_icon.png"></a>
				</p>
</div>