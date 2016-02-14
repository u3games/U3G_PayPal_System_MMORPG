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
	$myPayPalEmail = 'YourSandboxTestPaypal@Account.com';
	$payPalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
}
else
{
	// Fill your PayPal email below
	// This is where you will receive the donations
	$myPayPalEmail = 'YourPaypal@Account.com';
	$payPalURL = "https://www.paypal.com/cgi-bin/webscr";
}

// Your paypal ipn file /ipn_donations.php directory
// Notice this value is used to post back from paypal to your website always use full adress
// Default: https://yourwebsite.com/system/ipn
$urlipn = 'https://yourwebsite.com/system/ipn';

// File location for your /done.php thank you page
// Notice this value is used to post back from paypal to your website always use full adress
// Default: https://yourwebsite.com
$ipnthnx = 'https://yourwebsite.com';

// Define the currency you want to use for paypal
// You can find them here https://developer.paypal.com/docs/classic/api/currency_codes/
$currency_code = 'EUR';

//change the currency on the donation centre page. Visible html only
$currency_code_html = '€';

// Define the donation item_id
$item_id = '3470'; // Gold Bar

// Turn donation options on or off (true=on | false=off)
// Reward coins
$coins_enabled = true;
// Remove karma
$karma_enabled = true;
// Remove PK points
$pkpoints_enabled = true;
// Enchant equipped items
$enchant_item_enabled = true;

/**
 * COIN OPTIONS
 * IMPORTANT: Always use a different $donatecoinamount price amount on eatch option!!!.
 */
 
// Define coin option 1 (true=on | false=off)
$coins1_enabled = true;
// price of the donation.
$donatecoinamount1 = 1;
// The reward coins amount.
$donatecoinreward1 = 1;

// Define coin option 2 (true=on | false=off)
$coins2_enabled = true;
// Price of the donation.
$donatecoinamount2 = 5;
//  The reward coins amount.
$donatecoinreward2 = 6;

// Define coin option 3 (true=on | false=off)
$coins3_enabled = true;
// Price of the donation.
$donatecoinamount3 = 10;
// The reward coins amount.
$donatecoinreward3 = 15;

// Define coin option 4 (true=on | false=off)
$coins4_enabled = true;
// Price of the donation.
$donatecoinamount4 = 20;
// The reward coins amount.
$donatecoinreward4 = 40;

/**
 * KARMA OPTIONS
 * IMPORTANT: Always use a different $donatekarmaamount price on eatch option!!!.
 */
 
// Define karma option 1 (true=on | false=off)
$karma1_enabled = true;
// Price of the donation.
$donatekarmaamount1 = 2;
// The amount of karma that needs to be removed.
$donateremovekarma1 = 2000;

// Define karma option 2 (true=on | false=off)
$karma2_enabled = true;
// Price of the donation.
$donatekarmaamount2 = 3;
// The amount of karma that needs to be removed.
$donateremovekarma2 = 4000;

// Define karma option 3 (true=on | false=off)
$karma3_enabled = true;
// Price of the donation.
$donatekarmaamount3 = 5;
// The amount of karma that needs to be removed.
$donateremovekarma3 = 6000;

// Define karma option 4 (true=on | false=off)
$karma4_enabled = true;
// Price of the donation. (All karma gets removed)
$donatekarmaallamount = 10;

/**
 * PK POINTS OPTIONS
 * IMPORTANT: Always use a different $donatepkamount price on eatch option!!!.
 */

// Define PK points option 1 (true=on | false=off)
$pkpoints1_enabled = true;
// Price of the donation.
$donatepkamount1 = 1;
// The amount of PK points that needs to be removed.
$donateremovepk1 = 5;

// Define PK points option 2 (true=on | false=off)
$pkpoints2_enabled = true;
// Price of the donation.
$donatepkamount2 = 2;
// The amount of PK points that needs to be removed.
$donateremovepk2 = 11;

// Define PK points option 3 (true=on | false=off)
$pkpoints3_enabled = true;
// Price of the donation.
$donatepkamount3 = 5;
// The amount of PK points that needs to be removed.
$donateremovepk3 = 25;

// Define PK points option 4 (true=on | false=off)
$pkpoints4_enabled = true;
// Price of the donation. (All pk points gets removed)
$donatepkallamount = 15;

/**
 * ENCHANT ITEM OPTIONS
 */

// Define SHIRT enchant (true=on | false=off)
$shirt_enchant_enabled = true;
// Enchant amount.
$shirt_enchant_amount = 18;
// Price of the donation.
$shirt_donate_amount = 10;

// Define HELMET enchant (true=on | false=off)
$helmet_enchant_enabled = true;
// Enchant amount.
$helmet_enchant_amount = 18;
// Price of the donation.
$helmet_donate_amount = 10;

// Define NECKLACE enchant (true=on | false=off)
$necklace_enchant_enabled = true;
// Enchant amount.
$necklace_enchant_amount = 18;
// Price of the donation.
$necklace_donate_amount = 10;

// Define WEAPON enchant (true=on | false=off)
$weapon_enchant_enabled = true;
// Enchant amount.
$weapon_enchant_amount = 18;
// Price of the donation.
$weapon_donate_amount = 10;

// Define BREASTPLATE and FULL ARMOR enchant (true=on | false=off)
$breastplate_full_enchant_enabled = true;
// Enchant amount.
$breastplate_full_enchant_amount = 18;
// Price of the donation.
$breastplate_full_donate_amount = 10;

// Define SHIELD enchant (true=on | false=off)
$shield_enchant_enabled = true;
// Enchant amount.
$shield_enchant_amount = 18;
// Price of the donation.
$shield_donate_amount = 10;

// Define RINGS  enchant (true=on | false=off)
$ring_enchant_enabled = true;
// Enchant amount.
$ring_enchant_amount = 18;
// Price of the donation.
$ring_donate_amount = 15;

// Define EARRINGS enchant (true=on | false=off)
$earring_enchant_enabled = true;
// Enchant amount.
$earring_enchant_amount = 18;
// Price of the donation.
$earring_donate_amount = 10;

// Define GLOVES enchant (true=on | false=off)
$gloves_enchant_enabled = true;
// Enchant amount.
$gloves_enchant_amount = 18;
// Price of the donation.
$gloves_donate_amount = 10;

// Define LEGGINGS enchant (true=on | false=off)
$leggings_enchant_enabled = true;
// Enchant amount.
$leggings_enchant_amount = 18;
// Price of the donation.
$leggings_donate_amount = 10;

// Define BOOTS enchant (true=on | false=off)
$boots_enchant_enabled = true;
// Enchant amount.
$boots_enchant_amount = 18;
// Price of the donation.
$boots_donate_amount = 10;

// Define BELT enchant (true=on | false=off)
$belt_enchant_enabled = true;
// Enchant amount.
$belt_enchant_amount = 18;
// Price of the donation.
$belt_donate_amount = 10;

// Define ALL ITEMS enchant (true=on | false=off)
$all_enchant_enabled = true;
// Enchant amount.
$all_enchant_amount = 18;
// Price of the donation.
$all_donate_amount = 100;


// Enable or Disable Captcha (true=on | false=off )
// Default: true
$use_captcha = true;
 
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

// Sets the title of all the pages.
$site_title = 'U3G | PayPal System';
?>
