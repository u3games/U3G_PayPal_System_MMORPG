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
 * PayPal System - IPN Coins
 * @author Dasoldier
 */

require "../class/paypal.class.php";
require "../config.php";
require "../connect.php";

$p = new paypal_class;
$p->paypal_url = $payPalURL;

if ($p->validate_ipn())
{
	if ($p->ipn_data['payment_status']=='Completed') 
	{
		// Gets the donated amount
		$amount = $p->ipn_data['mc_gross'] - $p->ipn_data['mc_fee'];
		
		// Get character name from paypal ipn data
		$custom = $p->ipn_data['custom'];
		
		// Here we will make a log of all the donations after the payment status is complete
		mysqli_query($db_link, "INSERT INTO log_paypal_donations (transaction_id,donation,amount,character_name) VALUES
		(
			'".esc($p->ipn_data['txn_id'])."',
			'Paypal, Coins',
			".(float)$amount.",
			'".esc($custom)."'
		)");
		
		// Gets the amount that the player donated
		$getamount = $p->ipn_data['mc_gross'];
		
		// Get the Charid given according to the char_name
		$sql    = "SELECT charId FROM characters WHERE char_name='".$custom."'";
		$result 	= mysqli_query($db_link, $sql);
		$total 		= mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		$charId = $row[charId];
		
		// Check if character is online
		$isonline = "SELECT online FROM characters WHERE char_name='".$custom."' LIMIT 1";
		$resultonline = mysqli_query($db_link, $isonline);
		$rowonline = mysqli_fetch_array($resultonline);
		
		// Donate Rewards Coins I
		if ($getamount == $donatecoinamount1)
		{
			if ($total>0)
			{
				//checks if the character is online
				if ($rowonline['online'] == 1)
				{
					// if character is online lets send some telnet commands
					include "l2j_telnet.php";
					
					//Telnet host, port, pass, timeout
					$telnet = new telnet("".$telnet_host."", "".$telnet_port."", "".$telnet_pass."", 2);
					
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward1."");
					echo $telnet->write("quit");
				}
				else
				{
					// if player is offline we will add the items trough a mysql query
					//does the character already have the item ?
					$sql    	= "SELECT owner_id FROM items WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					$result 	= mysqli_query($db_link, $sql);
					$exist 		= mysqli_num_rows($result);
					$row 		= mysqli_fetch_assoc($result);
					
					//if the player already has the item, we will update the invertory
					if ($exist>0)
					{
						$sql = "UPDATE items SET count=count+$donatecoinreward1 WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					}
					else
					{
						//else the player does not have the item, now lets first get the latest object_id
						$sql = "SELECT object_id FROM items ORDER BY object_id DESC LIMIT 1";
						$result 	= mysqli_query($db_link, $sql);
						$row 		= mysqli_fetch_assoc($result);
						$lastObjId 	= $row[object_id];
						$lastObjId 	= $lastObjId + 1;
					
						//Finally.. lets put the item in the invertory with the latest object_id
						$sql = "INSERT INTO items (owner_id, object_id, item_id, count, enchant_level, loc) VALUES ('".$charId."', '".$lastObjId."', '".$item_id."', '".$donatecoinreward1."', '0', 'INVENTORY')";
					}
				
					mysqli_query($db_link, $sql);
				}
			}
		}
		
		// Donate Rewards Coins II
		if ($getamount == $donatecoinamount2)
		{
			if ($total>0)
			{
				//checks if the character is online
				if ($rowonline['online'] == 1)
				{
					// if character is online lets send some telnet commands
					include "l2j_telnet.php";
					
					//Telnet host, port, pass, timeout
					$telnet = new telnet("".$telnet_host."", "".$telnet_port."", "".$telnet_pass."", 2);
					
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward2."");
					echo $telnet->write("quit");
				}
				else
				{
					// if player is offline we will add the items trough a mysql query
					//does the character already have the item ?
					$sql    	= "SELECT owner_id FROM items WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					$result 	= mysqli_query($db_link, $sql);
					$exist 		= mysqli_num_rows($result);
					$row 		= mysqli_fetch_assoc($result);
					
					//if the player already has the item, we will update the invertory
					if ($exist>0)
					{
						$sql = "UPDATE items SET count=count+$donatecoinreward2 WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					}
					else
					{
						//else the player does not have the item, now lets first get the latest object_id
						$sql = "SELECT object_id FROM items ORDER BY object_id DESC LIMIT 1";
						$result 	= mysqli_query($db_link, $sql);
						$row 		= mysqli_fetch_assoc($result);
						$lastObjId 	= $row[object_id];
						$lastObjId 	= $lastObjId + 1;
					
						//Finally.. lets put the item in the invertory with the latest object_id
						$sql = "INSERT INTO items (owner_id, object_id, item_id, count, enchant_level, loc) VALUES ('".$charId."', '".$lastObjId."', '".$item_id."', '".$donatecoinreward2."', '0', 'INVENTORY')";
					}
				
					mysqli_query($db_link, $sql);
				}
			}
		}
		
		// Donate Rewards Coins III
		if ($getamount == $donatecoinamount3)
		{
			if ($total>0)
			{
				//checks if the character is online
				if ($rowonline['online'] == 1)
				{
					// if character is online lets send some telnet commands
					include "l2j_telnet.php";
					
					//Telnet host, port, pass, timeout
					$telnet = new telnet("".$telnet_host."", "".$telnet_port."", "".$telnet_pass."", 2);
					
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward3."");
					echo $telnet->write("quit");
				}
				else
				{
					// if player is offline we will add the items trough a mysql query
					//does the character already have the item ?
					$sql    	= "SELECT owner_id FROM items WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					$result 	= mysqli_query($db_link, $sql);
					$exist 		= mysqli_num_rows($result);
					$row 		= mysqli_fetch_assoc($result);
					
					//if the player already has the item, we will update the invertory
					if ($exist>0)
					{
						$sql = "UPDATE items SET count=count+$donatecoinreward3 WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					}
					else
					{
						//else the player does not have the item, now lets first get the latest object_id
						$sql = "SELECT object_id FROM items ORDER BY object_id DESC LIMIT 1";
						$result 	= mysqli_query($db_link, $sql);
						$row 		= mysqli_fetch_assoc($result);
						$lastObjId 	= $row[object_id];
						$lastObjId 	= $lastObjId + 1;
					
						//Finally.. lets put the item in the invertory with the latest object_id
						$sql = "INSERT INTO items (owner_id, object_id, item_id, count, enchant_level, loc) VALUES ('".$charId."', '".$lastObjId."', '".$item_id."', '".$donatecoinreward3."', '0', 'INVENTORY')";
					}
				
					mysqli_query($db_link, $sql);
				}
			}
		}
		
		// Donate Rewards Coins III
		if ($getamount == $donatecoinamount4)
		{
			if ($total>0)
			{
				//checks if the character is online
				if ($rowonline['online'] == 1)
				{
					// if character is online lets send some telnet commands
					include "l2j_telnet.php";
					
					//Telnet host, port, pass, timeout
					$telnet = new telnet("".$telnet_host."", "".$telnet_port."", "".$telnet_pass."", 2);
					
					$telnet->init();
					echo $telnet->write("give ".$custom." ".$item_id." ".$donatecoinreward4."");
					echo $telnet->write("quit");
				}
				else
				{
					// if player is offline we will add the items trough a mysql query
					//does the character already have the item ?
					$sql    	= "SELECT owner_id FROM items WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					$result 	= mysqli_query($db_link, $sql);
					$exist 		= mysqli_num_rows($result);
					$row 		= mysqli_fetch_assoc($result);
					
					//if the player already has the item, we will update the invertory
					if ($exist>0)
					{
						$sql = "UPDATE items SET count=count+$donatecoinreward4 WHERE item_id=$item_id AND owner_id=$charId AND loc='INVENTORY'";
					}
					else
					{
						//else the player does not have the item, now lets first get the latest object_id
						$sql = "SELECT object_id FROM items ORDER BY object_id DESC LIMIT 1";
						$result 	= mysqli_query($db_link, $sql);
						$row 		= mysqli_fetch_assoc($result);
						$lastObjId 	= $row[object_id];
						$lastObjId 	= $lastObjId + 1;
					
						//Finally.. lets put the item in the invertory with the latest object_id
						$sql = "INSERT INTO items (owner_id, object_id, item_id, count, enchant_level, loc) VALUES ('".$charId."', '".$lastObjId."', '".$item_id."', '".$donatecoinreward4."', '0', 'INVENTORY')";
					}
				
					mysqli_query($db_link, $sql);
				}
			}
		}
	}
}

function esc($str)
{
	global $db_link;
	return mysqli_real_escape_string($db_link, $str);
}
?>