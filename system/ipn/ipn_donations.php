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

/*
 * PayPal System - IPN Coins
 * @author Dasoldier
 */

require "../class/paypal.php";
require "../config.php";
require "../connect.php";
include "l2j_telnet.php";

$p = new paypal_class;
$p->paypal_url = $payPalURL;
if ($p->validate_ipn())
{
	if ($p->ipn_data['payment_status']=='Completed') 
	{
		// Telnet host, port, pass, timeout
		$telnet = new telnet("".$telnet_host."", "".$telnet_port."", "".$telnet_pass."", 2);
		
		// Gets the donated amount
		$amount = $p->ipn_data['mc_gross'];
		
		// Gets the donated amount minus paypals fee
		$amountminfee = $p->ipn_data['mc_gross'] - $p->ipn_data['mc_fee'];
		
		// Get character name + donation option from paypal ipn data
		$custom = $p->ipn_data['custom'];
		
		// here we need to separate the data into separate values
		$splitdata = explode('|', $custom);
		$charname = $splitdata[0];
		$donation_option = $splitdata[1];
		$donation_option_enc = $splitdata[2];
		
		$donation_option1 = 'Coins';
		$donation_option2 = 'Karma';
		$donation_option3 = 'Pkpoints';
		$donation_option4 = 'Enchitems';
		
		// item enchant
		$donation_enc_option1 = 'Shirt';
		$donation_enc_option2 = 'Helmet';
		$donation_enc_option3 = 'Necklace';
		$donation_enc_option4 = 'Weapon';
		$donation_enc_option5 = 'FullarmorBreastplate';
		$donation_enc_option6 = 'Shield';
		$donation_enc_option7 = 'Ring1';
		$donation_enc_option8 = 'Ring2';
		$donation_enc_option9 = 'Earring1';
		$donation_enc_option10 = 'Earring2';
		$donation_enc_option11 = 'Gloves';
		$donation_enc_option12 = 'Leggings';
		$donation_enc_option13 = 'Boots';
		$donation_enc_option14 = 'Belt';
		$donation_enc_option15 = 'All_Enc';
		// get transaction_id from paypal ipn data
		$transid = $p->ipn_data['txn_id'];
		
		// Query info
		$invertory = 'INVENTORY';
		$enchlvl = 0;
		// TODO: need to check this data
		$loc_data = 0;
		$time_of_use = 0;
		$custom_type1 = 0;
		$custom_type2 = 0;
		$mana_left = -1;

	try {
			// Try to make connection
			$connection = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8", $db_user, $db_pass);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// Here we will make a log of all the donations after the payment status is complete
			if ($donation_option === $donation_option1)
				{
					$pay_text = 'Paypal, Coins';
				}
			if ($donation_option === $donation_option2)
				{
					$pay_text = 'Remove karma';
				}
			if ($donation_option === $donation_option3)
				{
					$pay_text = 'Remove PK points';
				}
			if ($donation_option === $donation_option4)
				{
					$pay_text = 'Enchant item';
				}
			
			
			$dc_log = $connection->prepare('INSERT INTO log_paypal_donations(transaction_id, donation, amount, amountminfee, character_name) VALUES(:transid, :pay_text, :amount, :amountminfee, :charname )');
			$dc_log->execute(array(
			':transid' => $transid,
			':pay_text' => $pay_text,
			':amount' => $amount,
			':amountminfee' => $amountminfee,
			':charname' => $charname
			));

			// Get the Charid given according to the char_name
			$charid_row = $connection->prepare('SELECT charId FROM characters WHERE char_name = :charname LIMIT 1');
			$charid_row->execute(array(':charname' => $charname));
			$charid_row_fetch = $charid_row->fetchAll();
			$total = count($charid_row_fetch);
			$charId = $charid_row_fetch[0]['charId'];

			// Check if character is online
			$onlinechar_row = $connection->prepare('SELECT online FROM characters WHERE char_name = :charname LIMIT 1');
			$onlinechar_row->execute(array(':charname' => $charname));
			$character_row_fetch = $onlinechar_row->fetchAll();
			$onlinearray = $character_row_fetch[0]['online'];
		}
	catch(PDOException $e) 
		{
			// Local file reporting
			// Logging: file location
			$local_log_file = $log_location_ipn;

			// Logging: Timestamp
			$local_log = '['.date('m/d/Y g:i A').'] - ';

			// Logging: response from the server
			$local_log .= "IPN DONATIONS ERROR: ". $e->getMessage();
			$local_log .= '</td></tr><tr><td>';

			// Write to log
			$fp=fopen($local_log_file,'a');
			fwrite($fp, $local_log . "");

			// close file
			fclose($fp);
		}

// COINS DONATION OPTIONS
if ($donation_option === $donation_option1)
{
	// Checks if coins is enabled in the config or else log this.
	if ($coins_enabled == true)
	{
		// Checks if charname exists
		if ($total>0)
		{
			// Donate Rewards Coins I
			if ($amount == $donatecoinamount1)
			{
				// Checks if coins option 1 is enabled in the config or else make a log.
				 if ($coins1_enabled == true)
				{
					// Checks if the character is online and telnet is enabled
					if (($onlinearray == 1) && ($use_telnet == true))
					{
						// If character is online lets send some telnet commands
						$telnet->init();
						echo $telnet->write("give ".$charname." ".$item_id." ".$donatecoinreward1."");
						echo $telnet->disconnect(); //TODO: need to check if this is closing the connection
					}
					// Else player is offline we will add the items trough a mysql query
					else
					{
						try {
								// Does the character already have the item ?
								$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
								$sql_have_item->execute(array(
								':item_id' => $item_id,
								':charId' => $charId,
								':invertory' => $invertory
								));
								$sql_have_item_fetch = $sql_have_item->fetchAll();
								$exist = count($sql_have_item_fetch);
							} 
						catch(PDOException $e) 
							{
								// Local file reporting
								// Logging: file location
								$local_log_file = $log_location_ipn;

								// Logging: Timestamp
								$local_log = '['.date('m/d/Y g:i A').'] - ';

								// Logging: response from the server
								$local_log .= "IPN COINS I ERROR: ". $e->getMessage();
								$local_log .= '</td></tr><tr><td>';

								// Write to log
								$fp=fopen($local_log_file,'a');
								fwrite($fp, $local_log . "\n");

								// Close file
								fclose($fp);
							}
						// If the player already has the item
						if ($exist>0)
						{
							try {
									// We will update the invertory
									$sql_inv_update = $connection->prepare('UPDATE items SET count = count+:donatecoinreward1 WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory');
									$sql_inv_update->execute(array(
									':donatecoinreward1' => $donatecoinreward1,
									':item_id' => $item_id,
									':charId' => $charId,
									':invertory' => $invertory
									));
								} 
							catch(PDOException $e)
								{
									// Local file reporting
									// Logging: file location
									$local_log_file = $log_location_ipn;

									// Logging: Timestamp
									$local_log = '['.date('m/d/Y g:i A').'] - ';

									// Logging: response from the server
									$local_log .= "IPN COINS I ERROR: ". $e->getMessage();
									$local_log .= '</td></tr><tr><td>';

									// Write to log
									$fp=fopen($local_log_file,'a');
									fwrite($fp, $local_log . "\n");

									// Close file
									fclose($fp);
								}
						}
						// Else the player does not have the item,
						else
						{
							try {
									// now lets first get the latest object_id
									$sql_no_item = $connection->prepare('SELECT object_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
									$sql_no_item->execute(array(
									':item_id' => $item_id,
									':charId' => $charId,
									':invertory' => $invertory
									));

									// Lets fetch the query
									$sql_no_item_fetch = $sql_no_item->fetchAll();

									// Object id +1
									$lastObjId = $sql_no_item_fetch[0]['object_id'] + 1;

									// Finally.. lets put the item in the invertory with the latest object_id
									$dc_insert_item = $connection->prepare('INSERT INTO items(owner_id, object_id, item_id, count, enchant_level, loc, loc_data, time_of_use, custom_type1, custom_type2, mana_left) VALUES(:charId, :lastObjId, :item_id, :donatecoinreward1, :enchlvl, :invertory, :loc_data, :time_of_use, :custom_type1, :custom_type2, :mana_left )');
									$dc_insert_item->execute(array(
									':charId' => $charId,
									':lastObjId' => $lastObjId,
									':item_id' => $item_id,
									':donatecoinreward1' => $donatecoinreward1,
									':enchlvl' => $enchlvl,
									':invertory' => $invertory,
									':loc_data' => $loc_data,
									':time_of_use' => $time_of_use,
									':custom_type1' => $custom_type1,
									':custom_type2' => $custom_type2,
									':mana_left' => $mana_left
									));
								}
							catch(PDOException $e)
								{
									// Local file reporting
									// Logging: file location
									$local_log_file = $log_location_ipn;

									// Logging: Timestamp
									$local_log = '['.date('m/d/Y g:i A').'] - ';

									// Logging: response from the server
									$local_log .= "IPN COINS I ERROR: ". $e->getMessage();
									$local_log .= '</td></tr><tr><td>';

									// Write to log
									$fp=fopen($local_log_file,'a');
									fwrite($fp, $local_log . "\n");

									// Close file
									fclose($fp);
								}
						}
					}
				}
				else
				{
					// Local file reporting
					// Logging: file location
					$local_log_file = $log_location_ipn;

					// Logging: Timestamp
					$local_log = '['.date('m/d/Y g:i A').'] - ';

					// Logging: response from the server
					$local_log .= "IPN COINS I ERROR: Someone tried to enter coins option 1 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
					$local_log .= '</td></tr><tr><td>';

					// Write to log
					$fp=fopen($local_log_file,'a');
					fwrite($fp, $local_log . "\n");

					// Close file
					fclose($fp);				
				}
			}

		// Donate Rewards Coins II
		if ($amount == $donatecoinamount2)
		{
			// Checks if coins option 2 is enabled in the config or else make a log.
			if ($coins2_enabled == true)
			{
				// Checks if the character is online and telnet is enabled
				if (($onlinearray == 1) && ($use_telnet == true))
				{
					// If character is online lets send some telnet commands
					$telnet->init();
					echo $telnet->write("give ".$charname." ".$item_id." ".$donatecoinreward2."");
					echo $telnet->disconnect(); //TODO: need to check if this is closing the connection
				}
				// Else player is offline we will add the items trough a mysql query
				else
				{
					try {
							// Does the character already have the item ?
							$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
							$sql_have_item->execute(array(
							':item_id' => $item_id,
							':charId' => $charId,
							':invertory' => $invertory
							));
							$sql_have_item_fetch = $sql_have_item->fetchAll();
							$exist = count($sql_have_item_fetch);
						} 
					catch(PDOException $e)
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN COINS II ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					// If the player already has the item
					if ($exist>0)
					{
						try {
								// We will update the invertory
								$sql_inv_update = $connection->prepare('UPDATE items SET count = count+:donatecoinreward2 WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory');
								$sql_inv_update->execute(array(
								':donatecoinreward2' => $donatecoinreward2,
								':item_id' => $item_id,
								':charId' => $charId,
								':invertory' => $invertory
								));
							} 
						catch(PDOException $e)
							{
								// Local file reporting
								// Logging: file location
								$local_log_file = $log_location_ipn;

								// Logging: Timestamp
								$local_log = '['.date('m/d/Y g:i A').'] - ';

								// Logging: response from the server
								$local_log .= "IPN COINS II ERROR: ". $e->getMessage();
								$local_log .= '</td></tr><tr><td>';

								// Write to log
								$fp=fopen($local_log_file,'a');
								fwrite($fp, $local_log . "\n");

								// Close file
								fclose($fp);  
							}
					}
					// Else the player does not have the item
					else
					{
						try {
								// Now lets first get the latest object_id
								$sql_no_item = $connection->prepare('SELECT object_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
								$sql_no_item->execute(array(
								':item_id' => $item_id,
								':charId' => $charId,
								':invertory' => $invertory
								));

								// Lets fetch the query
								$sql_no_item_fetch = $sql_no_item->fetchAll();

								// Object id +1
								$lastObjId = $sql_no_item_fetch[0]['object_id'] + 1;

								// Finally.. lets put the item in the invertory with the latest object_id
								$dc_insert_item = $connection->prepare('INSERT INTO items(owner_id, object_id, item_id, count, enchant_level, loc, loc_data, time_of_use, custom_type1, custom_type2, mana_left) VALUES(:charId, :lastObjId, :item_id, :donatecoinreward2, :enchlvl, :invertory, :loc_data, :time_of_use, :custom_type1, :custom_type2, :mana_left )');
								$dc_insert_item->execute(array(
								':charId' => $charId,
								':lastObjId' => $lastObjId,
								':item_id' => $item_id,
								':donatecoinreward2' => $donatecoinreward2,
								':enchlvl' => $enchlvl,
								':invertory' => $invertory,
								':loc_data' => $loc_data,
								':time_of_use' => $time_of_use,
								':custom_type1' => $custom_type1,
								':custom_type2' => $custom_type2,
								':mana_left' => $mana_left
								));
							}
						catch(PDOException $e)
							{
								// Local file reporting
								// Logging: file location
								$local_log_file = $log_location_ipn;

								// Logging: Timestamp
								$local_log = '['.date('m/d/Y g:i A').'] - ';

								// Logging: response from the server
								$local_log .= "IPN COINS II ERROR: ". $e->getMessage();
								$local_log .= '</td></tr><tr><td>';

								// Write to log
								$fp=fopen($local_log_file,'a');
								fwrite($fp, $local_log . "\n");

								// Close file
								fclose($fp);
							}
					}
				}
			}
			else
			{
				// Local file reporting
				// Logging: file location
				$local_log_file = $log_location_ipn;

				// Logging: Timestamp
				$local_log = '['.date('m/d/Y g:i A').'] - ';

				// Logging: response from the server
				$local_log .= "IPN COINS II ERROR: Someone tried to enter coins option 2 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
				$local_log .= '</td></tr><tr><td>';

				// Write to log
				$fp=fopen($local_log_file,'a');
				fwrite($fp, $local_log . "\n");

				// Close file
				fclose($fp);
			
			}
		}
		
		// Donate Rewards Coins III
		if ($amount == $donatecoinamount3)
		{
			// Checks if coins option 3 is enabled in the config or else make a log.
			if ($coins3_enabled == true)
			{
				// Checks if the character is online and telnet is enabled
				if (($onlinearray == 1) && ($use_telnet == true))
				{
					// If character is online lets send some telnet commands
					$telnet->init();
					echo $telnet->write("give ".$charname." ".$item_id." ".$donatecoinreward3."");
					echo $telnet->disconnect(); //TODO: need to check if this is closing the connection
				}
				// Else player is offline we will add the items trough a mysql query
				else
				{
					try {
							// Does the character already have the item ?
							$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
							$sql_have_item->execute(array(
							':item_id' => $item_id,
							':charId' => $charId,
							':invertory' => $invertory
							));
							$sql_have_item_fetch = $sql_have_item->fetchAll();
							$exist = count($sql_have_item_fetch);
						} 
					catch(PDOException $e)
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN COINS III ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					// If the player already has the item
					if ($exist>0)
					{
						try {
								// We will update the invertory
								$sql_inv_update = $connection->prepare('UPDATE items SET count = count+:donatecoinreward3 WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory');
								$sql_inv_update->execute(array(
								':donatecoinreward3' => $donatecoinreward3,
								':item_id' => $item_id,
								':charId' => $charId,
								':invertory' => $invertory
								));
							} 
						catch(PDOException $e) 
							{
								// Local file reporting
								// Logging: file location
								$local_log_file = $log_location_ipn;

								// Logging: Timestamp
								$local_log = '['.date('m/d/Y g:i A').'] - ';

								// Logging: response from the server
								$local_log .= "IPN COINS III ERROR: ". $e->getMessage();
								$local_log .= '</td></tr><tr><td>';

								// Write to log
								$fp=fopen($local_log_file,'a');
								fwrite($fp, $local_log . "\n");

								// Close file
								fclose($fp);  
							}
					}
					// Else the player does not have the item
					else
					{
						try {
								// Now lets first get the latest object_id
								$sql_no_item = $connection->prepare('SELECT object_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
								$sql_no_item->execute(array(
								':item_id' => $item_id,
								':charId' => $charId,
								':invertory' => $invertory
								));

								// Lets fetch the query
								$sql_no_item_fetch = $sql_no_item->fetchAll();

								// Object id +1
								$lastObjId = $sql_no_item_fetch[0]['object_id'] + 1;

								// Finally.. lets put the item in the invertory with the latest object_id
								$dc_insert_item = $connection->prepare('INSERT INTO items(owner_id, object_id, item_id, count, enchant_level, loc, loc_data, time_of_use, custom_type1, custom_type2, mana_left) VALUES(:charId, :lastObjId, :item_id, :donatecoinreward3, :enchlvl, :invertory, :loc_data, :time_of_use, :custom_type1, :custom_type2, :mana_left )');
								$dc_insert_item->execute(array(
								':charId' => $charId,
								':lastObjId' => $lastObjId,
								':item_id' => $item_id,
								':donatecoinreward3' => $donatecoinreward3,
								':enchlvl' => $enchlvl,
								':invertory' => $invertory,
								':loc_data' => $loc_data,
								':time_of_use' => $time_of_use,
								':custom_type1' => $custom_type1,
								':custom_type2' => $custom_type2,
								':mana_left' => $mana_left
								));
							}
						catch(PDOException $e)
							{
								// Local file reporting
								// Logging: file location
								$local_log_file = $log_location_ipn;

								// Logging: Timestamp
								$local_log = '['.date('m/d/Y g:i A').'] - ';

								// Logging: response from the server
								$local_log .= "IPN COINS III ERROR: ". $e->getMessage();
								$local_log .= '</td></tr><tr><td>';

								// Write to log
								$fp=fopen($local_log_file,'a');
								fwrite($fp, $local_log . "\n");

								// Close file
								fclose($fp);
							}
					}
				}
			}
			else
			{
				// Local file reporting
				// Logging: file location
				$local_log_file = $log_location_ipn;

				// Logging: Timestamp
				$local_log = '['.date('m/d/Y g:i A').'] - ';

				// Logging: response from the server
				$local_log .= "IPN COINS III ERROR: Someone tried to enter coins option 3 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
				$local_log .= '</td></tr><tr><td>';

				// Write to log
				$fp=fopen($local_log_file,'a');
				fwrite($fp, $local_log . "\n");

				// Close file
				fclose($fp);			
			}
		}
		
		// Donate Rewards Coins IV
		if ($amount == $donatecoinamount4)
		{
			// Checks if coins option 4 is enabled in the config or else make a log.
			if ($coins4_enabled == true)
			{
				// Checks if the character is online and telnet is enabled
				if (($onlinearray == 1) && ($use_telnet == true))
				{
					// If character is online lets send some telnet commands
					$telnet->init();
					echo $telnet->write("give ".$charname." ".$item_id." ".$donatecoinreward4."");
					echo $telnet->disconnect(); //TODO: need to check if this is closing the connection
				}
				// Else player is offline we will add the items trough a mysql query
				else
				{
					try {
							// Does the character already have the item ?
							$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
							$sql_have_item->execute(array(
							':item_id' => $item_id,
							':charId' => $charId,
							':invertory' => $invertory
							));
							$sql_have_item_fetch = $sql_have_item->fetchAll();
							$exist = count($sql_have_item_fetch);
						} 
					catch(PDOException $e)
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN COINS IV ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					// If the player already has the item
					if ($exist>0)
					{
						try {
								// We will update the invertory
								$sql_inv_update = $connection->prepare('UPDATE items SET count = count+:donatecoinreward4 WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory');
								$sql_inv_update->execute(array(
								':donatecoinreward4' => $donatecoinreward4,
								':item_id' => $item_id,
								':charId' => $charId,
								':invertory' => $invertory
								));
							} 
						catch(PDOException $e)
							{
								// Local file reporting
								// Logging: file location
								$local_log_file = $log_location_ipn;

								// Logging: Timestamp
								$local_log = '['.date('m/d/Y g:i A').'] - ';

								// Logging: response from the server
								$local_log .= "IPN COINS IV ERROR: ". $e->getMessage();
								$local_log .= '</td></tr><tr><td>';

								// Write to log
								$fp=fopen($local_log_file,'a');
								fwrite($fp, $local_log . "\n");

								// Close file
								fclose($fp);  
							}
					}
					// Else the player does not have the item
					else
					{
						try {
								// Now lets first get the latest object_id
								$sql_no_item = $connection->prepare('SELECT object_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
								$sql_no_item->execute(array(
								':item_id' => $item_id,
								':charId' => $charId,
								':invertory' => $invertory
								));

								// Lets fetch the query
								$sql_no_item_fetch = $sql_no_item->fetchAll();

								// Object id +1
								$lastObjId = $sql_no_item_fetch[0]['object_id'] + 1;

								// Finally.. lets put the item in the invertory with the latest object_id
								$dc_insert_item = $connection->prepare('INSERT INTO items(owner_id, object_id, item_id, count, enchant_level, loc, loc_data, time_of_use, custom_type1, custom_type2, mana_left) VALUES(:charId, :lastObjId, :item_id, :donatecoinreward4, :enchlvl, :invertory, :loc_data, :time_of_use, :custom_type1, :custom_type2, :mana_left )');
								$dc_insert_item->execute(array(
								':charId' => $charId,
								':lastObjId' => $lastObjId,
								':item_id' => $item_id,
								':donatecoinreward4' => $donatecoinreward4,
								':enchlvl' => $enchlvl,
								':invertory' => $invertory,
								':loc_data' => $loc_data,
								':time_of_use' => $time_of_use,
								':custom_type1' => $custom_type1,
								':custom_type2' => $custom_type2,
								':mana_left' => $mana_left
								));
							}
						catch(PDOException $e)
							{
								// Local file reporting
								// Logging: file location
								$local_log_file = $log_location_ipn;

								// Logging: Timestamp
								$local_log = '['.date('m/d/Y g:i A').'] - ';

								// Logging: response from the server
								$local_log .= "IPN COINS IV ERROR: ". $e->getMessage();
								$local_log .= '</td></tr><tr><td>';

								// Write to log
								$fp=fopen($local_log_file,'a');
								fwrite($fp, $local_log . "\n");

								// Close file
								fclose($fp);
							}
						}
					}
				}
				else
				{
					// Local file reporting
					// Logging: file location
					$local_log_file = $log_location_ipn;

					// Logging: Timestamp
					$local_log = '['.date('m/d/Y g:i A').'] - ';

					// Logging: response from the server
					$local_log .= "IPN COINS IV ERROR: Someone tried to enter coins option 4 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
					$local_log .= '</td></tr><tr><td>';

					// Write to log
					$fp=fopen($local_log_file,'a');
					fwrite($fp, $local_log . "\n");

					// Close file
					fclose($fp);			
				}
			}
		}
		// Else charname does not exists
		else
			{
				// Local file reporting
				// Logging: file location
				$local_log_file = $log_location_ipn;

				// Logging: Timestamp
				$local_log = '['.date('m/d/Y g:i A').'] - ';

				// Logging: response from the server
				$local_log .= "IPN COINS ERROR: Charname does not exists ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
				$local_log .= '</td></tr><tr><td>';

				// Write to log
				$fp=fopen($local_log_file,'a');
				fwrite($fp, $local_log . "\n");

				// Close file
				fclose($fp);
			}
	}
	// Else Someone tried to enter coins while disabled
	else
	{
		// Local file reporting
		// Logging: file location
		$local_log_file = $log_location_ipn;

		// Logging: Timestamp
		$local_log = '['.date('m/d/Y g:i A').'] - ';

		// Logging: response from the server
		$local_log .= "IPN COINS ERROR: Someone tried to enter coins while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
		$local_log .= '</td></tr><tr><td>';

		// Write to log
		$fp=fopen($local_log_file,'a');
		fwrite($fp, $local_log . "\n");

		// Close file
		fclose($fp);
	}
}
// REMOVE KARMA DONATION OPTIONS
if ($donation_option === $donation_option2)
	{
	// Checks if karma is enabled in the config or else log this maby a exploit attack.
	if ($karma_enabled == true)
	{
		// Checks if charname exists
		if ($total>0)
			{
				// Donate karma reward I
				if ($amount == $donatekarmaamount1)
				{
					// Checks if karma option 1 is enabled in the config or else make a log.
					if ($karma1_enabled == true)
					{
					try {
							// How mutch karma on character
							$karma_amount = $connection->prepare('SELECT karma FROM characters WHERE char_name = :charname');
							$karma_amount->execute(array(
							':charname' => $charname
							));
							$karma_amount_fetch = $karma_amount->fetchAll();
							
							// Karma minus $donateremovekarma1
							$calc_karma = $karma_amount_fetch[0]['karma'] - $donateremovekarma1;
							
						// check if karma is greater  or equal to $donateremovekarma1
						if ($karma_amount_fetch[0]['karma'] >= $donateremovekarma1)
							{
								// We will update the new karma amount
								$sql_stat_update = $connection->prepare('UPDATE characters SET karma = :calc_karma WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':calc_karma' => $calc_karma,
								':charname' => $charname
								));
							}
						// Player got less karma then hes trying to remove we set karma to 0
						else
							{
								// We will set karma to 0
								$karma_zero = 0;
								$sql_stat_update = $connection->prepare('UPDATE characters SET karma = :karma_zero WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':karma_zero' => $karma_zero,
								':charname' => $charname
								));
							}
						} 
					catch(PDOException $e) 
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN KARMA I ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter karma 1 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN KARMA I ERROR: Someone tried to enter karma option 1 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}
				// Donate karma reward II
				if ($amount == $donatekarmaamount2)
				{
					// Checks if karma option 2 is enabled in the config or else make a log.
					if ($karma2_enabled == true)
					{
					try {
							// How mutch karma on character
							$karma_amount = $connection->prepare('SELECT karma FROM characters WHERE char_name = :charname');
							$karma_amount->execute(array(
							':charname' => $charname
							));
							$karma_amount_fetch = $karma_amount->fetchAll();

							// Karma minus $donateremovekarma2
							$calc_karma = $karma_amount_fetch[0]['karma'] - $donateremovekarma2;

						// check if karma is greater  or equal to $donateremovekarma2
						if ($karma_amount_fetch[0]['karma'] >= $donateremovekarma2)
							{
								// We will update the new karma amount
								$sql_stat_update = $connection->prepare('UPDATE characters SET karma = :calc_karma WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':calc_karma' => $calc_karma,
								':charname' => $charname
								));
							}
						// Player got less karma then hes trying to remove we set karma to 0
						else
							{
								// We will set karma to 0
								$karma_zero = 0;
								$sql_stat_update = $connection->prepare('UPDATE characters SET karma = :karma_zero WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':karma_zero' => $karma_zero,
								':charname' => $charname
								));
							
							}
						} 
					catch(PDOException $e) 
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN KARMA II ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter karma 2 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN KARMA II ERROR: Someone tried to enter karma option 2 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}
				// Donate karma reward III
				if ($amount == $donatekarmaamount3)
				{
					// Checks if karma option 3 is enabled in the config or else make a log.
					if ($karma3_enabled == true)
					{
					try {
							// How mutch karma on character
							$karma_amount = $connection->prepare('SELECT karma FROM characters WHERE char_name = :charname');
							$karma_amount->execute(array(
							':charname' => $charname
							));
							$karma_amount_fetch = $karma_amount->fetchAll();

							// Karma minus $donateremovekarma3
							$calc_karma = $karma_amount_fetch[0]['karma'] - $donateremovekarma3;

						// check if karma is greater  or equal to $donateremovekarma3
						if ($karma_amount_fetch[0]['karma'] >= $donateremovekarma3)
							{
								// We will update the new karma amount
								$sql_stat_update = $connection->prepare('UPDATE characters SET karma = :calc_karma WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':calc_karma' => $calc_karma,
								':charname' => $charname
								));
							}
						// Player got less karma then hes trying to remove we set karma to 0
						else
							{
								// We will set karma to 0
								$karma_zero = 0;
								$sql_stat_update = $connection->prepare('UPDATE characters SET karma = :karma_zero WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':karma_zero' => $karma_zero,
								':charname' => $charname
								));
							
							}
						} 
					catch(PDOException $e) 
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN KARMA III ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter karma 3 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN KARMA III ERROR: Someone tried to enter karma option 3 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}
				// Donate karma reward IV
				if ($amount == $donatekarmaallamount)
				{
					// Checks if karma option 4 is enabled in the config or else make a log.
					if ($karma4_enabled == true)
					{
					try {
							// We will set karma to 0
							$karma_zero = 0;
							$sql_stat_update = $connection->prepare('UPDATE characters SET karma = :karma_zero WHERE char_name = :charname');
							$sql_stat_update->execute(array(
							':karma_zero' => $karma_zero,
							':charname' => $charname
							));
						}
					catch(PDOException $e) 
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN KARMA IV ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter karma 4 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN KARMA IV ERROR: Someone tried to enter karma option 4 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}	
			}
				// Else charname does not exists
				else
				{
					// Local file reporting
					// Logging: file location
					$local_log_file = $log_location_ipn;

					// Logging: Timestamp
					$local_log = '['.date('m/d/Y g:i A').'] - ';

					// Logging: response from the server
					$local_log .= "IPN KARMA ERROR: Charname does not exists ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
					$local_log .= '</td></tr><tr><td>';

					// Write to log
					$fp=fopen($local_log_file,'a');
					fwrite($fp, $local_log . "\n");

					// Close file
					fclose($fp);
				}
		}
		// Else Someone tried to enter karma while disabled
		else
		{
			// Local file reporting
			// Logging: file location
			$local_log_file = $log_location_ipn;

			// Logging: Timestamp
			$local_log = '['.date('m/d/Y g:i A').'] - ';

			// Logging: response from the server
			$local_log .= "IPN KARMA ERROR: Someone tried to enter karma while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
			$local_log .= '</td></tr><tr><td>';

			// Write to log
			$fp=fopen($local_log_file,'a');
			fwrite($fp, $local_log . "\n");

			// Close file
			fclose($fp);
		}
	
	}

// REMOVE PK POINTS DONATION OPTIONS
if ($donation_option === $donation_option3)
	{
	// Checks if PK Points is enabled in the config or else log this maby a exploit attack.
	if ($pkpoints_enabled == true)
	{
		// Checks if charname exists
		if ($total>0)
			{
				// Donate PK Points reward I
				if ($amount == $donatepkamount1)
				{
					// Checks if option pk points 1 is enabled in the config or else make a log.
					if ($pkpoints1_enabled == true)
					{
					try {
							// How mutch PK Points on character
							$pk_points_amount = $connection->prepare('SELECT pkkills FROM characters WHERE char_name = :charname');
							$pk_points_amount->execute(array(
							':charname' => $charname
							));
							$pk_amount_fetch = $pk_points_amount->fetchAll();

							// PK Points minus $donateremovepk1
							$calc_pkkills = $pk_amount_fetch[0]['pkkills'] - $donateremovepk1;

						// check if PK Points is greater  or equal to $donateremovepk1
						if ($pk_amount_fetch[0]['pkkills'] >= $donateremovepk1)
							{
								// We will update the new PK Points amount
								$sql_stat_update = $connection->prepare('UPDATE characters SET pkkills = :calc_pkkills WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':calc_pkkills' => $calc_pkkills,
								':charname' => $charname
								));
							}
						// Player got less PK Points then hes trying to remove we set PK Points to 0
						else
							{
								// We will set pkkills to 0
								$pkkills_zero = 0;
								$sql_stat_update = $connection->prepare('UPDATE characters SET pkkills = :pkkills_zero WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':pkkills_zero' => $pkkills_zero,
								':charname' => $charname
								));
							}
						} 
					catch(PDOException $e) 
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN PK POINTS I ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter pk points 1 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN PK POINTS I ERROR: Someone tried to enter PK Points option 1 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}
				// Donate PK Points reward II
				if ($amount == $donatepkamount2)
				{
					// Checks if option pk points 2 is enabled in the config or else make a log.
					if ($pkpoints2_enabled == true)
					{
					try {
							// How mutch PK Points on character
							$pk_points_amount = $connection->prepare('SELECT pkkills FROM characters WHERE char_name = :charname');
							$pk_points_amount->execute(array(
							':charname' => $charname
							));
							$pk_amount_fetch = $pk_points_amount->fetchAll();

							// PK Points minus $donateremovepk2
							$calc_pkkills = $pk_amount_fetch[0]['pkkills'] - $donateremovepk2;

						// check if PK Points is greater  or equal to $donateremovepk2
						if ($pk_amount_fetch[0]['pkkills'] >= $donateremovepk2)
							{
								// We will update the new PK Points amount
								$sql_stat_update = $connection->prepare('UPDATE characters SET pkkills = :calc_pkkills WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':calc_pkkills' => $calc_pkkills,
								':charname' => $charname
								));
							}
						// Player got less PK Points then hes trying to remove we set PK Points to 0
						else
							{
								// We will set pkkills to 0
								$pkkills_zero = 0;
								$sql_stat_update = $connection->prepare('UPDATE characters SET pkkills = :pkkills_zero WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':pkkills_zero' => $pkkills_zero,
								':charname' => $charname
								));
							
							}
						}
					catch(PDOException $e) 
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN PK POINTS II ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter pk points 2 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN PK POINTS II ERROR: Someone tried to enter PK Points option 2 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}
				// Donate PK Points reward III
				if ($amount == $donatepkamount3)
				{
					// Checks if option pk points 3 is enabled in the config or else make a log.
					if ($pkpoints3_enabled == true)
					{
					try {
							// How mutch PK Points on character
							$pk_points_amount = $connection->prepare('SELECT pkkills FROM characters WHERE char_name = :charname');
							$pk_points_amount->execute(array(
							':charname' => $charname
							));
							$pk_amount_fetch = $pk_points_amount->fetchAll();
							
							// PK Points minus $donateremovepk3
							$calc_pkkills = $pk_amount_fetch[0]['pkkills'] - $donateremovepk3;

						// check if PK Points is greater  or equal to $donateremovepk3
						if ($pk_amount_fetch[0]['pkkills'] >= $donateremovepk3)
							{
								// We will update the new PK Points amount
								$sql_stat_update = $connection->prepare('UPDATE characters SET pkkills = :calc_pkkills WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':calc_pkkills' => $calc_pkkills,
								':charname' => $charname
								));
							}
						// Player got less PK Points then hes trying to remove we set PK Points to 0
						else
							{
								// We will set pkkills to 0
								$pkkills_zero = 0;
								$sql_stat_update = $connection->prepare('UPDATE characters SET pkkills = :pkkills_zero WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':pkkills_zero' => $pkkills_zero,
								':charname' => $charname
								));
							}
						} 
					catch(PDOException $e) 
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN PK POINTS III ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter pk points 3 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN PK POINTS III ERROR: Someone tried to enter PK Points option 3 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}
				// Donate PK Points reward IV
				if ($amount == $donatekarmaallamount)
				{
					// Checks if option pk points 4 is enabled in the config or else make a log.
					if ($pkpoints4_enabled == true)
					{
					try {
								// We will set pkkills to 0
								$pkkills_zero = 0;
								$sql_stat_update = $connection->prepare('UPDATE characters SET pkkills = :pkkills_zero WHERE char_name = :charname');
								$sql_stat_update->execute(array(
								':pkkills_zero' => $pkkills_zero,
								':charname' => $charname
								));
						}
					catch(PDOException $e)
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN PK POINTS IV ERROR: ". $e->getMessage();
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);
						}
					}
					// Else Someone tried to enter pk points 4 while disabled
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - '; 

						// Logging: response from the server
						$local_log .= "IPN PK POINTS IV ERROR: Someone tried to enter PK Points option 4 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
				}
			}
				// Else charname does not exists
				else
				{
					// Local file reporting
					// Logging: file location
					$local_log_file = $log_location_ipn;

					// Logging: Timestamp
					$local_log = '['.date('m/d/Y g:i A').'] - ';

					// Logging: response from the server
					$local_log .= "IPN PK POINTS ERROR: Charname does not exists ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
					$local_log .= '</td></tr><tr><td>';

					// Write to log
					$fp=fopen($local_log_file,'a');
					fwrite($fp, $local_log . "\n");

					// Close file
					fclose($fp);
				}
			}
		// Else Someone tried to enter pk points 4 while disabled
		else
		{
			// Local file reporting
			// Logging: file location
			$local_log_file = $log_location_ipn;

			// Logging: Timestamp
			$local_log = '['.date('m/d/Y g:i A').'] - ';

			// Logging: response from the server
			$local_log .= "IPN PK POINTS ERROR: Someone tried to enter PK Points option 4 while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
			$local_log .= '</td></tr><tr><td>';

			// Write to log
			$fp=fopen($local_log_file,'a');
			fwrite($fp, $local_log . "\n");

			// Close file
			fclose($fp);
		}
	}
		
		// ENCHANT DONATION OPTIONS
		if ($donation_option === $donation_option4)
		{
			// Checks if item enchant is enabled in the config or else log this.
			if ($enchant_item_enabled == true)
			{
				// Checks if charname exists
				if ($total>0)
				{
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
					// Earring1
					$locdata8 = 8;
					// Earring2
					$locdata9 = 9;
					// Gloves
					$locdata10 = 10;
					// Leggings
					$locdata11 = 11;
					// Boots
					$locdata12 = 12;
					// Ring1
					$locdata13 = 13;
					// Ring2
					$locdata14 = 14;
					// Belt
					$locdata24 = 24;
					
				// Donate enchant shirt
				if ($donation_option_enc === $donation_enc_option1)
					{
					// checks if the correct amount is donated otherwise log this
					if ($amount == $shirt_donate_amount)
						{
						// Checks if enchant shirt is enabled in the config or else make a log.
						if ($shirt_enchant_enabled == true)
							{

								try {
										// if player is offline we will add shirt enchant trough a mysql query
										$sql_enchant_shirt = $connection->prepare('UPDATE items SET enchant_level= :shirt_enchant_amount WHERE loc_data= :locdata0 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_shirt->execute(array(
										':shirt_enchant_amount' => $shirt_enchant_amount,
										':locdata0' => $locdata0,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN SHIRT ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN SHIRT ENCHANT ERROR: Someone tried to enter shirt enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN SHIRT EXPLOIT ENCHANT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
				// Donate enchant helmet
				if ($donation_option_enc === $donation_enc_option2)
					{
					// checks if the correct amount is donated otherwise log this
					if ($amount == $helmet_donate_amount)
						{
						// Checks if enchant helmet is enabled in the config or else make a log.
						 if ($helmet_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the helmet enchant trough a mysql query
										$sql_enchant_helmet = $connection->prepare('UPDATE items SET enchant_level= :helmet_enchant_amount WHERE loc_data= :locdata1 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_helmet->execute(array(
										':helmet_enchant_amount' => $helmet_enchant_amount,
										':locdata1' => $locdata1,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN HELMET ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN HELMET ENCHANT ERROR: Someone tried to enter helmet enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN HELMET EXPLOIT ENCHANT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
				// Donate enchant necklace
				if ($donation_option_enc === $donation_enc_option3)
					{
					// checks if the correct amount is donated otherwise log this
					if ($amount == $necklace_donate_amount)
						{
						// Checks if enchant necklace is enabled in the config or else make a log.
						 if ($necklace_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the necklace enchant trough a mysql query
										$sql_enchant_necklace = $connection->prepare('UPDATE items SET enchant_level= :necklace_enchant_amount WHERE loc_data= :locdata4 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_necklace->execute(array(
										':necklace_enchant_amount' => $necklace_enchant_amount,
										':locdata4' => $locdata4,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN NECKLACE ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN NECKLACE ENCHANT ERROR: Someone tried to enter necklace enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN NECKLACE EXPLOIT ENCHANT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant weapon
					if ($donation_option_enc === $donation_enc_option4)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $weapon_donate_amount)
						{
							// Checks if enchant weapon is enabled in the config or else make a log.
							if ($weapon_enchant_enabled == true)
								{

								try {
										// if player is offline we will add the weapon enchant trough a mysql query
										$sql_enchant_weapon = $connection->prepare('UPDATE items SET enchant_level= :weapon_enchant_amount WHERE loc_data= :locdata5 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_weapon->execute(array(
										':weapon_enchant_amount' => $weapon_enchant_amount,
										':locdata5' => $locdata5,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN WEAPON ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN WEAPON ENCHANT ERROR: Someone tried to enter weapon enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN WEAPON EXPLOIT ENCHANT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant full armor/Breastplate
					if ($donation_option_enc === $donation_enc_option5)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $breastplate_full_donate_amount)
						{
							// Checks if enchant full armor/Breastplate is enabled in the config or else make a log.
							if ($breastplate_full_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the full armor/Breastplate enchant trough a mysql query
										$sql_enchant_fullarmor_breastplate = $connection->prepare('UPDATE items SET enchant_level= :breastplate_full_enchant_amount WHERE loc_data= :locdata6 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_fullarmor_breastplate->execute(array(
										':breastplate_full_enchant_amount' => $breastplate_full_enchant_amount,
										':locdata6' => $locdata6,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN FULL ARMOR/BREASTPLATE ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN FULL ARMOR/BREASTPLATE ENCHANT ERROR: Someone tried to enter full armor/breastplate enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN FULL ARMOR/BREASTPLATE ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
			}
					// Donate enchant shield
					if ($donation_option_enc === $donation_enc_option6)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $shield_donate_amount)
						{
							// Checks if enchant shield is enabled in the config or else make a log.
							if ($shield_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the shield enchant trough a mysql query
										$sql_enchant_shield = $connection->prepare('UPDATE items SET enchant_level= :shield_enchant_amount WHERE loc_data= :locdata7 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_shield->execute(array(
										':shield_enchant_amount' => $shield_enchant_amount,
										':locdata7' => $locdata7,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN SHIELD ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN FULL SHIELD ENCHANT ERROR: Someone tried to enter full armor/breastplate enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN SHIELD ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant ring1
					if ($donation_option_enc === $donation_enc_option7)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $ring_donate_amount)
						{
							// Checks if enchant rings is enabled in the config or else make a log.
							if ($ring_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the ring1 enchant trough a mysql query
										$sql_enchant_ring1 = $connection->prepare('UPDATE items SET enchant_level= :ring_enchant_amount WHERE loc_data= :locdata13 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_ring1->execute(array(
										':ring_enchant_amount' => $ring_enchant_amount,
										':locdata13' => $locdata13,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN RING ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN RING ENCHANT ERROR: Someone tried to enter ring enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN RING ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant ring2
					if ($donation_option_enc === $donation_enc_option8)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $ring_donate_amount)
						{
							// Checks if enchant rings is enabled in the config or else make a log.
							if ($ring_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the ring2 enchant trough a mysql query
										$sql_enchant_ring2 = $connection->prepare('UPDATE items SET enchant_level= :ring_enchant_amount WHERE loc_data= :locdata14 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_ring2->execute(array(
										':ring_enchant_amount' => $ring_enchant_amount,
										':locdata14' => $locdata14,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN RING ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN RING ENCHANT ERROR: Someone tried to enter ring enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN RING ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant earring1
					if ($donation_option_enc === $donation_enc_option9)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $earring_donate_amount)
						{
							// Checks if enchant earring is enabled in the config or else make a log.
							if ($earring_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the earring1 enchant trough a mysql query
										$sql_enchant_earring1 = $connection->prepare('UPDATE items SET enchant_level= :earring_enchant_amount WHERE loc_data= :locdata8 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_earring1->execute(array(
										':earring_enchant_amount' => $earring_enchant_amount,
										':locdata8' => $locdata8,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN EARRING ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN EARRING ENCHANT ERROR: Someone tried to enter earring enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN EARRING ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant earring2
					if ($donation_option_enc === $donation_enc_option10)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $earring_donate_amount)
						{
							// Checks if enchant earring is enabled in the config or else make a log.
							if ($earring_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the earring2 enchant trough a mysql query
										$sql_enchant_earring2 = $connection->prepare('UPDATE items SET enchant_level= :earring_enchant_amount WHERE loc_data= :locdata9 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_earring2->execute(array(
										':earring_enchant_amount' => $earring_enchant_amount,
										':locdata9' => $locdata9,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN EARRING ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN EARRING ENCHANT ERROR: Someone tried to enter earring enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN EARRING ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant gloves
					if ($donation_option_enc === $donation_enc_option11)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $gloves_donate_amount)
						{
							// Checks if enchant gloves is enabled in the config or else make a log.
							if ($gloves_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the gloves enchant trough a mysql query
										$sql_enchant_gloves = $connection->prepare('UPDATE items SET enchant_level= :gloves_enchant_amount WHERE loc_data= :locdata10 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_gloves->execute(array(
										':gloves_enchant_amount' => $gloves_enchant_amount,
										':locdata10' => $locdata10,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN GLOVES ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN GLOVES ENCHANT ERROR: Someone tried to enter earring enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN GLOVES ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant leggings
					if ($donation_option_enc === $donation_enc_option12)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $leggings_donate_amount)
						{
							// Checks if enchant leggings is enabled in the config or else make a log.
							if ($leggings_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the leggings enchant trough a mysql query
										$sql_enchant_leggings = $connection->prepare('UPDATE items SET enchant_level= :leggings_enchant_amount WHERE loc_data= :locdata11 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_leggings->execute(array(
										':leggings_enchant_amount' => $leggings_enchant_amount,
										':locdata11' => $locdata11,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN LEGGINGS ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN LEGGINGS ENCHANT ERROR: Someone tried to enter leggings enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN LEGGING ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant boots
					if ($donation_option_enc === $donation_enc_option13)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $boots_donate_amount)
						{
							// Checks if enchant boots is enabled in the config or else make a log.
							if ($boots_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the boots enchant trough a mysql query
										$sql_enchant_boots = $connection->prepare('UPDATE items SET enchant_level= :boots_enchant_amount WHERE loc_data= :locdata12 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_boots->execute(array(
										':boots_enchant_amount' => $boots_enchant_amount,
										':locdata12' => $locdata12,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN BOOTS ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN BOOTS ENCHANT ERROR: Someone tried to enter boots enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN BOOTS ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant belt
					if ($donation_option_enc === $donation_enc_option14)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $belt_donate_amount)
						{
							// Checks if enchant belt is enabled in the config or else make a log.
							if ($belt_enchant_enabled == true)
							{

								try {
										// if player is offline we will add the belt enchant trough a mysql query
										$sql_enchant_belt = $connection->prepare('UPDATE items SET enchant_level= :belt_enchant_amount WHERE loc_data= :locdata24 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_belt->execute(array(
										':belt_enchant_amount' => $belt_enchant_amount,
										':locdata24' => $locdata24,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									} 
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN BELT ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN BELT ENCHANT ERROR: Someone tried to enter belt enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN BELT ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
					// Donate enchant ALL
					if ($donation_option_enc === $donation_enc_option15)
					{
						// checks if the correct amount is donated otherwise log this
						if ($amount == $all_donate_amount)
						{
							// Checks if enchant all is enabled in the config or else make a log.
							if ($all_enchant_enabled == true)
							{

								try {	
										// if player is offline we will add shirt enchant trough a mysql query
										$sql_enchant_shirt = $connection->prepare('UPDATE items SET enchant_level= :shirt_enchant_amount WHERE loc_data= :locdata0 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_shirt->execute(array(
										':shirt_enchant_amount' => $shirt_enchant_amount,
										':locdata0' => $locdata0,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the helmet enchant trough a mysql query
										$sql_enchant_helmet = $connection->prepare('UPDATE items SET enchant_level= :helmet_enchant_amount WHERE loc_data= :locdata1 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_helmet->execute(array(
										':helmet_enchant_amount' => $helmet_enchant_amount,
										':locdata1' => $locdata1,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the necklace enchant trough a mysql query
										$sql_enchant_necklace = $connection->prepare('UPDATE items SET enchant_level= :necklace_enchant_amount WHERE loc_data= :locdata4 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_necklace->execute(array(
										':necklace_enchant_amount' => $necklace_enchant_amount,
										':locdata4' => $locdata4,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the weapon enchant trough a mysql query
										$sql_enchant_weapon = $connection->prepare('UPDATE items SET enchant_level= :weapon_enchant_amount WHERE loc_data= :locdata5 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_weapon->execute(array(
										':weapon_enchant_amount' => $weapon_enchant_amount,
										':locdata5' => $locdata5,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the full armor/Breastplate enchant trough a mysql query
										$sql_enchant_fullarmor_breastplate = $connection->prepare('UPDATE items SET enchant_level= :breastplate_full_enchant_amount WHERE loc_data= :locdata6 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_fullarmor_breastplate->execute(array(
										':breastplate_full_enchant_amount' => $breastplate_full_enchant_amount,
										':locdata6' => $locdata6,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the shield enchant trough a mysql query
										$sql_enchant_shield = $connection->prepare('UPDATE items SET enchant_level= :shield_enchant_amount WHERE loc_data= :locdata7 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_shield->execute(array(
										':shield_enchant_amount' => $shield_enchant_amount,
										':locdata7' => $locdata7,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the ring1 enchant trough a mysql query
										$sql_enchant_ring1 = $connection->prepare('UPDATE items SET enchant_level= :ring_enchant_amount WHERE loc_data= :locdata13 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_ring1->execute(array(
										':ring_enchant_amount' => $ring_enchant_amount,
										':locdata13' => $locdata13,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the ring2 enchant trough a mysql query
										$sql_enchant_ring2 = $connection->prepare('UPDATE items SET enchant_level= :ring_enchant_amount WHERE loc_data= :locdata14 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_ring2->execute(array(
										':ring_enchant_amount' => $ring_enchant_amount,
										':locdata14' => $locdata14,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the earring1 enchant trough a mysql query
										$sql_enchant_earring1 = $connection->prepare('UPDATE items SET enchant_level= :earring_enchant_amount WHERE loc_data= :locdata8 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_earring1->execute(array(
										':earring_enchant_amount' => $earring_enchant_amount,
										':locdata8' => $locdata8,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the earring2 enchant trough a mysql query
										$sql_enchant_earring2 = $connection->prepare('UPDATE items SET enchant_level= :earring_enchant_amount WHERE loc_data= :locdata9 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_earring2->execute(array(
										':earring_enchant_amount' => $earring_enchant_amount,
										':locdata9' => $locdata9,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the gloves enchant trough a mysql query
										$sql_enchant_gloves = $connection->prepare('UPDATE items SET enchant_level= :gloves_enchant_amount WHERE loc_data= :locdata10 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_gloves->execute(array(
										':gloves_enchant_amount' => $gloves_enchant_amount,
										':locdata10' => $locdata10,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the leggings enchant trough a mysql query
										$sql_enchant_leggings = $connection->prepare('UPDATE items SET enchant_level= :leggings_enchant_amount WHERE loc_data= :locdata11 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_leggings->execute(array(
										':leggings_enchant_amount' => $leggings_enchant_amount,
										':locdata11' => $locdata11,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the boots enchant trough a mysql query
										$sql_enchant_boots = $connection->prepare('UPDATE items SET enchant_level= :boots_enchant_amount WHERE loc_data= :locdata12 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_boots->execute(array(
										':boots_enchant_amount' => $boots_enchant_amount,
										':locdata12' => $locdata12,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
										
										// if player is offline we will add the belt enchant trough a mysql query
										$sql_enchant_belt = $connection->prepare('UPDATE items SET enchant_level= :belt_enchant_amount WHERE loc_data= :locdata24 AND owner_id = :charId AND loc = :paperdoll ');
										$sql_enchant_belt->execute(array(
										':belt_enchant_amount' => $belt_enchant_amount,
										':locdata24' => $locdata24,
										':charId' => $charId,
										':paperdoll' => $loc_paper
										));
									}
								catch(PDOException $e) 
									{
										// Local file reporting
										// Logging: file location
										$local_log_file = $log_location_ipn;

										// Logging: Timestamp
										$local_log = '['.date('m/d/Y g:i A').'] - ';

										// Logging: response from the server
										$local_log .= "IPN ALL ENCHANT ERROR: ". $e->getMessage();
										$local_log .= '</td></tr><tr><td>';

										// Write to log
										$fp=fopen($local_log_file,'a');
										fwrite($fp, $local_log . "\n");

										// Close file
										fclose($fp);
									}
						}
						else
						{
							// Local file reporting
							// Logging: file location
							$local_log_file = $log_location_ipn;

							// Logging: Timestamp
							$local_log = '['.date('m/d/Y g:i A').'] - ';

							// Logging: response from the server
							$local_log .= "IPN ALL ENCHANT ERROR: Someone tried to enter all enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
							$local_log .= '</td></tr><tr><td>';

							// Write to log
							$fp=fopen($local_log_file,'a');
							fwrite($fp, $local_log . "\n");

							// Close file
							fclose($fp);				
						}
					}
					else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN ALL ENCHANT EXPLOIT ATTACK: Someone tried to change the donation amount to get the donation for cheap Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);				
					}
				}
			}
				// Else charname does not exists
				else
					{
						// Local file reporting
						// Logging: file location
						$local_log_file = $log_location_ipn;

						// Logging: Timestamp
						$local_log = '['.date('m/d/Y g:i A').'] - ';

						// Logging: response from the server
						$local_log .= "IPN ITEM ENCHANT ERROR: Charname does not exists ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
						$local_log .= '</td></tr><tr><td>';

						// Write to log
						$fp=fopen($local_log_file,'a');
						fwrite($fp, $local_log . "\n");

						// Close file
						fclose($fp);
					}
			}
			// Else Someone tried to enter enchant option while disabled
			else
			{
				// Local file reporting
				// Logging: file location
				$local_log_file = $log_location_ipn;

				// Logging: Timestamp
				$local_log = '['.date('m/d/Y g:i A').'] - ';

				// Logging: response from the server
				$local_log .= "IPN ITEM ENCHANT ERROR: Someone tried to enter item enchant while disabled in config. Exploit attack ? Charname: ". @$charname ." amount:". @$amount ." donation option:". @$donation_option ."Transaction ID:". @$transid;
				$local_log .= '</td></tr><tr><td>';

				// Write to log
				$fp=fopen($local_log_file,'a');
				fwrite($fp, $local_log . "\n");

				// Close file
				fclose($fp);
			}
		}

	}
}
?>
