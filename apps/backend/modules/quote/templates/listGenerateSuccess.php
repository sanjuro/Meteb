<?php use_stylesheet('quote.css') ?>

<h1><?php echo __('Quote Details and Calculations') ?></h1>
<div id="quotecalculations">

</div>

<div id="quotedetails" style="width: 800px;">
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
</div>