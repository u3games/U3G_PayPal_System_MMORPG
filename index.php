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
	<meta name="author" content="u3games, swarlog">
	
	<!-- Connect -->
	<?php
		include_once 'common.php';
		require "system/config.php";
		require "system/connect.php";
		
		$charname = false;
		$PHP_SELF = false;
		if (isset($_POST["submit"]))
		{
			// Select character name
			$charname = mysqli_real_escape_string($db_link, $_POST['custom']);
			$query = "SELECT charId FROM characters WHERE char_name='$charname' LIMIT 1";
			$result = mysqli_query($db_link, $query);
			$total_rows = mysqli_num_rows($result);
	
			// Check if character is online
			$onlinechar = mysqli_real_escape_string($db_link, $_POST['custom']);
			$isonlinechar = "SELECT online FROM characters WHERE char_name='$onlinechar' LIMIT 1";
			$resultonlinechar = mysqli_query($db_link, $isonlinechar);
			$rowonlinechar = mysqli_fetch_array($resultonlinechar);
		}
	?>
</head>
<body>
	<table cellpadding="0" cellspacing="0" width="100%">
		<table border="0" width="100%" id="login">
			<tr>
				<td align="center">
					<?php
						if (!isset($_POST['submit']))
						{
							?>
							<div id="login">
								<form action="<?php echo $PHP_SELF;?>" method="post">
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
												<td><center><a href="?lang=en"><img src="images/flag/en.png"></a> <a href="?lang=es"><img src="images/flag/es.png"></a></center></td>
											</tr>
										</table>
									</center> 
								</form>
							</div>
							<?php
						}
						
						if (isset($_POST['submit']))
						{
							// Wait for x seconds
							if (LOADING_DELAY == true)
							{
								sleep($delaytime);
							}
							
							// Checks mysql server
							if ($db_link)
							{
								// Checks game server database
								if ($db_select)
								{
									// Checks login server database
									if ($db_select2)
									{
										// Checks if the character name text field is empty
										if ($charname != "")
										{
											// Checks if character name is minimal 3 characters
											if (strlen($charname) > 2)
											{
												// Checks if the character exists
												if ($total_rows == 0)
												{
													include("recallform.php");
													?>
														<center><?php echo $lang['message_1']; ?> <b><?php echo $charname?></b> <?php echo $lang['message_2']; ?></center>
													<?php
												}
												else
												{
													if ($rowonlinechar['online'] == 1)
													{
														if (USE_TELNET == 1)
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
																				<option value="<?php echo $donatecoinamount1?>"><?php echo $donatecoinreward1?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount1?>.00 </option>
																				<option value="<?php echo $donatecoinamount2?>"><?php echo $donatecoinreward2?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount2?>.00</option>
																				<option value="<?php echo $donatecoinamount3?>"><?php echo $donatecoinreward3?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount3?>.00</option>
																				<option value="<?php echo $donatecoinamount4?>"><?php echo $donatecoinreward4?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount4?>.00</option>
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
																	<br>
																	<br>
																</div>
															<?php
														}
														else
														{
															include("recallform.php");
															?>
																<center><?php echo $lang['recallform_1']; ?> </center><br>
															<?php
														}
													}
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
																			<option value="<?php echo $donatecoinamount1?>"><?php echo $donatecoinreward1?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount1?>.00 </option>
																			<option value="<?php echo $donatecoinamount2?>"><?php echo $donatecoinreward2?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount2?>.00</option>
																			<option value="<?php echo $donatecoinamount3?>"><?php echo $donatecoinreward3?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount3?>.00</option>
																			<option value="<?php echo $donatecoinamount4?>"><?php echo $donatecoinreward4?> <?php echo $lang['message_6']; ?><?php echo $donatecoinamount4?>.00</option>
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
																<br>
																<br>
															</div>
														<?php
													}
												}
											}
											else
											{
												include("recallform.php");
												?>
													<center><?php echo $lang['recallform_2']; ?> </center><br>
												<?php
											}
										}
										else
										{
											include("recallform.php");
											?>
												<center><?php echo $lang['recallform_3']; ?> </center><br>
											<?php
										}
									}
									else
									{
										?>
											<center><?php echo $lang['recallform_4']; ?> </center><br>
										<?php	
									}
								}
								else
								{
									?>
										<center><?php echo $lang['recallform_5']; ?> </center><br>
									<?php	
								}
							}
							else
							{
								?>
									<center><?php echo $lang['recallform_6']; ?> </center><br>
								<?php
							}
						}
					?>
				</td>
			</tr>
		</table>
	</table>
</body>
</html>
