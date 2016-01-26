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
include_once 'common.php';
require "system/config.php";

	//reporting to end users
	if ($use_reporting == false)
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	$charname = false;
	if (isset($_POST["submit"]))
	{
		// Get POST character name
		$charname = $_POST['custom'];

		// Load configuration as an array. Use the actual location of your configuration file
		$config = parse_ini_file(realpath($connection_path));
			
		//connection info from ini file
		$db_user = $config['db_user'];
		$db_pass = $config['db_pass'];
		$db_host = $config['db_host'];
		$db_name = $config['db_database'];

		try {
				//try to make connection
				$connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//query for checking if character exists
				$character_row = $connection->prepare('SELECT char_name FROM characters WHERE char_name = :charname LIMIT 1');
				$character_row->execute(array('charname' => $charname));
				$character_row_fetch = $character_row->fetchAll();
				$character_row_count = count($character_row_fetch);

				// Check if character is online
				$onlinechar_row = $connection->prepare('SELECT online FROM characters WHERE char_name = :charname LIMIT 1');
				$onlinechar_row->execute(array('charname' => $charname));
				$character_row_fetch = $onlinechar_row->fetchAll();
						
			if (!isset($character_row_fetch[0]['online']))
			{
				$character_row_fetch[0]['online'] = null;
			}
				$onlinearray = $character_row_fetch[0]['online'];
		}
		
		catch(PDOException $e) {
			// set connection to false
			$connection = false;

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
											<td><center><input type="text" name="custom" value="<?php echo $charname?>" style="width: 135px"></center></td>
										</tr>
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
								// Checks the connection
								if ($connection == true)
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
											}
												else
												{
													// Checks if the character is online
													if ($onlinearray == 1)
													{
														//Checks if telnet is enabled in the config
														if ($use_telnet == true)
														{
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
																	<input type="hidden" name="notify_url" value="<?php echo $urlipn?>/ipn_coins.php" />
																	
																	<!-- The return page to which the user is navigated after the donations is complete -->
																	<input type="hidden" name="return" value="done.php" />
																	
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
																			<tr><td><?php echo $lang['message_5']; ?></td><td>
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
														}
														// message if telnet is disabled in config
														else
														{
															include("recallform.php");
															?>
																<center><?php echo $lang['recallform_1']; ?> </center><br>
															<?php
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
																<input type="hidden" name="custom" value="<?php echo $charname?>">
																
																<!-- Your PayPal email -->
																<input type="hidden" name="business" value="<?php echo $myPayPalEmail?>" />
																<!-- PayPal will send an IPN notification to this URL -->
																<input type="hidden" name="notify_url" value="<?php echo $urlipn?>/ipn_coins.php" />
																
																<!-- The return page to which the user is navigated after the donations is complete -->
																<input type="hidden" name="return" value="done.php" />
																
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
																		<tr><td><?php echo $lang['message_5']; ?></td><td>
																		<!-- The amount of the transaction: -->
																		<select name="amount" style="width: 150px">
																			<option value="<?php echo $donatecoinamount1?>"><?php echo $donatecoinreward1?> <?php echo $lang['message_6']; echo' '; echo $currency_code_html;?><?php echo $donatecoinamount1?>.00 </option>
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
										}
									}
								//message if textfield is empty
								else
								{
									include("recallform.php");
									?>
										<center><?php echo $lang['recallform_3']; ?> </center><br>
									<?php
								}
							}
						// message when the connection fails
						else
						{
							include("recallform.php");
							?>
							<center><?php echo $lang['recallform_6']; ?> </center><br>
						<?php
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