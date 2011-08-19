<?php use_stylesheet('dashboard.css') ?>
<?php use_stylesheet('quote.css') ?>

<div id="dashboard">

	<div id="clientList">
		<h2>What Next?</h2>
		<table width="100%" cellspacing="0" cellpadding="0" class="tableHeader" class="activityAction">
			<tr>
				<td>
					<?php echo __('Please review all calculations and details of the quote, remember you can edit the quote.') ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo __('Here are some other options you might want to do.') ?>
				</td>
			</tr>
		</table>
		<p><a href="<?php echo url_for('client_new') ?>"><img width="91" height="25" alt="Add a new Client" src="/images/backend/add_client_new.jpg"></a></p>
		<br></br>
		<h2>Client Details</h2>
			<table width="100%" cellspacing="0" cellpadding="0" class="tableHeader" class="activityAction">
				<tbody>
					<tr>
						<td><b>Name</b></td><td><?php echo $client->getFirstName().' '.$client->getLastName() ?></td>
					</tr>
					<tr>
						<td><b>Email</b></td><td><?php echo $client->getEmailAddress() ?></td>
					</tr>
					<tr>
						<td><b>ID</b></td><td><?php echo $userprofile->getIdnumber() ?></td>
					</tr>
					<tr>
						<td><b>Date of Birth</b></td><td><?php echo $userprofile->getDob() ?></td>
					</tr>
					<tr>
						<td><b>Spouse ID</b></td><td><?php echo $userprofile->getSpouseidnumber() ?></td>
					</tr>
					<tr>
						<td><b>Spouse Date of Birth</b></td><td><?php echo $userprofile->getSpouseDob() ?></td>
					</tr>
				</tbody>
			</table>
	</div>
	
	<div id="quoteDetails" >
				
		<div id="activityBG">
					
			<div id="activityContent">
						
						
				<div id="clientBlankSlate">
							
							<h2><?php echo __('Your quote has been processed, please reveiw the calculations below') ?>.</h2>
														
							<div class="instructions">
								
								<table width="100%" cellspacing="0" cellpadding="0">
								<tbody><tr>
									<td nowrap="" class="instructionsCTA"></td>
									<td width="100%">
										<p><?php echo __('Once you are satisfied with the quote you can generate a secure PDF version for printing and email') ?></p>
									</td>
								</tr>
								</tbody></table>
									
							</div>
						
				</div>
				
				<span class="quotedetails_label"><?php echo __('Data Date')?></span>
				<span class="quotedetails_data red"><?php echo $quote_calculations['data_date'] ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Quote Date')?></span>
				<span class="quotedetails_data red"><?php echo $quote_calculations['quote_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Commencement Date')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['commencement_date'] ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('First Payment Date')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['first_payment_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('First Increase Date')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['first_increase_date']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Guarantee Terms')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['guanratee_terms']?> months</span>
				<br>
				<span class="quotedetails_label"><?php echo __('PP1')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['pp1'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('PP2')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['pp2'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('PP3')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['pp3'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Gross Annuity 1')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['gross_annuity_1'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Gross Annuity 2')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['gross_annuity_2'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Gross Annuity 3')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['gross_annuity_3'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Tax 1')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['tax1'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Tax 2')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['tax2'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Tax 3')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['tax3'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Net Annuity 1')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['net_annuity_1'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Net Annuity 2')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['net_annuity_2'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Net Annuity 3')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['net_annuity_3'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Commision Percentage')?></span>
				<span class="quotedetails_data"><?php echo number_format($quote_calculations['commission_sacrificed'], 2, '.', ',') ?>%</span>
				<br>
				<span class="quotedetails_label"><?php echo __('Main Age Next')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['main_age_next']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Spouse Age Next')?></span>
				<span class="quotedetails_data"><?php echo $quote_calculations['spouse_age_next']?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Premium Charge 1')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['premium_charge_1'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Premium Charge 2')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['premium_charge_2'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Premium Charge 3')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['premium_charge_3'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Admin Charge 1')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['admin_charge_1'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Admin Charge 2')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['admin_charge_2'], 2, '.', ',')  ?></span>
				<br>
				<span class="quotedetails_label"><?php echo __('Admin Charge 3')?></span>
				<span class="quotedetails_data">R <?php echo number_format($quote_calculations['admin_charge_3'], 2, '.', ',')  ?></span>
				<br>
				
				<p>
					<a href="<?php echo url_for('quote_edit', $quote)?>"><img width="91" height="25" alt="Edit" src="/images/backend/edit_quote.png"></a>
					<a href="<?php echo url_for('quote_pdf', $quote)?>"><img width="91" height="25" alt="PDF" src="/images/backend/pdf_quote.png"></a>
				    <a href=""><img width="91" height="25" alt="Email" src="/images/backend/email_icon.png"></a>
				</p>
				
			</div>
		</div>
	</div>
</div>