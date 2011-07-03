<h2>A Metropolitan Life Quotation</h2>

<p>
	Quotation date:    <?php echo $quote_calculations['quote_date'] ?> <br>
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
			<td colspan="3"><?php echo $quote_calculations['first_payment_date'] ?></td>
		</tr>
		<tr>
			<td>Guarantee term in months:  </td>
			<td colspan="3"><?php echo $quote_calculations['first_increase_date'] ?></td>
		</tr>
		<tr>
			<td>Post Retirement Interest Rate:</td>
			<td style="text-align:center;">3.50%</td>
			<td style="text-align:center;">4.00%</td>
			<td style="text-align:center;">4.50%</td>
		</tr>
		<tr>
			<td>Purchase Sum</td>
			<td><?php echo $quote_calculations['pp1'] ?></td>
			<td><?php echo $quote_calculations['pp2'] ?></td>
			<td><?php echo $quote_calculations['pp3'] ?></td>
		</tr>
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
			<td colspan="3"><?php echo $client->getFirstName().' '.$client->getLastName() ?></td>
		</tr>
		<tr>
			<td>Date of Birth</td>
			<td colspan="3">Taxable Individual</td>
		</tr>
		<tr>
			<td>Age Next Birthday</td>
			<td colspan="3"><?php echo $quote_calculations['main_age_next'] ?></td>
		</tr>
		<tr>
			<td>Sex</td>
			<td colspan="3">Compulsory</td>
		</tr>
		<tr>
			<td>Country of Residence</td>
			<td colspan="3">Compulsory</td>
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
		
		<table>
		<tr>
			<td style="width: 300px;">Dicount Rate:</td>
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
			<td style="text-align:center;width: 130px;"><?php echo $quote_calculations['premium_charge_1'] ?></td>
			<td style="text-align:center;width: 130px;"><?php echo $quote_calculations['premium_charge_2'] ?></td>
			<td style="text-align:center;width: 130px;"><?php echo $quote_calculations['premium_charge_3'] ?></td>
		</tr>
		<tr>
			<td>Administrative Charges</td>
			<td style="text-align:center;width: 130px;"><?php echo $quote_calculations['admin_charge_1'] ?></td>
			<td style="text-align:center;width: 130px;"><?php echo $quote_calculations['admin_charge_2'] ?></td>
			<td style="text-align:center;width: 130px;"><?php echo $quote_calculations['admin_charge_3'] ?></td>
		</tr>

	</table>
</p>