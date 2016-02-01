<!DOCTYPE html>
<html>
<head>
<!-- Title -->
<title>U3G | PayPal System</title>

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Lineage 2: PayPal System!">
<meta name="keywords" content="l2, lineage, lineage2, u3games, u3g, u3, paypal, system">
<meta name="author" content="U3games, Swarlog, Dasoldier">
<?php
require 'system/connect.php';
require 'system/config.php';
include_once 'common.php';

	//reporting to end users
	if ($use_reporting == false)
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

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
				$character_row = $connection->prepare('SELECT char_name FROM characters WHERE char_name = :charname LIMIT 1');
				$character_row->execute(array(':charname' => $charname));
				$character_row_fetch = $character_row->fetchAll();
				$character_row_count = count($character_row_fetch);

				// Check if character is online
				$onlinechar_row = $connection->prepare('SELECT online FROM characters WHERE char_name = :charname LIMIT 1');
				$onlinechar_row->execute(array(':charname' => $charname));
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
														<option value="Coins"><?php echo $lang['message_6'];?></option>
														<?php
													}
												if ($karma_enabled == true)
													{
														?>
														<option value="Karma"><?php echo $lang['message_8']; echo ' '; echo $lang['message_9'];?></option>
														<?php 
													}
											?>
											</select>
											</p>
										<table>
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
					// checks for the first form
					if (isset($_POST['submit']))
					{
						// Wait for x seconds
						if ($loading_delay == true)
						{
							sleep($delaytime);
						}
						// gets the selected option from form
						$donation_select = htmlspecialchars($_POST['donation_select']);
						
						$donation_option1 = 'Coins';
						$donation_option2 = 'Karma';
							// Checks the connection
							if ($connection == true)
							{
							// Checks if something is selected in the select box
							if ($donation_select != "")
							{
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
													// Checks if the character is online and if the coins option is selected
													if ($onlinearray == 1 && $donation_select === $donation_option1)
													{
														//Checks if telnet is enabled in the config
														if ($use_telnet == true)
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
																	<input type="hidden" name="custom" value="<?php echo $charname?>">
																	
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
																	
																	<!-- here the amount of the coins donation can be configured visible html only -->
																	<center>
																		<table>
																			<tr><td>
																			<?php
																				echo $lang['message_5'];
																			?>
																			</td><td>
																			<!-- The amount of the transaction: -->
																			<select name="amount" style="width: 150px">
																				<option value="<?php echo $donatecoinamount1?>"><?php echo $donatecoinreward1?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html; ?><?php echo $donatecoinamount1?>.00 </option>
																				<option value="<?php echo $donatecoinamount2?>"><?php echo $donatecoinreward2?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html;?><?php echo $donatecoinamount2?>.00</option>
																				<option value="<?php echo $donatecoinamount3?>"><?php echo $donatecoinreward3?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html;?><?php echo $donatecoinamount3?>.00</option>
																				<option value="<?php echo $donatecoinamount4?>"><?php echo $donatecoinreward4?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html;?><?php echo $donatecoinamount4?>.00</option>
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
																
																<!-- here the amount of the coins donation can be configured visible html only -->
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
																			?>
																		</td><td>
																		<!-- The amount of the transaction: -->
																		<select name="amount" style="width: 150px">
																			<?php 
																				if ($donation_select == $donation_option1)
																				{
																			?>
																					<option value="<?php echo $donatecoinamount1?>"><?php echo $donatecoinreward1?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html; ?><?php echo $donatecoinamount1?>.00 </option>
																					<option value="<?php echo $donatecoinamount2?>"><?php echo $donatecoinreward2?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html;?><?php echo $donatecoinamount2?>.00</option>
																					<option value="<?php echo $donatecoinamount3?>"><?php echo $donatecoinreward3?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html;?><?php echo $donatecoinamount3?>.00</option>
																					<option value="<?php echo $donatecoinamount4?>"><?php echo $donatecoinreward4?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html;?><?php echo $donatecoinamount4?>.00</option>
																			<?php 
																				}
																			?>
																			<?php if ($donation_select == $donation_option2)
																			{	?>
																					<option value="<?php echo $donatekarmaamount1?>"><?php echo $lang['message_8']?> <?php echo' '; echo $donateremovekarma1;?><?php echo' '; echo $lang['message_9']; echo' '; echo $currency_code_html; ?><?php echo $donatekarmaamount1?>.00 </option>
																					<option value="<?php echo $donatekarmaamount2?>"><?php echo $lang['message_8']?> <?php echo' '; echo $donateremovekarma2;?><?php echo' '; echo $lang['message_9']; echo' '; echo $currency_code_html; ?><?php echo $donatekarmaamount2?>.00 </option>
																					<option value="<?php echo $donatekarmaamount3?>"><?php echo $lang['message_8']?> <?php echo' '; echo $donateremovekarma3;?><?php echo' '; echo $lang['message_9']; echo' '; echo $currency_code_html; ?><?php echo $donatekarmaamount3?>.00 </option>
																					<option value="<?php echo $donatekarmaallamount?>"><?php echo $lang['message_10']?> <?php echo' '; echo $currency_code_html;?><?php echo $donatekarmaallamount?>.00</option>
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
			if ($use_sandbox == true)
				{
					echo $lang['message_7'];
				}
					?>
				</td>
			</tr>
		</table>
	</body>
</html>
