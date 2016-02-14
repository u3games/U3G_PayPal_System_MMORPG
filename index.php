<!DOCTYPE html>
<html>
<head>
<?php require 'system/config.php'; ?>
<!-- Title -->
<title><?php echo $site_title ?></title>

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Lineage 2: PayPal System!">
<meta name="keywords" content="l2, lineage, lineage2, u3games, u3g, u3, paypal, system">
<meta name="author" content="U3games, Swarlog, Dasoldier">
<?php
require 'system/connect.php';
include_once 'common.php';

	// prevent client side  caching
	header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	//reporting to end users
	if ($use_reporting == false)
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}
	
	//XML full names on items
	// Load xml file
	$xml_file = "system/xml/1.xml";
	$xmlload= simplexml_load_file($xml_file);
	
	// Full item name based on id and xml. Always use item id minus 1.
	$item_coins_id_min1 = $item_id - 1;
	$item_coins_name = $xmlload->item[$item_coins_id_min1]['name'];

	$charname = false;
	// set connection to null
	$connection = null;
if (isset($_POST["submit"]))
	{
		// Get POST character name
		$charname = htmlspecialchars($_POST['custom']);

		try {
				//try to make connection
				$connection = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8", $db_user, $db_pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//query for checking if character exists
				$character_row = $connection->prepare('SELECT char_name FROM characters WHERE char_name = ? LIMIT 1');
				$character_row->bindValue(1, $charname, PDO::PARAM_STR);
				$character_row->execute();
				$character_row_fetch = $character_row->fetchAll();
				$character_row_count = count($character_row_fetch);

				// Check if character is online
				$onlinechar_row = $connection->prepare('SELECT online FROM characters WHERE char_name = ? LIMIT 1');
				$onlinechar_row->bindValue(1, $charname, PDO::PARAM_STR);
				$onlinechar_row->execute();
				$character_row_fetch = $onlinechar_row->fetchAll();
						
			if (!isset($character_row_fetch[0]['online']))
			{
				$character_row_fetch[0]['online'] = null;
			}
				$onlinearray = $character_row_fetch[0]['online'];
		}
		
		catch(PDOException $e) {
			// set connection to null
			$connection = null;

			// visible end user reporting
			if ($use_reporting == true)
			{
				echo 'ERROR: ' . $e->getMessage();
			}

			// local file reporting
			if ($use_local_reporting == true)
			{
				//logging: file location
				$local_log_file = $log_location;

				//logging: Timestamp
				$local_log = '['.date('m/d/Y g:i A').'] - ';

				//logging: response from the server
				$local_log .= "INDEX.PHP ERROR: ". $e->getMessage();	
				$local_log .= '</td></tr><tr><td>';

				// Write to log
				$fp=fopen($local_log_file,'a');
				fwrite($fp, $local_log . ""); 

				// close file
				fclose($fp);
			}
		}
	}
	?>
</head>
<body>
<?php
	// go in here if enchant submit button is used
	if (!empty($_POST['enchantsubmit']))
	{
		// Get POST selcted enchant option 
		$get_enchant_option = @htmlspecialchars($_POST['os0']);

		// Checks if something is selected in the enchant select box
		if ($get_enchant_option != "")
		{
				// Get POST character name
				$selected_charname = htmlspecialchars($_POST['charname_select']);
				
				$donation_option4 = 'Enchitems';
				
				// Get POST  item naming information.
				$shirt_item_name = htmlspecialchars($_POST['shirt_name_select']);
				$helmet_item_name = htmlspecialchars($_POST['helmet_name_select']);
				$weapon_item_name = htmlspecialchars($_POST['weapon_name_select']);
				$necklace_item_name = htmlspecialchars($_POST['necklace_name_select']);
				$breastplate_item_name = htmlspecialchars($_POST['breastplate_full_name_select']);
				$shield_item_name = htmlspecialchars($_POST['shield_name_select']);
				$ring1_item_name = htmlspecialchars($_POST['ring1_name_select']);
				$ring2_item_name = htmlspecialchars($_POST['ring2_name_select']);
				$lowearring_item_name = htmlspecialchars($_POST['lowearring_name_select']);
				$upearring_item_name = htmlspecialchars($_POST['upearring_name_select']);
				$gloves_item_name = htmlspecialchars($_POST['gloves_name_select']);
				$leggings_item_name = htmlspecialchars($_POST['leggings_name_select']);
				$boots_item_name = htmlspecialchars($_POST['boots_name_select']);
				$belt_item_name = htmlspecialchars($_POST['belt_name_select']);
				
				// Get POST enchant information.
				$shirt_item_enc = htmlspecialchars($_POST['shirt_select_enc']);
				$helmet_item_enc = htmlspecialchars($_POST['helmet_select_enc']);
				$weapon_item_enc = htmlspecialchars($_POST['weapon_select_enc']);
				$necklace_item_enc = htmlspecialchars($_POST['necklace_select_enc']);
				$breastplate_item_enc = htmlspecialchars($_POST['breastplate_full_select_enc']);
				$shield_item_enc = htmlspecialchars($_POST['shield_select_enc']);
				$ring1_item_enc = htmlspecialchars($_POST['ring1_select_enc']);
				$ring2_item_enc = htmlspecialchars($_POST['ring2_select_enc']);
				$lowearring_item_enc = htmlspecialchars($_POST['lowearring_select_enc']);
				$upearring_item_enc = htmlspecialchars($_POST['upearring_select_enc']);
				$gloves_item_enc = htmlspecialchars($_POST['gloves_select_enc']);
				$leggings_item_enc = htmlspecialchars($_POST['leggings_select_enc']);
				$boots_item_enc = htmlspecialchars($_POST['boots_select_enc']);
				$belt_item_enc = htmlspecialchars($_POST['belt_select_enc']);
				$all_item_enc = htmlspecialchars($_POST['all_select_enc']);
				
				// Used for checking
				$shirt_enc = 'Shirt';
				$helmet_enc = 'Helmet';
				$necklace_enc = 'Necklace';
				$weapon_enc = 'Weapon';
				$fullarmorbreastplate_enc = 'FullarmorBreastplate';
				$shield_enc = 'Shield';
				$ring1_enc = 'Ring1';
				$ring2_enc = 'Ring2';
				$earring1_enc = 'Earring1';
				$earring2_enc = 'Earring2';
				$gloves_enc = 'Gloves';
				$leggings_enc = 'Leggings';
				$boots_enc = 'Boots';
				$belt_enc = 'Belt';
				$all_enc = 'All_Enc';
				
					?>
				<!-- Player logged in successfully and the character is logged out -->
				<center>
				<table>
					<tr><td><?php echo $lang['enchant_1'], ' ', $selected_charname?></td></tr>
					<tr><td>
					<?php echo $lang['enchant_2'], ' ';
					if ($shirt_enc == $get_enchant_option)
						{
							echo $shirt_item_name, ' +', $shirt_item_enc;
						}
					if ($helmet_enc == $get_enchant_option)
						{
							echo $helmet_item_name, ' +', $helmet_item_enc;
						}
					if ($necklace_enc == $get_enchant_option)
						{
							echo $necklace_item_name, ' +', $necklace_item_enc;
						}
					if ($weapon_enc == $get_enchant_option)
						{
							echo $weapon_item_name, ' +', $weapon_item_enc;
						}
					if ($fullarmorbreastplate_enc == $get_enchant_option)
						{
							echo $breastplate_item_name, ' +', $breastplate_item_enc;
						}
					if ($shield_enc == $get_enchant_option)
						{
							echo $shield_item_name, ' +', $shield_item_enc;
						}
					if ($ring1_enc == $get_enchant_option)
						{
							echo $ring1_item_name, ' +', $ring1_item_enc;
						}
					if ($ring2_enc == $get_enchant_option)
						{ 
							echo $ring2_item_name, ' +', $ring2_item_enc;
						}
					if ($earring1_enc == $get_enchant_option)
						{
							echo $lowearring_item_name, ' +', $lowearring_item_enc;
						}
					if ($earring2_enc == $get_enchant_option)
						{
							echo $upearring_item_name, ' +', $upearring_item_enc;
						}
					if ($gloves_enc == $get_enchant_option)
						{
							echo $gloves_item_name, ' +', $gloves_item_enc;
						}
					if ($leggings_enc == $get_enchant_option)
						{ 
							echo $leggings_item_name, ' +', $leggings_item_enc;
						}
					if ($boots_enc == $get_enchant_option)
						{
							echo $boots_item_name, ' +', $boots_item_enc;
						}
					if ($belt_enc == $get_enchant_option)
						{
							echo $belt_item_name, ' +', $belt_item_enc;
						}
					if ($all_enc == $get_enchant_option)
						{
							echo $shirt_item_name, ' +', $shirt_item_enc, '<br>';
							echo $helmet_item_name, ' +', $helmet_item_enc, '<br>';
							echo $necklace_item_name, ' +', $necklace_item_enc, '<br>';
							echo $weapon_item_name, ' +', $weapon_item_enc, '<br>';
							echo $breastplate_item_name, ' +', $breastplate_item_enc, '<br>';
							echo $shield_item_name, ' +', $shield_item_enc, '<br>';
							echo $ring1_item_name, ' +', $ring1_item_enc, '<br>';
							echo $ring2_item_name, ' +', $ring2_item_enc, '<br>';
							echo $lowearring_item_name, ' +', $lowearring_item_enc, '<br>';
							echo $upearring_item_name, ' +', $upearring_item_enc, '<br>';
							echo $gloves_item_name, ' +', $gloves_item_enc, '<br>';
							echo $leggings_item_name, ' +', $leggings_item_enc, '<br>';
							echo $boots_item_name, ' +', $boots_item_enc, '<br>';
							echo $belt_item_name, ' +', $belt_item_enc, '<br>';
						}
						
					?>
					</td>
				</tr>
			</table>
					
				</center>
				<center><div id="enchantitems">
				<!-- oke now lets show the final donation page -->
				<form action="<?php echo $payPalURL?>" method="post" class="payPalForm">
				<input type="hidden" name="cmd" value="_donations" />
				
				<!-- item name that will be passed to paypal -->
				<input type="hidden" name="item_name" value="<?php
					if ($shirt_enc == $get_enchant_option)
						{
							echo $shirt_item_name, ' +', $shirt_enchant_amount;
						}
					if ($helmet_enc == $get_enchant_option)
						{
							echo $helmet_item_name, ' +', $helmet_enchant_amount;
						}
					if ($necklace_enc == $get_enchant_option)
						{
							echo $weapon_item_name, ' +', $weapon_enchant_amount;
						}
					if ($weapon_enc == $get_enchant_option)
						{
							echo $necklace_item_name, ' +', $necklace_enchant_amount;
						}
					if ($fullarmorbreastplate_enc == $get_enchant_option)
						{
							echo $breastplate_item_name, ' +', $breastplate_full_enchant_amount;
						}
					if ($shield_enc == $get_enchant_option)
						{
							echo $shield_item_name, ' +', $shield_enchant_amount;
						}
					if ($ring1_enc == $get_enchant_option)
						{
							echo $ring1_item_name, ' +',	$ring_enchant_amount;
						}
					if ($ring2_enc == $get_enchant_option)
						{ 
							echo $ring2_item_name, ' +', $ring_enchant_amount;
						}
					if ($earring1_enc == $get_enchant_option)
						{
							echo $lowearring_item_name, ' +', $earring_enchant_amount;
						}
					if ($earring2_enc == $get_enchant_option)
						{
							echo $upearring_item_name, ' +', $earring_enchant_amount;
						}
					if ($gloves_enc == $get_enchant_option)
						{
							echo $gloves_item_name, ' +', $gloves_enchant_amount;
						}
					if ($leggings_enc == $get_enchant_option)
						{ 
							echo $leggings_item_name, ' +', $leggings_enchant_amount;
						}
					if ($boots_enc == $get_enchant_option)
						{
							echo $boots_item_name, ' +', $boots_enchant_amount;
						}
					if ($belt_enc == $get_enchant_option)
						{
							echo $belt_item_name, ' +', $belt_enchant_amount;
						}
					if ($all_enc == $get_enchant_option)
						{
							echo $lang['message_16'];
						}
						
					?>"/>

				<!-- Custom field enchant items -->
				<input type="hidden" name="custom" value="<?php echo $selected_charname, '|', $donation_option4, '|', $get_enchant_option;?>">
				
				<!-- Your PayPal email -->
				<input type="hidden" name="business" value="<?php echo $myPayPalEmail?>" />
				<!-- PayPal will send an IPN notification to this URL -->
				<input type="hidden" name="notify_url" value="<?php echo $urlipn?>/ipn_donations.php" />
				
				<!-- The return page to which the user is navigated after the donations is complete -->
				<input type="hidden" name="return" value="<?php echo $ipnthnx?>/done.php" />
				
				<!-- Signifies that the transaction data will be passed to the return page by POST -->
				<input type="hidden" name="rm" value="2" />
				
				<!-- General configuration variables for the paypal landing page. Consult -->
				<!-- http://www.paypal.com/IntegrationCenter/ic_std-variable-ref-donate.html for more info -->
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="cbt" value="Go Back To The Site" />
				<input type="hidden" name="no_shipping" value="1" />
				<input type="hidden" name="lc" value="US" />
				<input type="hidden" name="currency_code" value="<?php echo $currency_code?>" />
				
				<select name="amount">
					<?php
				if ($shirt_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $shirt_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$shirt_item_name, ' ', '+', $shirt_enchant_amount, ' ',  $currency_code_html, $shirt_donate_amount;?>.00 </option>
						<?php
					}
				if ($helmet_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $helmet_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$helmet_item_name, ' ', '+', $helmet_enchant_amount, ' ',  $currency_code_html, $helmet_donate_amount;?>.00 </option>
						<?php
					}
				if ($necklace_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $necklace_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$necklace_item_name, ' ', '+', $necklace_enchant_amount, ' ',  $currency_code_html, $necklace_donate_amount;?>.00 </option>
						<?php
					}
				if ($weapon_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $weapon_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$weapon_item_name, ' ', '+', $weapon_enchant_amount, ' ',  $currency_code_html, $weapon_donate_amount;?>.00 </option>
						<?php
					}
				if ($fullarmorbreastplate_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $breastplate_full_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$breastplate_item_name, ' ', '+', $breastplate_full_enchant_amount, ' ',  $currency_code_html, $breastplate_full_donate_amount;?>.00 </option>
						<?php
					}
				if ($shield_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $shield_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$shield_item_name, ' ', '+', $shield_enchant_amount, ' ',  $currency_code_html, $shield_donate_amount;?>.00 </option>
						<?php
					}
				if ($ring1_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $ring_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$ring1_item_name, ' ', '+', $ring_enchant_amount, ' ',  $currency_code_html, $ring_donate_amount;?>.00 </option>
						<?php
					}
				if ($ring2_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $ring_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$ring2_item_name, ' ', '+', $ring_enchant_amount, ' ',  $currency_code_html, $ring_donate_amount;?>.00 </option>
						<?php
					}
				if ($earring1_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $earring_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$lowearring_item_name, ' ', '+', $earring_enchant_amount, ' ',  $currency_code_html, $earring_donate_amount;?>.00 </option>
						<?php
					}
				if ($earring2_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $earring_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$upearring_item_name, ' ', '+', $earring_enchant_amount, ' ',  $currency_code_html, $earring_donate_amount;?>.00 </option>
						<?php
					}
				if ($gloves_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $gloves_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$gloves_item_name, ' ', '+', $gloves_enchant_amount, ' ',  $currency_code_html, $gloves_donate_amount;?>.00 </option>
						<?php
					}
				if ($leggings_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $leggings_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$leggings_item_name, ' ', '+', $leggings_enchant_amount, ' ',  $currency_code_html, $leggings_donate_amount;?>.00 </option>
						<?php
					}
				if ($boots_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $boots_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$boots_item_name, ' ', '+', $boots_enchant_amount, ' ',  $currency_code_html, $boots_donate_amount;?>.00 </option>
						<?php
					}
				if ($belt_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $belt_donate_amount?>"><?php echo $lang['message_13'], ':',' ',$belt_item_name, ' ', '+', $belt_enchant_amount, ' ',  $currency_code_html, $belt_donate_amount;?>.00 </option>
						<?php
					}
				if ($all_enc == $get_enchant_option)
					{
						?>
						<option value="<?php echo $all_donate_amount?>"><?php echo $lang['message_16'], ' ', '+', $all_enchant_amount, ' ',  $currency_code_html, $all_donate_amount;?>.00 </option>
						<?php
					}
					?>
					
				</select><br><br>
				
				<!-- Here you can change the image of the coins donation button  -->
				<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" />
				<img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest" />
				</form>
				<br>
			</div></center>
			<?php
			// set connection to null
			$connection = null;
			}
			// No item has been selected
			else
			{
				include("recallform.php");
				?>
					<center><?php echo $lang['message_15']; ?> </center><br>
				<?php
				// set connection to null
				$connection = null;
			}
		}
//Otherwise enchant submit is empty. go to index 
if (empty($_POST['enchantsubmit']))
	{?>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" id="login">
		<tr>
			<td align="center">
				<?php
					// first form
					if (!isset($_POST['submit']))
					{
						?>
						<div id="login">
							<form action="index.php" method="post">
								<center>
									<table>
										<tr>
											<td><center><?php echo $lang['character_name']; ?></center></td>
										</tr>
										<tr>
											<td><center><input type="text" name="custom" value="<?php echo $charname?>" maxlength="35" style="width: 135px"></center></td>
										</tr>
										</table>
											<p>
											<?php
												echo $lang['select_option'];
											?>
											<br>
											<select name="donation_select">
											  <option value=""></option>
											<?php 
												if ($coins_enabled == true)
													{
														?>
														<option value="Coins"><?php echo $item_coins_name, 's';?></option>
														<?php
													}
												if ($karma_enabled == true)
													{
														?>
														<option value="Karma"><?php echo $lang['message_8'],' ', $lang['message_9'];?></option>
														<?php 
													}
												if ($pkpoints_enabled == true)
													{
														?>
														<option value="Pkpoints"><?php echo $lang['message_8'],' ', $lang['message_11'];?></option>
														<?php
													}
												if ($enchant_item_enabled == true)
													{
														?>
														<option value="Enchitems"><?php echo $lang['message_13'],' ', $lang['message_14'];?></option>
														<?php
													}
											?>
											</select>
											</p>
										<table>
								<?php
								// Enable or disable captcha
								if ($use_captcha == true)
									{
								?>
										<tr>
											<td><center><?php echo $lang['captcha']; ?></center></td>
										</tr>
										<tr>
											<td><input class="input" type="text" name="norobot" value="" style="width: 135px"></td>
										</tr>
										<tr>
											<td><center><img src="system/captcha/captcha.php"></center></td>
										</tr>
								<?php
									}
								?>
										<tr>
											<td><center><input type="submit" name="submit" value="<?php echo $lang['character_button']; ?>"></center></td>
										</tr>
										<tr>
											<td><center><a href="?lang=en"><img src="images/flag/en.png"></a> <a href="?lang=es"><img src="images/flag/es.png"></a> <a href="?lang=nl"><img src="images/flag/nl.png"></a></center></td>
										</tr>
									</table>
								</center> 
							</form>
						</div>
				<?php
					}
				}
		// checks for the first form
		if (isset($_POST['submit']))
			{
				// Wait for x seconds
				if ($loading_delay == true)
					{
						sleep($delaytime);
					}
						if ($use_captcha == true)
						{
							$captcha_post = htmlspecialchars($_POST['norobot']);
							$captcha_random_ses = $_SESSION['randomnr2'];
						}
						if ($use_captcha == false)
						{
							$captcha_post = 1;
							$captcha_random_ses = md5(1);
						}
				// Captcha check
				if (md5($captcha_post) == $captcha_random_ses)	
					{
					// gets the selected option from form
					$donation_select = htmlspecialchars($_POST['donation_select']);

					// Checks the connection
					if ($connection == true)
					{
							// Checks if something is selected in the select box
							if ($donation_select != "")
							{
								$donation_option1 = 'Coins';
								$donation_option2 = 'Karma';
								$donation_option3 = 'Pkpoints';
								$donation_option4 = 'Enchitems';
								// Checks if character name is max 35 characters
								if (strlen($charname) <= 35)
								{
									// Checks if the character name text field is empty
									if ($charname != "")
									{
										// Checks if character name is minimal 3 characters
										if (strlen($charname) > 2)
										{
											// Checks if the character exists
											if ($character_row_count == 0)
											{
												include("recallform.php");
												?>
													<center><?php echo $lang['message_1']; ?> <b><?php echo $charname?></b> <?php echo $lang['message_2']; ?></center>
												<?php
												// set connection to null
												$connection = null;
											}
												else
												{
													// Checks if the character is online
													if ($onlinearray == 1)
													{
														// Checks if telnet is enabled in the config and if the coins option is selected
														if (($use_telnet == true) && ($donation_select == $donation_option1))
														{
																// character is online and the coin option is selected.
												?>
																<div id="loginsuccess">
																	<!-- oke now lets show the donation options -->
																	<!-- The PayPal coins Donation option list -->
																	<form action="<?php echo $payPalURL?>" method="post" class="payPalForm">
																	<input type="hidden" name="cmd" value="_donations" />
																	<input type="hidden" name="item_name" value="Donation" />

																	<!-- custom field that will be passed to paypal -->
																	<input type="hidden" name="custom" value="<?php echo $charname?>|<?php echo $donation_select?>">

																	<!-- Your PayPal email -->
																	<input type="hidden" name="business" value="<?php echo $myPayPalEmail?>" />
																	<!-- PayPal will send an IPN notification to this URL -->
																	<input type="hidden" name="notify_url" value="<?php echo $urlipn?>/ipn_donations.php" />

																	<!-- The return page to which the user is navigated after the donations is complete -->
																	<input type="hidden" name="return" value="<?php echo $ipnthnx?>/done.php" />

																	<!-- Signifies that the transaction data will be passed to the return page by POST -->
																	<input type="hidden" name="rm" value="2" />

																	<!-- Player logged in successfully and the character is logged out -->
																	<center><?php echo $lang['message_3']; ?>  <b><?php echo $charname?></b> <?php echo $lang['message_4']; ?> </center><br>

																	<!-- General configuration variables for the paypal landing page. Consult -->
																	<!-- http://www.paypal.com/IntegrationCenter/ic_std-variable-ref-donate.html for more info -->
																	<input type="hidden" name="no_note" value="1" />
																	<input type="hidden" name="cbt" value="Go Back To The Site" />
																	<input type="hidden" name="no_shipping" value="1" />
																	<input type="hidden" name="lc" value="US" />
																	<input type="hidden" name="currency_code" value="<?php echo $currency_code?>" />

																	<center>
																		<table>
																			<tr><td>
																			<?php
																				echo $lang['message_5'];
																			?>
																			</td><td>
																			<!-- The amount of the transaction: -->
																			<select name="amount" style="width: 150px">
																				<?php 
																					if ($coins1_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount1?>"><?php echo $donatecoinreward1, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount1;?>.00 </option>
																							<?php		
																						}
																					if ($coins2_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount2?>"><?php echo $donatecoinreward2, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount2;?>.00</option>
																							<?php		
																						}
																					if ($coins3_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount3?>"><?php echo $donatecoinreward3, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount3;?>.00</option>
																							<?php		
																						}
																					if ($coins4_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount4?>"><?php echo $donatecoinreward4, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount4;?>.00</option>
																							<?php
																						} 
																							?>
																			</select>
																			</td></tr></table>
																	</center>
																	<br>
																	<!-- Here you can change the image of the coins donation button  -->
																	<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" />
																	<img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
																	<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest" />
																	</form>
																	<br>
																</div>
															<?php
															// set connection to null
															$connection = null;
														}
														// message if telnet is disabled in config and the player needs to logout
														else
														{
															include("recallform.php");
															?>
																<center><?php echo $lang['recallform_1']; ?> </center><br>
															<?php
															// set connection to null
															$connection = null;
														}
													}
													// character is offline
													else
													{
														// checks if coins or karma or pk option is selected.
														if (($donation_select == $donation_option1) || ($donation_select == $donation_option2) || ($donation_select == $donation_option3))
														{
														?>
															<div id="loginsuccess">
																<!-- Player logged in successfully and the character is logged out -->
																<center><?php echo $lang['message_3']; ?>  <b><?php echo $charname?></b> <?php echo $lang['message_4']; ?> </center><br>

																<!-- oke now lets show the donation options -->
																<!-- The PayPal coins Donation option list -->
																<form action="<?php echo $payPalURL?>" method="post" class="payPalForm">
																<input type="hidden" name="cmd" value="_donations" />
																<input type="hidden" name="item_name" value="Donation" />

																<!-- custom field that will be passed to paypal -->
																<input type="hidden" name="custom" value="<?php echo $charname?>|<?php echo $donation_select?>">

																<!-- Your PayPal email -->
																<input type="hidden" name="business" value="<?php echo $myPayPalEmail?>" />
																<!-- PayPal will send an IPN notification to this URL -->
																<input type="hidden" name="notify_url" value="<?php echo $urlipn?>/ipn_donations.php" />
																
																<!-- The return page to which the user is navigated after the donations is complete -->
																<input type="hidden" name="return" value="<?php echo $ipnthnx?>/done.php" />
																
																<!-- Signifies that the transaction data will be passed to the return page by POST -->
																<input type="hidden" name="rm" value="2" />

																<!-- General configuration variables for the paypal landing page. Consult -->
																<!-- http://www.paypal.com/IntegrationCenter/ic_std-variable-ref-donate.html for more info -->
																<input type="hidden" name="no_note" value="1" />
																<input type="hidden" name="cbt" value="Go Back To The Site" />
																<input type="hidden" name="no_shipping" value="1" />
																<input type="hidden" name="lc" value="US" />
																<input type="hidden" name="currency_code" value="<?php echo $currency_code?>" />
																<center>
																	<table>
																		<tr><td>
																			<?php
																				// Coins messagebox text
																				if ($donation_select == $donation_option1)
																					{	
																						echo $lang['message_5'];
																					}
																				// karma messagebox text
																				if ($donation_select == $donation_option2)
																					{	
																						echo $lang['message_8'];
																					}
																				// PK points messagebox text
																				if ($donation_select == $donation_option3)
																					{	
																						echo $lang['message_8'];
																					}
																			?>
																		</td><td>
																		<!-- here the amount of the coins,karma,pk points donation can be configured visible html only -->
																		<!-- The amount of the transaction: -->
																		<select name="amount" style="width: 150px">
																			<?php
																				// COINS
																				if ($donation_select == $donation_option1)
																				{
																					if ($coins1_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount1?>"><?php echo $donatecoinreward1, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount1;?>.00 </option>
																							<?php		
																						}
																					if ($coins2_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount2?>"><?php echo $donatecoinreward2, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount2;?>.00</option>
																							<?php		
																						}
																					if ($coins3_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount3?>"><?php echo $donatecoinreward3, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount3;?>.00</option>
																							<?php		
																						}
																					if ($coins4_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatecoinamount4?>"><?php echo $donatecoinreward4, ' X ', $item_coins_name, ' ', $currency_code_html, $donatecoinamount4;?>.00</option>
																							<?php
																						} 
																				}
																				// KARMA
																				if ($donation_select == $donation_option2)
																				{
																					if ($karma1_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatekarmaamount1?>"><?php echo $lang['message_8'], ' ', $donateremovekarma1, ' ', $lang['message_9'], ' ', $currency_code_html, $donatekarmaamount1;?>.00 </option>
																							<?php		
																						}
																					if ($karma2_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatekarmaamount2?>"><?php echo $lang['message_8'], ' ', $donateremovekarma2, ' ', $lang['message_9'], ' ', $currency_code_html, $donatekarmaamount2;?>.00 </option>
																							<?php		
																						}
																					if ($karma3_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatekarmaamount3?>"><?php echo $lang['message_8'], ' ', $donateremovekarma3, ' ', $lang['message_9'], ' ', $currency_code_html, $donatekarmaamount3;?>.00 </option>
																							<?php		
																						}
																					if ($karma4_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatekarmaallamount?>"><?php echo $lang['message_10'], ' ', $currency_code_html, $donatekarmaallamount;?>.00</option>
																							<?php
																						}																			
																					}
																				// PK POINTS
																				if ($donation_select == $donation_option3)
																				{	
																					if ($pkpoints1_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatepkamount1?>"><?php echo $lang['message_8'], ' ', $donateremovepk1, ' ', $lang['message_11'], ' ', $currency_code_html, $donatepkamount1;?>.00 </option>
																							<?php		
																						}
																					if ($pkpoints2_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatepkamount2?>"><?php echo $lang['message_8'], ' ', $donateremovepk2, ' ', $lang['message_11'], ' ', $currency_code_html, $donatepkamount2;?>.00 </option>
																							<?php		
																						}
																					if ($pkpoints3_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatepkamount3?>"><?php echo $lang['message_8'], ' ', $donateremovepk3, ' ', $lang['message_11'], ' ', $currency_code_html, $donatepkamount3;?>.00 </option>
																							<?php		
																						}
																					if ($pkpoints4_enabled == true)
																						{
																							?>
																							<option value="<?php echo $donatepkallamount?>"><?php echo $lang['message_12'], ' ', $currency_code_html, $donatepkallamount;?>.00</option>
																							<?php 
																						}
																					}
																				?>
																			</select>
																		</td></tr>
																	</table>
																</center>
																<br>
																<!-- Here you can change the image of the coins donation button  -->
																<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" />
																<img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
																<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest" />
																</form>
																<br>
															</div>
														<?php
														// set connection to null
														$connection = null;
													}
													// Enchant items donation page
													else
													{
														// Checks if enchant donation option is selected. TODO: maby make a log ?
														if ($donation_select == $donation_option4)
															{
															if (!isset($_POST['enchantsubmit']))
																					{
																						try {
																								// Gets the charid from the charname
																								$character_id = $connection->prepare('SELECT charId FROM characters WHERE char_name = ? LIMIT 1');
																								$character_id->bindValue(1, $charname, PDO::PARAM_STR);
																								$character_id->execute();
																								$character_id_fetch = $character_id->fetchAll();
																								$char_id_result = $character_id_fetch[0]['charId'];

																								// Select item id FROM items WHERE owner id = char id AND loc = PAPERDOLL ( means its equipped )
																								$loc_paper = 'PAPERDOLL';
																								// Loc_data locations
																								// Shirt
																								$locdata0 = 0;
																								// Helmet
																								$locdata1 = 1;
																								// Necklace
																								$locdata4 = 4;
																								// Weapon
																								$locdata5 = 5;
																								// Breastplate and full armor
																								$locdata6 = 6;
																								// Shield
																								$locdata7 = 7;
																								// Lower earring
																								$locdata8 = 8;
																								// Upper earring
																								$locdata9 = 9;
																								// Gloves
																								$locdata10 = 10;
																								// Leggings
																								$locdata11 = 11;
																								// Boots
																								$locdata12 = 12;
																								// Lower ring
																								$locdata13 = 13;
																								// Upper ring
																								$locdata14 = 14;
																								// Belt
																								$locdata24 = 24;

																								//querys for ENCHANT donate section
																								// Here we select the shirt item id.
																								$char_shirt_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_shirt_select->bindValue(1, $locdata0, PDO::PARAM_INT);
																								$char_shirt_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_shirt_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_shirt_select->execute();
																								$char_shirt_fetch = $char_shirt_select->fetchAll();
																								$char_shirt_id = @$char_shirt_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_shirt_id_min1 = $char_shirt_id - 1;
																								$char_shirt_name = $xmlload->item[$char_shirt_id_min1]['name'];

																								// Here we select the current shirt enchant level.
																								$char_shirt_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_shirt_enchant_select->bindValue(1, $locdata0, PDO::PARAM_INT);
																								$char_shirt_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_shirt_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_shirt_enchant_select->execute();
																								$char_shirt_enchant_fetch = $char_shirt_enchant_select->fetchAll();
																								$char_shirt_enchant = @$char_shirt_enchant_fetch[0]['enchant_level'];

																								// Here we select the current helmet item id.
																								$char_helmet_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_helmet_select->bindValue(1, $locdata1, PDO::PARAM_INT);
																								$char_helmet_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_helmet_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_helmet_select->execute();
																								$char_helmet_fetch = $char_helmet_select->fetchAll();
																								$char_helmet_id = @$char_helmet_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_helmet_id_min1 = $char_helmet_id - 1;
																								$char_helmet_name = $xmlload->item[$char_helmet_id_min1]['name'];

																								// Here we select the helmet enchant level.
																								$char_helmet_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_helmet_enchant_select->bindValue(1, $locdata1, PDO::PARAM_INT);
																								$char_helmet_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_helmet_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_helmet_enchant_select->execute();
																								$char_helmet_enchant_fetch = $char_helmet_enchant_select->fetchAll();
																								$char_helmet_enchant = @$char_helmet_enchant_fetch[0]['enchant_level'];

																								// Here we select the necklace item id.
																								$char_necklace_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_necklace_select->bindValue(1, $locdata4, PDO::PARAM_INT);
																								$char_necklace_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_necklace_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_necklace_select->execute();
																								$char_necklace_fetch = $char_necklace_select->fetchAll();
																								$char_necklace_id = @$char_necklace_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_necklace_id_min1 = $char_necklace_id - 1;
																								$char_necklace_name = $xmlload->item[$char_necklace_id_min1]['name'];

																								// Here we select the necklace enchant level.
																								$char_necklace_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_necklace_enchant_select->bindValue(1, $locdata4, PDO::PARAM_INT);
																								$char_necklace_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_necklace_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_necklace_enchant_select->execute();
																								$char_necklace_enchant_fetch = $char_necklace_enchant_select->fetchAll();
																								$char_necklace_enchant = @$char_necklace_enchant_fetch[0]['enchant_level'];

																								// Here we select the weapon item id.
																								$char_weapon_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_weapon_select->bindValue(1, $locdata5, PDO::PARAM_INT);
																								$char_weapon_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_weapon_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_weapon_select->execute();
																								$char_weapon_fetch = $char_weapon_select->fetchAll();
																								$char_weapon_id = @$char_weapon_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_weapon_id_min1 = $char_weapon_id - 1;
																								$char_weapon_name = $xmlload->item[$char_weapon_id_min1]['name'];

																								// Here we select the weapon enchant level.
																								$char_weapon_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_weapon_enchant_select->bindValue(1, $locdata5, PDO::PARAM_INT);
																								$char_weapon_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_weapon_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_weapon_enchant_select->execute();
																								$char_weapon_enchant_fetch = $char_weapon_enchant_select->fetchAll();
																								$char_weapon_enchant = @$char_weapon_enchant_fetch[0]['enchant_level'];

																								// Here we select the breastplate and full armor item id.
																								$char_breastplate_full_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_breastplate_full_select->bindValue(1, $locdata6, PDO::PARAM_INT);
																								$char_breastplate_full_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_breastplate_full_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_breastplate_full_select->execute();
																								$char_breastplate_full_fetch = $char_breastplate_full_select->fetchAll();
																								$char_breastplate_full_id = @$char_breastplate_full_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_breastplate_full_id_min1 = $char_breastplate_full_id - 1;
																								$char_breastplate_full_name = $xmlload->item[$char_breastplate_full_id_min1]['name'];

																								// Here we select the breastplate and full armor enchant level.
																								$char_breastplate_full_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_breastplate_full_enchant_select->bindValue(1, $locdata6, PDO::PARAM_INT);
																								$char_breastplate_full_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_breastplate_full_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_breastplate_full_enchant_select->execute();
																								$char_breastplate_full_enchant_fetch = $char_breastplate_full_enchant_select->fetchAll();
																								$char_breastplate_full_enchant = @$char_breastplate_full_enchant_fetch[0]['enchant_level'];

																								// Here we select the shield item id.
																								$char_shield_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_shield_select->bindValue(1, $locdata7, PDO::PARAM_INT);
																								$char_shield_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_shield_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_shield_select->execute();
																								$char_shield_fetch = $char_shield_select->fetchAll();
																								$char_shield_id = @$char_shield_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_shield_id_min1 = $char_shield_id - 1;
																								$char_shield_name = $xmlload->item[$char_shield_id_min1]['name'];

																								// Here we select the shield enchant level.
																								$char_shield_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_shield_enchant_select->bindValue(1, $locdata7, PDO::PARAM_INT);
																								$char_shield_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_shield_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_shield_enchant_select->execute();
																								$char_shield_enchant_fetch = $char_shield_enchant_select->fetchAll();
																								$char_shield_enchant = @$char_shield_enchant_fetch[0]['enchant_level'];

																								// Here we select the earring1 item id.
																								$char_lowearring_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_lowearring_select->bindValue(1, $locdata8, PDO::PARAM_INT);
																								$char_lowearring_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_lowearring_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_lowearring_select->execute();
																								$char_lowearring_fetch = $char_lowearring_select->fetchAll();
																								$char_lowearring_id = @$char_lowearring_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_lowearring_id_min1 = $char_lowearring_id - 1;
																								$char_lowearring_name = $xmlload->item[$char_lowearring_id_min1]['name'];

																								// Here we select the earring1 enchant level.
																								$char_lowearring_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_lowearring_enchant_select->bindValue(1, $locdata8, PDO::PARAM_INT);
																								$char_lowearring_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_lowearring_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_lowearring_enchant_select->execute();
																								$char_lowearring_enchant_fetch = $char_lowearring_enchant_select->fetchAll();
																								$char_lowearring_enchant = @$char_lowearring_enchant_fetch[0]['enchant_level'];

																								// Here we select the earring2 item id.
																								$char_upearring_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_upearring_select->bindValue(1, $locdata9, PDO::PARAM_INT);
																								$char_upearring_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_upearring_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_upearring_select->execute();
																								$char_upearring_fetch = $char_upearring_select->fetchAll();
																								$char_upearring_id = @$char_upearring_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_upearring_id_min1 = $char_upearring_id - 1;
																								$char_upearring_name = $xmlload->item[$char_upearring_id_min1]['name'];

																								// Here we select the earring2 enchant level.
																								$char_upearring_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_upearring_enchant_select->bindValue(1, $locdata9, PDO::PARAM_INT);
																								$char_upearring_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_upearring_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_upearring_enchant_select->execute();
																								$char_upearring_enchant_fetch = $char_upearring_enchant_select->fetchAll();
																								$char_upearring_enchant = @$char_upearring_enchant_fetch[0]['enchant_level'];

																								// Here we select the gloves item id.
																								$char_gloves_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_gloves_select->bindValue(1, $locdata10, PDO::PARAM_INT);
																								$char_gloves_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_gloves_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_gloves_select->execute();
																								$char_gloves_fetch = $char_gloves_select->fetchAll();
																								$char_gloves_id = @$char_gloves_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_gloves_id_min1 = $char_gloves_id - 1;
																								$char_gloves_name = $xmlload->item[$char_gloves_id_min1]['name'];

																								// Here we select the gloves enchant level.
																								$char_gloves_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_gloves_enchant_select->bindValue(1, $locdata10, PDO::PARAM_INT);
																								$char_gloves_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_gloves_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_gloves_enchant_select->execute();
																								$char_gloves_enchant_fetch = $char_gloves_enchant_select->fetchAll();
																								$char_gloves_enchant = @$char_gloves_enchant_fetch[0]['enchant_level'];

																								// Here we select the leggings item id.
																								$char_leggings_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_leggings_select->bindValue(1, $locdata11, PDO::PARAM_INT);
																								$char_leggings_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_leggings_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_leggings_select->execute();
																								$char_leggings_fetch = $char_leggings_select->fetchAll();
																								$char_leggings_id = @$char_leggings_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_leggings_id_min1 = $char_leggings_id - 1;
																								$char_leggings_name = $xmlload->item[$char_leggings_id_min1]['name'];

																								// Here we select the gloves enchant level.
																								$char_leggings_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_leggings_enchant_select->bindValue(1, $locdata11, PDO::PARAM_INT);
																								$char_leggings_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_leggings_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_leggings_enchant_select->execute();
																								$char_leggings_enchant_fetch = $char_leggings_enchant_select->fetchAll();
																								$char_leggings_enchant = @$char_leggings_enchant_fetch[0]['enchant_level'];

																								// Here we select the boots item id.
																								$char_boots_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_boots_select->bindValue(1, $locdata12, PDO::PARAM_INT);
																								$char_boots_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_boots_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_boots_select->execute();
																								$char_boots_fetch = $char_boots_select->fetchAll();
																								$char_boots_id = @$char_boots_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_boots_id_min1 = $char_boots_id - 1;
																								$char_boots_name = $xmlload->item[$char_boots_id_min1]['name'];

																								// Here we select the boots enchant level.
																								$char_boots_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_boots_enchant_select->bindValue(1, $locdata12, PDO::PARAM_INT);
																								$char_boots_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_boots_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_boots_enchant_select->execute();
																								$char_boots_enchant_fetch = $char_boots_enchant_select->fetchAll();
																								$char_boots_enchant = @$char_boots_enchant_fetch[0]['enchant_level'];

																								// Here we select the ring1 item id.
																								$char_lowring_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_lowring_select->bindValue(1, $locdata13, PDO::PARAM_INT);
																								$char_lowring_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_lowring_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_lowring_select->execute();
																								$char_lowring_fetch = $char_lowring_select->fetchAll();
																								$char_lowring_id = @$char_lowring_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_lowring_id_min1 = $char_lowring_id - 1;
																								$char_lowring_name = $xmlload->item[$char_lowring_id_min1]['name'];

																								// Here we select the ring1 enchant level.
																								$char_lowring_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_lowring_enchant_select->bindValue(1, $locdata13, PDO::PARAM_INT);
																								$char_lowring_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_lowring_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_lowring_enchant_select->execute();
																								$char_lowring_enchant_fetch = $char_lowring_enchant_select->fetchAll();
																								$char_lowring_enchant = @$char_lowring_enchant_fetch[0]['enchant_level'];

																								// Here we select the ring2 item id.
																								$char_upring_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_upring_select->bindValue(1, $locdata14, PDO::PARAM_INT);
																								$char_upring_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_upring_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_upring_select->execute();
																								$char_upring_fetch = $char_upring_select->fetchAll();
																								$char_upring_id = @$char_upring_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_upring_id_min1 = $char_upring_id - 1;
																								$char_upring_name = $xmlload->item[$char_upring_id_min1]['name'];

																								// Here we select the ring2 enchant level.
																								$char_upring_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_upring_enchant_select->bindValue(1, $locdata13, PDO::PARAM_INT);
																								$char_upring_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_upring_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_upring_enchant_select->execute();
																								$char_upring_enchant_fetch = $char_upring_enchant_select->fetchAll();
																								$char_upring_enchant = @$char_upring_enchant_fetch[0]['enchant_level'];

																								// Here we select the belt item id.
																								$char_belt_select = $connection->prepare('SELECT item_id FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_belt_select->bindValue(1, $locdata24, PDO::PARAM_INT);
																								$char_belt_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_belt_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_belt_select->execute();
																								$char_belt_fetch = $char_belt_select->fetchAll();
																								$char_belt_id = @$char_belt_fetch[0]['item_id'];
																								// Full item name based on id and xml. Always use character item id minus 1.
																								$char_belt_id_min1 = $char_belt_id - 1;
																								$char_belt_name = $xmlload->item[$char_belt_id_min1]['name'];

																								// Here we select the ring2 enchant level.
																								$char_belt_enchant_select = $connection->prepare('SELECT enchant_level FROM items WHERE loc_data = ? AND owner_id = ? AND loc = ? LIMIT 1');
																								$char_belt_enchant_select->bindValue(1, $locdata13, PDO::PARAM_INT);
																								$char_belt_enchant_select->bindValue(2, $char_id_result, PDO::PARAM_INT);
																								$char_belt_enchant_select->bindValue(3, $loc_paper, PDO::PARAM_STR);
																								$char_belt_enchant_select->execute();
																								$char_belt_enchant_fetch = $char_belt_enchant_select->fetchAll();
																								$char_belt_enchant = @$char_belt_enchant_fetch[0]['enchant_level'];

																								// Define cursed weapons ids TODO: with turn on/off in config
																								$bloodswordakamanah = 8689;
																								$demonicswordzariche = 8190;

																								// Define hero weapons ids TODO: with turn on/off in config
																								$heroweap1 = 6611;
																								$heroweap2 = 6612;
																								$heroweap3 = 6613;
																								$heroweap4 = 6614;
																								$heroweap5 = 6615;
																								$heroweap6 = 6616;
																								$heroweap7 = 6617;
																								$heroweap8 = 6618;
																								$heroweap9 = 6619;
																								$heroweap10 = 6620;
																								$heroweap11 = 6611;
																								$heroweap12 = 9388;
																								$heroweap13 = 9389;
																								$heroweap14 = 9390;
																							}
																						catch(PDOException $e) {
																							// set connection to null
																							$connection = null;

																							// visible end user reporting
																							if ($use_reporting == true)
																							{
																								echo 'ERROR: ' . $e->getMessage();
																							}

																							// local file reporting
																							if ($use_local_reporting == true)
																							{
																								//logging: file location
																								$local_log_file = $log_location;

																								//logging: Timestamp
																								$local_log = '['.date('m/d/Y g:i A').'] - ';

																								//logging: response from the server
																								$local_log .= "INDEX.PHP ENCHANT ITEMS ERROR: ". $e->getMessage();	
																								$local_log .= '</td></tr><tr><td>';

																								// Write to log
																								$fp=fopen($local_log_file,'a');
																								fwrite($fp, $local_log . ""); 

																								// close file
																								fclose($fp);
																							}
																						}
																						?>
																					<div id="login">
																					<!-- Player logged in successfully and the character is logged out -->
																					<center><?php echo $lang['message_3']; ?>  <b><?php echo $charname?></b> <?php echo $lang['message_4']; ?> </center><br>
																					<form action="" method="post">
																						<input type="hidden" name="on0" value="enchant">
																						<select name="os0">
																						<?php
																					// Checks if item enchant is enabled in config
																					if ($shirt_enchant_enabled == true)
																						{
																						// Checks if shirt is equipped
																						if ($char_shirt_id == 0)
																							{
																								?>
																								<option value="Shirt" disabled><?php echo $lang['enchant_4'];?></option>
																								<?php
																							}
																						else
																							{
																								// Checks if config shirt enchant amount is higher than the equipped item
																								if ($shirt_enchant_amount > $char_shirt_enchant)
																								{
																							
																									?>
																									<option value="Shirt"><?php echo '+', $shirt_enchant_amount, ' ', 'Shirt: ', $char_shirt_name, ' ', $currency_code_html, $shirt_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Shirt" disabled><?php echo '+', $char_shirt_enchant, ' ', $char_shirt_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Shirt" disabled><?php echo $lang['enchant_16'];?></option>
																								<?php
																							}
																					// Checks if helmet enchant is enabled in config
																					if ($helmet_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_helmet_id == 0)
																							{
																								?>
																								<option value="Helmet" disabled><?php echo $lang['enchant_5'];?></option>
																								<?php
																							}
																						else
																							{
																								// Checks if config amount is higher than the equipped item
																								if ($helmet_enchant_amount > $char_helmet_enchant)
																								{
																									?>
																									<option value="Helmet"><?php echo '+', $helmet_enchant_amount, ' ', 'Helmet: ', $char_helmet_name, ' ', $currency_code_html, $helmet_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Helmet" disabled><?php echo '+', $char_helmet_enchant, ' ', $char_helmet_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Helmet" disabled><?php echo $lang['enchant_17'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($necklace_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_necklace_id == 0)
																							{
																								?>
																								<option value="Necklace" disabled><?php echo $lang['enchant_6'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($necklace_enchant_amount > $char_necklace_enchant)
																								{
																									?>
																									<option value="Necklace"><?php echo '+', $necklace_enchant_amount, ' ', 'Necklace: ', $char_necklace_name, ' ', $currency_code_html, $necklace_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Necklace" disabled><?php echo '+', $char_necklace_enchant, ' ', $char_necklace_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Necklace" disabled><?php echo $lang['enchant_18'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($weapon_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_weapon_id == 0)
																							{
																								?>
																								<option value="Weapon" disabled><?php echo $lang['enchant_7'];?></option>
																								<?php
																							}
																						else
																							{
																								// Checks if config amount is higher than the equipped item
																								if ($weapon_enchant_amount > $char_weapon_enchant)
																								{
																									?>
																									<option value="Weapon"><?php echo '+', $weapon_enchant_amount, ' ', 'Weapon: ', $char_weapon_name, ' ', $currency_code_html, $weapon_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Weapon" disabled><?php echo '+', $char_weapon_enchant, ' ', $char_weapon_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Weapon" disabled><?php echo $lang['enchant_19'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($breastplate_full_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_breastplate_full_id == 0)
																							{
																								?>
																								<option value="FullarmorBreastplate" disabled>You need to equip a breastplate or full armor.</option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($breastplate_full_enchant_amount > $char_breastplate_full_enchant)
																								{
																									?>
																									<option value="FullarmorBreastplate"><?php echo '+', $breastplate_full_enchant_amount, ' ', 'Armor: ', $char_breastplate_full_name, ' ', $currency_code_html, $breastplate_full_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="FullarmorBreastplate" disabled><?php echo '+', $char_breastplate_full_enchant, ' ', $char_breastplate_full_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="FullarmorBreastplate" disabled><?php echo $lang['enchant_20'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($shield_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_shield_id == 0)
																							{
																								?>
																								<option value="Shield" disabled><?php echo $lang['enchant_9'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($shield_enchant_amount > $char_shield_enchant)
																								{
																									?>
																									<option value="Shield"><?php echo '+', $shield_enchant_amount, ' ', 'Shield: ', $char_shield_name, ' ', $currency_code_html, $shield_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Shield" disabled><?php echo '+', $char_shield_enchant, ' ', $char_shield_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Shield" disabled><?php echo $lang['enchant_21'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($ring_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_lowring_id == 0)
																							{
																								?>
																								<option value="Ring1" disabled><?php echo $lang['enchant_10'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($ring_enchant_amount > $char_lowring_enchant)
																								{
																									?>
																									<option value="Ring1"><?php echo '+', $ring_enchant_amount, ' ', 'Ring: ', $char_lowring_name, ' ', $currency_code_html, $ring_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Ring1" disabled><?php echo '+', $char_lowring_enchant, ' ', $char_lowring_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						// Checks if item is equipped
																						if ($char_upring_id == 0)
																							{
																								?>
																								<option value="Ring2" disabled><?php echo $lang['enchant_10'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($ring_enchant_amount > $char_upring_enchant)
																								{
																									?>
																									<option value="Ring2"><?php echo '+', $ring_enchant_amount, ' ', 'Ring: ', $char_upring_name, ' ', $currency_code_html, $ring_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Ring2" disabled><?php echo '+', $char_upring_enchant, ' ', $char_upring_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Ring1" disabled><?php echo $lang['enchant_22'];?></option>
																								<option value="Ring2" disabled><?php echo $lang['enchant_22'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($earring_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_lowearring_id == 0)
																							{
																								?>
																								<option value="Earring1" disabled><?php echo $lang['enchant_11'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($earring_enchant_amount > $char_lowearring_enchant)
																								{
																									?>
																									<option value="Earring1"><?php echo '+', $earring_enchant_amount, ' ', 'Earring: ', $char_lowearring_name, ' ', $currency_code_html, $earring_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Earring1" disabled><?php echo '+', $char_lowearring_enchant, ' ', $char_lowearring_name, ' ', $lang['enchant_3'];?>option>
																									<?php
																								}
																							}
																						// Checks if item is equipped
																						if ($char_upearring_id == 0)
																							{
																								?>
																								<option value="Earring2" disabled><?php echo $lang['enchant_11'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($earring_enchant_amount > $char_upearring_enchant)
																								{
																									?>
																									<option value="Earring2"><?php echo '+', $earring_enchant_amount, ' ', 'Earring: ', $char_upearring_name, ' ', $currency_code_html, $earring_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Earring2" disabled><?php echo '+', $char_upearring_enchant, ' ', $char_upearring_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Earring1" disabled><?php echo $lang['enchant_23'];?></option>
																								<option value="Earring2" disabled><?php echo $lang['enchant_23'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($gloves_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_gloves_id == 0)
																							{
																								?>
																								<option value="Gloves" disabled><?php echo $lang['enchant_12'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($gloves_enchant_amount > $char_gloves_enchant)
																								{
																									?>
																									<option value="Gloves"><?php echo '+', $gloves_enchant_amount, ' ', 'Gloves: ', $char_gloves_name, ' ', $currency_code_html, $gloves_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Gloves" disabled><?php echo '+', $char_gloves_enchant, ' ', $char_gloves_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Gloves" disabled><?php echo $lang['enchant_24'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($leggings_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_leggings_id == 0)
																							{
																								?>
																								<option value="Leggings" disabled><?php echo $lang['enchant_13'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($leggings_enchant_amount > $char_leggings_enchant)
																								{
																									?>
																									<option value="Leggings"><?php echo '+', $leggings_enchant_amount, ' ', 'leggings: ', $char_leggings_name, ' ', $currency_code_html, $leggings_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Leggings" disabled><?php echo '+', $char_leggings_enchant, ' ', $char_leggings_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Leggings" disabled><?php echo $lang['enchant_25'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($boots_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_boots_id == 0)
																							{
																								?>
																								<option value="Boots" disabled><?php echo $lang['enchant_14'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($boots_enchant_amount > $char_boots_enchant)
																								{
																									?>
																									<option value="Boots"><?php echo '+', $boots_enchant_amount, ' ', 'Boots: ', $char_boots_name, ' ', $currency_code_html, $boots_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Boots" disabled><?php echo '+', $char_boots_enchant, ' ', $char_boots_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Boots" disabled><?php echo $lang['enchant_26'];?></option>
																								<?php
																							}
																					// Checks if item enchant is enabled in config
																					if ($belt_enchant_enabled == true)
																						{
																						// Checks if item is equipped
																						if ($char_belt_id == 0)
																							{
																								?>
																								<option value="Belt" disabled><?php echo $lang['enchant_15'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if ($belt_enchant_amount > $char_belt_enchant)
																								{
																									?>
																									<option value="Belt"><?php echo '+', $belt_enchant_amount, ' ', 'Belt: ', $char_belt_name, ' ', $currency_code_html, $belt_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="Belt" disabled><?php echo '+', $char_belt_enchant, ' ', $char_belt_name, ' ', $lang['enchant_3'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="Belt" disabled><?php echo $lang['enchant_27'];?></option>
																								<?php
																							}
																					// Checks if ALL item enchant is enabled in config
																					if ($all_enchant_enabled == true)
																						{
																						// Checks if all items are equipped
																						if (($char_shirt_id == 0) || ($char_helmet_id == 0) || ($char_necklace_id == 0) || ($char_weapon_id == 0) || ($char_breastplate_full_id == 0) || ($char_shield_id == 0) || ($char_lowring_id == 0) || ($char_upring_id == 0) || ($char_lowearring_id == 0) || ($char_upearring_id == 0) || ($char_gloves_id == 0) || ($char_leggings_id == 0) || ($char_boots_id == 0) || ($char_belt_id == 0))
																							{
																								?>
																								<option value="All_Enc" disabled><?php echo $lang['enchant_28'];?></option>
																								<?php
																							}
																						else
																							{
																							// Checks if config amount is higher than the equipped item
																							if (($all_enchant_amount > $char_shirt_enchant) && ($all_enchant_amount > $char_helmet_enchant) && ($all_enchant_amount > $char_necklace_enchant) && ($all_enchant_amount > $char_weapon_enchant) && ($all_enchant_amount > $char_breastplate_full_enchant) && ($all_enchant_amount > $char_shield_enchant) && ($all_enchant_amount > $char_lowring_enchant) && ($all_enchant_amount > $char_upring_enchant) && ($all_enchant_amount > $char_lowearring_enchant) && ($all_enchant_amount > $char_upearring_enchant) && ($all_enchant_amount > $char_gloves_enchant) && ($all_enchant_amount > $char_leggings_enchant) && ($all_enchant_amount > $char_boots_enchant) && ($all_enchant_amount > $char_belt_enchant))
																								{
																									?>
																									<option value="All_Enc"><?php echo '+', $all_enchant_amount, ' ', $lang['enchant_30'], ' ', $currency_code_html, $all_donate_amount;?>.00 </option>
																									<?php
																								}
																								// Cannot be enchanted higher
																								else
																								{
																									?>
																									<option value="All_Enc" disabled><?php echo $lang['enchant_31'];?></option>
																									<?php
																								}
																							}
																						}
																						// This function is disabled
																						else
																							{
																								?>
																								<option value="All_Enc" disabled><?php echo $lang['enchant_29'];?></option>
																								<?php
																							}
																				
																			?>
																		</select>
																		<input type="hidden" name="option_index" value="0">
																		<input type="hidden" name="option_select0" value="Shirt">
																		<input type="hidden" name="option_amount0" value="<?php echo $shirt_donate_amount?>.00">
																		<input type="hidden" name="option_select1" value="Helmet">
																		<input type="hidden" name="option_amount1" value="<?php echo $helmet_donate_amount?>.00">
																		<input type="hidden" name="option_select2" value="Necklace">
																		<input type="hidden" name="option_amount2" value="<?php echo $necklace_donate_amount?>.00">
																		<input type="hidden" name="option_select3" value="Weapon">
																		<input type="hidden" name="option_amount3" value="<?php echo $weapon_donate_amount?>.00">
																		<input type="hidden" name="option_select4" value="FullarmorBreastplate">
																		<input type="hidden" name="option_amount4" value="<?php echo $breastplate_full_donate_amount?>.00">
																		<input type="hidden" name="option_select5" value="Shield">
																		<input type="hidden" name="option_amount5" value="<?php echo $shield_donate_amount?>.00">
																		<input type="hidden" name="option_select6" value="Ring1">
																		<input type="hidden" name="option_amount6" value="<?php echo $ring_donate_amount?>.00">
																		<input type="hidden" name="option_select7" value="Ring2">
																		<input type="hidden" name="option_amount7" value="<?php echo $ring_donate_amount?>.00">
																		<input type="hidden" name="option_select8" value="Earring1">
																		<input type="hidden" name="option_amount8" value="<?php echo $earring_donate_amount?>.00">
																		<input type="hidden" name="option_select9" value="Earring2">
																		<input type="hidden" name="option_amount9" value="<?php echo $earring_donate_amount?>.00">
																		<input type="hidden" name="option_select10" value="Gloves">
																		<input type="hidden" name="option_amount10" value="<?php echo $gloves_donate_amount?>.00">
																		<input type="hidden" name="option_select11" value="Leggings">
																		<input type="hidden" name="option_amount11" value="<?php echo $leggings_donate_amount?>.00">
																		<input type="hidden" name="option_select12" value="Boots">
																		<input type="hidden" name="option_amount12" value="<?php echo $boots_donate_amount?>.00">
																		<input type="hidden" name="option_select13" value="Belt">
																		<input type="hidden" name="option_amount13" value="<?php echo $belt_donate_amount?>.00">
																		<input type="hidden" name="option_select14" value="All_Enc">
																		<input type="hidden" name="option_amount14" value="<?php echo $all_donate_amount?>.00">
																		<!-- Passing own values for enchant end page -->
																		<!-- Selected charname -->
																		<input type="hidden" name="charname_select" value="<?php echo $charname; ?>">
																		<!-- Selected equipped items names -->
																		<input type="hidden" name="shirt_name_select" value="<?php echo $char_shirt_name; ?>">
																		<input type="hidden" name="helmet_name_select" value="<?php echo $char_helmet_name; ?>">
																		<input type="hidden" name="necklace_name_select" value="<?php echo $char_necklace_name; ?>">
																		<input type="hidden" name="weapon_name_select" value="<?php echo $char_weapon_name; ?>">
																		<input type="hidden" name="breastplate_full_name_select" value="<?php echo $char_breastplate_full_name; ?>">
																		<input type="hidden" name="shield_name_select" value="<?php echo $char_shield_name; ?>">
																		<input type="hidden" name="ring1_name_select" value="<?php echo $char_lowring_name; ?>">
																		<input type="hidden" name="ring2_name_select" value="<?php echo $char_upring_name; ?>">
																		<input type="hidden" name="lowearring_name_select" value="<?php echo $char_lowearring_name; ?>">
																		<input type="hidden" name="upearring_name_select" value="<?php echo $char_upearring_name; ?>">
																		<input type="hidden" name="gloves_name_select" value="<?php echo $char_gloves_name; ?>">
																		<input type="hidden" name="leggings_name_select" value="<?php echo $char_leggings_name; ?>">
																		<input type="hidden" name="boots_name_select" value="<?php echo $char_boots_name; ?>">
																		<input type="hidden" name="belt_name_select" value="<?php echo $char_belt_name; ?>">
																		<!-- Selected currnt enchant value -->
																		<input type="hidden" name="shirt_select_enc" value="<?php echo $char_shirt_enchant; ?>">
																		<input type="hidden" name="helmet_select_enc" value="<?php echo $char_helmet_enchant; ?>">
																		<input type="hidden" name="necklace_select_enc" value="<?php echo $char_necklace_enchant; ?>">
																		<input type="hidden" name="weapon_select_enc" value="<?php echo $char_weapon_enchant; ?>">
																		<input type="hidden" name="breastplate_full_select_enc" value="<?php echo $char_breastplate_full_enchant; ?>">
																		<input type="hidden" name="shield_select_enc" value="<?php echo $char_shield_enchant; ?>">
																		<input type="hidden" name="ring1_select_enc" value="<?php echo $char_lowring_enchant; ?>">
																		<input type="hidden" name="ring2_select_enc" value="<?php echo $char_upring_enchant; ?>">
																		<input type="hidden" name="lowearring_select_enc" value="<?php echo $char_lowearring_enchant; ?>">
																		<input type="hidden" name="upearring_select_enc" value="<?php echo $char_upearring_enchant; ?>">
																		<input type="hidden" name="gloves_select_enc" value="<?php echo $char_gloves_enchant; ?>">
																		<input type="hidden" name="leggings_select_enc" value="<?php echo $char_leggings_enchant; ?>">
																		<input type="hidden" name="boots_select_enc" value="<?php echo $char_boots_enchant; ?>">
																		<input type="hidden" name="belt_select_enc" value="<?php echo $char_belt_enchant; ?>">
																		
																		
																<br>
																<center><input type="submit" name="enchantsubmit" value="<?php echo $lang['enchant_submit_button']; ?>"></center>
																</form>
																</div>
															
															<?php
															}
														}												
													}
												}
											}
										}
										//message if character name is less then 3 characters
										else
										{
											include("recallform.php");
											?>
												<center><?php echo $lang['recallform_2']; ?> </center><br>
											<?php
											// set connection to null
											$connection = null;
										}
									}
								//message if textfield is empty
								else
								{
									include("recallform.php");
									?>
										<center><?php echo $lang['recallform_3']; ?> </center><br>
									<?php
									// set connection to null
									$connection = null;
								}
							}
						// message if character name is more than 35 chars.
						else
						{
							include("recallform.php");
							?>
								<center><?php echo $lang['recallform_4']; ?> </center><br>
							<?php
							// set connection to null
							$connection = null;
						}
					}
						// message if nothing is selected in the select box
						else
						{
							include("recallform.php");
							?>
								<center><?php echo $lang['recallform_7']; ?> </center><br>
							<?php
							// set connection to null
							$connection = null;
						}

					}
					// message when the connection fails
					else
						{
							include("recallform.php");
							?>
							<center><?php echo $lang['recallform_6']; ?> </center><br>
							<?php
							// set connection to null
							$connection = null;
						}
						}
				//message if captcha is wrong
				else	
					{		
						include("recallform.php");
						?>
							<center><?php echo $lang['recallform_8']; ?> </center><br>
						<?php
						// set connection to null
						$connection = null;
					}

	}
	if ($use_sandbox == true)
		{
			echo '<center>', $lang['message_7'], '</center>';
		}
	if (empty($_POST['enchantsubmit']))
	{
		?>
		
			</td>
			</tr>
		</table>
	<?php
	}?>
	</body>
</html>
