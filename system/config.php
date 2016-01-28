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

// Enabled sandbox for test system.
// NOTICE: IPN simulator will give invalid response back if this is set to false
// Set "true" for test and "false" for live.
// Default: true
$use_sandbox = true;

if ($use_sandbox == true)	// <-- there is no need to touch this line.
{
	// Test seller account
	$myPayPalEmail = 'test.seller@account.com';
	$payPalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
}
else
{
	// Fill your PayPal email below
	// This is where you will receive the donations
	$myPayPalEmail = 'YourPaypal@Account.com';
	$payPalURL = "https://www.paypal.com/cgi-bin/webscr";
}

// Your paypal ipn's files directory
// Default: system/ipn
$urlipn = 'system/ipn';

// Define the currency you want to use for paypal
// You can find them here https://developer.paypal.com/docs/classic/api/currency_codes/
$currency_code = 'EUR';

//change the currency on the donation centre page. Visible html only
$currency_code_html = '€';

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

// Enable or Disable Telnet, require config (true=on | false=off )
// Default: false
$use_telnet = false;

// Turn error reporting on or off (true=on | false=off)
// NOTE: this option only applies to errors to end users
// Default: true
$use_reporting = true;

// Turn error reporting to file on or off (true=on | false=off)
// NOTE: this will only disable or enable logging from your web page not the ipn file.
// Default: true
$use_local_reporting = true;

// File location for log file
// Default: system/admin/log/website_error_log.php
$log_location = 'system/admin/log/website_error_log.php';

// specify log location for the ipn file
// Default: ../admin/log/website_error_log.php
$log_location_ipn = '../admin/log/website_error_log.php';

// Use a delay when someone submit a form
// It will give a little bit protection against a brute force attack
// Enable or Disable loading delay: (true=on | false=off)
// Default: true
$loading_delay = true;

// Total delay in seconds
// Default: 3
$delaytime = 3;

// Donate overview settings
// Enable or disable donate overview
// Default: true
$donate_overview = true;

// Enable or disable ip access security
// NOTE: when you disable this everyone can access the donate overview login page
// NOTE: Separate access to website_error_log.php and ipn_log.php will be blocked for everyone even if enabled
// Default: true
$overview_ip_security = true;

// Ip adresses allowed to access the donate overview and log files
$allowed_client1 = '127.0.0.1';
$allowed_client2 = '127.0.0.1';
$allowed_client3 = '127.0.0.1';
$allowed_client4 = '127.0.0.1';
$allowed_client5 = '127.0.0.1';
?>
