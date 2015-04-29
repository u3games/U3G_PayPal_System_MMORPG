<?php

/*
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * PayPal System - Config
 */

// Here we can define if we want to work on the sandbox or live
// Here you can find the Paypal ipn simulator https://developer.paypal.com/webapps/developer/applications/ipn_simulator
// NOTICE: IPN simulator will give invalid response back if this is set to 1

// Set to 1 once you're ready to go live
define("USE_SANDBOX", 0);

if (USE_SANDBOX == true)
{
	// Fill your PayPal email below
	// This is where you will receive the donations
	$myPayPalEmail = 'YourPaypal@Account.com';
	$payPalURL = "https://www.paypal.com/cgi-bin/webscr";
}
else
{
	// Test seller account
	$myPayPalEmail = 'test.seller@account.com';
	$payPalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
}

// Your paypal ipn's files directory
$urlipn = 'http://yourweb.site/paypalsystem/donate/ipn';

// Your paypal thank you page directory
$urlthx = 'http://yourweb.site/paypalsystem/paypal';

// Define your currency code
// You can find them here https://developer.paypal.com/docs/classic/api/currency_codes/
// Notice: if you wanna change the currency on the donation centre page also ? Go here \paypalsystem\paypal and change the $ signs manually
$currency_code = 'EUR';

// Define the donation item_id
$item_id = '3470'; // Gold Bar 

// Define coin option 1, coin amount and donate amount.
$donatecoinamount1 = 1;
$donatecoinreward1 = 1;

// Define coin option 2, coin amount and donate amount.
$donatecoinamount2 = 5;
$donatecoinreward2 = 6;

// Define coin option 3, coin amount and donate amount.
$donatecoinamount3 = 10;
$donatecoinreward3 = 15;

// Define coin option 4, coin amount and donate amount.
$donatecoinamount4 = 20;
$donatecoinreward4 = 40;

// Turn error reporting on or of (1=on | 0=off)
define("USE_REPORTING", 1);

if (USE_REPORTING == true)
{
	// empty
}
else
{
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
}

// Use a delay when someone submit a form
// It will give a little bit protection against a brute force attack
// Enable or Disable loading delay: (1=on | 0=off)
define("LOADING_DELAY", 1);

// Total delay in seconds
// Default: 3
$delaytime = 3;
?>