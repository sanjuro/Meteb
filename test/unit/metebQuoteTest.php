<?php
/**
 * Unit test for MetebQuote Class
 *
 * @author Shadley Wentzel<shad6ster@gmail.com>
 * @package MetebQuote
 */

include(dirname(__FILE__).'/../bootstrap/Doctrine.php');
 
$t = new lime_test(20);

/**
 * Test for Generate Function
 */

$quote = Doctrine_Core::getTable('Quote')->findOneById(1);
$t->diag("Quote Generate test: Quote Type: Purchase Price, Purchase Price : 1,000,000.00, Annuity : 0.00, Second Life : Yes, Main DOB: 1936-07-01, Spouse DOB: 1946-07-01, GP: 60, Spouse reversion: 0.75, Commission: 1.50");

$quoteDetails = MetebQuote::generate($quoteInputArray, 1.50, 1000000, 0);

// Purchase Price
$t->is(round($quoteDetails['pp1'], 2) == 1000000.00, true, 'Generate: Purchase Price 1 - 1000000.00');
$t->is(round($quoteDetails['pp2'], 2) == 1000000.00, true, 'Generate: Purchase Price 2 - 1000000.00');
$t->is(round($quoteDetails['pp3'], 2) == 1000000.00, true, 'Generate: Purchase Price 2 - 1000000.00');

// Gross Annutiy
$t->is(round($quoteDetails['gross_annuity_1'], 2) == 6045.13, true, 'Generate: Gross Annutiy 1 - 6045.13');
$t->is(round($quoteDetails['gross_annuity_2'], 2) == 6046.75, true, 'Generate: Gross Annutiy 2 - 6046.75');
$t->is(round($quoteDetails['gross_annuity_3'], 2) == 6048.32, true, 'Generate: Gross Annutiy 3 - 6048.32');

// Tax
$t->is(round($quoteDetails['tax1'], 2) == 0.00, true, 'Generate: Tax 1 - 0.00');
$t->is(round($quoteDetails['tax2'], 2) == 0.00, true, 'Generate: Tax 2 - 0.00');
$t->is(round($quoteDetails['tax2'], 2) == 0.00, true, 'Generate: Tax 3 - 0.00');

// Net Annutiy
$t->is(round($quoteDetails['net_annuity_1'], 2) == 6045.13, true, 'Generate: Net Annutiy 1 - 6045.13');
$t->is(round($quoteDetails['net_annuity_2'], 2) == 6046.75, true, 'Generate: Net Annutiy 2 - 6046.75');
$t->is(round($quoteDetails['net_annuity_3'], 2) == 6048.32, true, 'Generate: Net Annutiy 3 - 6048.32');

// Premium Charge
$t->is(round($quoteDetails['premium_charge_1'], 2) == 13870.38, true, 'Generate: Premium Charge 1 - 13870.38');
$t->is(round($quoteDetails['premium_charge_2'], 2) == 13870.38, true, 'Generate: Premium Charge 2 - 13870.38');
$t->is(round($quoteDetails['premium_charge_3'], 2) == 13870.38, true, 'Generate: Premium Charge 3 - 13870.38');

// Admin Charge
$t->is(round($quoteDetails['admin_charge_1'], 2) == 56.43, true, 'Generate: Admin Charge 1 - 56.43');
$t->is(round($quoteDetails['admin_charge_2'], 2) == 56.43, true, 'Generate: Admin Charge 2 - 56.43');
$t->is(round($quoteDetails['admin_charge_3'], 2) == 56.43, true, 'Generate: Admin Charge 3 - 56.43');

// Ages
$t->is($quoteDetails['main_age_next'] == 76, true, 'Generate: Main Age Next - 76');
$t->is($quoteDetails['spouse_age_next'] == 66, true, 'Generate: Spouse Age Next - 66');

// Meteb::TKO($quoteDetails);
?>