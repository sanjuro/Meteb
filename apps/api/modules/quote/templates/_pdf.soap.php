
<script type="text/php"> 
  if ( isset($pdf) ) {  
     $font = Font_Metrics::get_font("helvetica", "bold");
     $pdf->page_text(535, 750, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
  }
</script>

<h2>A Metropolitan Life Quotation</h2>

<p>
	Quotation date:    <?php echo $quote_calculations['quote_date'] ?> <br>
	Data date:    <?php echo $quote_calculations['data_date'] ?> <br>
	Commencement date: <?php echo $quote_calculations['commencement_date'] ?> <br>
	Expiry date: <?php echo $quote_calculations['expiry_date'] ?>
</p>