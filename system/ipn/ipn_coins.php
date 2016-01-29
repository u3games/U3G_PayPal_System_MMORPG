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
		
		// Get character name from paypal ipn data
		$custom = $p->ipn_data['custom'];
		
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
			$pay_text = 'Paypal, Coins';
			$dc_log = $connection->prepare('INSERT INTO log_paypal_donations(transaction_id, donation, amount, amountminfee, character_name) VALUES(:transid, :pay_text, :amount, :amountminfee, :custom )');
			$dc_log->execute(array(
			':transid' => $transid,
			':pay_text' => $pay_text,
			':amount' => $amount,
			':amountminfee' => $amountminfee,
			':custom' => $custom
			));

			// Get the Charid given according to the char_name
			$charid_row = $connection->prepare('SELECT charId FROM characters WHERE char_name = :custom LIMIT 1');
			$charid_row->execute(array('custom' => $custom));
			$charid_row_fetch = $charid_row->fetchAll();
			$total = count($charid_row_fetch);
			$charId = $charid_row_fetch[0]['charId'];

			// Check if character is online
			$onlinechar_row = $connection->prepare('SELECT online FROM characters WHERE char_name = :custom LIMIT 1');
			$onlinechar_row->execute(array('custom' => $custom));
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
			$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
			$local_log .= '</td></tr><tr><td>';

			// Write to log
			$fp=fopen($local_log_file,'a');
			fwrite($fp, $local_log . "");

			// close file
			fclose($fp);  
		}

		// Donate Rewards Coins I
		if ($amount == $donatecoinamount1)
		{
			if ($total>0)
			{
				// Checks if the character is online and telnet is enabled
				if (($onlinearray == 1) && ($use_telnet == true))
				{
					// If character is online lets send some telnet commands
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward1."");
					echo $telnet->write("quit");
				}
				// Else player is offline we will add the items trough a mysql query
				else
				{
					try {
							// Does the character already have the item ?
							$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
							$sql_have_item->execute(array(
							'item_id' => $item_id,
							'charId' => $charId,
							'invertory' => $invertory
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
							$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
						try {
								// Else the player does not have the item, now lets first get the latest object_id
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
		}

		// Donate Rewards Coins II
		if ($amount == $donatecoinamount2)
		{
			if ($total>0)
			{
				// Checks if the character is online and telnet is enabled
				if (($onlinearray == 1) && ($use_telnet == true))
				{
					// If character is online lets send some telnet commands
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward2."");
					echo $telnet->write("quit");
				}
				// Else player is offline we will add the items trough a mysql query
				else
				{
					try {
							// Does the character already have the item ?
							$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
							$sql_have_item->execute(array(
							'item_id' => $item_id,
							'charId' => $charId,
							'invertory' => $invertory
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
							$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
						try {
								// Else the player does not have the item, now lets first get the latest object_id
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
		}
		
		// Donate Rewards Coins III
		if ($amount == $donatecoinamount3)
		{
			if ($total>0)
			{
				// Checks if the character is online and telnet is enabled
				if (($onlinearray == 1) && ($use_telnet == true))
				{
					// If character is online lets send some telnet commands
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward3."");
					echo $telnet->write("quit");
				}
				// Else player is offline we will add the items trough a mysql query
				else
				{
					try {
							// Does the character already have the item ?
							$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
							$sql_have_item->execute(array(
							'item_id' => $item_id,
							'charId' => $charId,
							'invertory' => $invertory
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
							$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
						try {
								// Else the player does not have the item, now lets first get the latest object_id
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
		}
		
		// Donate Rewards Coins IV
		if ($amount == $donatecoinamount4)
		{
			if ($total>0)
			{
				// Checks if the character is online and telnet is enabled
				if (($onlinearray == 1) && ($use_telnet == true))
				{
					// If character is online lets send some telnet commands
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward4."");
					echo $telnet->write("quit");
				}
				// Else player is offline we will add the items trough a mysql query
				else
				{
					try {
							// Does the character already have the item ?
							$sql_have_item = $connection->prepare('SELECT owner_id FROM items WHERE item_id = :item_id AND owner_id = :charId AND loc = :invertory ');
							$sql_have_item->execute(array(
							'item_id' => $item_id,
							'charId' => $charId,
							'invertory' => $invertory
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
							$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
						try {
								// Else the player does not have the item, now lets first get the latest object_id
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
								$local_log .= "IPN_COINS.PHP ERROR: ". $e->getMessage();
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
		}
	}
}
?>
