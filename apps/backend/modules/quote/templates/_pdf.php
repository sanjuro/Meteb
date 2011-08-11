<h2>A Metropolitan Life Quotation</h2>

<p>
	Quotation date:    <?php echo $quote_calculations['quote_date'] ?> <br>
	Data date:    <?php echo $quote_calculations['data_date'] ?> <br>
	Commencement date: <?php echo $quote_calculations['commencement_date'] ?>
</p>

<h3>Annuity details</h3>
<p>
	<table>
		<tr>
			<td style="width: 300px;">Frequency of payment:  </td>
			<td colspan="3">monthly</td>
		</tr>
		<tr>
			<td>Date of first annuity increase:  </td>
			<td colspan="3"><?php echo $quote_calculations['first_increase_date'] ?></td>
		</tr>
		<tr>
			<td>First Payment:  </td>
			<td colspan="3"><?php echo $quote_calculations['first_payment_date']?></td>
		</tr>
		<tr>
			<td>Guarantee term in months:  </td>
			<td colspan="3"><?php echo $quote_calculations['guanratee_terms']?></td>
		</tr>
	</table>
	<table id="annity_table" style="border: 1px solid #000;">
        <tbody> 
		<tr>
			<td>Post Retirement Interest Rate:</td>
			<td style="text-align:center;">3.50%</td>
			<td style="text-align:center;">4.00%</td>
			<td style="text-align:center;">4.50%</td>
		</tr>
		<tr>
			<td style="width: 300px;">Purchase Sum</td>
			<td>R <?php echo number_format($quote_calculations['pp1'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['pp2'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['pp3'], 2, '.', ',')  ?></td>
		</tr>
		<tr>
			<td>Initial gross Annuity</td>
			<td>R <?php echo number_format($quote_calculations['gross_annuity_1'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['gross_annuity_2'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['gross_annuity_3'], 2, '.', ',')  ?></td>
		</tr>
		<tr>
			<td>Less Tax</td>
			<td>R <?php echo number_format($quote_calculations['tax1'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['tax2'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['tax3'], 2, '.', ',')  ?></td>
		</tr>
		<tr>
			<td>Initial Net Annuity</td>
			<td>R <?php echo number_format($quote_calculations['net_annuity_1'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['net_annuity_2'], 2, '.', ',')  ?></td>
			<td>R <?php echo number_format($quote_calculations['net_annuity_3'], 2, '.', ',')  ?></td>
		</tr>
        </tbody>
	</table>
</p>
<h3>Policy details</h3>
<p>
	<table>
		<tr>
			<td style="width: 300px;">Policy Term</td>
			<td colspan="3">Whole Life</td>
		</tr>
		<tr>
			<td>Tax Status </td>
			<td colspan="3">Taxable Individual</td>
		</tr>
		<tr>
			<td>Class</td>
			<td colspan="3">With Profit</td>
		</tr>
		<tr>
			<td>Type</td>
			<td colspan="3">Compulsory</td>
		</tr>
	</table>
</p>
<h3>Commision details</h3>
<p>
	<table>
		<tr>
			<td style="width: 300px;">Commission Sacrificied</td>
			<td colspan="3"><?php echo $quote_calculations['commission_sacrificed'] ?></td>
		</tr>
	</table>
</p>
<h3>Insured Life Details</h3>
<p>
	<table>
		<tr>
			<td style="width: 300px;">Name</td>
			<td colspan="2"><?php echo $client->getFirstName().' '.$client->getLastName() ?></td>
		</tr>
		<tr>
			<td>Date of Birth</td>
			<td colspan="3"><?php echo $userprofile->getDob() ?></td>
		</tr>
		<tr>
			<td>Age Next Birthday</td>
			<td colspan="3"><?php echo $quote_calculations['main_age_next'] ?></td>
		</tr>
		<tr>
			<td>Sex</td>
			<td colspan="3"><?php echo $quote->getGender()->getTitle() ?></td>
		</tr>
	</table>
</p>
<h3>Application Form(s)</h3>
<p>
	<table>
		<tr>
			<td style="width: 300px;">Annuity</td>
			<td colspan="3">15049 (V05'07)</td>
		</tr>
	</table>
</p>
<h3>Administration</h3>
<p>
	<table>
		<tr>
			<td style="width: 500px;">Metropolitan Employee Benefits will be responsible for the administration of the policy.</td>
		</tr>
	</table>
</p>
<h3>The Golden Growth With-Profit Annuity product</h3>
<p>
	This product is underwritten by Metropolitan Employee Benefits.
	<br><br>
	In return for the purchase amount, the Golden Growth With Profit Annuity provides a gross starting<br>
	income as stated above. This gross starting income is the minimum guaranteed income which the client<br>
	will receive before tax has been deducted.
	<br><br>
	Under the Golden Growth With Profit Annuity, annual pension increases will amount to:
	<br><br>
	{(1 + b - c) / (1 + d)} - 1 (subject to a minimum of zero)
	<br><br>
	where:
	<br><br>
	b is the rate of bonus, net of investment management fees, declared annually by Metropolitan on the<br>
	Golden Growth With Profit Annuity portfolio.
	<br><br>
	c is a risk charge dependent on the valuation interest rate and mortality experience, and
	<br><br>
	d is the chosen discount rate used in the calculations.
	<br><br>
	These increases are fully vesting, so the new gross income is guaranteed not to fall.
</p>
<h3>The Choice of Discount</h3>
<p>
	The client's choice of discount rate determines the level of guarantee and the extent of participation<br>
	in investment returns.
	<br><br>
	A high discount rate provides a higher level of guarantee, so the starting income will be higher. A<br>
	high discount rate will, however, provide a low participation in profits, so the annuity will not escalate<br>
	as fast as an annuity with a lower discount rate.
</p>
<h3>Remuneration of intermediary</h3>
<p>
	The intermediary receives commission for the advice and service provided during the term of the<br>
	policy. This commission is used to meet expenses and to provide the intermediary with an income.<br>
	<br><br>
	For independent brokers the full commission is payable in cash. For representatives the remuneration<br>
	can consist of a reduced cash commission plus other company benefits.
	<br><br>
	Metropolitan will provide commission on the initial premium not exceeding 1.5%<br>
</p>
<h3>Policy charges and fees</h3>
<p>
		The following charges will be levied against the policy, in addition to the commission or remuneration:
		<br><br>
		
		<table style="border: 1px solid #000;">
		<tr>
			<td style="width: 200px;">Dicount Rate:</td>
			<td style="text-align:center;">3.50%</td>
			<td style="text-align:center;">4.00%</td>
			<td style="text-align:center;">4.50%</td>
		</tr>
		<tr>
			<td>Fund Charges</td>
			<td style="text-align:center;">1.100%</td>
			<td style="text-align:center;">1.15%</td>
			<td style="text-align:center;">1.20%</td>
		</tr>
		<tr>
			<td>Premium Charges</td>
			<td style="text-align:center;">R <?php echo number_format($quote_calculations['premium_charge_1'], 2, '.', ',') ?></td>
			<td style="text-align:center;">R <?php echo number_format($quote_calculations['premium_charge_2'], 2, '.', ',')  ?></td>
			<td style="text-align:center;">R <?php echo number_format($quote_calculations['premium_charge_3'], 2, '.', ',')  ?></td>
		</tr>
		<tr>
			<td>Administrative Charges</td>
			<td style="text-align:center;">R <?php echo number_format($quote_calculations['admin_charge_1'], 2, '.', ',')  ?></td>
			<td style="text-align:center;">R <?php echo number_format($quote_calculations['admin_charge_2'], 2, '.', ',')  ?></td>
			<td style="text-align:center;">R <?php echo number_format($quote_calculations['admin_charge_3'], 2, '.', ',')  ?></td>
		</tr>
		</table>
</p>
<p>
	<table>
		<tr>
			<td style="width: 200px;">Fund charges</td>
			<td colspan="3">A percentage of the value of the assets.</td>
		</tr>
		<tr>
			<td>Premium charge</td>
			<td colspan="3">This charge is deducted from the single premium.</td>
		</tr>
		<tr>
			<td>Administrative charge</td>
			<td colspan="3">Administrative charges are levied to cover costs incurred in issuing
				and processing the policy and to cover ongoing head office overhead
				costs. This is a monthly renewal charge, which is subject to future
				increases at Metropolitan's discretion
			</td>
		</tr>
	</table>
	<br><br>
	The charges set out above are not guaranteed and can be changed at the discretion of Metropolitan.
</p>
<br><br>
<h3>Claims notification procedures</h3>
<p>
	Payment by Metropolitan in accordance with the Contract shall absolve Metropolitan from any further<br>
	liability in connection with the pensions to which the payment relates.
	<br><br>
	Annuity payments in terms of this quotation will be paid to the Principal Annuitant while the Annuitant is<br>
	alive. In the event that the Annuitant dies within the Guarantee Period, the annuity instalment payable for<br>
	the remainder of the Guarantee Period will be paid in accordance with point 6 below.
	<br><br>
	Every annuitant must submit a certificate of existence to Metropolitan.
	<br><br>
	A spouse's annuity (where applicable) will become payable to the spouse on the death of the <br>
	Principal Annuitant. This annuity will only be payable to the spouse married to the Principal Annuitant at
	the Commencement Date of the Policy.
	<br><br>
	In addition, any spouse who becomes eligible for an annuity on the death of a Principal Annuitant must<br>
	submit the following:
	
	<ul style="font-size:12px;padding-left:20px;list-style:none;">
		<li>(1) Metropolitan's prescribed claim form, duly completed</li>
		<li>(2) The marriage certificate of the Principal Annuitant or a certified copy thereof.</li>
		<li>
			(3) In the case of a common-law union, an Affidavit deposed to before a Commissioner of Oaths, 
	        confirming that the Spouse was the common-law spouse of the Principal Annuitant prior to the
	        annuitant's death
		</li>
		<li>(4) A certified copy of the Spouse's and Principal Annuitant's identity document.</li>
		<li>(5) The death certificate of the Principal Annuitant or a certified copy thereof.</li>
		<li>(6) All payments will be made in terms of Section 37C of the Pension Funds Act 24 of 1956</li>
	</ul>
	<br><br>
</p>
<h3>Complaints</h3>
<p>
	Should the applicant have a complaint of any nature, including a complaint in terms of the Policyholder<br>
	Protection Rules and/or the intermediary, he/she should contact the following department:
	<br><br>
	<table>
		<tr>
			<td style="width: 300px;">Call Centre</td>
			<td colspan="3">
			Tel:  0860 724 724<br>
			Fax: 021 940 6142<br>
			e-mail: info@metropolitan.co.za			
			</td>
		</tr>
	</table>
	<br><br>
	If the complaint cannot be resolved with Metropolitan, it may be referred to:<br>
	The Ombudsman for Long-term Insurance, PO Box 45007, Claremont, 7735.
	<br><br>
</p>
<h3>Cancellation</h3>
<p>
	This policy cannot be cancelled by virtue of its terms and nature in law, but allowance can be made for <br>
	the annuity to be transferred to another insurer. The policy owner has the right to request for such a <br>
	transfer within 30 days of the date of the acceptance letter provided that no benefit has been paid or<br>
	claimed and the event insured against has not occurred. <br>
	He/she will then be entitled to a full refund of all premiums paid less the cost of any cover and/or<br>
	investment return enjoyed. After the 30-day period has lapsed then a penalty charge will be applied on<br>
	transfer.
	<br><br>
	The request to transfer the annuity should be in writing and should be addressed to the head office of
	Metropolitan.
	<br><br>
</p>
	<br><br>
	<br><br>
<h3>Insurer's Address</h3>
<p style="padding-bottom:30px;">
	<table>
		<tr>
			<td style="width: 300px;">Metropolitan Employee Benefits <br>
									  PO Box 2212<br>
									  Bellville<br>
								      7535
			</td>
			<td style="width: 300px;">Parc du Cap<br>
									  Mispel Road<br>
									  Bellville<br>
								      7530
			</td>
		</tr>
	</table>
	<br><br>
	<table>
		<tr>
			<td style="width: 300px;">Tel: 021 940 5911<br>
									  Fax: 021 940 5730<br>
									  e-mail: info@metropolitan.co.za
			</td>
			<td style="width: 300px;"><b>Individual Life Call Centre:</b><br>
									  Tel: 0860 724 724<br>
									  Fax: 021 940 6142
			</td>
		</tr>
	</table>
</p>
<h3>History of annuity increases</h3>
<p>
	<table style="border: 1px solid #000;">
		<tr>
			<th>Year</th>
			<th>Bonus on with profit annuties</th>
			<th>Increase based on 3.5%</th>
			<th>Increase based on 4.0%</th>
			<th>Increase based on 4.5%</th>
			<th>Inflation rate for previous year</th>
		</tr>
	    <tr>
	    	<td>2011</td>
	    	<td style="text-align:center;">11.50%</td>
	    	<td style="text-align:center;">7.63%</td>
	    	<td style="text-align:center;">7.07%</td>
	    	<td style="text-align:center;">6.51%</td>
	    	<td style="text-align:center;">3.48%</td>
	    </tr>
	    <tr>
	    	<td>2010</td>
	    	<td style="text-align:center;">9.20%</td>
	    	<td style="text-align:center;">5.41%</td>
	    	<td style="text-align:center;">4.86%</td>
	    	<td style="text-align:center;">4.31%</td>
	    	<td style="text-align:center;">6.33%</td>
	    </tr>
	    <tr>
	    	<td>2009</td>
	    	<td style="text-align:center;">10.00%</td>
	    	<td style="text-align:center;">6.18%</td>
	    	<td style="text-align:center;">5.62%</td>
	    	<td style="text-align:center;">5.07%</td>
	    	<td style="text-align:center;">9.51%</td>
	    </tr>
	    <tr>
	    	<td>2008</td>
	    	<td style="text-align:center;">14.50%</td>
	    	<td style="text-align:center;">10.63%</td>
	    	<td style="text-align:center;">10.00%</td>
	    	<td style="text-align:center;">9.38%</td>
	    	<td style="text-align:center;">8.98%</td>
	    </tr>
	    <tr>
	    	<td>2007</td>
	    	<td style="text-align:center;">16.10%</td>
	    	<td style="text-align:center;">12.17%</td>
	    	<td style="text-align:center;">11.54%</td>
	    	<td style="text-align:center;">10.91%</td>
	    	<td style="text-align:center;">5.79%</td>
	    </tr>
	    <tr>
	    	<td>2006</td>
	    	<td style="text-align:center;">13.50%</td>
	    	<td style="text-align:center;">9.66%</td>
	    	<td style="text-align:center;">9.04%</td>
	    	<td style="text-align:center;">8.42%</td>
	    	<td style="text-align:center;">3.6%</td>
	    </tr>
	    <tr>
	    	<td>2005</td>
	    	<td style="text-align:center;">9.75%</td>
	    	<td style="text-align:center;">6.04%</td>
	    	<td style="text-align:center;">5.43%</td>
	    	<td style="text-align:center;">4.83%</td>
	    	<td style="text-align:center;">3.39%</td>
	    </tr>
	    <tr>
	    	<td>2004</td>
	    	<td style="text-align:center;">3.00%</td>
	    	<td style="text-align:center;">0.00%</td>
	    	<td style="text-align:center;">0.00%</td>
	    	<td style="text-align:center;">0.00%</td>
	    	<td style="text-align:center;">0.33%</td>
	    </tr>
	    <tr>
	    	<td>2003</td>
	    	<td style="text-align:center;">9.50%</td>
	    	<td style="text-align:center;">5.80%</td>
	    	<td style="text-align:center;">5.19%</td>
	    	<td style="text-align:center;">4.59%</td>
	    	<td style="text-align:center;">12.41%</td>
	    </tr>
	    <tr>
	    	<td>2002</td>
	    	<td style="text-align:center;">11.86%</td>
	    	<td style="text-align:center;">8.08%</td>
	    	<td style="text-align:center;">7.46%</td>
	    	<td style="text-align:center;">6.85%</td>
	    	<td style="text-align:center;">4.59%</td>
	    </tr>
	    <tr>
	    	<td>2001</td>
	    	<td style="text-align:center;">15.80%</td>
	    	<td style="text-align:center;">11.89%</td>
	    	<td style="text-align:center;">11.25%</td>
	    	<td style="text-align:center;">10.63%</td>
	    	<td style="text-align:center;">6.99%</td>
	    </tr>
	</table>
</p>
<h3>Explanatory notes and conditions</h3>
<p style="padding-left:10px;">
	This is not an offer of life insurance, but merely an illustration of benefits based on certain information.
	The application form and related documents together with the policy will form the basis of the contract.
	The issue of a policy will be subject to Metropolitan's usual application requirements and acceptance
	procedures. The quotation is valid only if it has been produced using the most recent version of the
	program. The quotation will expire on 18 April 2011  unless the quotation is accepted, and the
	purchase sum paid in full, by this date, and a signed application form is received by Metropolitan's
	head office not later than 10 days after the expiry date.
	<br><br>
	Should this quotation be accepted, the contract and therefore the actual pension that will be received
	initially by the pensioner, will be based on the actual amount received by Metropolitan.  This new pension
	will be calculated on the same basis as used for this quotation (subject to the difference in amount
	of this quotation and the amount actually received not being excessively big).  By accepting this quotation
	the pensioner is also accepting the new quotation that will be done for this purpose.
	<br><br>
	The annuity is taxable under South African income tax legislation. Insurance companies are obliged to
	deduct this tax at source. The rate at which tax is payable depends on total annual income and might
	differ from the amount actually deducted by Metropolitan. Any such differences will be allowed for
	by the South African Revenue Service in their year-end assessment.  If legislation should change in the
	future, Metropolitan reserves the right to alter the percentage of tax deducted at source.
	<br><br>
	The currency used in this document is South African Rand.
	<br><br>
	This quotation contains privileged and confidential information. Any review, variation, dissemination
	or other manipulation of the information herein is prohibited.  Metropolitan Holdings Ltd and its 
	subsidiaries do not accept liability for, and disclaim, any loss, damage or expense however caused 
	from the use of, or reliance on, such reviewed, varied, disseminated or manipulated information
	<br><br>
</p>
<p style="padding-bottom:30px;">
	I hereby accept this quotation and confirm that I understand the explanatory notes, conditions and <br>
	assumptions set out in this document.
</p>
<p>
	<table>
		<tr>
			<td style="width: 300px;"><span style="border-bottom:1px dashed #000;width:300px;"></span><br>
									  Signature of applicant/authorised official<br>
			</td>
			<td style="width: 300px;"><span style="border-bottom:1px dashed #000;width:300px;"></span><br>
									  Authorised capacity (if applicable)<br>
			</td>
		</tr>
	</table>
	<br><br>
	<table>
		<tr>
			<td style="width: 300px;"><span style="border-bottom:1px dashed #000;width:300px;"></span><br>
									  Signature of guardian (if applicable)<br>
			</td>
			<td style="width: 300px;"><span style="border-bottom:1px dashed #000;width:300px;"></span><br>
									  Date<br>
			</td>
		</tr>
	</table>
	<br>
	<span style="font-size:10px;">Metropolitan Life Limited is an authorised Financial Services Provider</span>
</p>