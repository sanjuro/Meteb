<?php use_stylesheet('dashboard.css') ?>
<?php use_stylesheet('quote.css') ?>

<div id="dashboard">

	<div id="clientList">
		<h1>What Next?</h1>
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
		
		<p><a href="<?php echo url_for('quote_new') ?>"><img width="91" height="25" alt="Add another quote" src="/images/backend/add_quote_new.gif"></a></p>
		<p><a href="<?php echo url_for('client_new') ?>"><img width="91" height="25" alt="Add a new Client" src="/images/backend/add_client_new.jpg"></a></p>
	</div>
	
	<div id="quoteDetails" >
				
		<div id="activityBG">
					
			<div id="activityContent">
						
						
				<div id="clientBlankSlate">
							
							<h1><?php echo __('Your quote has been processed, please reveiw the calculations below') ?>.</h1>
														
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
				
				<p>
					<a href=""><img width="91" height="25" alt="PDF" src="/images/backend/pdf_quote.png"></a>
				    <a href=""><img width="91" height="25" alt="Email" src="/images/backend/email_icon.png"></a>
				</p>
				
			</div>
		</div>
	</div>
</div>