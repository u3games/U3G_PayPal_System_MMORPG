<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title>U3G | PayPal System</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Lineage 2: PayPal System!">
<?php
require '../connect.php';
require '../config.php';
include_once '../../common.php';

if ($donate_overview == false)
{
	header("HTTP/1.0 403 Forbidden");
	die("<center>This function is disabled</center>");
}
if ($overview_ip_security == true)
{
	if (!in_array($_SERVER['REMOTE_ADDR'], array($allowed_client1,$allowed_client2,$allowed_client3,$allowed_client4,$allowed_client5)))
		{
			header("HTTP/1.0 403 Forbidden");
			die("You are not allowed to access this file.");
	}
}

	$username = false;
	$password = false;
	if (isset($_POST["submit"]))
		{
			
			// for checks
			$user = $_POST['username'];
			$pass = $_POST['password'];
			
			//try to make connection or give a error
			try {
					$connection = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8", $db_user, $db_pass);
					$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
			// set connection to false when a error occurs
			catch(PDOException $e) {
					$connection = false;
						//logging: file location
						$local_log_file = 'log/website_error_log.php';
			
						//logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - '; 
							 
						//logging: response from the server
						$local_log .= "DONATEOVERVIEW.PHP ERROR: ". $e->getMessage();	
						$local_log .= '</td></tr><tr><td>';
						
						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . ""); 

						fclose($fp);  // close file
				}
				
						}
						
						
					
					// first form					
					if (!isset($_POST['submit']))
					{
?>
</head>
<body>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="center">
						<div id="login">
							<form action="donateoverview.php" method="post">
								<center>
									<table>
										<tr>
											<td><center><?php echo $lang['dc_overview_name']; ?></center></td>
										</tr>
										<tr>
											<td><center><input type="text" name="username" value="" style="width: 135px"></center></td>
										</tr>
										<tr>
											<td><center><input type="password" name="password" value="" style="width: 135px"></center></td>
										</tr>
										<tr>
											<td><center><input type="submit" name="submit" value="<?php echo $lang['dc_overview_login']; ?>"></center></td>
										</tr>
										<tr>
											<td><center><a href="?lang=en"><img src="../../images/flag/en.png"></a> <a href="?lang=es"><img src="../../images/flag/es.png"></a> <a href="?lang=nl"><img src="../../images/flag/nl.png"></a></center></td>
										</tr>
									</table>
								</center> 
							</form>
						</div>
					</table>
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
								if ($connection == true) {
									// Checks if the username text field is empty
									if ($user != "")
									{
										// Checks if the password text field is empty
										if ($pass != "")
										{
											// Checks if password is minimal 6 characters
											if (strlen($pass) > 5)
											{
												// Checks the username
												if ($user == $overview_user)
												{
													// Checks the password
													if ($pass == $overview_password)
													{
													// su6 you have access
													?>
													<table cellpadding="0" cellspacing="0" border="2" width="75%" align="center">
													<tr><td>
													<center><b>DONATE OVERVIEW</b></center></td></tr>
													<?php
													try {
													
														$result_amount_count = $connection->query('SELECT count(amount) FROM log_paypal_donations');
														$result_amount_count_fetch = $result_amount_count->fetchColumn();

														$result_online_count = $connection->query('SELECT online FROM characters WHERE online = 1');
														$result_online_count_fetch = $result_online_count->rowCount();
													
														$result_amount = $connection->query('SELECT sum(amount) FROM log_paypal_donations');
														$result_amount_fetch = $result_amount->fetchColumn();
														
														$result_amount_fee = $connection->query('SELECT sum(amountminfee) FROM log_paypal_donations');
														$result_amount_fee_fetch = $result_amount_fee->fetchColumn();
														$result_amount_fee_format = number_format($result_amount_fee_fetch, 2, '.', ',');
													}
													catch(PDOException $e) {
													//logging: file location
													$local_log_file = 'log/website_error_log.php';
										
													//logging: Timestamp
													$local_log = '['.date('m/d/Y g:i A').'] - '; 
														 
													//logging: response from the server
													$local_log .= "DONATEOVERVIEW.PHP ERROR: ". $e->getMessage();	
													$local_log .= '</td></tr><tr><td>';
													
													// Write to log
													$fp=fopen($local_log_file,'a');
													fwrite($fp, $local_log . ""); 

													fclose($fp);  // close file
														}
													?>
													</table>
														<br>
															<table cellpadding="0" cellspacing="0" border="2" width="20%" align="center">
																<tr><td>
																Players online:
																	<?php
																		echo $result_online_count_fetch;
																	?>
															<br>Times donated:
																	<?php
																		echo $result_amount_count_fetch;
																	?>
															<br>Total donated:
																	<?php
																		echo $currency_code_html; echo' '; echo $result_amount_fetch;
																	?>
															<br>Total donated - paypal fee:
																	<?php
																		echo $currency_code_html; echo' '; echo $result_amount_fee_format;
																	?>
																</td></tr>
															</table>
														<br>
													<table cellpadding="0" cellspacing="0" border="1" width="75%" align="center">
														<tr><td><center><b>Website/ipn error log</b></center></td></tr>
														<?php include 'log/website_error_log.php';?>
														<tr><td><center><b>log_paypal_donations database log</b></center></td></tr>
														<?php 
														class log_paypal_donations {
															public $transaction_id;
															public $donation;
															public $amount;
															public $amountminfee;
															public $character_name;
															public $dt;
															public function donation_info()
															{
															return $this->transaction_id . ' ' . $this->donation . ' ' . $this->amount . ' ' . $this->amountminfee . ' ' . $this->character_name . ' ' . $this->dt;
															}
															
														}
														 
														try {

															$result = $connection->query('SELECT * FROM log_paypal_donations ORDER BY dt DESC');
															# Map results to object
															$result->setFetchMode(PDO::FETCH_CLASS, 'log_paypal_donations');
											
															
															while($donation_info = $result->fetch()) {
																# Call our custom donation_info method
																echo '<tr><td>' . $donation_info->donation_info() . '</td></tr>';

															}
														} catch(PDOException $e) {
														//logging: file location
														$local_log_file = 'log/website_error_log.php';
											
														//logging: Timestamp
														$local_log = '['.date('m/d/Y g:i A').'] - '; 
															 
														//logging: response from the server
														$local_log .= "DONATEOVERVIEW.PHP ERROR: ". $e->getMessage();	
														$local_log .= '</td></tr><tr><td>';
														
														// Write to log
														$fp=fopen($local_log_file,'a');
														fwrite($fp, $local_log . ""); 

														fclose($fp);  // close file
															}
															
															
															?>
													</table>
														<table cellpadding="0" cellspacing="0" border="1" width="75%" align="left">
															<tr><td><center><b>IPN response log</b></center></td></tr>
															<?php include '../ipn/log/ipn_log.php';?>
													</table>
													
													<?php
													}
													//message if password is wrong
												else
													{
													include("recallform.php");
													?>
															<center><?php echo $lang['dc_overview_war6']; ?> </center><br>
													<?php
													}
												}
											//message if username is wrong
											else
												{
												include("recallform.php");
												?>
													<center><?php echo $lang['dc_overview_war5']; ?> </center><br>
												<?php	
												}
											}
										//message if password is less or equal to 5 characters
										else
											{
											include("recallform.php");
											?>
												<center><?php echo $lang['dc_overview_war4']; ?> </center><br>
											<?php
											}
										}									
									//message if password textfield is empty
									else
										{
										include("recallform.php");
										?>
											<center><?php echo $lang['dc_overview_war3']; ?> </center><br>
										<?php
										}
									}
								//message if username textfield is empty
								else
									{
									include("recallform.php");
									?>
										<center><?php echo $lang['dc_overview_war2']; ?> </center><br>
									<?php	
								}
							}
						// message when the connection fails
						else
							{
							include("recallform.php");
							?>
								<center><?php echo $lang['dc_overview_war1']; ?> </center><br>
							<?php
						}
					}
				?>
</body>
</html>
